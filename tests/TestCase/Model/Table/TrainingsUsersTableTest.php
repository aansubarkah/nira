<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainingsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainingsUsersTable Test Case
 */
class TrainingsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainingsUsersTable
     */
    public $TrainingsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trainings_users',
        'app.trainings',
        'app.issuers',
        'app.certificates',
        'app.users',
        'app.certificates_users',
        'app.evidences',
        'app.educations_users',
        'app.educations',
        'app.colleges',
        'app.levels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TrainingsUsers') ? [] : ['className' => 'App\Model\Table\TrainingsUsersTable'];
        $this->TrainingsUsers = TableRegistry::get('TrainingsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TrainingsUsers);

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
