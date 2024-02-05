<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string|null $slug
 * @property int $language_id
 * @property int $category_id
 * @property int|null $user_id
 * @property int|null $developer_id
 * @property int|null $project_id
 * @property int|null $seller_id
 * @property string|null $features_ids
 * @property string|null $tags_ids
 * @property string $property_title
 * @property string|null $property_desc
 * @property string|null $property_photos
 * @property string|null $property_videos
 * @property int|null $property_price
 * @property int|null $property_oldprice
 * @property int $property_currency
 * @property string|null $property_loc
 * @property string|null $property_ref
 * @property string|null $property_usp
 * @property int|null $param_issold
 * @property int $property_isfeatured
 * @property int $property_isindexed
 * @property string|null $adrs_country
 * @property string|null $adrs_city
 * @property string|null $adrs_region
 * @property string|null $adrs_district
 * @property string|null $adrs_street
 * @property string|null $adrs_block
 * @property string|null $adrs_no
 * @property int|null $param_netspace
 * @property int|null $param_grossspace
 * @property int|null $param_rooms
 * @property int|null $param_bedrooms
 * @property int|null $param_buildage
 * @property int|null $param_floors
 * @property int|null $param_floor
 * @property int|null $param_heat
 * @property int|null $param_bathrooms
 * @property int|null $param_balconies
 * @property int|null $param_isfurnitured
 * @property int|null $param_isresale
 * @property int|null $param_iscitizenship
 * @property int|null $param_isresidence
 * @property int|null $param_iscommission_included
 * @property int $param_ispublished
 * @property int|null $param_titledeed
 * @property int|null $param_usestatus
 * @property int|null $param_monthlytax
 * @property int|null $param_payment
 * @property int|null $param_ownership
 * @property int|null $param_ownertype
 * @property int|null $param_deposit
 * @property int|null $param_delivertype
 * @property \Cake\I18n\FrozenDate|null $param_deliverdate
 * @property string|null $seo_title
 * @property string|null $seo_keywords
 * @property string|null $seo_desc
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 * @property int $stat_views
 * @property int $stat_shares
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Enquire[] $enquires
 * @property \App\Model\Entity\Offer[] $offers
 */
class Property extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'slug' => true,
        'language_id' => true,
        'category_id' => true,
        'user_id' => true,
        'developer_id' => true,
        'project_id' => true,
        'seller_id' => true,
        'features_ids' => true,
        'tags_ids' => true,
        'property_title' => true,
        'property_desc' => true,
        'property_photos' => true,
        'property_videos' => true,
        'property_price' => true,
        'property_oldprice' => true,
        'property_currency' => true,
        'property_loc' => true,
        'property_ref' => true,
        'property_usp' => true,
        'param_issold' => true,
        'property_isfeatured' => true,
        'property_isindexed' => true,
        'adrs_country' => true,
        'adrs_city' => true,
        'adrs_region' => true,
        'adrs_district' => true,
        'adrs_street' => true,
        'adrs_block' => true,
        'adrs_no' => true,
        'param_netspace' => true,
        'param_grossspace' => true,
        'param_rooms' => true,
        'param_bedrooms' => true,
        'param_buildage' => true,
        'param_floors' => true,
        'param_floor' => true,
        'param_heat' => true,
        'param_bathrooms' => true,
        'param_balconies' => true,
        'param_isfurnitured' => true,
        'param_isresale' => true,
        'param_iscitizenship' => true,
        'param_isresidence' => true,
        'param_iscommission_included' => true,
        'param_ispublished' => true,
        'param_titledeed' => true,
        'param_usestatus' => true,
        'param_monthlytax' => true,
        'param_payment' => true,
        'param_ownership' => true,
        'param_ownertype' => true,
        'param_deposit' => true,
        'param_delivertype' => true,
        'param_deliverdate' => true,
        'seo_title' => true,
        'seo_keywords' => true,
        'seo_desc' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'stat_views' => true,
        'stat_shares' => true,
        'rec_state' => true,
        'category' => true,
        'user' => true,
        'enquires' => true,
        'offers' => true,
    ];
}
