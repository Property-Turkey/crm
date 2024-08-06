<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalespecsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalespecsTable Test Case
 */
class SalespecsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalespecsTable
     */
    protected $Salespecs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Salespecs',
        'app.Sales',
        'app.Currency',
        'app.Persona',
        'app.Style',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Salespecs') ? [] : ['className' => SalespecsTable::class];
        $this->Salespecs = $this->getTableLocator()->get('Salespecs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Salespecs);

        parent::tearDown();
    }
}
