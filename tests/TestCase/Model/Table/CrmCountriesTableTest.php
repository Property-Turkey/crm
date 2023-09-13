<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrmCountriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrmCountriesTable Test Case
 */
class CrmCountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CrmCountriesTable
     */
    protected $CrmCountries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CrmCountries',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CrmCountries') ? [] : ['className' => CrmCountriesTable::class];
        $this->CrmCountries = $this->getTableLocator()->get('CrmCountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CrmCountries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CrmCountriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
