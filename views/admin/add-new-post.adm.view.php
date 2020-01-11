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

    <h2>Add a new post</h2>

    <?php

    if ( Request::method() == "POST" && isset( $errors ) ) {

        include "./partials/ui/error-msg.partial.php";

    }

    ?>

    <section class="admin-add-post">

        <form action="/admin/posts/add-new" method="post" enctype="multipart/form-data" id="add-post-form">

            <table>

                <tr>

                    <td><input type="text" name="title" placeholder="Enter your post title..." id="title"></td>

                </tr>

                <tr>

                    <td><input type="text" name="uri" placeholder="Post URL" id="uri"</td>

                </tr>

                <tr>

                    <td>

                        <?php

                        $cat = 0;

                        foreach ( $categories as $category ) : ?>

                            <span class="post-category-label"><?= $category->name; ?></span> <input type="checkbox" name="categories[]" value="<?= strtolower( $category->name ); ?>"<?= $cat === 0 ? "checked" : "" ; ?>>
                            <?php

                            $cat .= 1;

                        endforeach; ?>

                    </td>

                </tr>

                <tr>

                    <td><span style="margin-bottom: .25rem; display: block;">Post Image:</span> <input type="file" name="image" id="image"></td>

                </tr>

                <tr>

                    <td>

                        <div id="quill-editor">

                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>

                        </div>

                        <input type="hidden" id="hidden-content" name="content">

                    </td>

                </tr>

                <tr class="admin-form-submit-row">

                    <td><input type="submit" value="Post"></td>

                </tr>

            </table>

        </form>

    </section>

</section>

<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.17.1/build/highlight.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="/assets/js/rte.js"></script>

<script>
    let form = document.querySelector( "#add-post-form" );
    let amendedContent = false;
    let hiddenContent = document.querySelector( "#hidden-content" );

    form.addEventListener( "submit", function ( e ) {

        if ( !amendedContent ) {

            e.preventDefault();

        } else {

            return; // probably not necessary, just to make double sure the code below doesn't run twice :)

        }

        let editor = document.querySelector( "#quill-editor" );
        let html = editor.children[ 0 ].innerHTML;

        hiddenContent.value = html;
        amendedContent = true;

        form.submit();

    });
</script>

<?php include "./partials/admin/footer.adm.partial.php"; ?>