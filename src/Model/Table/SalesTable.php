<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class SalesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sales');
        $this->setDisplayField('client_id');
        $this->setPrimaryKey('id');

        // $this->belongsTo('Clients', [
        //     'foreignKey' => 'client_id',
        // ]);
        
        // $this->hasMany('Actions', [
        //     'foreignKey' => 'sale_id',
        // ]);

        // $this->hasMany('Offers', [
        //     'foreignKey' => 'sale_id',
        // ]);

        // $this->hasMany('Reminders', [
        //     'foreignKey' => 'sale_id',
        // ]);

        // $this->hasOne('Reservations', [
        //     'foreignKey' => 'sale_id',
        // ]);

        // $this->hasMany('Enquires', [
        //     'foreignKey' => 'sale_id',
        // ]);

        // $this->belongsTo('TagCategories', [
        //     'foreignKey' => 'sale_tags',
        //     'className' => 'Categories',
        // ]);
        // $this->belongsTo('Categories', [
        //     'foreignKey' => 'category_id',
        //     'className' => 'Categories',
        // ]);

        // $this->hasMany('Reports', [
        //     'foreignKey' => 'tar_id',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ])->setConditions(['Reports.tar_tbl'=>'Sales']);

        // $this->hasOne('Books', [
        //     'foreignKey' => 'sale_id',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ]);

        // $this->hasOne('Users', [
        //     'foreignKey' => 'user_role',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ]);

        // $this->hasMany('UserSale', [
        //     'foreignKey' => 'sale_id',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ]);

        // $this->hasMany('SaleSpecs', [
        //     'foreignKey' => 'sale_id',
		// 	'dependent' => true,
		// 	'cascadeCallbacks' => true
        // ]);
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
        //     ->integer('client_id')
        //     ->allowEmptyString('client_id');

        // $validator
        //     ->integer('category_id')
        //     ->allowEmptyString('category_id');

        // $validator
        //     ->allowEmptyString('client_priority');

        // $validator
        //     ->integer('sale_finance')
        //     ->allowEmptyString('sale_finance');

        // $validator
        //     ->notEmptyString('sale_current_stage');

        // $validator
        //     ->scalar('sale_tags')
        //     ->allowEmptyString('sale_tags');

        // $validator
        //     ->integer('sale_budget')
        //     ->allowEmptyString('sale_budget');

        // $validator
        //     ->integer('sale_commission')
        //     ->allowEmptyString('sale_commission');

        // $validator
        //     ->integer('sale_units')
        //     ->allowEmptyString('sale_units');

        // $validator
        //     ->scalar('sale_shared_roles')
        //     ->maxLength('sale_shared_roles', 255)
        //     ->allowEmptyString('sale_shared_roles');

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
