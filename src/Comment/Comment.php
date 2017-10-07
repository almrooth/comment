<?php

namespace Talm\Comment;

use \Anax\Database\ActiveRecordModel;

use \Talm\Comment\User;

/**
 * A database driven model.
 * @SuppressWarnings("camelcase")
 */
class Comment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "rv1_comments";


    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $user_id;
    public $content;
    public $created;
    public $updated;
    public $deleted;


    public function gravatar($email)
    {
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))); 
    }

    public function getAll()
    {
        $comments = $this->findAll();

        return array_map(function ($comment) {
            $user = $this->user($comment->user_id);
            $comment->gravatar = $this->gravatar($user->email);
            $comment->username = $user->username;
            return $comment;
        }, $comments);
    }

    public function get($id)
    {
        $comment = $this->find("id", $id);
        $user = $this->user($comment->user_id);
        $comment->gravatar = $this->gravatar($user->email);
        $comment->username = $user->username;
        return $comment;
    }

    public function user($id)
    {
        $user = new User();
        $user->setDb($this->db);
        return $user->find("id", $id);
    }
}
