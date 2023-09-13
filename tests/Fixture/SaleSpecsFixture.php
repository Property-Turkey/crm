<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SaleSpecsFixture
 */
class SaleSpecsFixture extends TestFixture
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
                'sale_id' => 1,
                'salespec_current_location' => 'Lorem ipsum dolor sit amet',
                'salespec_propertytype' => 1,
                'salespec_beds' => 1,
                'salespec_loction_target' => 'Lorem ipsum dolor sit amet',
                'salespec_isowner' => 1,
                'salespec_isready' => 1,
            ],
        ];
        parent::init();
    }
}
