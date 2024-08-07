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
                'source_id' => 1,
                'property_id' => 1,
                'enquiry_name' => 'Lorem ipsum dolor sit amet',
                'enquiry_email' => 'Lorem ipsum dolor sit amet',
                'enquiry_phone' => 1,
                'enquiry_country' => 1,
                'enquiry_message' => 'Lorem ipsum dolor sit amet',
                'enquiry_ipaddress' => 'Lorem ipsum dolor sit amet',
                'enquiry_referral' => 'Lorem ipsum dolor sit amet',
                'enquiry_host' => 'Lorem ipsum dolor sit amet',
                'seo_keywords' => 'Lorem ipsum dolor sit amet',
                'stat_created' => '2024-08-07 12:59:49',
            ],
        ];
        parent::init();
    }
}
