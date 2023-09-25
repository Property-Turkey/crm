<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offers Model
 *
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\BelongsTo $Sales
 *
 * @method \App\Model\Entity\Offer newEmptyEntity()
 * @method \App\Model\Entity\Offer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Offer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Offer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Offer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Offer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Offer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Offer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OffersTable extends Table
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

        $this->setTable('offers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->integer('sale_id')
            ->notEmptyString('sale_id');

        $validator
            ->integer('property_id')
            ->requirePresence('property_id', 'create')
            ->notEmptyString('property_id');

        $validator
            ->scalar('offer_desc')
            ->allowEmptyString('offer_desc');

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
        $rules->add($rules->existsIn('sale_id', 'Sales'), ['errorField' => 'sale_id']);

        return $rules;
    }
}
