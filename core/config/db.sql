drop table if exists `users`;
drop table if exists `users`;
drop table if exists `posts`;
drop table if exists `post_categories`;

create table `users` (
    `id` int(11) auto_increment not null primary key,
    `username` varchar(60) not null unique,
    `password` varchar(255) not null,
    `email` varchar(255) not null,
    `role` tinyint(1) not null default 0
);

create table `posts` (
    `id` int(11) auto_increment not null primary key,
    `title` varchar(255) not null,
    `meta_description` varchar(350) not null,
    `uri` varchar(255) not null,
    `content` longtext,
    `author` varchar(60),
    `posted_on` datetime not null default NOW(),
    `image` varchar(255),
    `categories` text
);

create table `post_categories` (
    `id` int(11) auto_increment not null primary key,
    `name` varchar(255) not null
);

/*
 * Example post categories.
 */
insert into `post_categories` ( `name` ) values ( "General" );
insert into `post_categories` ( `name` ) values ( "Coding" );
insert into `post_categories` ( `name` ) values ( "Reviews" );
insert into `post_categories` ( `name` ) values ( "Software" );

/*
 * Sign up using the registration form then execute the below to
 * assign administrator status to your newly created user account.
 */
update `users` set `role` = 1 where `username` = "Admin";

select * from `users`;