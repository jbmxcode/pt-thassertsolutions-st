<?php
require_once('db.php');
session_start();

/**
 * Select statement
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
 * Select single statement
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
 * Insert statement
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
    header( 'Location: users' );
    // header('Location: update.php?id=' . $mysqli->insert_id);
    exit();
}

/**
 * Update statement
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
    header( 'Location: users' );
}

/**
 * Delete statement
 */
function delete( $id ) {
    global $mysqli;
    $stmt = $mysqli->prepare( 'DELETE FROM users WHERE id = ?' );
    $stmt->bind_param('i', $id);
    $stmt->execute();   
    $_SESSION['message'] = array( 'type'=>'success', 'msg'=>'Successfully deleted the selected user' );
    $stmt->close();
    header( 'Location: users' );
}

/**
 * Login
 */
function login( $email = NULL, $password = NULL ) {
    global $mysqli;
    // $password = password_hash($password, PASSWORD_DEFAULT);
    // echo $password;
    $stmt = $mysqli->prepare( 'SELECT * FROM login WHERE email = ?' );
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
                header( 'Location: users' );
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
    header( 'Location: index' );
}
