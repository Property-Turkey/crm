<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property int|null $source_id
 * @property string $client_name
 * @property string|null $client_phone
 * @property string|null $client_mobile
 * @property string|null $client_email
 * @property string|null $client_address
 * @property string|null $client_nationality
 * @property string|null $client_configs
 * @property int|null $adrs_country
 * @property int|null $adrs_city
 * @property int|null $adrs_region
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Category $source
 * @property \App\Model\Entity\Category $country
 * @property \App\Model\Entity\Category $city
 * @property \App\Model\Entity\Category $region
 * @property \App\Model\Entity\Report[] $reports
 */
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
        'source_id' => true,
        'client_name' => true,
        'client_phone' => true,
        'client_mobile' => true,
        'client_email' => true,
        'client_address' => true,
        'client_nationality' => true,
        'client_configs' => true,
        'adrs_country' => true,
        'adrs_city' => true,
        'adrs_region' => true,
        'stat_created' => true,
        'rec_state' => true,
        'source' => true,
        'country' => true,
        'city' => true,
        'region' => true,
        'reports' => true,
    ];
}
