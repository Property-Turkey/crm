<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EnquiresTable extends Table
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

        $this->setTable('enquires');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Log');
        
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Sources', [
            'foreignKey' => 'enquiry_clsource',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Country', [
            'foreignKey' => 'enquiry_clcountry',
            'className' => 'Addresses',
        ]);
    }

  
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('client_id')
        //     ->notEmptyString('client_id');

        // $validator
        //     ->integer('property_id')
        //     ->requirePresence('property_id', 'create')
        //     ->notEmptyString('property_id');

        // $validator
        //     ->scalar('enquiry_clname')
        //     ->maxLength('enquiry_clname', 255)
        //     ->allowEmptyString('enquiry_clname');

        // $validator
        //     ->scalar('enquiry_clemail')
        //     ->maxLength('enquiry_clemail', 255)
        //     ->requirePresence('enquiry_clemail', 'create')
        //     ->notEmptyString('enquiry_clemail');

        // $validator
        //     ->integer('enquiry_clphone')
        //     ->allowEmptyString('enquiry_clphone');

        // $validator
        //     ->integer('enquiry_clcountry')
        //     ->allowEmptyString('enquiry_clcountry');

        // $validator
        //     ->integer('enquiry_clsource')
        //     ->allowEmptyString('enquiry_clsource');

        // $validator
        //     ->scalar('enquiry_message')
        //     ->maxLength('enquiry_message', 255)
        //     ->requirePresence('enquiry_message', 'create')
        //     ->notEmptyString('enquiry_message');

        // $validator
        //     ->scalar('enquiry_ipaddress')
        //     ->maxLength('enquiry_ipaddress', 255)
        //     ->allowEmptyString('enquiry_ipaddress');

        // $validator
        //     ->scalar('enquiry_lastpage')
        //     ->maxLength('enquiry_lastpage', 255)
        //     ->allowEmptyString('enquiry_lastpage');

        // $validator
        //     ->scalar('seo_keywords')
        //     ->maxLength('seo_keywords', 255)
        //     ->requirePresence('seo_keywords', 'create')
        //     ->notEmptyString('seo_keywords');

        // $validator
        //     ->integer('seo_host')
        //     ->requirePresence('seo_host', 'create')
        //     ->notEmptyString('seo_host');

        // $validator
        //     ->notEmptyString('isindex');

        // $validator
        //     ->dateTime('stat_created')
        //     ->notEmptyDateTime('stat_created');

        // $validator
        //     ->dateTime('stat_updated')
        //     ->allowEmptyDateTime('stat_updated');

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
        $rules->add($rules->existsIn('client_id', 'Clients'), ['errorField' => 'client_id']);

        return $rules;
    }
}
