<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reminder Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $client_id
 * @property \Cake\I18n\FrozenTime $reminder_nextcall
 * @property string|null $reminder_desc
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Client $client
 */
class Reminder extends Entity
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
        'client_id' => true,
        'reminder_nextcall' => true,
        'reminder_desc' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'user' => true,
        'client' => true,
    ];
}
