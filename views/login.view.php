<?php include "./partials/header.partial.php"; ?>

<h2>Login to your account</h2>

<?php

if ( isset( $errors ) ) : include "./partials/ui/error-msg.partial.php"; endif;

if ( isset( $user ) ) { ?>

    <p>You are already logged in as <?= $user->username; ?></p>
    <?php

} else {

    include "./partials/forms/login-form.partial.php";

}

include "./partials/footer.partial.php";
