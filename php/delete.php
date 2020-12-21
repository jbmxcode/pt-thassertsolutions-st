<?php
require_once( 'includes/functions.php' );

if( !isset( $_SESSION['user'] ) ):
    header( 'Location: index' );
    exit();
endif;

$user = ( isset( $_GET['id'] ) ) ? delete( $_GET['id'] ) : exit();