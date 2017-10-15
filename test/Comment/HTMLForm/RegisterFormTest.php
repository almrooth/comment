<?php

namespace Almrooth\Comment\HTMLForm;

use \Anax\DI\DIFactoryConfig;

/**
 * Tests for Comment
 */
class RegisterFormTest extends \PHPUnit_Framework_TestCase
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
        $this->form = new RegisterForm(self::$di);
    }

    /**
     * Create form and get its html
     */
    public function testConstruct()
    {
        $html = $this->form->getHTML();
        $this->assertEquals(is_string($html), true);
    }
}
