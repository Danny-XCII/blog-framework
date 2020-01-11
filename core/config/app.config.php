<?php

/*
 * I want to rewrite this to pull settings from the database
 * and make use of the settings page in the admin panel.
 */

$app = new stdClass();

/*
 * Site Info
 */
$app->name = "My Website";
$app->tagline = "My website tagline";

/*
 * User Settings
 *
 * Settings concerning accounts, login and registration.
 */
$app->registrationEnabled = true; // not yet in use