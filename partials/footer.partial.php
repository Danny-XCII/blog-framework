        </main>

        <footer>

            <div class="footer-top">

                <div class="footer-widget" id="footer-menu">

                    <ul>

                        <?php if ( isset( $user ) ) : ?>

                            <li><a href="/logout">Logout</a></li>

                        <?php else : ?>

                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>

                        <?php endif; ?>

                    </ul>

                </div>

            </div>

            <div id="footer-info">

                <p>&copy; Copyright 2019 - <?= date( "Y" ) . " " . $app->name; ?> | Design and development by <?= $app->name; ?>.</p>

            </div>

        </footer>

    </body>

</html>