<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationsFixture
 */
class ReservationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'client_id' => 1,
                'property_id' => 1,
                'project_id' => 1,
                'type_id' => 1,
                'source_id' => 1,
                'developer_id' => 1,
                'category_id' => 1,
                'sellertype_id' => 1,
                'seller_id' => 1,
                'reservation_amount' => 1,
                'reservation_price' => 1,
                'reservation_currency' => 1,
                'reservation_usdprice' => 1,
                'reservation_paytype' => 1,
                'reservation_downpayment_date' => '2023-12-11 10:09:09',
                'reservation_downpayment' => 1,
                'reservation_isinvoice_sent' => 1,
                'reservation_invoice_date' => '2023-12-11 10:09:09',
                'reservation_comission' => 1,
                'reservation_usdcomission' => 1,
                'reservation_details' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2023-12-11 10:09:09',
                'stat_updated' => '2023-12-11 10:09:09',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
