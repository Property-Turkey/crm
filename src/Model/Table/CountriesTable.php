<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CountriesTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('countries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Cities', [
            'foreignKey' => 'country_id',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('langauge_id')
            ->notEmptyString('langauge_id');

        $validator
            ->scalar('country_name')
            ->maxLength('country_name', 100)
            ->notEmptyString('country_name');

        $validator
            ->scalar('country_configs')
            ->maxLength('country_configs', 255)
            ->allowEmptyString('country_configs');

        $validator
            ->notEmptyString('rec_state');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }
}
