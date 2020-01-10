<div class="admin-bar">

    <div class="admin-bar-inner">

        <p>Logged in as <?= $user->username; ?></p>

        <span>

            <?php if ( isset( $adminPage ) && $adminPage ) : ?>

                <a href="/">Return to site</a>

            <?php else : ?>

                <a href="/admin">Admin Panel</a>

            <?php endif; ?>

            <a href="logout"><img src="/assets/imgs/logout.svg"></a>

        </span>

    </div>

</div>