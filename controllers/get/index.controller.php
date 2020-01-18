<?php

global $app;
global $user;
global $database;

$pageTitle = "Home Page";

// Page meta
$pageDescription = "My page description";

$posts = $database->getAllPosts();

include "./views/index.view.php";

