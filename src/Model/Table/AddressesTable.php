<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class AddressesTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $isLocal = Configure::read('isLocal');
        $this->setTable($isLocal ? 'ptpms.addresses' :  'ptdev_pms.addresses');

        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentAddresses', [
            'className' => 'Addresses',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildAddresses', [
            'className' => 'Addresses',
            'foreignKey' => 'parent_id',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('parent_id')
            ->allowEmptyString('parent_id');

        $validator
            ->scalar('adrs_name')
            ->maxLength('adrs_name', 255)
            ->allowEmptyString('adrs_name');

        $validator
            ->scalar('adrs_slug')
            ->maxLength('adrs_slug', 255)
            ->allowEmptyString('adrs_slug');

        $validator
            ->scalar('adrs_type')
            ->maxLength('adrs_type', 255)
            ->allowEmptyString('adrs_type');

        return $validator;
    }
    public static function defaultConnectionName(): string
    {
        return 'Ptpms';
    }
    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('parent_id', 'ParentAddresses'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
