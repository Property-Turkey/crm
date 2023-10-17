<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reminders Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\BelongsTo $Sales
 *
 * @method \App\Model\Entity\Reminder newEmptyEntity()
 * @method \App\Model\Entity\Reminder newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Reminder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reminder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reminder findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Reminder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reminder[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reminder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reminder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reminder[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reminder[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reminder[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reminder[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RemindersTable extends Table
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

        $this->setTable('reminders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Sales', [
            'foreignKey' => 'sale_id',
            'joinType' => 'INNER',
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
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('sale_id')
            ->notEmptyString('sale_id');

        $validator
            ->dateTime('reminder_nextcall')
            ->requirePresence('reminder_nextcall', 'create')
            ->notEmptyDateTime('reminder_nextcall');

        $validator
            ->scalar('reminder_desc')
            ->requirePresence('reminder_desc', 'create')
            ->notEmptyString('reminder_desc');

        $validator
            ->dateTime('stat_created')
            ->notEmptyDateTime('stat_created');

        $validator
            ->dateTime('stat_updated')
            ->allowEmptyDateTime('stat_updated');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('sale_id', 'Sales'), ['errorField' => 'sale_id']);

        return $rules;
    }
}
