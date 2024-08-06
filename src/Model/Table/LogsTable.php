<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LogsTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('log_url')
            ->maxLength('log_url', 255)
            ->requirePresence('log_url', 'create')
            ->notEmptyString('log_url');
 
        $validator
            ->scalar('log_changes')
            ->maxLength('log_changes', 16777215)
            ->allowEmptyString('log_changes');

        $validator
            ->dateTime('stat_created')
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
