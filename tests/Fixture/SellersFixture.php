<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SellersFixture
 */
class SellersFixture extends TestFixture
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
                'seller_name' => 'Lorem ipsum dolor sit amet',
                'seller_type' => 1,
                'seller_nationality' => 1,
                'seller_photos' => 'Lorem ipsum dolor sit amet',
                'seller_configs' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2023-12-11 14:55:16',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
