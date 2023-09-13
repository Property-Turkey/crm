<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaleSpecsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaleSpecsTable Test Case
 */
class SaleSpecsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaleSpecsTable
     */
    protected $SaleSpecs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SaleSpecs',
        'app.Sales',
        'app.Clients',
        'app.Reports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SaleSpecs') ? [] : ['className' => SaleSpecsTable::class];
        $this->SaleSpecs = $this->getTableLocator()->get('SaleSpecs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SaleSpecs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SaleSpecsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SaleSpecsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
