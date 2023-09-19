<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CountriesFixture
 */
class CountriesFixture extends TestFixture
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
                'langauge_id' => 1,
                'country_name' => 'Lorem ipsum dolor sit amet',
                'country_configs' => 'Lorem ipsum dolor sit amet',
                'rec_state' => 1,
                'created_at' => 1694770935,
                'updated_at' => 1694770935,
            ],
        ];
        parent::init();
    }
}
