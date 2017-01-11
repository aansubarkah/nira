<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegenciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegenciesTable Test Case
 */
class RegenciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegenciesTable
     */
    public $Regencies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.regencies',
        'app.provinces',
        'app.addresses',
        'app.companies',
        'app.categories',
        'app.offices',
        'app.addresses_offices',
        'app.emails',
        'app.companies_emails',
        'app.emails_offices',
        'app.users',
        'app.emails_users',
        'app.phones',
        'app.types',
        'app.companies_phones',
        'app.offices_phones',
        'app.phones_users',
        'app.offices_users',
        'app.addresses_companies',
        'app.companies_users',
        'app.addresses_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Regencies') ? [] : ['className' => 'App\Model\Table\RegenciesTable'];
        $this->Regencies = TableRegistry::get('Regencies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Regencies);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
