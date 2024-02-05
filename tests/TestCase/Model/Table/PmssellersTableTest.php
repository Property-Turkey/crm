<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SellersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PmssellersTable Test Case
 */
class SellersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SellersTable
     */
    protected $Sellers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Sellers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sellers') ? [] : ['className' => SellersTable::class];
        $this->Sellers = $this->getTableLocator()->get('Sellers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sellers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PmssellersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
