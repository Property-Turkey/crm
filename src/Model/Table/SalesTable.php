<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sales Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\HasMany $Books
 * @property \App\Model\Table\SaleSpecsTable&\Cake\ORM\Association\HasMany $SaleSpecs
 *
 * @method \App\Model\Entity\Sale newEmptyEntity()
 * @method \App\Model\Entity\Sale newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sale findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sale[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SalesTable extends Table
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

        $this->setTable('sales');
        $this->setDisplayField('client_id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
        ]);
        
        $this->hasMany('Enquires', [
            'foreignKey' => 'sale_id',
        ]);
        
        $this->hasMany('Offers', [
            'foreignKey' => 'sale_id',
        ]);

        $this->hasMany('Reminders', [
            'foreignKey' => 'sale_id',
        ]);

        $this->hasMany('Reservations', [
            'foreignKey' => 'sale_id',
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
            ->integer('client_id')
            ->allowEmptyString('client_id');

        $validator
            ->integer('source_id')
            ->allowEmptyString('source_id');

        $validator
            ->integer('category_id')
            ->allowEmptyString('category_id');

        $validator
            ->integer('pool_id')
            ->allowEmptyString('pool_id');

        $validator
            ->allowEmptyString('sale_priority');

        $validator
            ->integer('sale_finance')
            ->allowEmptyString('sale_finance');

        $validator
            ->notEmptyString('sale_current_stage');

        $validator
            ->scalar('sale_tags')
            ->allowEmptyString('sale_tags');

        $validator
            ->integer('sale_budget')
            ->allowEmptyString('sale_budget');

        $validator
            ->integer('sale_commission')
            ->allowEmptyString('sale_commission');

        $validator
            ->integer('sale_units')
            ->allowEmptyString('sale_units');

        $validator
            ->scalar('sale_shared_roles')
            ->maxLength('sale_shared_roles', 255)
            ->allowEmptyString('sale_shared_roles');

        $validator
            ->dateTime('stat_created')
            ->requirePresence('stat_created', 'create')
            ->notEmptyDateTime('stat_created');

        $validator
            ->dateTime('stat_updated')
            ->allowEmptyDateTime('stat_updated');

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
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}
