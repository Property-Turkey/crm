<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientSpecsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientSpecsTable Test Case
 */
class ClientSpecsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientSpecsTable
     */
    protected $ClientSpecs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ClientSpecs',
        'app.Clients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClientSpecs') ? [] : ['className' => ClientSpecsTable::class];
        $this->ClientSpecs = $this->getTableLocator()->get('ClientSpecs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ClientSpecs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClientSpecsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClientSpecsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
