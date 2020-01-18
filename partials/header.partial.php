<!doctype html>
<html lang="en-gb">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

        <meta name="description" content="<?= $pageDescription; ?>">

        <title><?= $app->name; ?> | <?= $pageTitle; ?></title>

        <link rel="stylesheet" type="text/css" href="/assets/css/base.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/admin-bar.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.17.1/build/styles/default.min.css">

        <!-- temp -->
        <link rel="stylesheet" type="text/css" href="/assets/css/temp.css">

    </head>

    <body>

        <?php

        if ( isset( $user ) && $user->role == 1 ) {

            include "./partials/admin/admin-bar.partial.php"; ?>

            <style>
                header {
                    padding-top: 18px;
                }
            </style>
            <?php

        }

        ?>

        <header>

            <div class="header-left">

                <h1><a href="/"><?= $app->name; ?></a></h1>

                <p><?= $app->tagline; ?></p>

            </div>

            <div class="header-right">

                <nav>

                    <ul>

                        <li><a href="/about">About</a></li>

                        <?php

                        $menuItems = $database->getAllCategories();

                        foreach ( $menuItems as $menuItem ) : ?>

                            <li><a href="/category/<?= strtolower( $menuItem->name ); ?>"><?= $menuItem->name; ?></a></li>

                        <?php endforeach; ?>

                    </ul>

                </nav>

            </div>

        </header>

        <main>