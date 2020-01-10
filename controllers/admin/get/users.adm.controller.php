<?php

global $app;
global $user;
global $database;

$users = $database->getAllUsers();

$pageTitle = "Users";
$adminPage = true;

include "./core/admin.init.php";

include "./views/admin/users.adm.view.php";