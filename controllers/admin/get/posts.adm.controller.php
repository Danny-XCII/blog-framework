<?php

global $app;
global $user;
global $database;

$pageTitle = "Posts";
$adminPage = true;

include "./core/admin.init.php";

include "./views/admin/posts.adm.view.php";