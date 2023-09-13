<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersaleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersaleTable Test Case
 */
class UsersaleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersaleTable
     */
    protected $Usersale;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Usersale',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Usersale') ? [] : ['className' => UsersaleTable::class];
        $this->Usersale = $this->getTableLocator()->get('Usersale', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Usersale);

        parent::tearDown();
    }
}
