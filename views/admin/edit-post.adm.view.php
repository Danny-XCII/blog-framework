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

        var_dump( strlen( $post->content ) );

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

                        <td>

                            <?php

                            $cat = 0;

                            foreach ( $categories as $category ) : ?>

                                <span class="post-category-label"><?= $category->name; ?></span> <input type="checkbox" name="categories[]" value="<?= strtolower( $category->name ); ?>" <?= in_array( strtolower( $category->name ), $post->categories ) ? "checked" : "" ?>>
                                <?php

                                $cat .= 1;

                            endforeach; ?>

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

    <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.17.1/build/highlight.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var toolbarOptions = [

            [ { "header" : [ 1, 2, 3, 4, 5, 6, false ] } ],

            [ "bold", "italic", "underline" ],

            [ { "list" : "ordered" }, { "list" : "bullet" } ],

            [ "image", "code-block" ]

        ];

        var quill = new Quill( "#quill-editor", {

            modules: {
                syntax: true,
                toolbar: toolbarOptions
            },
            theme: "snow"

        });

        let form = document.querySelector( "#add-post-form" );
        let amendedContent = false;
        let hiddenContent = document.querySelector( "#hidden-content" );
        let editor = document.querySelector( "#quill-editor" );

        let existingContent = <?= json_encode( $post->content ); ?>;

        editor.children[ 0 ].innerHTML = existingContent;

        form.addEventListener( "submit", function ( e ) {

            if ( !amendedContent ) {

                e.preventDefault();

            } else {

                return; // probably not necessary, just to make double sure the code below doesn't run twice :)

            }

            let html = editor.children[ 0 ].innerHTML;

            hiddenContent.value = html;
            amendedContent = true;

            form.submit();

        });
    </script>

<?php include "./partials/admin/footer.adm.partial.php"; ?>