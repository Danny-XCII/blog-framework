<?php

global $user;
global $database;
global $app;

include "./core/admin.init.php";

if ( Request::method() == "POST" ) {

    if ( Request::post( "title" ) === "" ) {

        $errors[] = "Please enter a title for your new post.";

    }

    if ( Request::post( "uri" ) === "" ) {

        $errors[] = "Please enter a URI for your new post.";

    }

    if ( !isset( $_POST[ "categories" ] ) ) {

        $_POST[ "categories" ][] = "uncategorised";

    }

    if ( isset( $errors ) ) {

        $categories = $database->getAllCategories();

        $pageTitle = "Add New Post";
        $requiresQuill = true;
        $adminPage = true;

        include "./views/admin/edit-post.adm.view.php";

    } else {

        $title = Request::post( "title" );
        $uri = Request::post( "uri" );
       // var_dump( htmlspecialchars( Request::post( "content" ) ) );
        $content = Request::post( "content" );
       // var_dump( htmlspecialchars( $content ) );
        $categories = serialize( Request::post( "categories" ) );
        $metaDescription = Request::post( "meta_description" );

        if ( $database->updatePost( $title, $uri, $categories, $content, Request::post( "current_uri" ), $metaDescription ) ) {

            header( "Location:/admin/posts" );

        }

    }

}