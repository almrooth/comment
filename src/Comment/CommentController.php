<?php

namespace Almrooth\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

use \Almrooth\Comment\HTMLForm\LoginForm;
use \Almrooth\Comment\HTMLForm\RegisterForm;
use \Almrooth\Comment\HTMLForm\AddCommentForm;
use \Almrooth\Comment\HTMLForm\UpdateCommentForm;

/**
 * A controller class.
 */
class CommentController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;


    /**
     * @var $data description
     */
    //private $data;


    public function checkLogin()
    {
        if (!$this->di->get("session")->get("user_id")) {
            $this->di->get("response")->redirect("user/login");
        }
    }


    public function getPostIndex()
    {
        $title          = "Alla kommentarer";
        $view           = $this->di->get("view");
        $pageRender     = $this->di->get("pageRender");
        $comment        = new Comment();
        $comment->setDb($this->di->get("db"));

        $form           = new AddCommentForm($this->di);

        $form->check();

        $data = [
            "comments" => $comment->getAll(),
            "form" => $form->getHTML(),
        ];

        $view->add("comment/index", $data);

        $pageRender->renderPage(["title" => $title]);
    }


    public function getComment($id)
    {
        $title          = "Redigera kommentar";
        $view           = $this->di->get("view");
        $pageRender     = $this->di->get("pageRender");

        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $comment->get($id);

        $data = [
            "comment" => $comment,
        ];

        $view->add("comment/comment", $data);

        $pageRender->renderPage(["title" => $title]);
    }


    public function getPostUpdate($id)
    {
        $title          = "Redigera kommentar";
        $view           = $this->di->get("view");
        $pageRender     = $this->di->get("pageRender");
        $form           = new UpdateCommentForm($this->di, $id);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("comment/update", $data);

        $pageRender->renderPage(["title" => $title]);
    }


    public function getDelete($id)
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $comment->find("id", $id);

        // If logged in user is owner of comment or admin then delete
        $currentId = $this->di->get("session")->get("user_id");
        $currentRole = $this->di->get("session")->get("user_role");
        if ($currentId === $comment->user_id || $currentRole === "admin") {
            $comment->delete();
        }

        $this->di->get("response")->redirect("comment");
    }
}
