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
- Rich text editor

### Usage

- Upload the project to `public_html` or `www`
- Insert database settings into `core/config/database.config.php`
- Execute the code in `core/config/db.sql` to create your database tables (not the last line yet)
- Navigate to your site in the browser and head to the registration page (`/register`) and register a new account
- Execute the final line of `core/config.db.sql` to give administrator rights to your new account
- Use the admin panel to add posts

*Some buttons and links in the admin panel don't do anything yet.*

#### Bugs/Issues/Inconsistencies

***Routing query strings***

The router currently doesn't deal with query strings (nor does `.htaccess`). It's a bit hacky at the moment. 
In `index.php` I send the router down set paths for certain routes, like so:

```php
/*
 * Fake query strings
 */
$uriParts = explode( "/", $uri );
$queryPages = array( "post", "category" );

foreach ( $queryPages as $queryPage ) {

    if ( in_array( $queryPage, $uriParts ) ) {

        $uri = $queryPage;
        $get = $uriParts[ count( $uriParts ) - 1 ];

    }

}

Router::create( "./core/router/routes.php" )->direct( $uri, Request::method() );
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

**List of stuff I need to fix:**

- 404 or "This post doesn't exist" for posts that don't exist.
- Query string routing. But it's cleaner than it was.
- Lots of button functionality hasn't been added yet in the admin panel.
- Create functions to manage settings from database and have `$app` retrieve these settings - make use of the admin page for settings.
- ***ANYTHING ELSE THAT IS EMPTY OR NON-WORKING LINKS ETC ARE STUFF I'M WORKING ON STILL***

