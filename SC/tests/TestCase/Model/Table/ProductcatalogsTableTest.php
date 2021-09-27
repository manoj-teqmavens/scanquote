<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductcatalogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductcatalogsTable Test Case
 */
class ProductcatalogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductcatalogsTable
     */
    protected $Productcatalogs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Productcatalogs',
        'app.Categories',
        'app.Subcategories',
        'app.Types',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Productcatalogs') ? [] : ['className' => ProductcatalogsTable::class];
        $this->Productcatalogs = $this->getTableLocator()->get('Productcatalogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Productcatalogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProductcatalogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProductcatalogsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
