<?php

global $app;
global $user;
global $database;
global $get;

$category = htmlspecialchars( $get );
$pageTitle = ucfirst( $category );

$posts = $database->getAllPosts();

$categoryPosts = array();

foreach ( $posts as $post ) {

    $post->categories = unserialize( $post->categories );

    if ( in_array( $category, $post->categories ) ) {

        $categoryPosts[] = $post;

    }

}

$posts = $categoryPosts;
$noSerialize = true;

include "./views/category.view.php";