# Blog Framework

An MVC kinda framework for building simple blogs.

***

*10th January 2020*

*As of the initial commit, this can easily be used to build a fully functional blog. It will need
a couple of additions if using the existing views. No post content shown yet but this can be added quite
simply inside `views/post.view.php` by adding `$post->content` wherever you want it to go. A few buttons
in the admin panel don't do anything at the moment. Will need some optimisation for SEO - this is coming.*

***

### Main Features/Highlights

- Pretty URL's (mostly)
- PHP `Router`
- Database connection
- Primarily OOP
- Login/registration system
- Two user roles: admin and standard user
- Admin panel
- Add posts in the backend admin panel and view them on the front end

#### Bugs/Issues/Inconsistencies

***Routing query strings***

The router currently doesn't deal with query strings (nor does `.htaccess`). It's a bit hacky at the moment. 
In `index.php` I send the router down set paths for certain routes. For example:

```php
// snippet from index.php

$uri = Request::uri();
$requestUri = explode( "/", $uri );

if ( in_array( "post", $requestUri ) ) {

    $uri = "post";
    $requestLength = count( $requestUri );
    $get = $requestUri[ $requestLength - 1 ];

}
```

If a user visits `http://mysite.com/post/my-first-post`, the final segment of the URI (`my-first-post`) is assigned
to a variable `$get`. It is then used in the controller for the `post` endpoint to retrieve the desired post from the
database, like so - `$database->getPostByUri( $get )`. Basically faking a query string. Nothing wrong with it as far as the end user is concerned it
doesn't really affect things - but I haven't added logic for a post or URI that doesn't exist, for example:

```
post/my-post/my-post
my-post/post
about/post
``` 

The method currently returns an object literal. Probably just a check for `empty( $post )`. Will add when default 
views are fleshed out. Feels like bad code at the moment.

