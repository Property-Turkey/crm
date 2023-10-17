<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserSaleFixture
 */
class UserSaleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_sale';
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
                'user_id' => 1,
                'sale_id' => 1,
                'stat_created' => '2023-10-11 09:58:20',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
