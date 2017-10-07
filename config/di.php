<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "pageRender" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Talm\Page\PageRender();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "pageController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Talm\Page\PageController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "commentController" => [
            "shared" => false,
            "callback" => function () {
                $obj = new \Talm\Comment\CommentController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "userController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Talm\Comment\UserController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "adminController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Talm\Comment\AdminController();
                $obj->setDI($this);
                return $obj;
            }
        ],
    ],
];
