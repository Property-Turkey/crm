<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesFixture
 */
class SalesFixture extends TestFixture
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
                'source_id' => 1,
                'category_id' => 1,
                'pool_id' => 1,
                'sale_priority' => 1,
                'sale_current_stage' => 1,
                'sale_tags' => 'Lorem ipsum dolor sit amet',
                'sale_budget' => 1,
                'stat_created' => '2023-08-15 13:15:51',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
