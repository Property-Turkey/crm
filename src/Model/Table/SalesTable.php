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

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'className' => 'Clients',
        ]);

        $this->belongsTo('Tags', [
            'foreignKey' => 'sale_tags',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Sources', [
            'foreignKey' => 'source_id',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Pools', [
            'foreignKey' => 'pool_id',
            'className' => 'Categories',
        ]);
        
        $this->belongsTo('Status', [
            'foreignKey' => 'status_id',    
            'className' => 'Categories',        
        ]);

        $this->belongsTo('Type', [
            'foreignKey' => 'report_type',    
            'className' => 'Categories',        
        ]);
       
        $this->hasMany('Reports', [
            'foreignKey' => 'tar_id',
			'dependent' => true,
			'cascadeCallbacks' => true
        ])->setConditions(['Reports.tar_tbl'=>'Sales']);

        $this->hasMany('Books', [
            'foreignKey' => 'sale_id',
			'dependent' => true,
			'cascadeCallbacks' => true
        ]);

        $this->hasMany('Usersale', [
            'foreignKey' => 'lead_id',
			'dependent' => true,
			'cascadeCallbacks' => true
        ]);

        $this->hasMany('SaleSpecs', [
            'foreignKey' => 'sale_id',
			'dependent' => true,
			'cascadeCallbacks' => true
        ]);

        $this->addBehavior('Log');
    }

    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('client_id')
        //     ->notEmptyString('client_id');

        // $validator
        //     ->integer('parent_id')
        //     ->notEmptyString('parent_id');

        // $validator
        //     ->integer('source_id')
        //     ->notEmptyString('source_id');
        
        // $validator
        //     ->integer('segment_id')
        //     ->notEmptyString('segment_id');

        // $validator
        //     ->allowEmptyString('sale_current_stage');

        // $validator
        //     ->allowEmptyString('lead_priority');

        // $validator
        //     ->allowEmptyString('rec_state');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // $rules->add($rules->existsIn('parent_id', 'ParentSales'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
