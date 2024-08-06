<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClientSpec Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $clientspec_propertytype
 * @property int|null $clientspec_currency
 * @property int|null $clientspec_buyerpersona
 * @property int|null $clientspec_socialstyle
 * @property string|null $clientspec_beds
 * @property string|null $clientspec_loction_target
 * @property int $clientspec_isowner
 * @property int $clientspec_isready
 * @property int|null $clientspec_saved
 * @property string|null $clientspec_configs
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Category $currency
 * @property \App\Model\Entity\Category $persona
 * @property \App\Model\Entity\Category $style
 */
class ClientSpec extends Entity
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
        'clientspec_propertytype' => true,
        'clientspec_currency' => true,
        'clientspec_buyerpersona' => true,
        'clientspec_socialstyle' => true,
        'clientspec_beds' => true,
        'clientspec_loction_target' => true,
        'clientspec_isowner' => true,
        'clientspec_isready' => true,
        'clientspec_saved' => true,
        'clientspec_configs' => true,
        'client' => true,
        'currency' => true,
        'persona' => true,
        'style' => true,
    ];
}
