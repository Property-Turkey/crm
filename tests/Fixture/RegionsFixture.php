<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegionsFixture
 */
class RegionsFixture extends TestFixture
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
                'city_id' => 1,
                'region_name' => 'Lorem ipsum dolor sit amet',
                'region_slug' => 'Lorem ipsum dolor sit amet',
                'region_configs' => 'Lorem ipsum dolor sit amet',
                'rec_state' => 1,
                'created_at' => 1694771038,
                'updated_at' => 1694771038,
            ],
        ];
        parent::init();
    }
}
