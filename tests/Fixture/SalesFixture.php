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
                'sale_finance' => 1,
                'sale_current_stage' => 1,
                'sale_tags' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'sale_budget' => 1,
                'sale_commission' => 1,
                'sale_units' => 1,
                'sale_shared_roles' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2023-09-22 13:22:01',
                'stat_updated' => 1695388921,
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
