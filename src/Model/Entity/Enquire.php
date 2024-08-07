<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enquire Entity
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $source_id
 * @property int|null $property_id
 * @property string|null $enquiry_name
 * @property string $enquiry_email
 * @property int|null $enquiry_phone
 * @property int|null $enquiry_country
 * @property string|null $enquiry_message
 * @property string|null $enquiry_ipaddress
 * @property string|null $enquiry_referral
 * @property string|null $enquiry_host
 * @property string|null $seo_keywords
 * @property \Cake\I18n\FrozenTime|null $stat_created
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Category $source
 * @property \App\Model\Entity\Address $country
 */
class Enquire extends Entity
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
        'source_id' => true,
        'property_id' => true,
        'enquiry_name' => true,
        'enquiry_email' => true,
        'enquiry_phone' => true,
        'enquiry_country' => true,
        'enquiry_message' => true,
        'enquiry_ipaddress' => true,
        'enquiry_referral' => true,
        'enquiry_host' => true,
        'seo_keywords' => true,
        'stat_created' => true,
        'client' => true,
        'source' => true,
        'country' => true,
    ];
}
