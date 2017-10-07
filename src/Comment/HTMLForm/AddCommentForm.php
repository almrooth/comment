<?php

namespace Talm\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Talm\Comment\User;
use \Talm\Comment\Comment;

/**
 * Example of FormModel implementation.
 */
class AddCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di)
    {
        parent::__construct($di);

        $this->form->create(
            [
                "id" => __CLASS__,
                "use_fieldset" => false,
            ],
            [
                "content" => [
                    "type"          => "textarea",
                    "label"         => "Kommentar",
                    "validation"    => ["not_empty"],
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Spara kommentar",
                    "callback" => [$this, "callbackSubmit"],
                    "class" => "btn"
                ],
            ]
        );
    }


    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        // Get current user
        $user = new User();
        $user->setDb($this->di->get("db"));
        $user->find("id", $this->di->get("session")->get("user_id"));

        // Create new comment
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $comment->user_id   = $user->id;
        $comment->content   = $this->form->value("content");
        $comment->save();

        // Redirect to profile page
        $this->di->get("response")->redirectSelf();
    }
}
