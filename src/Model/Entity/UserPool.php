<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserPool Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $pool_id
 * @property \Cake\I18n\FrozenTime|null $stat_created
 * @property int|null $rec_state
 *
 * @property \App\Model\Entity\User $user
 */
class UserPool extends Entity
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
        'user_id' => true,
        'pool_id' => true,
        'stat_created' => true,
        'rec_state' => true,
        'user' => true,
    ];
}
