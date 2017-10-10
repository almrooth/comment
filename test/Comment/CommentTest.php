<?php

namespace Almrooth\Comment;

use \Anax\DI\DIFactoryConfig;
use \Almrooth\Comment\Comment;
use \Almrooth\Comment\User;

/**
 * Tests for Comment
 */
class CommentTest extends \PHPUnit_Framework_TestCase
{
    protected static $di;
    protected $comment;

    /**
     * Setup before class is run
     */
    public static function setUpBeforeClass()
    {
        self::$di = new DIFactoryConfig("testDI.php");
    }

    /**
     * Create object comment and inject database
     */
    public function setUp()
    {
        $this->comment = new Comment();
        $this->comment->setDb(self::$di->get("db"));
    }

    /**
     * Test create object Comment
     */
    public function testCreateComment()
    {
        $comment = new Comment();
        $this->assertInstanceOf("Almrooth\Comment\Comment", $comment);
    }

    /**
     * Create gravatar link of email
     */
    public function testGravatar()
    {
        $email = "test@test.com";
        $hash = "https://www.gravatar.com/avatar/b642b4217b34b1e8d3bd915fc65c4452";
        $link = $this->comment->gravatar($email);
        $this->assertEquals($link, $hash);
    }

    /**
     * Get all comments
     */
    public function testGetAll()
    {
        $comments = $this->comment->getAll();
        $this->assertContainsOnlyInstancesOf("Almrooth\Comment\Comment", $comments);
    }

    /**
     * Get singel comment by ID
     */
    public function testGet()
    {
        $comment = $this->comment->get("1");
        $this->assertInstanceOf("Almrooth\Comment\Comment", $comment);
    }

    /**
     * Get user of a comment
     */
    public function testUser()
    {
        $user = $this->comment->user("1");
        $this->assertInstanceOf("Almrooth\Comment\User", $user);
    }
}
