<?php

include "./partials/admin/header.adm.partial.php";

include "./partials/admin/admin-bar.partial.php"; ?>

<section class="admin-page">

    <h2>Welcome back, <?= $user->username; ?></h2>

    <hr>

    <nav class="admin-page-nav dash-nav">

        <ul>

            <li><a href="/admin/posts"><img src="/assets/imgs/notes.svg"> List Posts</a></li>
            <li><a href="/admin/posts/add-new"><img src="/assets/imgs/ballpoint-pen.svg"> Add New Post</a></li>
            <li><a href="/admin/users"><img src="/assets/imgs/group.svg"> List Users</a></li>
            <li><a href="#"><img src="/assets/imgs/add-user.svg"> Add User</a></li>

        </ul>

    </nav>

</section>

<?php include "./partials/admin/footer.adm.partial.php";