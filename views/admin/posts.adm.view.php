<?php

include "./partials/admin/header.adm.partial.php";

include "./partials/admin/admin-bar.partial.php"; ?>

<section class="admin-page">

    <h2><?= $pageTitle; ?></h2>

    <hr>

    <nav class="admin-page-nav">

        <ul>

            <li><a href="/admin/posts"><img src="/assets/imgs/notes.svg"> List Posts</a></li>
            <li><a href="/admin/posts/add-new"><img src="/assets/imgs/ballpoint-pen.svg"> Add New Post</a></li>

        </ul>

    </nav>

    <section class="admin-list-posts">

        <?php

        $posts = $database->getAllPosts();

        foreach ( $posts as $post ) {

            $post->posted_on = date( "F jS, Y", strtotime( $post->posted_on ) );

            ?>

            <div class="admin-post-preview">

                <div>

                    <h3 class="admin-post-preview-title"><a href="/admin/posts/edit-post/<?= $post->uri; ?>"><?= $post->title; ?></a></h3>

                    <p>Posted on <?= $post->posted_on; ?> by <strong><?= $post->author; ?></strong></p>

                    <p class="admin-post-preview-categories">

                        <?php

                        $categories = unserialize( $post->categories );

                        foreach ( $categories as $category ) { ?>

                            <a href="/category/<?= $category; ?>"><?= $category; ?></a>
                            <?php

                        } ?>

                    </p>

                    <p style="margin-top: .75rem; display: grid; grid-template-columns: 1fr 1fr 1fr;">

                        <a href="/admin/posts/edit-post/<?= $post->uri; ?>" class="admin-list-post-button admin-edit-post-button"><img src="/assets/imgs/pencil-edit-button.svg"> Edit Post</a>
                        <a href="/post/<?= $post->uri; ?>" class="admin-list-post-button admin-view-post-button"><img src="/assets/imgs/eye.svg"> View Post</a>
                        <a href="/admin/posts/delete-post/<?= $post->uri; ?>" class="admin-list-post-button admin-delete-post-button"><img src="/assets/imgs/delete.svg"> Delete Post</a>


                    </p>

                </div>

                <div>

                    <div style="width: 200px; height: 150px; background-image: url( '/content/uploads/<?= $post->image; ?>' ); background-size: cover; background-repeat: no-repeat;"></div>

                </div>

            </div>

            <hr>

            <?php

        }

        ?>

    </section>

</section>

<?php include "./partials/admin/footer.adm.partial.php";
