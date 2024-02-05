<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ReportsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('reports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('EmpathyReports', [
            'foreignKey' => 'tar_id',
            'joinType' => 'INNER',
            'className' => 'Clients',
        ]);
        
        $this->belongsTo('Clients', [
            'foreignKey' => 'tar_id',
        ]);

        $this->belongsTo('TypeCategories', [
            'foreignKey' => 'report_type',    
            'className' => 'Categories',        
        ]);

        $this->belongsTo('User', [
            'foreignKey' => 'user_id',    
            'className' => 'Users',        
        ]);

        $this->belongsTo('Text', [
            'foreignKey' => 'report_text',  
            'className' => 'Clients',       
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('tar_id')
            ->requirePresence('tar_id', 'create')
            ->notEmptyString('tar_id');

        $validator
            ->scalar('tar_tbl')
            ->maxLength('tar_tbl', 255)
            ->requirePresence('tar_tbl', 'create')
            ->notEmptyString('tar_tbl');

        $validator
            ->integer('report_type')
            ->allowEmptyString('report_type');

        $validator
            ->notEmptyString('report_priority');

        $validator
            ->scalar('report_text')
            ->requirePresence('report_text', 'create')
            ->notEmptyString('report_text');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
