<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSale Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $sale_id
 * @property \Cake\I18n\FrozenTime|null $stat_created
 * @property int $rec_state
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Sale $sale
 */
class UserSale extends Entity
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
        'sale_id' => true,
        'stat_created' => true,
        'rec_state' => true,
        'user' => true,
        'sale' => true,
    ];
}
