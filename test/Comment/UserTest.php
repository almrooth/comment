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

    public static function setUpBeforeClass()
    {
        self::$di = new DIFactoryConfig('testDI.php');
    }

    /**
     * Setup before each testcase
     */
    public function setUp()
    {
        $this->user = new User();
        $this->user->setDb(self::$di->get("db"));
    }

    public function testSetPassword()
    {
        $this->user->setPassword("test");
        $this->assertNotEquals($this->user->password, null);
    }

    public function testVerifyPassword()
    {
        $this->assertEquals($this->user->verifyPassword("admin", "admin"), true);
    }

    public function testGravatar()
    {
        $this->user->email = "test";
        $gravatarLink = $this->user->gravatar();
        $this->assertEquals($gravatarLink, "https://www.gravatar.com/avatar/" . md5(strtolower(trim("test"))));
    }
}
