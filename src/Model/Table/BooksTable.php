<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BooksTable extends Table
{
  
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('books');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
    }

 
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('client_id')
            ->notEmptyString('client_id');

        $validator
            ->dateTime('book_arrivedate')
            ->allowEmptyDateTime('book_arrivedate');

        $validator
            ->scalar('book_current_stay')
            ->maxLength('book_current_stay', 255)
            ->allowEmptyString('book_current_stay');

        $validator
            ->allowEmptyString('book_meetperiod');

        $validator
            ->dateTime('book_meetdate')
            ->allowEmptyDateTime('book_meetdate');

        $validator
            ->scalar('book_meetplace')
            ->maxLength('book_meetplace', 255)
            ->allowEmptyString('book_meetplace');

        $validator
            ->dateTime('stat_created')
            ->notEmptyDateTime('stat_created');

        $validator
            ->notEmptyString('rec_state');

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
