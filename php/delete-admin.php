<?php
require_once( 'includes/functions.php' );

if( !isset( $_SESSION['user'] ) ):
    header( 'Location: index.php' );
    exit();
endif;

$adminUser = ( isset( $_GET['id'] ) ) ? deleteAdmin( $_GET['id'] ) : exit();