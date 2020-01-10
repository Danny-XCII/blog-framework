<?php

global $app;
global $user;
global $database;

$pageTitle = "Dashboard";
$adminPage = true;

include "./core/admin.init.php";

include "./views/admin/index.adm.view.php";