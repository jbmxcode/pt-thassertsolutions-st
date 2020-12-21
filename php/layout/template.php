<?php
require_once( 'includes/functions.php' );

function template_header($title, $class) {
echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$title</title>
    <link rel="stylesheet" href="../dist/app.css">
</head>
<body class="$class">     
EOT;
}
include_once( 'header.php' );
function template_footer() {
            if( isset( $_SESSION['message'] ) ):
                echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['msg'] . '</div>';
                unset( $_SESSION['message'] );
            endif;
include_once( 'footer.php' );
echo <<<EOT
<script src="../dist/app.js"></script>
</body>
</html>
EOT;
}