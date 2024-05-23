<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnquiresFixture
 */
class EnquiresFixture extends TestFixture
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
                'property_id' => 1,
                'enquiry_clname' => 'Lorem ipsum dolor sit amet',
                'enquiry_clemail' => 'Lorem ipsum dolor sit amet',
                'enquiry_clphone' => 1,
                'enquiry_clcountry' => 1,
                'enquiry_source' => 1,
                'enquiry_message' => 'Lorem ipsum dolor sit amet',
                'enquiry_ipaddress' => 'Lorem ipsum dolor sit amet',
                'enquiry_lastpage' => 'Lorem ipsum dolor sit amet',
                'seo_keywords' => 'Lorem ipsum dolor sit amet',
                'seo_host' => 1,
                'isindex' => 1,
                'stat_created' => '2023-10-30 08:08:22',
                'stat_updated' => '2023-10-30 08:08:22',
            ],
        ];
        parent::init();
    }
}
