<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressesFixture
 */
class AddressesFixture extends TestFixture
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
                'parent_id' => 1,
                'adrs_name' => 'Lorem ipsum dolor sit amet',
                'adrs_slug' => 'Lorem ipsum dolor sit amet',
                'adrs_type' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
