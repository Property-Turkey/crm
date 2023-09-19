<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitiesFixture
 */
class CitiesFixture extends TestFixture
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
                'language_id' => 1,
                'country_id' => 1,
                'city_name' => 'Lorem ipsum dolor sit amet',
                'city_slug' => 'Lorem ipsum dolor sit amet',
                'city_configs' => 'Lorem ipsum dolor sit amet',
                'rec_state' => 1,
                'created_at' => 1694770177,
                'updated_at' => 1694770177,
            ],
        ];
        parent::init();
    }
}
