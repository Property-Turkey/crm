<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserClientFixture
 */
class UserClientFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_client';
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
                'target_id' => 1,
                'target_type' => 1,
                'stat_created' => '2024-02-15 12:57:04',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
