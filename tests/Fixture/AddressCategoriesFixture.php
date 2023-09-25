<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressCategoriesFixture
 */
class AddressCategoriesFixture extends TestFixture
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
                'parent_id' => 1,
                'category_name' => 'Lorem ipsum dolor sit amet',
                'category_slug' => 'Lorem ipsum dolor sit amet',
                'category_configs' => 'Lorem ipsum dolor sit amet',
                'category_priority' => 1,
                'rec_state' => 1,
                'created_at' => 1695219728,
                'updated_at' => 1695219728,
            ],
        ];
        parent::init();
    }
}
