<?php

namespace Talm\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

use \Talm\Comment\HTMLForm\UpdateUserForm;

/**
 * A controller class.
 */
class AdminController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;


    /**
     * @var $data description
     */
    //private $data;


    public function checkAdmin()
    {
        if ($this->di->get("session")->get("user_role") !== "admin") {
            $this->di->get("response")->redirect("user/login");
        }
    }


    public function getUsers()
    {
        $title          = "Alla användare";
        $view           = $this->di->get("view");
        $pageRender     = $this->di->get("pageRender");

        $user = new User();
        $user->setDb($this->di->get("db"));
        
        $data = [
            "users" => $user->findAll(),
        ];

        $view->add("admin/users", $data);

        $pageRender->renderPage(["title" => $title]);
    }
    

    public function getPostUserUpdate($id)
    {
        $title      = "Updatera användare";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new UpdateUserForm($this->di, $id);

        $form->check();

        $data = [
            "form" => $form->getHTML()
        ];

        $view->add("user/update", $data);
        
        $pageRender->renderPage(["title" => $title]);
    }


    public function getUserDelete($id)
    {
        $user = new User();
        $user->setDb($this->di->get("db"));
        $user->find("id", $id);
        $user->deleted = date("Y-m-d H:i:s");
        $user->save();

        $this->di->get("response")->redirect("admin/users");
    }

    
    public function getComments()
    {
        $title          = "Alla kommentarer";
        $view           = $this->di->get("view");
        $pageRender     = $this->di->get("pageRender");

        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        
        $data = [
            "comments" => $comment->getAll(),
        ];

        $view->add("admin/comments", $data);

        $pageRender->renderPage(["title" => $title]);
    }
}
