<?php

global $app;
global $user;
global $database;

$categories = $database->getAllCategories();

$pageTitle = "Edit Post";
$requiresQuill = true;
$adminPage = true;

$post = $database->getPostByUri( Request::get( "p" ) );
$post->categories = unserialize( $post->categories );

include "./core/admin.init.php";

include "./views/admin/edit-post.adm.view.php";