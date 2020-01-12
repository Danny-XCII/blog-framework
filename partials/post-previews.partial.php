<section class="post-previews">

    <?php

    if ( !empty( $posts ) ) :

        foreach ( $posts as $post ) :

            $post->posted_on = date( "F jS, Y", strtotime( $post->posted_on ) );
            $post->categories = isset( $noSerialize ) ? $post->categories : unserialize( $post->categories );

            ?>

            <div class="post-preview">

                <a href="/post/<?= $post->uri; ?>"><img src="/content/uploads/<?= $post->image; ?>"></a>

                <h2><a href="/post/<?= $post->uri; ?>"><?= $post->title; ?></a></h2>

                <p>Posted on <?= $post->posted_on; ?> by <?= $post->author; ?></p>

                <p>

                    <?php foreach ( $post->categories as $category ) : ?>

                        <a href="/category/<?= $category; ?>"><?= ucwords( $category ); ?></a>

                    <?php endforeach; ?>

                </p>

            </div>

        <?php endforeach; ?>

    <?php else : ?>

        <div class="no-posts">

            <h3>There are no posts to display.</h3>

        </div>

    <?php endif; ?>

</section>