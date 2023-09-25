<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AddressCategory Entity
 *
 * @property int $id
 * @property int $language_id
 * @property int|null $parent_id
 * @property string|null $category_name
 * @property string|null $category_slug
 * @property string|null $category_configs
 * @property int|null $category_priority
 * @property int|null $rec_state
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\ParentAddressCategory $parent_address_category
 * @property \App\Model\Entity\ChildAddressCategory[] $child_address_categories
 */
class AddressCategory extends Entity
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
        'language_id' => true,
        'parent_id' => true,
        'category_name' => true,
        'category_slug' => true,
        'category_configs' => true,
        'category_priority' => true,
        'rec_state' => true,
        'created_at' => true,
        'updated_at' => true,
        'parent_address_category' => true,
        'child_address_categories' => true,
    ];
}
