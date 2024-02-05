<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pmsseller Entity
 *
 * @property int $id
 * @property string $seller_name
 * @property int $seller_type
 * @property int|null $seller_nationality
 * @property string|null $seller_photos
 * @property string|null $seller_configs
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property int $rec_state
 */
class Seller extends Entity
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
        'seller_name' => true,
        'seller_type' => true,
        'seller_nationality' => true,
        'seller_photos' => true,
        'seller_configs' => true,
        'stat_created' => true,
        'rec_state' => true,
    ];
}
