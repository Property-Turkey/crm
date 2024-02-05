<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalespecsFixture
 */
class SalespecsFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'sale_specs';
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
                'sale_id' => 1,
                'salespec_propertytype' => 'Lorem ipsum dolor sit amet',
                'salespec_currency' => 1,
                'salespec_buyerpersona' => 1,
                'salespec_socialstyle' => 1,
                'salespec_beds' => 'Lorem ipsum dolor sit amet',
                'salespec_loction_target' => 'Lorem ipsum dolor sit amet',
                'salespec_isowner' => 1,
                'salespec_isready' => 1,
                'salespec_saved' => 1,
                'salespec_configs' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
