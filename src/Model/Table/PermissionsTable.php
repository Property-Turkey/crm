<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class PermissionsTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('permissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Log');

    }


    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('permission_role')
            ->maxLength('permission_role', 255)
            ->notEmptyString('permission_role');

        $validator
            ->scalar('permission_module')
            ->maxLength('permission_module', 255)
            ->requirePresence('permission_module', 'create')
            ->notEmptyString('permission_module');

        $validator
            ->notEmptyString('permission_c');

        $validator
            ->notEmptyString('permission_r');

        $validator
            ->notEmptyString('permission_u');

        $validator
            ->notEmptyString('permission_d');

        $validator
            ->notEmptyString('permission_a');

        return $validator;
    }
}
