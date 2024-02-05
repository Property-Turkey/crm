<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class RemindersTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('reminders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('client_id')
            ->notEmptyString('client_id');

        $validator
            ->dateTime('reminder_nextcall')
            ->requirePresence('reminder_nextcall', 'create')
            ->notEmptyDateTime('reminder_nextcall');

        $validator
            ->scalar('reminder_desc')
            ->allowEmptyString('reminder_desc');

        $validator
            ->dateTime('stat_created')
            ->notEmptyDateTime('stat_created');

        $validator
            ->dateTime('stat_updated')
            ->allowEmptyDateTime('stat_updated');

        return $validator;
    }

    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('client_id', 'Clients'), ['errorField' => 'client_id']);

        return $rules;
    }
}
