<!doctype html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

        <title><?= $pageTitle; ?> | <?= $app->name; ?></title>

        <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/admin-bar.css">

        <?php if ( isset( $requiresQuill ) && $requiresQuill ) : ?>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.17.1/build/styles/default.min.css">
            <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <?php endif; ?>


    </head>

    <body>

        <main>

            <section class="admin-sidebar">

                <nav class="admin-menu">

                    <ul>

                        <li><a href="/admin">Dashboard</a></li>
                        <li><a href="/admin/posts">Posts</a></li>
                        <li><a href="/admin/media">Media</a></li>
                        <li><a href="/admin/users">Users</a></li>
                        <li><a href="/admin/settings">Settings</a></li>

                    </ul>

                </nav>

            </section>