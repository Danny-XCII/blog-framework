<?php

global $app;
global $user;
global $database;
global $get;

$categories = $database->getAllCategories();

$pageTitle = "Edit Post";
$requiresQuill = true;
$adminPage = true;

$post = $database->getPostByUri( $get );
$post->categories = unserialize( $post->categories );

include "./core/admin.init.php";

include "./views/admin/edit-post.adm.view.php";