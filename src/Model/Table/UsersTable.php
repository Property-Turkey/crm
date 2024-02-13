<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('user_fullname');
        $this->setPrimaryKey('id');

        $this->hasMany('Contents', [
            'foreignKey' => 'user_id',
        ]);

        $this->hasMany('Actions', [
            'foreignKey' => 'user_id',
        ]);

        //today

        $this->hasMany('ActionsTodayCalled', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>75,                 
            'DATE(stat_created)' => date('Y-m-d')
        ]);

        $this->hasMany('ActionsTodaySpoken', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>76, 
            'DATE(stat_created)' => date('Y-m-d')
        ]);

        //yesterday

        $this->hasMany('ActionsYesterdayCalled', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>75,                 
            'DATE(stat_created)' => date('Y-m-d', strtotime('-1 day'))
        ]);

        $this->hasMany('ActionsYesterdaySpoken', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>76, 
            'DATE(stat_created)' => date('Y-m-d', strtotime('-1 day'))
        ]);

        //before yesterday

        $this->hasMany('ActionsBefYesterdayCalled', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>75,                 
            'DATE(stat_created)' => date('Y-m-d', strtotime('-2 day'))
        ]);

        $this->hasMany('ActionsBefYesterdaySpoken', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>76, 
            'DATE(stat_created)' => date('Y-m-d', strtotime('-2 day'))
        ]);

        //before before yesterday

        $this->hasMany('ActionsBefbefYesterdayCalled', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>75,                 
            'DATE(stat_created)' => date('Y-m-d', strtotime('-3 day'))
        ]);

        $this->hasMany('ActionsBefbefYesterdaySpoken', [
            'className'=>'Actions',
            'foreignKey' => 'user_id',
        ])->setConditions([
            'action_type'=>76, 
            'DATE(stat_created)' => date('Y-m-d', strtotime('-3 day'))
        ]);
		$this->addBehavior('Log');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('user_fullname')
            ->maxLength('user_fullname', 255)
            ->requirePresence('user_fullname', 'create')
            ->notEmptyString('user_fullname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('user_role')
            ->maxLength('user_role', 255)
            ->requirePresence('user_role', 'create')
            ->notEmptyString('user_role');
        
        
        $validator
            ->scalar('user_token')
            ->maxLength('user_token', 255)
            ->allowEmptyString('user_token');

        $validator
            ->scalar('user_configs')
            ->maxLength('user_configs', 255)
            ->allowEmptyString('user_configs');

        $validator
            ->dateTime('stat_lastlogin')
            ->requirePresence('stat_lastlogin', 'create')
            ->notEmptyDateTime('stat_lastlogin');

        $validator
            ->dateTime('stat_created')
            ->requirePresence('stat_created', 'create')
            ->notEmptyDateTime('stat_created');

        $validator
            ->integer('stat_logins')
            ->requirePresence('stat_logins', 'create')
            ->notEmptyString('stat_logins');

        $validator
            ->scalar('stat_ip')
            ->maxLength('stat_ip', 255)
            ->requirePresence('stat_ip', 'create')
            ->notEmptyString('stat_ip');

        $validator
            ->boolean('rec_state')
            ->requirePresence('rec_state', 'create')
            ->notEmptyString('rec_state');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
