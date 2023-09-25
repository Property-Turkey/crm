<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AddressCategoriesTable extends Table
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

        $this->setTable('address_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentAddressCategories', [
            'className' => 'AddressCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildAddressCategories', [
            'className' => 'AddressCategories',
            'foreignKey' => 'parent_id',
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
        //     ->notEmptyString('language_id');

        // $validator
        //     ->integer('parent_id')
        //     ->allowEmptyString('parent_id');

        // $validator
        //     ->scalar('category_name')
        //     ->maxLength('category_name', 255)
        //     ->allowEmptyString('category_name');

        // $validator
        //     ->scalar('category_slug')
        //     ->maxLength('category_slug', 255)
        //     ->allowEmptyString('category_slug');

        // $validator
        //     ->scalar('category_configs')
        //     ->maxLength('category_configs', 255)
        //     ->allowEmptyString('category_configs');

        // $validator
        //     ->allowEmptyString('category_priority');

        // $validator
        //     ->allowEmptyString('rec_state');

        // $validator
        //     ->dateTime('created_at')
        //     ->notEmptyDateTime('created_at');

        // $validator
        //     ->dateTime('updated_at')
        //     ->allowEmptyDateTime('updated_at');

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
        $rules->add($rules->existsIn('parent_id', 'ParentAddressCategories'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
