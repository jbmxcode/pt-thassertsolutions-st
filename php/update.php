<?php 
include_once( 'layout/template.php' ); 
template_header( 'Crud - Update User', 'update' ); 

if( !isset( $_SESSION['user'] ) ):
    header( 'Location: index.php' );
    exit();
endif;

if( isset( $_POST['btnUpdate'] ) ) :
    update( 
        $_POST['fname'], 
        $_POST['lname'], 
        $_POST['phone'], 
        $_POST['address'],
        $_POST['id']
    );
endif;

if( isset( $_POST['btnUpdateAdmin'] ) ) :
    update( 
        $_POST['fname'], 
        $_POST['lname'], 
        $_POST['password'], 
        $_POST['email'],
        $_POST['id']
    );
endif;

$user = ( isset( $_GET['id'] ) ) ? selectSingle( $_GET['id'] ) : false;
$adminUser = ( isset( $_GET['id'] ) ) ? selectSingle( $_GET['id'] ) : false;
?>

<section class="content module-update">
    <div class="content-column">
        <div class="content-column__inner">
            <h1 class="page-title"><a ref="users.php">Crud</a></h1>

            <div class="content-text">
                <h3>Update user</h3>
            </div>
        </div>
    </div>

    <div class="content-column">
        <div class="content-column__inner">
            <div class="content-links">
                <a href="add.php" class="action action-add">
                    Add User
                    <svg width="28" height="28" xmlns="http://www.w3.org/2000/svg"><path d="M14 .875C21.248.875 27.125 6.752 27.125 14S21.248 27.125 14 27.125.875 21.248.875 14 6.752.875 14 .875zM8.375 14.703c0 .129.105.235.234.235h4.454v4.453c0 .129.105.234.234.234h1.406a.235.235 0 00.235-.234v-4.453h4.453a.235.235 0 00.234-.235v-1.406a.235.235 0 00-.234-.235h-4.453V8.61a.235.235 0 00-.235-.234h-1.406a.235.235 0 00-.235.234v4.454H8.61a.235.235 0 00-.234.234v1.406z"/></svg>
                </a>
            </div>

            <div class="content-body">
                <div class="content-body__inner">
                    <?php if ($user != false) { ?>
                    <form method="post" class="form form-update">
                        <h4>In ornare quam viverra orci sagittis eu volutpat</h4>

                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="number" name="id_card" id="id_card" value="<?php echo $user['id_card'] ?>" disabled class="form-input form-input-disabled">
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="text" name="fname" id="fname" value="<?php echo $user['fname'] ?>" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" id="lname" value="<?php echo $user['lname'] ?>" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" value="<?php echo $user['phone'] ?>" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="text" name="address" id="address" value="<?php echo $user['address'] ?>" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group action-links">
                                <button name="btnUpdate" class="action action-primary">Update User</button>
                                <a href="users.php" class="action action-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <?php } elseif($adminUser != false) { ?>
                    <form method="post" class="form form-update">
                        <h4>admin In ornare quam viverra orci sagittis eu volutpat</h4>

                        <input type="hidden" name="id" value="<?php echo $adminUser['id'] ?>">

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="number" name="id_card" id="id_card" value="<?php echo $adminUser['id'] ?>" disabled class="form-input form-input-disabled">
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="text" name="fname" id="fname" value="<?php echo $adminUser['fname'] ?>" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" id="lname" value="<?php echo $adminUser['lname'] ?>" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="password" id="password" value="<?php echo $adminUser['password'] ?>" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="email" name="email" id="email" value="<?php echo $adminUser['email'] ?>" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group action-links">
                                <button name="btnUpdateAdmin" class="action action-primary">Update Admin</button>
                                <a href="users.php" class="action action-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <?php } else {
                        echo '<div class="message">
                        User is not set. Try again</br>
                        <a href="users.php" class="action action-primary">Return</a>
                        </div>';
                    }
                    ?>
                </div>
            </div>                    
        </div>                    
    </div>                    
</section> 

<?php template_footer(); 