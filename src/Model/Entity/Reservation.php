<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $property_id
 * @property int|null $project_id
 * @property int|null $type_id
 * @property int|null $source_id
 * @property int|null $developer_id
 * @property int|null $category_id
 * @property int|null $sellertype_id
 * @property int|null $seller_id
 * @property int $reservation_amount
 * @property int|null $reservation_price
 * @property int|null $reservation_currency
 * @property int|null $reservation_usdprice
 * @property int|null $reservation_paytype
 * @property \Cake\I18n\FrozenTime|null $reservation_downpayment_date
 * @property int|null $reservation_downpayment
 * @property int $reservation_isinvoice_sent
 * @property \Cake\I18n\FrozenTime|null $reservation_invoice_date
 * @property int $reservation_comission
 * @property int $reservation_usdcomission
 * @property string|null $reservation_details
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property \Cake\I18n\FrozenTime|null $stat_updated
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Category $payment
 * @property \App\Model\Entity\Category $currency
 */
class Reservation extends Entity
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
        'project_id' => true,
        'type_id' => true,
        'source_id' => true,
        'developer_id' => true,
        'category_id' => true,
        'sellertype_id' => true,
        'seller_id' => true,
        'reservation_amount' => true,
        'reservation_price' => true,
        'reservation_currency' => true,
        'reservation_usdprice' => true,
        'reservation_paytype' => true,
        'reservation_downpayment_date' => true,
        'reservation_downpayment' => true,
        'reservation_isinvoice_sent' => true,
        'reservation_invoice_date' => true,
        'reservation_comission' => true,
        'reservation_usdcomission' => true,
        'reservation_details' => true,
        'stat_created' => true,
        'stat_updated' => true,
        'rec_state' => true,
        'client' => true,
        'payment' => true,
        'currency' => true,
    ];
}
