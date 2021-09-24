<?php require '../conn.php'; ?>
<?php

$errors = array();
if (isset($_POST['email'])) {
    
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = "Email is Not Set";
    }
    
    if (!isset($_POST['psw']) || strlen(trim($_POST['psw'])) < 1) {
        $errors[] = "Password is Not Set";
    }
    
    
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $pass  = mysqli_real_escape_string($conn, $_POST['psw']);

    $email = "amal@gmail.com";
    $pass = "MnbV@0987";
    

    
    if (empty($errors) ){
        $sql       = "SELECT * FROM admin WHERE email = '$email' AND pass = '$pass'";
        $query     =  mysqli_query($conn,$sql);
        
        if($query){
            if(mysqli_num_rows($query)==1){
                echo"succes";
            }
            
        }
        else{
            echo"email or password incorrect";
        }
    }
    else{
        echo"Please Fill All Fields";
    }

}

?>