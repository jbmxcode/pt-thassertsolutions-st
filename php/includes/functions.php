<?php
require_once('db.php');
session_start();

/**
 * Select Users
 */
function selectAll() {
    global $mysqli;
    $data = array();
    $stmt = $mysqli->prepare( 'SELECT id, id_card, fname, lname, phone, address FROM users' );
    $stmt->execute();
    $result = $stmt->get_result();

    if($stmt->affected_rows === 0):
        $_SESSION['message'] = array( 'type' => 'danger', 'msg'=> 'There are currently no records in the database' ); 
    else: 
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    endif;

    $stmt->close();
    return $data;
}

/**
 * Select Single User
 */
function selectSingle( $id = null ) {
    global $mysqli;
    $stmt = $mysqli->prepare( 'SELECT id, id_card, fname, lname, phone, address FROM users WHERE id = ?' );
    $stmt->bind_param( 'i', $id );
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/**
 * Insert User
 */
function insert( $id_card = NULL, $fname = NULL, $lname = NULL, $phone = NULL, $address = NULL ) {
    global $mysqli;
    $stmt = $mysqli->prepare( 'INSERT INTO users ( id_card, fname, lname, phone, address ) VALUES ( ?, ?, ?, ?, ? )' );
    $stmt->bind_param( 'sssss', $id_card, $fname, $lname, $phone, $address );
    $stmt->execute();    
    if( $stmt->affected_rows === 0 ):
        $_SESSION['message'] = array( 'type'=>'danger', 'msg'=>'You did not make any changes' );
    else:
        $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'Successfully added a new user' );
    endif;
    $stmt->close();
    header( 'Location: users.php' );
    // header('Location: update.php?id=' . $mysqli->insert_id);
    exit();
}

/**
 * Update User
 */
function update( $fname = NULL, $lname = NULL, $phone = NULL, $address = NULL, $id ) {
    global $mysqli;
    $stmt = $mysqli->prepare( 'UPDATE users SET fname = ?, lname = ?, phone = ?, address = ? WHERE id = ?' );
    $stmt->bind_param( 'ssssi', $fname, $lname, $phone, $address, $id );
    $stmt->execute();   
    if( $stmt->affected_rows === 0 ):
        $_SESSION['message'] = array( 'type'=>'danger', 'msg'=>'You did not make any changes' );
    else:
        $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'Successfully update the selected user' );
    endif;
    $stmt->close();
    header( 'Location: users.php' );
}

/**
 * Delete User
 */
function delete( $id ) {
    global $mysqli;
    $stmt = $mysqli->prepare( 'DELETE FROM users WHERE id = ?' );
    $stmt->bind_param('i', $id);
    $stmt->execute();   
    $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'Successfully deleted the selected user' );
    $stmt->close();
    header( 'Location: users.php' );
}

/**
 * Select Single Admin
 */
function selectSingleAdmin($id = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM admin WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/**
 * Create Admin
 */
function createAdmin($email = NULL, $password = NULL, $fname = NULL, $lname = NULL) {
    global $mysqli;

    $stmt = $mysqli->prepare( 'SELECT id, email FROM admin WHERE email = ?' );
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if( $result->num_rows !== 0 ):
        $_SESSION['message'] = array( 'type'=>'danger', 'msg'=>'Username you choose is taken. Please try again' );
    else:
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare( 'INSERT INTO admin ( email, password, fname, lname ) VALUES ( ?, ?, ?, ? )' );
        $stmt->bind_param( 'ssss', $email, $password, $fname, $lname );
        $stmt->execute();    
        $stmt->close();
        if( isset( $_SESSION['user'] ) ):
            $_SESSION['message'] = array( 'type'=>'danger', 'msg'=>'You did not make any changes' );
        else:
            $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'Successfully added a new user' );
        endif;
        header( 'Location: users.php' );
        exit();
    endif;
}

/**
 * Delete Admin
 */
function deleteAdmin( $id ) {
    global $mysqli;
    $stmt = $mysqli->prepare( 'DELETE FROM admin WHERE id = ?' );
    $stmt->bind_param('i', $id);
    $stmt->execute();   
    $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'Successfully deleted the selected admin' );
    $stmt->close();
    unset( $_SESSION['user'] );
    header( 'Location: index.php' );
}

/**
 * Update Admin
 */
function updateAdmin( $fname = NULL, $lname = NULL, $password = NULL, $email = NULL, $id ) {
    global $mysqli;    
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare( 'UPDATE admin SET fname = ?, lname = ?, password = ?, email = ? WHERE id = ?' );
    $stmt->bind_param( 'ssssi', $fname, $lname, $password, $email, $id );
    $stmt->execute();   
    if( $stmt->affected_rows === 0 ):
        $_SESSION['message'] = array( 'type'=>'danger', 'msg'=>'You did not make any changes' );
    else:
        $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'Successfully update the selected admin' );
    endif;
    $stmt->close();
    // header( 'Location: users.php' );
}

/**
 * Login
 */
function login( $email = NULL, $password = NULL ) {
    global $mysqli;
    // $password = password_hash($password, PASSWORD_DEFAULT);
    // echo '<span style="color: white !important; position: fixed; bottom: 0; left: 0;">' . $password . '</span>';
    $stmt = $mysqli->prepare( 'SELECT id, email, password FROM admin WHERE email = ?' );
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if( $result->num_rows === 0 ):
        $_SESSION['message'] = array( 'type'=>'danger', 'msg'=>'Your account has not been enabled' );
    else:
        while( $row = $result->fetch_assoc() ):  
            $hash = $row['password'];
            if( password_verify( $password, $hash ) ):        
                $_SESSION['user']['id'] = $row['id'];
                $_SESSION['user']['email'] = $row['email'];
                header( 'Location: users.php' );
            else:
                $_SESSION['message'] = array( 'type'=>'danger', 'msg'=>'Your username or password is incorrect. Please try again' );
            endif;
        endwhile;
    endif;
    $stmt->close();
}

/**
 * Logout
 */
function logout() {
    unset( $_SESSION['user'] );
    $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'You have been succesfully logged out' );
    header( 'Location: index.php' );
}
