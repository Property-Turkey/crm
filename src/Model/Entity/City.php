<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property int $language_id
 * @property int $country_id
 * @property string $city_name
 * @property string|null $city_slug
 * @property string|null $city_configs
 * @property int $rec_state
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Region[] $regions
 */
class City extends Entity
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
        'language_id' => true,
        'country_id' => true,
        'city_name' => true,
        'city_slug' => true,
        'city_configs' => true,
        'rec_state' => true,
        'created_at' => true,
        'updated_at' => true,
        'regions' => true,
    ];
}
