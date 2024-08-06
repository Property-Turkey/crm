<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $adrs_name
 * @property string|null $adrs_slug
 * @property string|null $adrs_type
 *
 * @property \App\Model\Entity\ParentAddress $parent_address
 * @property \App\Model\Entity\ChildAddress[] $child_addresses
 */
class Address extends Entity
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
        'parent_id' => true,
        'adrs_name' => true,
        'adrs_slug' => true,
        'adrs_type' => true,
        'parent_address' => true,
        'child_addresses' => true,
    ];
}
