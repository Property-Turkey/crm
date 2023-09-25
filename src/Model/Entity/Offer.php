<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offer Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property int $property_id
 * @property string|null $offer_desc
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 *
 * @property \App\Model\Entity\Sale $sale
 */
class Offer extends Entity
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
        'sale_id' => true,
        'property_id' => true,
        'offer_desc' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'sale' => true,
    ];
}
