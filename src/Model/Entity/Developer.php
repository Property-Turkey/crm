<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Developer Entity
 *
 * @property int $id
 * @property string $dev_name
 * @property string|null $dev_configs
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class Developer extends Entity
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
        'dev_name' => true,
        'dev_configs' => true,
        'stat_created' => true,
        'rec_state' => true,
        'reservations' => true,
    ];
}
