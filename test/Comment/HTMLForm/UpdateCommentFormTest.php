<?php

namespace Almrooth\Comment\HTMLForm;

use \Anax\DI\DIFactoryConfig;

/**
 * Tests for Comment
 */
class UpdateCommentFormTest extends \PHPUnit_Framework_TestCase
{
    protected static $di;
    protected $form;

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
        $this->form = new UpdateCommentForm(self::$di, 1);
    }

    /**
     * Create form and get its html
     */
    public function testConstruct()
    {
        $html = $this->form->getHTML();
        $this->assertEquals(is_string($html), true);
    }

    /**
     * Submit the form
     */
    public function testCallbackSubmit()
    {
        // self::$di->get("session")->set("user_id", 1);
        // $this->form->callbackSubmit();
    }
}
