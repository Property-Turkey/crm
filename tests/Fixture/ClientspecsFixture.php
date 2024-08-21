<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientSpecsFixture
 */
class ClientSpecsFixture extends TestFixture
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
                'clientspec_propertytype' => 'Lorem ipsum dolor sit amet',
                'clientspec_currency' => 1,
                'clientspec_buyerpersona' => 1,
                'clientspec_socialstyle' => 1,
                'clientspec_beds' => 'Lorem ipsum dolor sit amet',
                'clientspec_loction_target' => 'Lorem ipsum dolor sit amet',
                'clientspec_target_country' => 'Lorem ipsum dolor sit amet',
                'clientspec_target_city' => 'Lorem ipsum dolor sit amet',
                'clientspec_target_region' => 'Lorem ipsum dolor sit amet',
                'clientspec_isowner' => 1,
                'clientspec_isready' => 1,
                'clientspec_saved' => 1,
                'clientspec_configs' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
