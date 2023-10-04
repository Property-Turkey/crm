<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReservationsTable extends Table
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

        $this->setTable('reservations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sales', [
            'foreignKey' => 'sale_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Payment', [
            'foreignKey' => 'reservation_paytype',
            'className' => 'Categories',
        ]);



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
        //     ->integer('sale_id')
        //     ->notEmptyString('sale_id');

        // $validator
        //     ->integer('reservation_amount')
        //     ->requirePresence('reservation_amount', 'create')
        //     ->notEmptyString('reservation_amount');

        // $validator
        //     ->integer('reservation_price')
        //     ->allowEmptyString('reservation_price');

        // $validator
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('sale_id', 'Sales'), ['errorField' => 'sale_id']);

        return $rules;
    }
}
