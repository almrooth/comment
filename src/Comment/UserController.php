<?php

namespace Talm\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

use \Talm\Comment\HTMLForm\LoginForm;
use \Talm\Comment\HTMLForm\RegisterForm;
use \Talm\Comment\HTMLForm\UpdateUserForm;

/**
 * A controller class.
 * @SuppressWarnings("camelcase")
 */
class UserController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;


    /**
     * @var $data description
     */
    //private $data;


    /**
     * Handler with form to login user
     *
     * @return void
     */
    public function getPostLogin()
    {
        $title      = "Login";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new LoginForm($this->di);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("user/login", $data);

        $pageRender->renderPage(["title" => $title]);
    }


    // Handle user logout
    public function getLogout()
    {
        $this->di->get("session")->destroy();
        $this->di->get("response")->redirect("user/login");
    }


    /**
     * Handler with form to register new user
     *
     * @return void
     */
    public function getPostRegister()
    {
        $title      = "Registrera";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new RegisterForm($this->di);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("user/register", $data);

        $pageRender->renderPage(["title" => $title]);
    }


    // Handle user profile page
    public function getProfile($id)
    {
        $title      = "Profil";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $user = new User();
        $user->setDb($this->di->get("db"));
        $user->find("id", $id);

        $data = [
            "user" => $user
        ];

        $view->add("user/profile", $data);
        
        $pageRender->renderPage(["title" => $title]);
    }


    public function getPostUpdate()
    {
        $title      = "Updatera profil";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $user_id    = $this->di->get("session")->get("user_id");
        $form       = new UpdateUserForm($this->di, $user_id);

        $form->check();

        $data = [
            "form" => $form->getHTML()
        ];

        $view->add("user/update", $data);
        
        $pageRender->renderPage(["title" => $title]);
    }
}
