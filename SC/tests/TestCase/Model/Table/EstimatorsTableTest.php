<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstimatorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstimatorsTable Test Case
 */
class EstimatorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstimatorsTable
     */
    protected $Estimators;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Estimators',
        'app.Companies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Estimators') ? [] : ['className' => EstimatorsTable::class];
        $this->Estimators = $this->getTableLocator()->get('Estimators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Estimators);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EstimatorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EstimatorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
