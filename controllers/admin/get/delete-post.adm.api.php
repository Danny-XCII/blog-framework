<?php

global $app;
global $user;
global $database;
global $get;

include "./core/admin.init.php";

//var_dump( $get );
$database->deletePostByUri( $get );

header( "Location:/admin/posts" );