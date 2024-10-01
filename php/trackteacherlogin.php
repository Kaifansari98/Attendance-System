<?php 
    session_start();
    include 'db.php';

    $email = $_POST['teacheremail'];
    $password = $_POST['teacherpassword'];

    if(!empty($email) && !empty($password)){

        $sql = mysqli_query($conn, "SELECT * FROM teachers WHERE teacher_email = '{$email}' AND teacher_password = '{$password}'");
        if(mysqli_num_rows($sql)){
            $row = mysqli_fetch_assoc($sql);
            if($row){
            $_SESSION['teacher_uid'] = $row['teacher_uid'];
            echo "success";
        }
        }
else{
        echo "Email or Password is Incorrect!";
}
    }
    else{
        echo "All fields are required";
    }

?>