<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ClientSpecsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('client_specs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
        ]);
        
        $this->belongsTo('Currency', [
            'foreignKey' => 'clientspec_currency',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Persona', [
            'foreignKey' => 'clientspec_buyerpersona',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Style', [
            'foreignKey' => 'clientspec_socialstyle',
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
        $validator
            ->integer('client_id')
            ->notEmptyString('client_id');

        $validator
            ->scalar('clientspec_propertytype')
            ->maxLength('clientspec_propertytype', 255)
            ->allowEmptyString('clientspec_propertytype');

        $validator
            ->integer('clientspec_currency')
            ->allowEmptyString('clientspec_currency');

        $validator
            ->integer('clientspec_buyerpersona')
            ->allowEmptyString('clientspec_buyerpersona');

        $validator
            ->integer('clientspec_socialstyle')
            ->allowEmptyString('clientspec_socialstyle');

        $validator
            ->scalar('clientspec_beds')
            ->maxLength('clientspec_beds', 255)
            ->allowEmptyString('clientspec_beds');

        $validator
            ->scalar('clientspec_loction_target')
            ->maxLength('clientspec_loction_target', 255)
            ->allowEmptyString('clientspec_loction_target');

        $validator
            ->notEmptyString('clientspec_isowner');

        $validator
            ->notEmptyString('clientspec_isready');

        $validator
            ->allowEmptyString('clientspec_saved');

        $validator
            ->scalar('clientspec_configs')
            ->allowEmptyString('clientspec_configs');

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
