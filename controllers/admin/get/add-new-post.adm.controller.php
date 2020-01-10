<?php

global $app;
global $user;
global $database;

$categories = $database->getAllCategories();

$pageTitle = "Add New Post";
$requiresQuill = true;
$adminPage = true;

include "./core/admin.init.php";

include "./views/admin/add-new-post.adm.view.php";