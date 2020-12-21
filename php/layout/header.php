<?php
if( isset($_SESSION['user'] ) ):
    $loggedInAdmin = selectSingleAdmin( $_SESSION['user']['id'] );
    $admin = $loggedInAdmin['fname'];
    $adminId = $loggedInAdmin['id'];
endif;
?>
<header id="site_header" class="site-header">
    <div class="content-links">
        <div class="content-links-column">
            <button class="action action-dots">
                <span><?php if( isset($_SESSION['user'] ) ) echo $admin ?></span>
                <svg width="20" height="5" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse rx="2.312" ry="2.018" transform="matrix(1 0 0 -1 2.312 2.77)"/><ellipse rx="2.312" ry="2.018" transform="matrix(1 0 0 -1 9.505 2.77)"/><ellipse rx="2.312" ry="2.018" transform="matrix(1 0 0 -1 16.698 2.77)"/></svg>
            </button>
            <div class="content-links__inner">
                <a href="update-admin.php?id=<?php if( isset($_SESSION['user'] ) ) echo $adminId ?>" class="action action-update">
                    <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M8.699.827l-4.28 4.278.005 2.478 2.472-.005 4.277-4.277A5.833 5.833 0 118.699.826zM10.95.226l.824.824-5.362 5.362-.824.002-.001-.826L10.95.225z"/></svg>
                    Update
                </a>
                <a href="delete-admin.php?id=<?php if( isset($_SESSION['user'] ) ) echo $adminId ?>" class="action action-delete">
                    <svg width="10" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M.714 10.667C.714 11.4 1.357 12 2.143 12h5.714c.786 0 1.429-.6 1.429-1.333v-8H.714v8zM2.471 5.92l1.008-.94L5 6.393 6.514 4.98l1.007.94-1.514 1.413 1.514 1.414-1.007.94L5 8.273 3.486 9.687l-1.007-.94 1.514-1.414L2.47 5.92zM7.5.667L6.786 0H3.214L2.5.667H0V2h10V.667H7.5z"/></svg>
                    Delete
                </a>
            </div>
        </div>
        <div class="content-links-column">
            <a href="logout.php">
                Logout
                <svg width="28" height="28" xmlns="http://www.w3.org/2000/svg"><path d="M14 28C6.268 28 0 21.732 0 14S6.268 0 14 0s14 6.268 14 14-6.268 14-14 14zm7-8.4l7-5.6-7-5.6v4.2H9.8v2.8H21v4.2z"/></svg>
            </a>
        </div>
    </div>
</header>
<main id="content_main" class="site-content" aria-label="Main Site Content" tabindex="-1">
    <div class="site-content__row">
        <div class="site-content__row--inner"> 