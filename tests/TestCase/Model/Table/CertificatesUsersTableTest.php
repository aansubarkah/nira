<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CertificatesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CertificatesUsersTable Test Case
 */
class CertificatesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CertificatesUsersTable
     */
    public $CertificatesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.certificates_users',
        'app.certificates',
        'app.issuers',
        'app.users',
        'app.evidences'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CertificatesUsers') ? [] : ['className' => 'App\Model\Table\CertificatesUsersTable'];
        $this->CertificatesUsers = TableRegistry::get('CertificatesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CertificatesUsers);

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
