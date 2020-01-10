<?php

global $app;
global $user;
global $database;

$pageTitle = "Home Page";

$posts = $database->getAllPosts();

include "./views/index.view.php";

