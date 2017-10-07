<?php

namespace Talm\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

use \Talm\Comment\HTMLForm\LoginForm;
use \Talm\Comment\HTMLForm\RegisterForm;
use \Talm\Comment\HTMLForm\AddCommentForm;
use \Talm\Comment\HTMLForm\UpdateCommentForm;

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
        if ($this->di->get("session")->get("user_id") === $comment->user_id || $this->di->get("session")->get("user_role") === "admin") {
            $comment->delete();
        }

        $this->di->get("response")->redirect("comment");
    }
}
