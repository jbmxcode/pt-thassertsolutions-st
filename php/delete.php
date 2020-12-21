<?php
require_once( 'includes/functions.php' );

if( !isset( $_SESSION['user'] ) ):
    header( 'Location: index.php' );
    exit();
endif;

$user = ( isset( $_GET['id'] ) ) ? delete( $_GET['id'] ) : exit();