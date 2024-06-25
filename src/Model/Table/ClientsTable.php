<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use ArrayObject;
use Cake\ORM\TableRegistry;

class ClientsTable extends Table
{

    public function beforeSave(EventInterface $event, $entity, ArrayObject $options)
    {
        
        
    
        // Replace encoded slashes to normal slashes
        $fullUrl = str_replace('\\/', '/', $_SERVER['REQUEST_URI']);
    
        $logData = [
            'user_id' => $entity->user_id,
            'log_url' => json_encode([
                "", "", "", "", $fullUrl, "Clients", "update", $entity->id
            ]),
            'log_changes' => json_encode([
                'before' => $entity->getOriginalValues(),
                'after' => $entity->toArray()
            ]),
            'rec_state' => 1
        ];
    
        $logsTable = TableRegistry::getTableLocator()->get('Logs');
        $logEntity = $logsTable->newEntity($logData);
        $logsTable->save($logEntity);
    }
    


    public function initialize(array $config): void
    {

        parent::initialize($config);


        $isLocal = Configure::read('isLocal');
        $this->setTable($isLocal ? 'ptcrm.clients' : 'ptdev_crm.clients');

        $this->setTable('clients');
        $this->setDisplayField('client_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Log');



        $this->hasMany('Actions', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Enquires', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Offers', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Reminders', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Sales', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Books', [
            'foreignKey' => 'client_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->hasMany('UserClient', [
            'foreignKey' => 'client_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->hasMany('EmpathyReports', [
            'foreignKey' => 'tar_id',
            'className' => 'Reports',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->hasMany('ClientSpecs', [
            'foreignKey' => 'client_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->hasMany('Reports', [
            'foreignKey' => 'tar_id',
            'joinType' => 'INNER',
            'dependent' => true,
            'cascadeCallbacks' => true
        ])->setConditions(['Reports.tar_tbl' => 'Clients']);

        $this->hasOne('Users', [
            'foreignKey' => 'user_role',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->belongsTo('Sources', [
            'foreignKey' => 'source_id',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Adrscountry', [
            'foreignKey' => 'adrs_country',
            'className' => 'Addresses',
        ]);

        $this->belongsTo('City', [
            'foreignKey' => 'adrs_city',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Country', [
            'foreignKey' => 'adrs_country',
            'className' => 'Pmscategories',
        ]);


        $this->belongsTo('PoolCategories', [
            'foreignKey' => 'pool_id',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Region', [
            'foreignKey' => 'adrs_region',
            'className' => 'Categories',
        ]);



        $this->belongsTo('TagCategories', [
            'foreignKey' => 'client_tags',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'className' => 'Categories',
        ]);




    }
    public static function defaultConnectionName(): string
    {
        return 'default';
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('category_id')
            ->allowEmptyString('category_id');

        $validator
            ->integer('source_id')
            ->allowEmptyString('source_id');

        $validator
            ->integer('pool_id')
            ->allowEmptyString('pool_id');

        $validator
            ->scalar('client_name')
            ->maxLength('client_name', 255)
            ->requirePresence('client_name', 'create')
            ->notEmptyString('client_name');

        $validator
            ->integer('client_phone')
            ->allowEmptyString('client_phone');

        $validator
            ->integer('client_mobile')
            ->allowEmptyString('client_mobile');

        $validator
            ->scalar('client_email')
            ->maxLength('client_email', 255)
            ->allowEmptyString('client_email');

        $validator
            ->scalar('client_address')
            ->maxLength('client_address', 255)
            ->allowEmptyString('client_address');

        $validator
            ->scalar('client_nationality')
            ->maxLength('client_nationality', 255)
            ->allowEmptyString('client_nationality');

        $validator
            ->scalar('client_configs')
            ->allowEmptyString('client_configs');

        $validator
            ->allowEmptyString('client_priority');

        // $validator
        //     ->integer('client_finance')
        //     ->allowEmptyString('client_finance');

        $validator
            ->requirePresence('client_current_stage', 'create')
            ->notEmptyString('client_current_stage');

        $validator
            ->scalar('client_tags')
            ->allowEmptyString('client_tags');

        $validator
            ->integer('client_budget')
            ->allowEmptyString('client_budget');

        $validator
            ->integer('client_commission')
            ->allowEmptyString('client_commission');

        $validator
            ->integer('client_units')
            ->allowEmptyString('client_units');

        $validator
            ->scalar('client_shared_roles')
            ->maxLength('client_shared_roles', 255)
            ->allowEmptyString('client_shared_roles');

        $validator
            ->integer('adrs_country')
            ->allowEmptyString('adrs_country');

        $validator
            ->integer('adrs_city')
            ->allowEmptyString('adrs_city');

        $validator
            ->integer('adrs_region')
            ->allowEmptyString('adrs_region');

        $validator
            ->dateTime('stat_created')
            ->requirePresence('stat_created', 'create')
            ->notEmptyDateTime('stat_created');

        $validator
            ->notEmptyString('rec_state');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }

}
