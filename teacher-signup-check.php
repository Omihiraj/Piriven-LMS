<?php require 'conn.php'; ?>
<?php

$errors = array();
if (isset($_POST['id'])) {
    if (!isset($_POST['id']) || strlen(trim($_POST['id'])) < 1) {
        $errors[] = "Idis Not Set";
    }
    if (!isset($_POST['name']) || strlen(trim($_POST['name'])) < 1) {
        $errors[] = "Name Not Set";
    }
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = "Email is Not Set";
    }
    if (!isset($_POST['contact-no']) || strlen(trim($_POST['contact-no'])) < 1) {
        $errors[] = "Contact No is Not Set";
    }
    if (!isset($_POST['psw']) || strlen(trim($_POST['psw'])) < 1) {
        $errors[] = "Password is Not Set";
    }
    if (!isset($_POST['psw-repeat']) || strlen(trim($_POST['psw-repeat'])) < 1) {
        $errors[] = "Repeat Password is Not Set";
    }
    
    $id                 = mysqli_real_escape_string($conn, $_POST['id']);
    $name            = mysqli_real_escape_string($conn, $_POST['name']);
    $email            = mysqli_real_escape_string($conn, $_POST['email']);
    $contactNo     = mysqli_real_escape_string($conn, $_POST['contact-no']);
    $pass              = mysqli_real_escape_string($conn, $_POST['psw']);
    $rPass              = mysqli_real_escape_string($conn, $_POST['psw-repeat']);

    $pass_match  = false;
 
    if ($pass == $rPass) {
        $pass_match = true;
    } else {
        $errors[] = "Passwords are Not Matched";
    }
    if (empty($errors) ){
        $sql       = "INSERT INTO teacher (t_id,t_name,t_email,t_contact,t_password) VALUES('$id','$name','$email','$contactNo','$pass')";
        $query   =  mysqli_query($conn,$sql);
        
        if($query){
            echo"succes";
        }
        else{
            echo"Your Registration Unsuccesfully";
        }
    }
    else{
        echo"Please Fill All Fields";
    }

}

?>