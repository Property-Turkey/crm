<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserPoolFixture
 */
class UserPoolFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_pool';
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
                'pool_id' => 1,
                'stat_created' => '2024-02-16 14:05:44',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
