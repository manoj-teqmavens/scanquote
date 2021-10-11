<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemsmarkupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemsmarkupsTable Test Case
 */
class ItemsmarkupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemsmarkupsTable
     */
    protected $Itemsmarkups;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Itemsmarkups',
        'app.Companies',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Itemsmarkups') ? [] : ['className' => ItemsmarkupsTable::class];
        $this->Itemsmarkups = $this->getTableLocator()->get('Itemsmarkups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Itemsmarkups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ItemsmarkupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ItemsmarkupsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
