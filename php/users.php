<?php 
include_once('template.php'); 
template_header('Crud - All Users', 'users');

if(!isset($_SESSION['user'])):
    header('Location: index');
    exit();
endif;

$allUsers = selectAll();
?>  

<section class="content module-users">
    <div class="content-column">
        <div class="content-column__inner">
            <h1 class="page-title"><a ref="users.php">Crud</a></h1>

            <div class="content-text">
                <h3>All users</h3>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th><strong>First Name</strong></th>
                                <th><strong>Last Name</strong></th>
                                <th>Phone</th>
                                <th class="th-address">Address</th>
                                <th><span class="hidden">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($allUsers as $user) :
                                    echo '
                                    <tr>
                                        <td>' . $user['id_card'] . '</td>
                                        <td><strong>' . $user['fname'] . '</strong></td>
                                        <td><strong>' . $user['lname'] . '</strong></td>
                                        <td>' . $user['phone'] . '</td>
                                        <td>' . $user['address'] . '</td>
                                        <td>
                                            <div class="content-links">
                                                <button class="action action-dots">
                                                    <svg width="20" height="5" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse rx="2.312" ry="2.018" transform="matrix(1 0 0 -1 2.312 2.77)"/><ellipse rx="2.312" ry="2.018" transform="matrix(1 0 0 -1 9.505 2.77)"/><ellipse rx="2.312" ry="2.018" transform="matrix(1 0 0 -1 16.698 2.77)"/></svg>
                                                    <span class="hidden">Options</span>
                                                </button>
                                                <div class="content-links__inner">
                                                    <a href="update.php?id=' . $user['id'] . '" class="action action-update">
                                                        <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M8.699.827l-4.28 4.278.005 2.478 2.472-.005 4.277-4.277A5.833 5.833 0 118.699.826zM10.95.226l.824.824-5.362 5.362-.824.002-.001-.826L10.95.225z"/></svg>
                                                        Update
                                                    </a>
                                                    <a href="delete.php?id=' . $user['id'] . '"" class="action action-delete">
                                                        <svg width="10" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M.714 10.667C.714 11.4 1.357 12 2.143 12h5.714c.786 0 1.429-.6 1.429-1.333v-8H.714v8zM2.471 5.92l1.008-.94L5 6.393 6.514 4.98l1.007.94-1.514 1.413 1.514 1.414-1.007.94L5 8.273 3.486 9.687l-1.007-.94 1.514-1.414L2.47 5.92zM7.5.667L6.786 0H3.214L2.5.667H0V2h10V.667H7.5z"/></svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    ';
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>                    
        </div>                    
    </div>                    
</section> 

<?php template_footer(); 