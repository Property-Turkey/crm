<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class PmssellersTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $isLocal = Configure::read('isLocal');
        $this->setTable($isLocal ? 'ptpms.sellers' :  'ptdev_pms.sellers');

        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Reservations', [
            'foreignKey' => 'seller_id',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->scalar('seller_name')
        //     ->maxLength('seller_name', 255)
        //     ->requirePresence('seller_name', 'create')
        //     ->notEmptyString('seller_name');

        // $validator
        //     ->integer('seller_type')
        //     ->requirePresence('seller_type', 'create')
        //     ->notEmptyString('seller_type');

        // $validator
        //     ->integer('seller_nationality')
        //     ->allowEmptyString('seller_nationality');

        // $validator
        //     ->scalar('seller_photos')
        //     ->maxLength('seller_photos', 255)
        //     ->allowEmptyString('seller_photos');

        // $validator
        //     ->scalar('seller_configs')
        //     ->maxLength('seller_configs', 510)
        //     ->allowEmptyString('seller_configs');

        // $validator
        //     ->dateTime('stat_created')
        //     ->notEmptyDateTime('stat_created');

        // $validator
        //     ->notEmptyString('rec_state');

        return $validator;
    }

    public static function defaultConnectionName(): string
    {
        return 'Ptpms';
    }
    
}
