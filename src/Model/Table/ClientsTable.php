<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @method \App\Model\Entity\Client newEmptyEntity()
 * @method \App\Model\Entity\Client newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('clients');
        $this->setDisplayField('client_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Sales', [
            'foreignKey' => 'client_id',
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

        $this->belongsTo('Region', [
            'foreignKey' => 'adrs_region',    
            'className' => 'Categories',        
        ]);

        $this->hasMany('Reports', [
            'foreignKey' => 'tar_id',
            'joinType' => 'INNER',
			'dependent' => true,
			'cascadeCallbacks' => true
        ])->setConditions(['Reports.tar_tbl'=>'Clients']);
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('source_id')
        //     ->allowEmptyString('source_id');

        // $validator
        //     ->scalar('client_name')
        //     ->maxLength('client_name', 255)
        //     ->requirePresence('client_name', 'create')
        //     ->notEmptyString('client_name');

        // $validator
        //     ->scalar('client_phone')
        //     ->maxLength('client_phone', 255)
        //     ->allowEmptyString('client_phone');

        // $validator
        //     ->scalar('client_mobile')
        //     ->maxLength('client_mobile', 255)
        //     ->allowEmptyString('client_mobile');

        // $validator
        //     ->scalar('client_email')
        //     ->maxLength('client_email', 255)
        //     ->allowEmptyString('client_email');

        // $validator
        //     ->scalar('client_address')
        //     ->maxLength('client_address', 255)
        //     ->allowEmptyString('client_address');

        // $validator
        //     ->scalar('client_nationality')
        //     ->maxLength('client_nationality', 255)
        //     ->allowEmptyString('client_nationality');

        // $validator
        //     ->scalar('client_configs')
        //     ->allowEmptyString('client_configs');

        // $validator
        //     ->integer('adrs_country')
        //     ->allowEmptyString('adrs_country');

        // $validator
        //     ->integer('adrs_city')
        //     ->allowEmptyString('adrs_city');

        // $validator
        //     ->integer('adrs_region')
        //     ->allowEmptyString('adrs_region');

        // $validator
        //     ->dateTime('stat_created')
        //     ->requirePresence('stat_created', 'create')
        //     ->notEmptyDateTime('stat_created');

        // $validator
        //     ->notEmptyString('rec_state');

        return $validator;
    }
}
