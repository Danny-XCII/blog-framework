<?php

if ( !isset( $user ) ) {

    header( "Location:/" );

} else {

    if ( $user->role != 1 ) {

        header( "Location:/" );

    }

}