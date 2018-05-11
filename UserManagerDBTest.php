<?php
require_once'/public/includes/autoload.php';
require_once'/public/includes/password.php';
use classes\data\UserManagerDB;
use classes\business\UserManager;
use classes\entity\User;
use classes\util\DBUtil;



/**
 * UserManagerDB test case.
 */
class UserManagerDBTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var UserManagerDB
     */
    private $userManagerDB;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated UserManagerDBTest::setUp()
        
        $this->userManagerDB = new UserManagerDB(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated UserManagerDBTest::tearDown()
        $this->userManagerDB = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests UserManagerDB::fillUser()
     */
    public function testFillUser()
    {
        // TODO Auto-generated UserManagerDBTest::testFillUser()
        $this->markTestIncomplete("fillUser test not implemented");
        
        UserManagerDB::fillUser(/* parameters */);
    }

    /**
     * Tests UserManagerDB::getUserByEmailPassword()
     */
    public function testGetUserByEmailPasswordvalid()
    {
        // TODO Auto-generated UserManagerDBTest::testGetUserByEmailPassword()
//         $this->markTestIncomplete("getUserByEmailPassword test not implemented");
        
        // $user =  UserManagerDB::getUserByEmailPassword("jackchrist2@gmail.com","Password01");
        $user = UserManagerDB::getUserByEmail("jackchrist2@gmail.com");
        $hash_password = $user->password;
        $password = "Password01";
        $isValid = password_verify($password,$hash_password);
        if ($isValid){
            $this->assertInstanceOf('classes\entity\User', $user);
        } else {
            $this->assertInstanceOf(Null, $user);
        }
        
 
    }

    /**
     * Tests UserManagerDB::getUserByEmail()
     */
    public function testGetUserByEmailValid()
    {
        // TODO Auto-generated UserManagerDBTest::testGetUserByEmail()
        // $this->markTestIncomplete("getUserByEmail test not implemented");
        
        $user = UserManagerDB::getUserByEmail("jackyin1996@gmail.com");
        $this->assertInstanceOf('classes\entity\User', $user);
    }
    public function testGetUserByEmailInvalid()
    {
        // TODO Auto-generated UserManagerDBTest::testGetUserByEmail()
        // $this->markTestIncomplete("getUserByEmail test not implemented");
        
        $user = UserManagerDB::getUserByEmail("xxxxx");
        $this->assertEquals(Null, $user);
    }
    /**
     * Tests UserManagerDB::searchUser()
     */
    public function testSearchUser()
    {
        // TODO Auto-generated UserManagerDBTest::testSearchUser()
        $this->markTestIncomplete("searchUser test not implemented");
        
        UserManagerDB::searchUser(/* parameters */);
    }

    /**
     * Tests UserManagerDB::getUserById()
     */
    public function testGetUserById()
    {
        // TODO Auto-generated UserManagerDBTest::testGetUserById()
        // $this->markTestIncomplete("getUserById test not implemented");
        
    $user = UserManagerDB::getUserById('5');

        $this->assertEquals('ben', $user->firstName);
    }

    /**
     * Tests UserManagerDB::saveUser()
     */
    public function testSaveUser()
    {
        // TODO Auto-generated UserManagerDBTest::testSaveUser()
        // $this->markTestIncomplete("saveUser test not implemented");
        
       $user= UserManagerDB::saveUser(/* parameters */);
    }

    /**
     * Tests UserManagerDB::updatePassword()
     */
    public function testUpdatePassword()
    {
        // TODO Auto-generated UserManagerDBTest::testUpdatePassword()
        $this->markTestIncomplete("updatePassword test not implemented");
        
        UserManagerDB::updatePassword(/* parameters */);
    }

    /**
     * Tests UserManagerDB::deleteAccount()
     */
    public function testDeleteAccount()
    {
        // TODO Auto-generated UserManagerDBTest::testDeleteAccount()
        $this->markTestIncomplete("deleteAccount test not implemented");
        
        UserManagerDB::deleteAccount(/* parameters */);
    }

    /**
     * Tests UserManagerDB::getAllUsers()
     */
    public function testGetAllUsers()
    {
        // TODO Auto-generated UserManagerDBTest::testGetAllUsers()
        // $this->markTestIncomplete("getAllUsers test not implemented");
        
       $users = UserManagerDB::getAllUsers();
        $this->assertEquals(11, count($users));
    }
}

