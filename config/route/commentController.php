<?php

return [
    "routes" => [
        [
            "info" => "Check user is logged in",
            "requestMethod" => null,
            "path" => "**",
            "callable" => ["commentController", "checkLogin"],
        ],
        [
            "info" => "Get all comments and post new comment",
            "requestMethod" => "get|post",
            "path" => "",
            "callable" => ["commentController", "getPostIndex"],
        ],
        [
            "info" => "Get a single comment",
            "requestMethod" => "get",
            "path" => "{id:digit}",
            "callable" => ["commentController", "getComment"],
        ],
        [
            "info" => "Update comment",
            "requestMethod" => "get|post",
            "path" => "update/{id:digit}",
            "callable" => ["commentController", "getPostUpdate"],
        ],
        [
            "info" => "Delete a comment",
            "requestMethod" => "get",
            "path" => "delete/{id:digit}",
            "callable" => ["commentController", "getDelete"],
        ],
    ]
];
