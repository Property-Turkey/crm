<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enquire Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $property_id
 * @property string|null $enquiry_clname
 * @property string $enquiry_clemail
 * @property int|null $enquiry_clphone
 * @property int|null $enquiry_clcountry
 * @property int|null $enquiry_clsource
 * @property string $enquiry_message
 * @property string|null $enquiry_ipaddress
 * @property string|null $enquiry_lastpage
 * @property string $seo_keywords
 * @property int $seo_host
 * @property int $isindex
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 *
 * @property \App\Model\Entity\Client $client
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
        'property_id' => true,
        'enquiry_clname' => true,
        'enquiry_clemail' => true,
        'enquiry_clphone' => true,
        'enquiry_clcountry' => true,
        'enquiry_clsource' => true,
        'enquiry_message' => true,
        'enquiry_ipaddress' => true,
        'enquiry_lastpage' => true,
        'seo_keywords' => true,
        'seo_host' => true,
        'isindex' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'client' => true,
    ];
}
