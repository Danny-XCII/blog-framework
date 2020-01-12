<?php

include "./partials/header.partial.php";

if ( $post ) { ?>

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

} else {

    include "/views/404.view.php";

}

include "./partials/footer.partial.php";
