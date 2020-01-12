<?php

require_once "./core/init.php";

Router::create( "./core/router/routes.php" )->direct( $uri, Request::method() );
