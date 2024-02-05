<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salespecs Model
 *
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\BelongsTo $Sales
 *
 * @method \App\Model\Entity\Salespec newEmptyEntity()
 * @method \App\Model\Entity\Salespec newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Salespec[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Salespec get($primaryKey, $options = [])
 * @method \App\Model\Entity\Salespec findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Salespec patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Salespec[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Salespec|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salespec saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salespec[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salespec[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salespec[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salespec[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SalespecsTable extends Table
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

        $this->setTable('sale_specs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        
        $this->belongsTo('Currency', [
            'foreignKey' => 'salespec_currency',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Persona', [
            'foreignKey' => 'salespec_buyerpersona',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Style', [
            'foreignKey' => 'salespec_socialstyle',
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
        //     ->scalar('salespec_propertytype')
        //     ->maxLength('salespec_propertytype', 255)
        //     ->allowEmptyString('salespec_propertytype');

        // $validator
        //     ->integer('salespec_currency')
        //     ->allowEmptyString('salespec_currency');

        // $validator
        //     ->integer('salespec_buyerpersona')
        //     ->allowEmptyString('salespec_buyerpersona');

        // $validator
        //     ->integer('salespec_socialstyle')
        //     ->allowEmptyString('salespec_socialstyle');

        // $validator
        //     ->scalar('salespec_beds')
        //     ->maxLength('salespec_beds', 255)
        //     ->allowEmptyString('salespec_beds');

        // $validator
        //     ->scalar('salespec_loction_target')
        //     ->maxLength('salespec_loction_target', 255)
        //     ->allowEmptyString('salespec_loction_target');

        // $validator
        //     ->notEmptyString('salespec_isowner');

        // $validator
        //     ->notEmptyString('salespec_isready');

        // $validator
        //     ->allowEmptyString('salespec_saved');

        // $validator
        //     ->scalar('salespec_configs')
        //     ->allowEmptyString('salespec_configs');

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
