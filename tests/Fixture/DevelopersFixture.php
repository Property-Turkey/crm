<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DevelopersFixture
 */
class DevelopersFixture extends TestFixture
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
                'dev_name' => 'Lorem ipsum dolor sit amet',
                'dev_configs' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2023-12-11 15:14:32',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
