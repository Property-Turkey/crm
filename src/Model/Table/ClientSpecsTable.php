<?php
declare(strict_types=1);

namespace App\Model\Table;

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

        // $this->belongsTo('Clients', [
        //     'foreignKey' => 'client_id',
        //     'joinType' => 'INNER',
        // ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Sources', [
            'foreignKey' => 'source_id',
            'className' => 'Categories',
        ]);
        
        $this->hasMany('Reports', [
            'foreignKey' => 'tar_id',
            'joinType' => 'INNER',
			'dependent' => true,
			'cascadeCallbacks' => true
        ])->setConditions(['Reports.tar_tbl'=>'Clients']);

        // // Veritabanı tablosunu al
        // $data = $this->find('all')->toArray();
        // // Veriyi ekrana yazdır
        // debug($data);
    }
   
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->notEmptyString('language_id');

        // $validator
        //     ->integer('client_id')
        //     ->notEmptyString('client_id');

        // $validator
        //     ->scalar('spec_name')
        //     ->maxLength('spec_name', 255)
        //     ->requirePresence('spec_name', 'create')
        //     ->notEmptyString('spec_name');

        // $validator
        //     ->scalar('spec_value')
        //     ->maxLength('spec_value', 255)
        //     ->requirePresence('spec_value', 'create')
        //     ->notEmptyString('spec_value');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // $rules->add($rules->existsIn('client_id', 'Clients'), ['errorField' => 'client_id']);

        return $rules;
    }
}


// $this->hasMany('Docs', [
//     'foreignKey' => 'tar_id',
//     'joinType' => 'INNER',
//     'dependent' => true,
//     'cascadeCallbacks' => true
// ])->setConditions(['tar_tbl'=>2]);