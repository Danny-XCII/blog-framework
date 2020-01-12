<?php

global $app;
global $user;
global $database;
global $get;

$post = $database->getPostByUri( $get );

if ( $post ) {

    $post->categories = unserialize( $post->categories );
    $post->posted_on = date( "F jS, Y", strtotime( $post->posted_on ) );

    $pageTitle = $post->title;

}

include "./views/post.view.php";