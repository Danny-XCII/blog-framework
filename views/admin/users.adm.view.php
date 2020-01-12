<?php

include "./partials/admin/header.adm.partial.php";

include "./partials/admin/admin-bar.partial.php"; ?>

<section class="admin-page">

    <h2><?= $pageTitle; ?></h2>

    <hr>

    <nav class="admin-page-nav">

        <ul>

            <li><a href="/admin/users"><img src="/assets/imgs/group.svg"> List Users</a></li>
            <li><a href="#"><img src="/assets/imgs/add-user.svg"> Add User</a></li>

        </ul>

    </nav>

    <table class="admin-page-info-table">

        <tr>

            <td><strong>Username</strong></td>
            <td><strong>Email Address</strong></td>
            <td><strong>Role</strong></td>

        </tr>

        <?php foreach ( $users as $user ) : ?>

            <tr>

                <td><?= $user->username; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->role == 1 ? "Administrator" : "Subscriber"; ?></td>

            </tr>

        <?php endforeach; ?>

    </table>

</section>
