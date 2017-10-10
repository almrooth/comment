<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "request" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Request\Request();
                $obj->init();
                return $obj;
            }
        ],
        "response" => [
            "shared" => true,
            //"callback" => "\Anax\Response\Response",
            "callback" => function () {
                $obj = new \Anax\Response\ResponseUtility();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "url" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Url\Url();
                $request = $this->get("request");
                $obj->setSiteUrl($request->getSiteUrl());
                $obj->setBaseUrl($request->getBaseUrl());
                $obj->setStaticSiteUrl($request->getSiteUrl());
                $obj->setStaticBaseUrl($request->getBaseUrl());
                $obj->setScriptName($request->getScriptName());
                $obj->configure("url.php");
                $obj->setDefaultsFromConfiguration();
                return $obj;
            }
        ],
        "router" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Route\Router();
                $obj->setDI($this);
                $obj->configure("route.php");
                return $obj;
            }
        ],
        "view" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\View\ViewCollection();
                $obj->setDI($this);
                $obj->configure("view.php");
                return $obj;
            }
        ],
        "viewRenderFile" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\View\ViewRenderFile2();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "session" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Session\SessionConfigurable();
                $obj->configure("session.php");
                $obj->start();
                return $obj;
            }
        ],
        "textfilter" => [
            "shared" => true,
            "callback" => "\Anax\TextFilter\TextFilter",
        ],
        "pageRender" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\PageRender();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "errorController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\ErrorController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "debugController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\DebugController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "flatFileContentController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\FlatFileContentController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "commentController" => [
            "shared" => false,
            "callback" => function () {
                $obj = new \Almrooth\Comment\CommentController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "userController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Almrooth\Comment\UserController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "adminController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Almrooth\Comment\AdminController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "db" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Database\DatabaseQueryBuilder();
                $obj->configure("testDB.php");
                
                // Setup DB
                $obj->connect();
                // Users table
                $sql = '
                CREATE TABLE `rv1_users` (
                    `id` INTEGER PRIMARY KEY NOT NULL,
                    `role` VARCHAR(20) NOT NULL,
                    `username` VARCHAR(100) UNIQUE NOT NULL,
                    `password` VARCHAR(255) NOT NULL,
                    `email` VARCHAR(100) NOT NULL,
                    `created` DATETIME,
                    `updated` DATETIME,
                    `deleted` DATETIME
                )';
                $obj->execute($sql);

                // Comments table
                $sql = '
                CREATE TABLE `rv1_comments` (
                    `id` INTEGER PRIMARY KEY NOT NULL,
                    `user_id` INTEGER NOT NULL,
                    `content` TEXT NOT NULL,
                    `created` DATETIME,
                    `updated` DATETIME,
                    `deleted` DATETIME
                )';
                $obj->execute($sql);

                // Add users
                $sql = '
                INSERT INTO `rv1_users` (`role`, `username`, `password`, `email`) VALUES
                ("admin", "admin", "$2y$10$uZx4liCNftH1yDJYKnycu.TBOwQ6X09cdGgT53RX38baUYZTJRG56", "admin@comment.com"),
                ("user", "doe", "$2y$10$Q4Y6zom7KP1EiGcKjFg0K.pFfRsf5.XeTrarffeB.Ug89LanDFeXO", "doe@comment.com");';
                $obj->execute($sql);

                // Add comments
                $sql = '
                INSERT INTO `rv1_comments` (`user_id`, `content`) VALUES
                ("1", "This is a comment by an admin, admin."),
                ("2", "This is a comment by a user, doe.");';
                $obj->execute($sql);

                return $obj;
            }
        ],
    ],
];
