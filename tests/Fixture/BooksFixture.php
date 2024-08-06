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
                'client_id' => 1,
                'book_arrivedate' => '2023-11-13 11:51:55',
                'book_current_stay' => 'Lorem ipsum dolor sit amet',
                'book_meetperiod' => 1,
                'book_meetdate' => '2023-11-13 11:51:55',
                'book_meetplace' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2023-11-13 11:51:55',
                'rec_state' => 1,
            ],
        ];
        parent::init();
    }
}
