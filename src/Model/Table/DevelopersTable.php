<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;


class DevelopersTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $isLocal = Configure::read('isLocal');
        $this->setTable($isLocal ? 'ptpms.developers' :  'ptdev_pms.developers');

        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Reservations', [
            'foreignKey' => 'developer_id',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->scalar('dev_name')
        //     ->maxLength('dev_name', 255)
        //     ->requirePresence('dev_name', 'create')
        //     ->notEmptyString('dev_name');

        // $validator
        //     ->scalar('dev_configs')
        //     ->maxLength('dev_configs', 255)
        //     ->allowEmptyString('dev_configs');

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
