<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleSpec Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property string|null $salespec_current_location
 * @property int|null $salespec_propertytype
 * @property int|null $salespec_beds
 * @property string|null $salespec_loction_target
 * @property int $salespec_isowner
 * @property int $salespec_isready
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Report[] $reports
 */
class SaleSpec extends Entity
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
        'sale_id' => true,
        'salespec_currency' => true,
        'salespec_finance' => true,
        'salespec_buyerpersona' => true,
        'salespec_socialstyle' => true,
        'salespec_current_location' => true,
        'salespec_propertytype' => true,
        'salespec_beds' => true,
        'salespec_loction_target' => true,
        'salespec_isowner' => true,
        'salespec_isready' => true,
        'sale' => true,
        'client' => true,
        'reports' => true,
    ];
}
