<?php

namespace Almrooth\Comment;

use \Anax\DI\DIFactoryConfig;
use \Almrooth\Comment\User;

/**
 * Tests for User
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    protected static $di;
    protected $user;

    /**
     * Setup before class is run
     */
    public static function setUpBeforeClass()
    {
        self::$di = new DIFactoryConfig('testDI.php');
    }

    /**
     * Create object user and inject database
     */
    public function setUp()
    {
        $this->user = new User();
        $this->user->setDb(self::$di->get("db"));
    }

    /**
     * Test create object User
     */
    public function testCreateUser()
    {
        $user = new User();
        $this->assertInstanceOf("Almrooth\Comment\User", $user);
    }

    /**
     * Set the password for user
     */
    public function testSetPassword()
    {
        $this->user->setPassword("test");
        $this->assertNotEquals($this->user->password, null);
    }

    /**
     * Verify password of a user
     */
    public function testVerifyPassword()
    {
        $this->assertEquals($this->user->verifyPassword("admin", "admin"), true);
    }

    /**
     * Generate gravatar link
     */
    public function testGravatar()
    {
        $this->user->email = "test@test.com";
        $gravatarLink = $this->user->gravatar();
        $hash = "https://www.gravatar.com/avatar/b642b4217b34b1e8d3bd915fc65c4452";
        $this->assertEquals($gravatarLink, $hash);
    }
}
