<?php
/**
 * Configuration file for routes.
 */
return [
    // Load these routefiles in order specified and optionally mount them
    // onto a base route.
    "routeFiles" => [
        [
            // Add routes from commentController and mount on comment/
            "mount" => "comment",
            "file" => __DIR__ . "/route/commentController.php",
        ],
        [
            // Add routes from userController and mount on user/
            "mount" => "user",
            "file" => __DIR__ . "/route/userController.php",
        ],
        [
            // Add routes from userController and mount on user/
            "mount" => "admin",
            "file" => __DIR__ . "/route/adminController.php",
        ],
    ],

];
