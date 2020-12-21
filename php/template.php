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
    <header id="site_header" class="site-header">
        <div class="content-links">
            <a href="logout.php">
                Logout
                <svg width="28" height="28" xmlns="http://www.w3.org/2000/svg"><path d="M14 28C6.268 28 0 21.732 0 14S6.268 0 14 0s14 6.268 14 14-6.268 14-14 14zm7-8.4l7-5.6-7-5.6v4.2H9.8v2.8H21v4.2z"/></svg>
            </a>
        </div>
    </header>
    <main id="content_main" class="site-content" aria-label="Main Site Content" tabindex="-1">
        <div class="site-content__row">
            <div class="site-content__row--inner">  
EOT;
}
function template_footer() {
            if( isset( $_SESSION['message'] ) ):
                echo '<div class="alert alert-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['msg'] . '</div>';
                unset( $_SESSION['message'] );
            endif;
echo <<<EOT
            </div>
        </div>
    </main>
    <script src="../dist/app.js"></script>
</body>
</html>
EOT;
}