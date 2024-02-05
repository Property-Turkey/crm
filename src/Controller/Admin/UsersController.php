<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;

class UsersController extends AppController
{
    
    public function dashboard()
    {
        if ($this->request->is(['post'])) {
            
            $this->autoRender = false;
            echo json_encode([ "status"=>"SUCCESS", "data"=>[
                    'stats' => [],//$this->statistics(), 
                    'notifications' => [],//$this->notifications()
                ] 
            ]); die();

        }

        $userCount = $this->Users->Clients->find()->count();

        $this->set(compact('clientCount'));
    }

    private function statistics()
    {

        if($this->authUser["id"]){
            $conn = ConnectionManager::get('default');
            // NUMBERS
            $q_numbers = $conn->execute("
                SELECT
                    ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 0 ) AS 'total_disabled_users',
                    ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 1 ) AS 'total_enabled_users',

                    ( SELECT COUNT(*) FROM users u WHERE u.stat_lastlogin > DATE_SUB( curdate(), INTERVAL 1 WEEK) ) AS 'total_active_users',
                    ( SELECT COUNT(*) FROM users u WHERE u.stat_lastlogin < DATE_SUB( curdate(), INTERVAL 1 WEEK) ) AS 'total_inactive_users',

                    ( SELECT COUNT(*) FROM properties p WHERE p.stat_updated < DATE_SUB(curdate(), INTERVAL 1 MONTH) ) AS 'total_updated_properties',
                    ( SELECT COUNT(*) FROM properties p WHERE p.stat_updated > DATE_SUB(curdate(), INTERVAL 1 MONTH) ) AS 'total_outdated_properties',
                    ( SELECT COUNT(*) FROM properties p WHERE p.rec_state = 0 ) AS 'total_inactive_properties',
                    ( SELECT COUNT(*) FROM properties p WHERE p.rec_state = 1 ) AS 'total_active_properties',

                    ( SELECT COUNT(*) FROM projects pj WHERE pj.rec_state = 0 ) AS 'total_inactive_projects',
                    ( SELECT COUNT(*) FROM projects pj WHERE pj.rec_state = 1 ) AS 'total_active_projects',

                    ( SELECT COUNT(*) FROM sellers s ) AS 'total_sellers',

                    ( SELECT COUNT(*) FROM developers d ) AS 'total_developers',

                    ( SELECT COUNT(*) FROM offices o ) AS 'total_offices'

                FROM users u LIMIT 0, 1
            ")->fetchAll('assoc');

            // USERS 
            $q_users = $this->getTableLocator()->get('Users')->find('all', [
                'fields'=>['id', 'label'=>'user_fullname', 'user_role', 'stat_logins'
            ]])->toArray();

            $users = ['items'=>$q_users, 'labels'=>[], 'values'=>[]];
            $logins = ['items'=>$q_users, 'labels'=>[], 'values'=>[]];
            $logins['labels'] = array_values(array_column($q_users, 'label'));
            $logins['values'] = array_values(array_column($q_users, 'stat_logins'));

            foreach($users['items'] as &$user){
                $users['labels'][$user['user_role']] = __(empty($user['user_role']) ? '' : $user['user_role']);
                $users['values'][$user['user_role']] = empty($users['values'][$user['user_role']]) ? 1 : $users['values'][$user['user_role']] + 1;
                $user['total_values'][$user['user_role']] = empty($user['total_values'][$user['user_role']]) ? 1 : $user['total_values'][$user['user_role']]+1;
            }
            
            $users['labels'] = array_values($users['labels']);
            $users['values'] = array_values($users['values']);

            // PROPS PRICES
            
            $currCurrency = $this->Do->get('currencies')[ $this->currCurrency ];
            $currCurrency_icon = $this->Do->get('currencies_icons')[ $this->currCurrency ];
            $block = floor( $this->Do->currencyConverter("TRY", $currCurrency, 500000) );
            
            $prop_prices_q = $this->getTableLocator()->get('Properties')->find('all', [
                'conditions'=>['property_price >'=>0],
                'fields'=>['id', 'property_price', 'property_currency']
            ])->toArray();

            $prices=['items'=>[], 'values'=>[], 'labels'=>[]];
            foreach($prop_prices_q as &$itm){
                $from = $this->Do->get('currencies')[ empty($itm->property_currency) ? 3 : $itm->property_currency ];
                $itm->converted_price = floor( $this->Do->currencyConverter($from, $currCurrency, $itm->property_price) );
                $range_num = floor( $itm->converted_price / $block );
                $prices['values'][$range_num] = !isset($prices['values'][$range_num]) ? 1 : $prices['values'][$range_num]+1;
            }
            arsort($prices['values']);
            foreach($prices['values'] as $k=>$v){
                $prices['labels'][$k] = $currCurrency_icon.($block * ($k-1)).' - '.$currCurrency_icon.($block * ($k)).' '.$currCurrency;
            }
            
            $prices['values'] = array_values( $prices['values'] );
            $prices['labels'] = array_values( $prices['labels'] );

            // debug($prices);
            // debug(max( array_column( $prop_prices_q, 'converted_price') ));
            return [
                "numbers"=>$q_numbers[0],
                "users"=>$users,
                "logins"=>$logins,
                // "prop_prices"=>$prop_prices,
                "prices"=>$prices,
            ];

        }else{
            return [];
        }
    }

    private function notifications()
    {
        if($this->authUser["id"]){
            $conn = ConnectionManager::get('default');
            $lastlogin = $this->authUser['stat_lastlogin'];

            // SYSTEM ADMIN 
            if(in_array( $this->authUser['user_role'], ['admin.admin', 'admin.root'])){
                $q = $conn->execute("
                    SELECT 
                        u.id, u.user_fullname, 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_created >= \"$lastlogin\" ) AS 'new_properties', 
                        
                        ( SELECT COUNT(*) FROM projects pj 
                            WHERE pj.stat_created >= \"$lastlogin\" ) AS 'new_projects', 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_updated <= DATE_SUB('".date('Y-m-d')."', INTERVAL 1 MONTH) ) AS 'new_outdated_properties'
                        
                        FROM users u")->fetchAll('assoc');
                    
            }

            // PORTFOLIO OWNER
            if(in_array( $this->authUser['user_role'], ['admin.portfolio', 'admin.callcenter'])){
                $q = $conn->execute("
                    SELECT 
                        u.id, u.user_fullname, 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_updated <= DATE_SUB('".date('Y-m-d')."', INTERVAL 1 MONTH) AND 
                            pp.user_id = '".$this->authUser['id']."') AS 'new_outdated_properties'
                        
                        FROM users u")->fetchAll('assoc');
            }

            // SUPERVISOR
            if(in_array( $this->authUser['user_role'], ['admin.supervisor'])){
                
                $office_members_ids = $this->getTableLocator()->get('Users')->find('list', ['conditions'=>[
                    'office_id' => $this->authUser['office_id'],
                ]])->toArray();
                
                $q = $conn->execute("
                    SELECT 
                        u.id, u.user_fullname, 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_updated <= DATE_SUB('".date('Y-m-d')."', INTERVAL 1 MONTH) AND 
                            pp.user_id IN ( ".implode( ',', array_keys( $office_members_ids ) )." )) AS 'new_outdated_properties'
                        
                        FROM users u")->fetchAll('assoc');
                        
            }
            
            // CONTENT
            if(in_array( $this->authUser['user_role'], ['admin.content'])){
                $uid = $this->authUser['id'];
                // dd($uid);
                $q = $conn->execute("
                    SELECT 
                        u.id, u.user_fullname, 
                        
                        ( SELECT COUNT(*) FROM user_property up 
                            WHERE up.user_id = $uid AND up.rec_state = '1' ) AS 'new_properties', 
                        
                        ( SELECT COUNT(*) FROM user_project uj 
                            WHERE uj.user_id = $uid AND uj.rec_state = '1' ) AS 'new_projects'
                        
                        FROM users u")->fetchAll('assoc');
                        
            }
            
            $notifications = $q[0];
            
            // $notifications["total"]=0;
            // foreach($notifications as $k=>$itm){
            //     if(strpos($k, "new_")!==false){
            //         $notifications["total"]+=($itm*1);
            //     }
            // }
            // return $notifications;
            if(count($notifications)>2){
                return $notifications;
            }else{
                debug($q);
            }
        }else{
            return [];
        }
    }
    
    public function index( )
    {
        // $this->Do->sendEmail(['laralev84@gmail.com'], __('new_account'), [], 'register_tm');
        // die;
        $_user = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;
        $_roleAssign = isset($_GET['role']) ? $_GET['role'] : false;

        
        // find users by name
        if (!empty($_user)) {
            
            if ($_roleAssign == false) {
                $userCondition = [
                    'user_fullname LIKE' => '%' . $_keyword . '%'
                ];
            } else {
                $userCondition = [
                    'user_role' => $_roleAssign,
                    'user_fullname LIKE' => '%' . $_keyword . '%'
                ];
            }
            $data = $this->Users
                ->find('all')
                ->select(['text' => 'user_fullname',  'value'=>'id'])
                ->where($userCondition);

            echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
            die();
        }

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $dt = json_decode(file_get_contents('php://input'), true);

            $conditions = [ ];

            // Filters and Search
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k'])>0) ? $_GET['k'] : false;
            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
    
            
            if( !empty($_from) ){ $conditions['Users.stat_created > '] = $_from; }
            if( !empty($_to) ){ $conditions['Users.stat_created < '] = $_to; }
            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Users.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');


            $noneSearchable = ['page'];
            $likeFields = ['page'];


            //Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue; // Skip this column if input is empty
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue; 
                    }

                    else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                    // dd($dt['search']);
                }
            }


            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Users->get( $_id )->toArray();

                echo json_encode(["status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data )], JSON_UNESCAPED_UNICODE); die();
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Users, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                ]);

            }

            echo json_encode( 
                [ "status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data ), 
                "paging" => $this->request->getAttribute('paging')['Users']], 
                JSON_UNESCAPED_UNICODE); die();
        }

       
    }

    public function view($id = null)
    {
        $rec = $this->Users->get($id,[
            'contain' => ['Offices'=>['fields'=>['id', 'office_name']]]
        ]);
        $this->set(compact('rec'));
    }

    public function myaccount($id = -1) 
    {
        
        // $this->render('myaccount');
    }

    public function save($id = -1) 
    {
        $dt = json_decode( file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Users->get($dt['id']);
            $oldEmail = $rec->email;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['stat_lastlogin'] = date('Y-m-d H:i:s');
            $dt['stat_logins'] = $dt['stat_logins']+1;
            $dt['stat_ip'] = $this->Do->getIP();
            
            if (isset($dt['email']) && $dt['email'] != $oldEmail) {
                $this->sendActivationEmail($dt['email'], $dt);
            }

            if (isset($dt['activate'])) {
                $this->sendActivationEmail($dt['email'], $dt);
            }
            
            if (empty($dt['password'])) {
                unset($dt['password']);
            }
           
            
        }

        // add mode
        if ($this->request->is(['post'])) {
            $rec = $this->Users->newEmptyEntity();
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['stat_lastlogin'] = date('Y-m-d H:i:s');
            $dt['rec_state'] = 0;
            $dt['stat_logins'] = empty($dt['stat_logins']) ? 1 : $dt['stat_logins'] + 1;
            $dt['stat_ip'] = $this->Do->getIP();

            $this->sendActivationEmail($dt['email'], $dt);
        
        }
 
        if ($this->request->is(['post', 'patch', 'put'])) {
            
            $this->autoRender  = false;

            if(isset($dt['user_configs'])){
                $dt['user_configs'] = json_encode($dt['user_configs']);
            }
            
            
            $rec = $this->Users->patchEntity($rec, $dt);
            unset($rec['office']);
            if ($newRec = $this->Users->save($rec)) {
                // send activation email in case email change or new account created
                if(!$dt['id'] || strtolower(trim($newRec->email)) != strtolower(trim($oldEmail))){
                    $this->Do->sendEmail([$newRec->email], __('new_account'), $newRec, 'register_tm');
                } 
                echo json_encode(["status"=>"SUCCESS", "data"=>$this->Do->convertJson( $newRec )]);
                die();
            }

            echo json_encode(["status"=>"FAIL", "data"=>$rec->getErrors()]); die();
        }
    }

    public function sendActivationEmail($email, $userData) {
        $this->Do->sendEmail([$email], __('new_account'), $userData, 'register_tm');
    }
    

	public function delimage() 
    {
        $this->request->allowMethod(['delete']);
        $ctrl = $this->request->getParam('controller');
        $this->autoRender  = false;
        $dt = json_decode( file_get_contents('php://input'), true);
        

		if( $this->Images->deleteFile('img/'.strtolower( $ctrl ).'_photos', $dt['image'])){
            $rec = $this->$ctrl->get($dt['id']);
            
			$imgsArray = explode(",", $rec->user_photos);
            $key = array_search($dt['image'], $imgsArray);
			unset($imgsArray[$key]);
			$update = ["id"=>$dt['id'], "user_photos"=>implode(",",$imgsArray)];
        	$updated_rec = $this->$ctrl->patchEntity($rec, $update);
			$saved = $this->$ctrl->save($updated_rec);
            echo json_encode(["status"=>"SUCCESS", "data"=>$saved]);  die();
		}else{
            echo json_encode(["status"=>"FAIL", "data"=>$dt]); die();
		}
	}

    public function delete($id = null)
    {
        if(!$id){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("is-selected-empty-msg"), "data"=>[]] ); die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender  = false;

        if(!$this->_isAuthorized(true)){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("no-auth"), "data"=>[]] ); die();
        }

        $delRec=[];
        foreach(explode(",", $id) as $k=>$rec_id){
            $rec = $this->Users->get($rec_id);
            $delRec[$k] = $this->Users->delete($rec);
        }
        
        $res = (!empty(array_filter($delRec))) ? ["status"=>"SUCCESS", "data"=>$delRec] : ["status"=>"FAIL", "data"=>$delRec];

        echo json_encode($res);die();

    }
    
    public function enable($val=1, $ids=null)
    {
        if(!$ids){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("is-selected-empty-msg"), "data"=>[]] ); die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender  = false;

        if(!$this->_isAuthorized(true)){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("no-auth"), "data"=>[]] ); die();
        }

        $updateRec=[];
        foreach(explode(',', $ids) as $k=>$id){
            $rec = $this->Users->newEmptyEntity();
            $rec['id'] = $id;
            $rec['rec_state'] = $val;
            $updateRec[$k] = $this->Users->save($rec);
        }
        
        $res = (!empty(array_filter($updateRec))) ? ["status"=>"SUCCESS", "data"=>$updateRec] : ["status"=>"FAIL", "data"=>$updateRec];

        echo json_encode($res);die();
    }
    
    public function login() 
    {
        $this->autoRender = false;
        $dt = json_decode(file_get_contents('php://input'), true);
        
		if ($this->request->is('post')) {

            // login using remember_me user id
            if(!empty( $this->Do->CookiesHandler('RMMBRME_ID') ) ){
                
                $user = $this->Users->find('all', [
                    'conditions'=>[ 'id'=>$this->Do->CookiesHandler('RMMBRME_ID') ]
                ] )->first()->toArray();
                
                if(!$user){ return $this->logout(); }

            // login from email AUTOLOGIN for activation and change password
            }elseif(isset($dt['autologin'])){
                $code = base64_decode( $dt['autologin'] );
                $id = substr($code , 3, -3);
                $user = $this->Users->get($id)->toArray();
                
            // login normally
            }else{
                $user = $this->Auth->identify();
            }

            // if auth fail 
            if (!$user) { 
                echo json_encode(['status'=>'FAIL', 'data'=>$user]); die(); 
            }else{
                
                // check if account activated  
                if ($user['rec_state'] == 0 && !isset($dt['autologin'])) {
                    echo json_encode(['status'=>'NOT_ACTIVE', 'data'=>$user]); die();
                }

                // update and activate record then do log user in 
                $updt = [
                    'id'=>$user['id'], 
                    'stat_lastlogin'=>date('Y-m-d H:i:s'), 
                    'stat_logins'=>$user['stat_logins']+1,
                    'rec_state'=>1
                ];

                if( $this->Do->adder( $updt, 'Users') ){
                    $this->Auth->setUser($this->Do->convertJson( $user ));

                    // save remember me id variable into cookie
                    if( !empty( $dt['remember_me'] ) ){
                        $this->Do->CookiesHandler(['RMMBRME_ID'=>$user['id']], 'write');
                    }
                    
                    // check if there is redirect value
                    if ( !empty( $dt['changePassword'] ) ) {
                        echo json_encode(['status'=>'SUCCESS', 'data'=>$user, 'redirect'=>$this->app_folder.'/admin/myaccount?msg='.__('change_password')]); die();
                    }

                    // tell user activition succeed
                    if ($user['rec_state'] == 0 && isset($dt['autologin'])) {
                        echo json_encode(['status'=>'SUCCESS', 'data'=>$user, 'redirect'=>$this->app_folder.'/?activate=1']); die();
                    }
                    echo json_encode(['status'=>'SUCCESS', 'data'=>$user]); die();
                }else{
                    echo json_encode(['status'=>'FAIL', 'data'=>$user, 'updt'=>$updt]); die();
                }
            }

            
		}
    }
	
    public function logout() 
    {
        $this->autoRender = false;
        // if( !empty( $this->Auth->User("id") ) ){
            $this->Do->CookiesHandler('RMMBRME_ID', 'delete');
            return $this->redirect($this->Auth->logout());
        // }
    }
    
    public function register() 
    {
		if(!empty($this->Auth->User('id')) && $this->Auth->User('role') !== 'root'){
			$this->Flash->error(__('one_account_allowed'));
			$this->redirect(['controller'=>'Users', 'action'=>'dashboard']);
		}
		
		$user = $this->Users->newEntity(['associated'=>['Schools'] ]);
        if ($this->request->is('post')) {
            
            $this->autoRender = false;
            $userDT = json_decode(file_get_contents('php://input'), true);
                
			$userDT['stat_created'] = date("Y-m-d H:i:s");
			$userDT['stat_lastlogin'] = date("Y-m-d H:i:s");
			$userDT['user_role'] = 'user.admin';
			$userDT['stat_ip'] = $_SERVER['REMOTE_ADDR'];
			$userDT['rec_state'] = 0;
			$userDT['user_token'] = base64_encode($user->email.'-'.$user->password);

			// $user = $this->Users->newEntity($user);
			$user = $this->Users->patchEntity($user, $userDT );
			// debug($user);
			// die();
            if ($newRec = $this->Users->save($user )) {
                $newRec->lang = $this->currlang;
				if($this->Do->sendEmail([$newRec->email], __('new_account'), $newRec, 'register_tm')){
                    if(@$_GET['ajax'] == 1){echo json_encode(["status"=>"SUCCESS"]); die ;}
                    $this->Flash->success(__('send-success'));
                }else{
                    if(@$_GET['ajax'] == 1){echo json_encode(["status"=>"FAIL"]); die ;}
                    $this->Flash->error(__('send-fail'));
                }
            }else{
				if(@$_GET['ajax'] == 1){echo json_encode($user->getErrors());die();}
                $this->Flash->error(__('register-fail'));
			}
        }
		if(@$_GET['ajax'] == 1){
			return json_encode($user);
		}else{
			$this->set(compact('user'));
			$this->set('_serialize', ['user']);
		}
    }
	
	public function activate($code=null, $changePassword=null)
    {
		$this->autoRender = false;
        
        $id = substr( base64_decode( $code ), 3,  -3);

		$checkUser = $this->Users->find('all',['conditions'=>['id'=>$id]])->first();

		if(!$checkUser){
			$this->Flash->error(__('expired_link'));
			return $this->redirect('/');
		}else{
			$user = $this->Users->newEntity();
			$user->id = $checkUser->id;
			$user->rec_state = '1';
			$user->user_token = '1';
			$user->stat_lastlogin = date('Y-m-d H:i:s');
			if($this->Users->save($user)){
				$this->Flash->success(__('account_activated'));
                if($changePassword){
                    $this->redirect(["controller"=>"Users", "action"=>"edit", $checkUser->id]);
                }
			}else{
				$this->Flash->error(__('error_activated_msg'));
			}
			$this->redirect("/?login=1");
		}
	}
	
	public function getpassword($code = null)
    {
        $this->autoRender = false;

		if ($this->request->is('post')) {

            $dt = json_decode(file_get_contents('php://input'), true);
            if(!filter_var($dt['email'], FILTER_VALIDATE_EMAIL)){
                echo json_encode(['status'=>'FAIL', 'msg'=>__('is-email-msg'), 'data'=>[]]); die();
            }
            $checkUser = $this->Users->findByEmail( $dt['email'] )->first();
            if(empty($checkUser)){
                $this->Flash->error(__('email_not_found'));
            }
            
            $checkUser['user_token'] = $this->Do->setPW(32,0);
            $checkUser['app_folder'] = $this->app_folder;
            
            $user = $this->Users->newEmptyEntity();
            $user->id = $checkUser['id'];
            $user->user_token = $checkUser['user_token'];
            if( $this->Users->save($user) ){
                if($this->Do->sendEmail([$dt['email']], __('new_password_subject'), $checkUser, 'getpassword_tm')){
                    echo json_encode(['status'=>'SUCCESS', 'data'=>$user]); die();
                }else{
                    echo json_encode(['status'=>'FAIL', 'data'=>$user]); die();
                }
            }
        }

        $this->set('user', $user);
	}
    public function edit() 
    {
        if($this->request->getQuery('changepw')==1){
            $this->Flash->default(__('please_change_your_password'));
        }
    }
     function beforeFilter(EventInterface $event) 
    {
        parent::beforeFilter($event);
        
        if ($this->request->is(['post', 'patch', 'put', 'delete'])) {
            if(!$this->_isAuthorized(true)){
                echo json_encode(["status" => "FAIL", "redirect" => $this->app_folder.'/?login=1']); die();
            }
        }
    }
    
}