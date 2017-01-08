<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationsUsersTable Test Case
 */
class EducationsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationsUsersTable
     */
    public $EducationsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.educations_users',
        'app.educations',
        'app.colleges',
        'app.levels',
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
        $config = TableRegistry::exists('EducationsUsers') ? [] : ['className' => 'App\Model\Table\EducationsUsersTable'];
        $this->EducationsUsers = TableRegistry::get('EducationsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EducationsUsers);

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
