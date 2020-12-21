<?php 
include_once( 'template.php' ); 
template_header( 'Crud - Add User', 'update' ); 

if( !isset( $_SESSION['user'] ) ):
    header( 'Location: index' );
    exit();
endif;

if( isset( $_POST['btnInsert'] ) ) :
    insert(
        $_POST['id_card'], 
        $_POST['fname'], 
        $_POST['lname'], 
        $_POST['phone'], 
        $_POST['address']
    );
endif;
?>    
<section class="content module-add">
    <div class="content-column">
        <div class="content-column__inner">
            <h1 class="page-title"><a ref="users.php">Crud</a></h1>

            <div class="content-text">
                <h3>Add user</h3>
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
                    <form method="post" class="form form-update">
                        <h4>In ornare quam viverra orci sagittis eu volutpat</h4>

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="number" name="id_card" id="id_card" placeholder="ID Card" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="text" name="fname" id="fname" placeholder="First Name" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" placeholder="Phone" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group">
                                <input type="text" name="address" id="address" placeholder="Address" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-wrap">
                            <div class="form-group action-links">
                                <button name="btnInsert" class="action action-primary">Add User</button>
                                <a href="users" class="action action-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                    
        </div>                    
    </div>                    
</section> 

<?php template_footer(); 