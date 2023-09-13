<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksFixture
 */
class BooksFixture extends TestFixture
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
                'book_arrivedate' => '2023-08-15 13:14:24',
                'book_current_stay' => 'Lorem ipsum dolor sit amet',
                'book_meetdate' => '2023-08-15 13:14:24',
                'book_meetperiod' => 1,
                'book_meetplace' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2023-08-15 13:14:24',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
