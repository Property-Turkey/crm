<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
class PmscategoriesTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $isLocal = Configure::read('isLocal');
        $this->setTable($isLocal ? 'ptpms.categories' :  'ptdev_pms.categories');

        
        $this->setDisplayField('category_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentCategories', [
            'className' => 'Categories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildCategories', [
            'className' => 'Categories',
            'foreignKey' => 'parent_id',
        ]);
       
        $this->hasMany('Reservations', [
            'foreignKey' => 'category_id',
        ]);
    }

 
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->integer('language_id')
            ->notEmptyString('language_id');

        $validator
            ->integer('parent_id')
            ->notEmptyString('parent_id');

        $validator
            ->scalar('category_name')
            ->maxLength('category_name', 255)
            ->requirePresence('category_name', 'create')
            ->notEmptyString('category_name');

        $validator
            ->scalar('category_configs')
            ->maxLength('category_configs', 255)
            ->allowEmptyString('category_configs');

        $validator
            ->notEmptyString('category_priority');

        $validator
            ->dateTime('stat_created')
            ->allowEmptyDateTime('stat_created');

        $validator
            ->dateTime('stat_updated')
            ->allowEmptyDateTime('stat_updated');

        $validator
            ->notEmptyString('rec_state');

        return $validator;
    }

    public static function defaultConnectionName(): string
    {
        return 'Ptpms';
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('parent_id', 'ParentCategories'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
