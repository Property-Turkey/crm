<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActionsFixture
 */
class ActionsFixture extends TestFixture
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
                'user_id' => 1,
                'sale_id' => 1,
                'action_type' => 1,
                'stat_created' => '2023-10-24 10:13:44',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
