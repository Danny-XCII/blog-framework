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

        <?php

        if ( Request::method() == "POST" && isset( $errors ) ) {

            include "./partials/ui/error-msg.partial.php";

        }

        ?>

        <section class="admin-add-post">

            <form action="/admin/posts/edit-post" method="post" enctype="multipart/form-data" id="add-post-form">

                <table>

                    <tr>

                        <td><input type="text" name="title" id="title" value="<?= $post->title; ?>"></td>

                    </tr>

                    <tr>

                        <td><input type="text" name="uri" placeholder="Post URL" id="uri" value="<?= $post->uri; ?>"></td>

                    </tr>

                    <tr>

                        <td><textarea name="meta_description" placeholder="Meta description"><?= $post->meta_description; ?></textarea></td>

                    </tr>

                    <tr>

                        <td>

                            <?php foreach ( $categories as $category ) : ?>

                                <span class="post-category-label"><?= $category->name; ?></span> <input type="checkbox" name="categories[]" value="<?= strtolower( $category->name ); ?>" <?= in_array( strtolower( $category->name ), $post->categories ) ? "checked" : "" ?>>

                            <?php endforeach; ?>

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <div id="quill-editor">

                                <p>Hello World!</p>
                                <p>Some initial <strong>bold</strong> text</p>
                                <p><br></p>

                            </div>

                            <input type="hidden" id="hidden-content" name="content">
                            <input type="hidden" name="current_uri" value="<?= $post->uri; ?>">

                        </td>

                    </tr>

                    <tr class="admin-form-submit-row">

                        <td><input type="submit" value="Update Post"></td>

                    </tr>

                </table>

            </form>

        </section>

    </section>

    <script>
        let existingContent = <?= json_encode( $post->content ); ?>;
        editor.children[ 0 ].innerHTML = existingContent;
    </script>

<?php include "./partials/admin/footer.adm.partial.php"; ?>