<?php 
include_once( 'layout/template.php' );   
template_header('Crud - Register', 'home'); 

if( isset($_SESSION['user'] ) ):
    header('Location: users.php');
    exit();
endif;

if( isset( $_POST['btnRegister'] ) ) :
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $fname = $_POST['fname']; 
    $lname = $_POST['lname']; 
    createAdmin($email, $password, $fname, $lname);
endif;

?>

<section class="content module-login">
    <div class="content-column">
        <div class="content-column__inner">
            <h1 class="page-title"><a ref="users.php">Crud</a></h1>

            <div class="content-text">
                <h3>Lorem ipsum dolor sit amet</h3>
                <p>In ornare quam viverra orci sagittis eu volutpat odio. Ac placerat vestibulum lectus mauris.</p>
            </div>
        </div>
    </div>

    <div class="content-column">
        <div class="content-column__inner">
            <div class="content-body">
                <h3>Log in</h3>
                <form action="" method="post" class="form form-login form-dark">
                    <div class="form-wrap">
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-input">
                        </div>
                    </div>

                    <div class="form-wrap">
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-input">
                        </div>
                    </div>

                    <div class="form-wrap">
                        <div class="form-group">
                            <input type="text" name="fname" id="fname" placeholder="First Name" class="form-input">
                        </div>
                    </div>

                    <div class="form-wrap">
                        <div class="form-group">
                            <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-input">
                        </div>
                    </div>

                    <div class="form-wrap">
                        <div class="form-group">
                            <button name="btnRegister" class="action action-primary">Register</button>
                        </div>
                    </div>
                </form>
                
                <p>Already have an account? <a href="index.php">Login in</a></p>
            </div>
        </div>
    </div>                    
</section> 

<?php template_footer(); 