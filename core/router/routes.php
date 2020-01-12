<?php

/*
 * Public
 */
$router->get( "", "controllers/get/index.controller.php" );
$router->get( "index", "controllers/get/index.controller.php" );
$router->get( "not-found", "controllers/get/404.controller.php" );
$router->get( "login", "controllers/get/login.controller.php" );
$router->get( "register", "controllers/get/register.controller.php" );
$router->get( "logout", "controllers/get/logout.api.php" );
$router->get( "about", "controllers/get/about.controller.php" );
$router->get( "category", "controllers/get/category.controller.php" );
$router->get( "post", "controllers/get/post.controller.php" );

$router->post( "login", "controllers/post/login.api.php" );
$router->post( "register", "controllers/post/register.api.php" );

/*
 * Admin
 */
$router->get( "admin", "controllers/admin/get/index.adm.controller.php" );
$router->get( "admin/posts", "controllers/admin/get/posts.adm.controller.php" );
$router->get( "admin/users", "controllers/admin/get/users.adm.controller.php" );
$router->get( "admin/settings", "controllers/admin/get/settings.adm.controller.php" );
$router->get( "admin/posts/add-new", "controllers/admin/get/add-new-post.adm.controller.php" );
$router->get( "admin/media", "controllers/admin/get/media.adm.controller.php" );
$router->get( "admin/posts/edit-post", "controllers/admin/get/edit-post.adm.controller.php" );
$router->get( "admin/posts/delete-post", "controllers/admin/get/delete-post.adm.api.php" );

$router->post( "admin/posts/add-new", "controllers/admin/post/add-new-post.adm.api.php" );
$router->post( "admin/posts/edit-post", "controllers/admin/post/edit-post.adm.api.php" );
