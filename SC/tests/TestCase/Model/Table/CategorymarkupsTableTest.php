<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategorymarkupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategorymarkupsTable Test Case
 */
class CategorymarkupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategorymarkupsTable
     */
    protected $Categorymarkups;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Categorymarkups',
        'app.Companies',
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Categorymarkups') ? [] : ['className' => CategorymarkupsTable::class];
        $this->Categorymarkups = $this->getTableLocator()->get('Categorymarkups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Categorymarkups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CategorymarkupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CategorymarkupsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
