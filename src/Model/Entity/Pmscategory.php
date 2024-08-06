<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $slug
 * @property int $language_id
 * @property int $parent_id
 * @property string $category_name
 * @property string|null $category_configs
 * @property int $category_priority
 * @property \Cake\I18n\FrozenTime|null $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Category $parent_category
 * @property \App\Model\Entity\Category[] $child_categories
 */
class Pmscategory extends Entity
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
        'slug' => true,
        'language_id' => true,
        'parent_id' => true,
        'category_name' => true,
        'category_configs' => true,
        'category_priority' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'rec_state' => true,
        'parent_category' => true,
        'child_categories' => true,
    ];
}
