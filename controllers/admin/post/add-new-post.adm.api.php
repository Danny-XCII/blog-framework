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

        include "./views/admin/add-new-post.adm.view.php";

    } else {

        if ( $_FILES[ "image" ][ "name" ] !== "" ) {

            $image = $_FILES[ "image" ][ "name" ];
            $destFile = "./content/uploads/" . $image;
            move_uploaded_file( $_FILES[ "image" ][ "tmp_name" ], $destFile );

        }

        $title = Request::post( "title" );
        $uri = Request::post( "uri" );
        $content = Request::post( "content" );
        $categories = serialize( Request::post( "categories" ) );

        if ( $database->addPost( $title, $uri, $image, $categories, $content, $user->username ) ) {

            header( "Location:/admin/posts" );

        }

    }

}