<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientsFixture
 */
class ClientsFixture extends TestFixture
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
                'source_id' => 1,
                'client_name' => 'Lorem ipsum dolor sit amet',
                'client_phone' => 'Lorem ipsum dolor sit amet',
                'client_mobile' => 'Lorem ipsum dolor sit amet',
                'client_email' => 'Lorem ipsum dolor sit amet',
                'client_address' => 'Lorem ipsum dolor sit amet',
                'client_nationality' => 'Lorem ipsum dolor sit amet',
                'client_configs' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'adrs_country' => 1,
                'adrs_city' => 1,
                'adrs_region' => 1,
                'stat_created' => '2023-10-10 14:06:06',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
