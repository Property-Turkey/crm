<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;


class PropertiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $isLocal = Configure::read('isLocal');
        $this->setTable($isLocal ? 'ptpms.properties' :  'ptdev_pms.properties');

        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        // $this->belongsTo('Categories', [
        //     'foreignKey' => 'category_id',
        //     'joinType' => 'INNER',
        // ]);
        // $this->belongsTo('Users', [
        //     'foreignKey' => 'user_id',
        // ]);
        // $this->hasMany('Enquires', [
        //     'foreignKey' => 'property_id',
        // ]);
        $this->hasMany('Offers', [
            'foreignKey' => 'property_id',
        ]);

        $this->hasMany('Reservations', [
            'foreignKey' => 'property_id',
        ]);
        
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->scalar('slug')
        //     ->maxLength('slug', 255)
        //     ->allowEmptyString('slug');

        // $validator
        //     ->integer('language_id')
        //     ->notEmptyString('language_id');

        // $validator
        //     ->integer('category_id')
        //     ->notEmptyString('category_id');

        // $validator
        //     ->integer('user_id')
        //     ->allowEmptyString('user_id');

        // $validator
        //     ->integer('developer_id')
        //     ->allowEmptyString('developer_id');

        // $validator
        //     ->integer('project_id')
        //     ->allowEmptyString('project_id');

        // $validator
        //     ->integer('seller_id')
        //     ->allowEmptyString('seller_id');

        // $validator
        //     ->scalar('features_ids')
        //     ->maxLength('features_ids', 255)
        //     ->allowEmptyString('features_ids');

        // $validator
        //     ->scalar('tags_ids')
        //     ->maxLength('tags_ids', 255)
        //     ->allowEmptyString('tags_ids');

        // $validator
        //     ->scalar('property_title')
        //     ->maxLength('property_title', 255)
        //     ->requirePresence('property_title', 'create')
        //     ->notEmptyString('property_title');

        // $validator
        //     ->scalar('property_desc')
        //     ->allowEmptyString('property_desc');

        // $validator
        //     ->scalar('property_photos')
        //     ->allowEmptyString('property_photos');

        // $validator
        //     ->scalar('property_videos')
        //     ->allowEmptyString('property_videos');

        // $validator
        //     ->integer('property_price')
        //     ->allowEmptyString('property_price');

        // $validator
        //     ->integer('property_oldprice')
        //     ->allowEmptyString('property_oldprice');

        // $validator
        //     ->notEmptyString('property_currency');

        // $validator
        //     ->scalar('property_loc')
        //     ->maxLength('property_loc', 255)
        //     ->allowEmptyString('property_loc');

        // $validator
        //     ->scalar('property_ref')
        //     ->maxLength('property_ref', 255)
        //     ->allowEmptyString('property_ref');

        // $validator
        //     ->scalar('property_usp')
        //     ->maxLength('property_usp', 255)
        //     ->allowEmptyString('property_usp');

        // $validator
        //     ->allowEmptyString('param_issold');

        // $validator
        //     ->notEmptyString('property_isfeatured');

        // $validator
        //     ->notEmptyString('property_isindexed');

        // $validator
        //     ->scalar('adrs_country')
        //     ->maxLength('adrs_country', 255)
        //     ->allowEmptyString('adrs_country');

        // $validator
        //     ->scalar('adrs_city')
        //     ->maxLength('adrs_city', 255)
        //     ->allowEmptyString('adrs_city');

        // $validator
        //     ->scalar('adrs_region')
        //     ->maxLength('adrs_region', 255)
        //     ->allowEmptyString('adrs_region');

        // $validator
        //     ->scalar('adrs_district')
        //     ->maxLength('adrs_district', 255)
        //     ->allowEmptyString('adrs_district');

        // $validator
        //     ->scalar('adrs_street')
        //     ->maxLength('adrs_street', 255)
        //     ->allowEmptyString('adrs_street');

        // $validator
        //     ->scalar('adrs_block')
        //     ->maxLength('adrs_block', 255)
        //     ->allowEmptyString('adrs_block');

        // $validator
        //     ->scalar('adrs_no')
        //     ->maxLength('adrs_no', 255)
        //     ->allowEmptyString('adrs_no');

        // $validator
        //     ->integer('param_netspace')
        //     ->allowEmptyString('param_netspace');

        // $validator
        //     ->integer('param_grossspace')
        //     ->allowEmptyString('param_grossspace');

        // $validator
        //     ->allowEmptyString('param_rooms');

        // $validator
        //     ->allowEmptyString('param_bedrooms');

        // $validator
        //     ->allowEmptyString('param_buildage');

        // $validator
        //     ->allowEmptyString('param_floors');

        // $validator
        //     ->allowEmptyString('param_floor');

        // $validator
        //     ->allowEmptyString('param_heat');

        // $validator
        //     ->allowEmptyString('param_bathrooms');

        // $validator
        //     ->allowEmptyString('param_balconies');

        // $validator
        //     ->allowEmptyString('param_isfurnitured');

        // $validator
        //     ->allowEmptyString('param_isresale');

        // $validator
        //     ->allowEmptyString('param_iscitizenship');

        // $validator
        //     ->allowEmptyString('param_isresidence');

        // $validator
        //     ->allowEmptyString('param_iscommission_included');

        // $validator
        //     ->notEmptyString('param_ispublished');

        // $validator
        //     ->integer('param_titledeed')
        //     ->allowEmptyString('param_titledeed');

        // $validator
        //     ->allowEmptyString('param_usestatus');

        // $validator
        //     ->integer('param_monthlytax')
        //     ->allowEmptyString('param_monthlytax');

        // $validator
        //     ->allowEmptyString('param_payment');

        // $validator
        //     ->allowEmptyString('param_ownership');

        // $validator
        //     ->allowEmptyString('param_ownertype');

        // $validator
        //     ->integer('param_deposit')
        //     ->allowEmptyString('param_deposit');

        // $validator
        //     ->allowEmptyString('param_delivertype');

        // $validator
        //     ->date('param_deliverdate')
        //     ->allowEmptyDate('param_deliverdate');

        // $validator
        //     ->scalar('seo_title')
        //     ->maxLength('seo_title', 255)
        //     ->allowEmptyString('seo_title');

        // $validator
        //     ->scalar('seo_keywords')
        //     ->maxLength('seo_keywords', 255)
        //     ->allowEmptyString('seo_keywords');

        // $validator
        //     ->scalar('seo_desc')
        //     ->maxLength('seo_desc', 255)
        //     ->allowEmptyString('seo_desc');

        // $validator
        //     ->dateTime('stat_created')
        //     ->requirePresence('stat_created', 'create')
        //     ->notEmptyDateTime('stat_created');

        // $validator
        //     ->dateTime('stat_updated')
        //     ->allowEmptyDateTime('stat_updated');

        // $validator
        //     ->integer('stat_views')
        //     ->notEmptyString('stat_views');

        // $validator
        //     ->integer('stat_shares')
        //     ->notEmptyString('stat_shares');

        // $validator
        //     ->notEmptyString('rec_state');

        return $validator;
    }

    public static function defaultConnectionName(): string
    {
        return 'Ptpms';
    }
    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
