<?php include "./partials/header.partial.php"; ?>

    <section class="post">

        <div class="post-image">

            <img src="/content/uploads/<?= $post->image; ?>">

        </div>

        <h1><?= $post->title; ?></h1>

        <p>Posted by <?= $post->author; ?> on <?= $post->posted_on; ?></p>

        <div class="blog-post-content">

            <?= $post->content; ?>

        </div>

    </section>

<?php

include "./partials/footer.partial.php";
