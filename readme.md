# Blog Framework

An MVC kinda framework for building simple blogs.

***

*10th January 2020*

*As of the initial commit, this can easily be used to build a fully functional blog. It will need
a couple of additions if using the existing views. No post content shown yet but this can be added quite
simply inside `views/post.view.php` by adding `<?= $post->content; ?>` wherever you want it to go. A few buttons
in the admin panel don't do anything at the moment. Will need some optimisation for SEO - this is coming.*

***

#### Main Features/Highlights

- Pretty URL's (mostly)
- PHP `Router`
- Database connection
- Primarily OOP
- Login/registration system
- Two user roles: admin and standard user
- Admin panel
- Add/edit/delete posts in the backend admin panel and view them on the front end
- Rich text editor

#### Usage

- Upload the project to `public_html` or `www`
- Insert database settings into `core/config/database.config.php`
- Execute the code in `core/config/db.sql` to create your database tables (not the last line yet)
- Navigate to your site in the browser and head to the registration page (`/register`) and register a new account
- Execute the final line of `core/config.db.sql` to give administrator rights to your new account
- Use the admin panel to add posts
- Delete `assets/css/temp.css` for default front end styling (basically none)

*Some buttons and links in the admin panel don't do anything yet.*

#### Bugs/Issues/Inconsistencies

**List of stuff I need to fix:**

- 404 or "This post doesn't exist" for posts that don't exist.
- Lots of button functionality hasn't been added yet in the admin panel.
- Create functions to manage settings from database and have `$app` retrieve these settings - make use of the admin page for settings.
- Create a confirmation before deleting a post in the admin panel.

**Things I need to add/work on (so I don't forget):**

- SEO
- Ability to update post image as well as content
- Needs pagination
