<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ReservationsTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('reservations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);

        $this->belongsTo('Payment', [
            'foreignKey' => 'reservation_paytype',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Currency', [
            'foreignKey' => 'reservation_currency',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Type', [
            'foreignKey' => 'type_id',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Property', [
            'foreignKey' => 'property_id',    
            'className' => 'Pmsproperties',        
        ]);


        $this->belongsTo('Project', [
            'foreignKey' => 'project_id',    
            'className' => 'Pmsprojects',        
        ]);

        $this->belongsTo('Seller', [
            'foreignKey' => 'seller_id',    
            'className' => 'Pmssellers',        
        ]);

        $this->belongsTo('Developer', [
            'foreignKey' => 'developer_id',    
            'className' => 'Pmsdevelopers',        
        ]);

        $this->belongsTo('Pmscategory', [
            'foreignKey' => 'type_id',    
            'className' => 'Pmscategories',        
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('client_id')
        //     ->notEmptyString('client_id');

        // $validator
        //     ->integer('property_id')
        //     ->notEmptyString('property_id');

        // $validator
        //     ->integer('project_id')
        //     ->allowEmptyString('project_id');

        // $validator
        //     ->integer('type_id')
        //     ->allowEmptyString('type_id');

        // $validator
        //     ->integer('source_id')
        //     ->allowEmptyString('source_id');

        // $validator
        //     ->integer('developer_id')
        //     ->allowEmptyString('developer_id');

        // $validator
        //     ->integer('category_id')
        //     ->allowEmptyString('category_id');

        // $validator
        //     ->integer('sellertype_id')
        //     ->allowEmptyString('sellertype_id');

        // $validator
        //     ->integer('seller_id')
        //     ->allowEmptyString('seller_id');

        // $validator
        //     ->integer('reservation_amount')
        //     ->requirePresence('reservation_amount', 'create')
        //     ->notEmptyString('reservation_amount');

        // $validator
        //     ->integer('reservation_price')
        //     ->allowEmptyString('reservation_price');

        // $validator
        //     ->integer('reservation_currency')
        //     ->allowEmptyString('reservation_currency');

        // $validator
        //     ->integer('reservation_usdprice')
        //     ->allowEmptyString('reservation_usdprice');

        // $validator
        //     ->integer('reservation_paytype')
        //     ->allowEmptyString('reservation_paytype');

        // $validator
        //     ->dateTime('reservation_downpayment_date')
        //     ->allowEmptyDateTime('reservation_downpayment_date');

        // $validator
        //     ->integer('reservation_downpayment')
        //     ->allowEmptyString('reservation_downpayment');

        // $validator
        //     ->notEmptyString('reservation_isinvoice_sent');

        // $validator
        //     ->dateTime('reservation_invoice_date')
        //     ->allowEmptyDateTime('reservation_invoice_date');

        // $validator
        //     ->integer('reservation_comission')
        //     ->requirePresence('reservation_comission', 'create')
        //     ->notEmptyString('reservation_comission');

        // $validator
        //     ->integer('reservation_usdcomission')
        //     ->requirePresence('reservation_usdcomission', 'create')
        //     ->notEmptyString('reservation_usdcomission');

        // $validator
        //     ->scalar('reservation_details')
        //     ->maxLength('reservation_details', 255)
        //     ->allowEmptyString('reservation_details');

        // $validator
        //     ->dateTime('stat_created')
        //     ->requirePresence('stat_created', 'create')
        //     ->notEmptyDateTime('stat_created');

        // $validator
        //     ->dateTime('stat_updated')
        //     ->allowEmptyDateTime('stat_updated');

        // $validator
        //     ->notEmptyString('rec_state');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('client_id', 'Clients'), ['errorField' => 'client_id']);
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}
