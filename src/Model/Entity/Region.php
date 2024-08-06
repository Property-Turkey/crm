<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Region Entity
 *
 * @property int $id
 * @property int $language_id
 * @property int $city_id
 * @property string $region_name
 * @property string $region_slug
 * @property string|null $region_configs
 * @property int $rec_state
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\City $city
 */
class Region extends Entity
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
        'city_id' => true,
        'region_name' => true,
        'region_slug' => true,
        'region_configs' => true,
        'rec_state' => true,
        'created_at' => true,
        'updated_at' => true,
        'city' => true,
    ];
}
