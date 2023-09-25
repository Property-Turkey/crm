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
                'sale_id' => 1,
                'reservation_amount' => 1,
                'reservation_price' => 1,
                'reservation_currency' => 1,
                'reservation_usdprice' => 1,
                'reservation_paytype' => 1,
                'reservation_downpayment_date' => '2023-09-21 14:35:44',
                'reservation_downpayment' => 1,
                'reservation_isinvoice_sent' => 1,
                'reservation_invoice_date' => '2023-09-21 14:35:44',
                'reservation_comission' => 1,
                'reservation_usdcomission' => 1,
                'stat_created' => '2023-09-21 14:35:44',
                'stat_updated' => '2023-09-21 14:35:44',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
