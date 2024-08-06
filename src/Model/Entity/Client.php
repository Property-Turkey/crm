<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Client extends Entity
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
        'category_id' => true,
        'source_id' => true,
        'pool_id' => true,
        'client_name' => true,
        'client_phone' => true,
        'client_mobile' => true,
        'client_email' => true,
        'client_address' => true,
        'client_nationality' => true,
        'client_configs' => true,
        'client_priority' => true,
        'client_finance' => true,
        'client_current_stage' => true,
        'client_tags' => true,
        'client_budget' => true,
        'client_commission' => true,
        'client_units' => true,
        'client_shared_roles' => true,
        'adrs_country' => true,
        'adrs_city' => true,
        'adrs_region' => true,
        'stat_created' => true,
        'rec_state' => true,
        'enquires' => true,
        'source' => true,
        'country' => true,
        'city' => true,
        'pool_category' => true,
        'region' => true,
        'user' => true,
        'reports' => true,
        'actions' => true,
        'offers' => true,
        'reminders' => true,
        'reservation' => true,
        'tag_category' => true,
        'category' => true,
        'book' => true,
        'user_sale' => true,
        'client_specs' => true,
    ];
}
