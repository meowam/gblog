<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

if (!empty($_POST)) {
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email ='" . $_POST['email']. "' AND password ='" . $password . "'";
    $result = mysqli_query($conn, $sql);
    $user = $result->fetch_assoc();
    if ($user) {
        $_SESSION["user_id"] = $user['id'];
        if (isset($_POST['remember-me'])) { 
            setcookie(
                'user_id',
                $user['id'],
                time() + 60 * 60 * 24 * 30,
                '/'
            );
        }  
        echo json_encode(array('success' => true));
      
    } else {

        $_SESSION["user_id"] = null; 
        setcookie(
            'user_id',  
            '', 
            0, 
            '/' 
        );  
        echo json_encode(array('success' => false));       
    }

}
