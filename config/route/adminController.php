<?php
/**
 * Routes for controller.
 */
return [
    "routes" => [
        [
            "info" => "Check user is admin",
            "requestMethod" => null,
            "path" => "**",
            "callable" => ["adminController", "checkAdmin"],
        ],
        [
            "info" => "Overview of all users",
            "requestMethod" => "get",
            "path" => "users",
            "callable" => ["adminController", "getUsers"],
        ],
        [
            "info" => "Overview of all comments",
            "requestMethod" => "get",
            "path" => "comments",
            "callable" => ["adminController", "getComments"],
        ],
        [
            "info" => "Update users",
            "requestMethod" => "get|post",
            "path" => "user/update/{id:digit}",
            "callable" => ["adminController", "getPostUserUpdate"],
        ],
        [
            "info" => "Delete user",
            "requestMethod" => "get",
            "path" => "user/delete/{id:digit}",
            "callable" => ["adminController", "getUserDelete"],
        ],
    ]
];
