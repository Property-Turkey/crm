<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Sale extends Entity
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
        'category_id' => true,
        'client_priority' => true,
        'sale_finance' => true,
        'sale_current_stage' => true,
        'sale_tags' => true,
        'sale_budget' => true,
        'sale_commission' => true,
        'sale_units' => true,
        'sale_shared_roles' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'rec_state' => true,
        'client' => true,
        'actions' => true,
        'offers' => true,
        'reminders' => true,
        'reservations' => true,
        'enquires' => true,
        'tag' => true,
        'category' => true,
        'status' => true,
        'type' => true,
        'reports' => true,
        'book' => true,
        'user' => true,
        'user_sale' => true,
        'sale_specs' => true,
    ];
}
