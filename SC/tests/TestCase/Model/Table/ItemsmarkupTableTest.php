<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemsmarkupTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemsmarkupTable Test Case
 */
class ItemsmarkupTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemsmarkupTable
     */
    protected $Itemsmarkup;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Itemsmarkup',
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
        $config = $this->getTableLocator()->exists('Itemsmarkup') ? [] : ['className' => ItemsmarkupTable::class];
        $this->Itemsmarkup = $this->getTableLocator()->get('Itemsmarkup', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Itemsmarkup);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ItemsmarkupTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ItemsmarkupTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
