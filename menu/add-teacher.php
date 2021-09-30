<?php require '../../conn.php'; ?>
<?php

$errors = array();
if (isset($_POST['index'])) {



    if (!isset($_POST['index']) || strlen(trim($_POST['index'])) < 1) {
        $errors[] = "Index no is Not Set";
    }
    if (!isset($_POST['name']) || strlen(trim($_POST['name'])) < 1) {
        $errors[] = "Name Not Set";
    }
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = "Email is Not Set";
    }
    if (!isset($_POST['contact']) || strlen(trim($_POST['contact'])) < 1) {
        $errors[] = "Contact No is Not Set";
    }
    if (!isset($_POST['pass']) || strlen(trim($_POST['pass'])) < 1) {
        $errors[] = "Password is Not Set";
    }


    $index   = mysqli_real_escape_string($conn, $_POST["index"]);
    $name    = mysqli_real_escape_string($conn, $_POST["name"]);
    $email   = mysqli_real_escape_string($conn, $_POST["email"]);
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $pass    = mysqli_real_escape_string($conn, $_POST["pass"]);

    if (empty($errors)) {
        $sql = "INSERT INTO teacher(t_id,t_name,t_email,t_contact,t_password) VALUES('$index','$name','$email','$contact','$pass')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "$name Teacher Added Successfully";
        } else {
            echo "$name Teacher Added Unsuccessfully";
        }
    } else {
        echo "Please Fill All Fields";
    }
} else {
    echo "Please Fill All Fields";
}
