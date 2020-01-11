<?php

class Database {

    protected $pdo;

    public function __construct( $config ) {

        try {

            $this->pdo = new PDO( "mysql:host={$config->host};dbname={$config->name};", $config->username, $config->password );
            $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        } catch ( PDOException $e ) {

            die( "Could not connect to the database: <br><br>" . $e->getMessage() );

        }

    }

    public function usernameExists( $username ) {

        try {

            $query = $this->pdo->prepare( "select * from `users` where `username` = '{$username}';" );
            $query->execute();

            return !empty( $query->fetchAll() );

        } catch( PDOException $e ) {

            die( "Something went wrong when trying to determine whether the username exists or not." );

        }

    }

    public function emailExists( $emailAddress ) {

        try {

            $query = $this->pdo->prepare( "select * from `users` where `email` = '{$emailAddress}';" );
            $query->execute();

            return !empty( $query->fetchAll() );

        } catch ( PDOException $e ) {

            die( "Something went wrong when trying to determine whether the email address exists or not." );

        }

    }

    public function getUserByUsername( $username ) {

        try {

            $query = $this->pdo->prepare( "select * from `users` where `username` = '{$username}';" );
            $query->execute();

            $user = $query->fetchAll( PDO::FETCH_CLASS );

            return empty( $user ) ? false : $user[ 0 ];

        } catch ( PDOException $e ) {

            die( "Could not get the user from the database." );

        }

    }

    public function loginUser( $username, $password ) {

        $user = $this->getUserByUsername( $username );

        if ( $user !== false ) {

            if ( password_verify( $password, $user->password ) ) {

                $_SESSION[ "logged_in" ] = "true";
                $_SESSION[ "username" ] = $username;
                return true;

            } else {

                return "Incorrect password.";

            }

        } else {

            return "No user with this username exists.";

        }

    }

    public function addUser( $username, $password, $emailAddress ) {

        if ( $this->usernameExists( $username ) ) : return "A user with that username already exists. Please choose another username and try again."; endif;

        if ( $this->emailExists( $email ) ) : return "That email address is already associated with an account. Please use a different email address or sign in to your existing account."; endif;

        $password = password_hash( $password, PASSWORD_DEFAULT );

        try {

            $query = $this->pdo->prepare( "insert into `users` ( `username`, `password`, `email` ) values ( '{$username}', '{$password}', '{$emailAddress}' );" );
            $query->execute();
            return true;

        } catch( PDOException $e ) {

            die( "Something went wrong when trying to add the user to the database." );

        }

    }

    public function getAllUsers() {

        try {

            $query = $this->pdo->prepare( "select * from `users`" );
            $query->execute();

            return $query->fetchAll( PDO::FETCH_CLASS );

        } catch ( PDOException $e ) {

            die( "Could not retrieve all users from the database." );

        }

    }

    public function getAllCategories() {

        try {

            $query = $this->pdo->prepare( "select * from `post_categories`;" );
            $query->execute();

            return $query->fetchAll( PDO::FETCH_CLASS );

        } catch ( PDOException $e ) {

            die( "Could not retrieve categories from the database." );

        }

    }

    public function addPost( $title, $uri, $image, $categories, $content, $author ) {

        try {

            $query = $this->pdo->prepare( "insert into `posts` ( `title`, `uri`, `image`, `categories`, `content`, `author` ) values ( '{$title}', '{$uri}', '{$image}', '{$categories}', '{$content}', '{$author}' );" );
            $query->execute();
            return true;

        } catch ( PDOException $e ) {

            die( "Could not add the post to the database.<br><br>" . $e->getMessage() );

        }

    }

    public function updatePost( $title, $uri, $categories, $content, $currentUri ) {

        try {

            $query = $this->pdo->prepare( "update `posts` set `title` = '{$title}', `uri` = '{$uri}', `categories` = '{$categories}', `content` = '{$content}' where `uri` = '{$currentUri}';" );
            $query->execute();
            return true;

        } catch ( PDOException $e ) {

            die( "Could not update the post." );

        }

    }

    public function getAllPosts() {

        try {

            $query = $this->pdo->prepare( "select * from `posts` order by `posted_on` desc;" );
            $query->execute();

            return $query->fetchAll( PDO::FETCH_CLASS );

        } catch ( PDOException $e ) {

            die( "Could not retrieve posts from the database." );

        }

    }

    public function getPostByUri( $uri ) {

        try {

            $query = $this->pdo->prepare( "select * from `posts` where `uri` = '{$uri}';" );
            $query->execute();

            $result = $query->fetchAll( PDO::FETCH_CLASS );

            return $result[ 0 ];

        } catch ( PDOException $e ) {

            die( "Couldn't retrieve the post from the database." );

        }

    }

}