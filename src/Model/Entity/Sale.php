<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $source_id
 * @property int|null $category_id
 * @property int|null $pool_id
 * @property int|null $sale_priority
 * @property int $sale_current_stage
 * @property string|null $sale_tags
 * @property int|null $sale_budget
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\ClientSpec[] $client_specs
 * @property \App\Model\Entity\SaleSpec[] $sale_specs
 * @property \App\Model\Entity\Category $type
 * @property \App\Model\Entity\Category $source
 * @property \App\Model\Entity\Category $pool
 * @property \App\Model\Entity\Report[] $reports
 */
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
        'source_id' => true,
        'category_id' => true,
        'pool_id' => true,
        'sale_priority' => true,
        'sale_current_stage' => true,
        'sale_tags' => true,
        'sale_budget' => true,
        'stat_created' => true,
        'rec_state' => true,
        'client' => true,
        'client_specs' => true,
        'sale_specs' => true,
        'type' => true,
        'source' => true,
        'pool' => true,
        'reports' => true,
    ];
}
