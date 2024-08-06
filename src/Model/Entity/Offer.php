<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offer Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $property_id
 * @property string|null $offer_desc
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 * @property int|null $isinterested
 *
 * @property \App\Model\Entity\Client $client
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
        'client_id' => true,
        'property_id' => true,
        'offer_desc' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'isinterested' => true,
        'client' => true,
    ];
}
