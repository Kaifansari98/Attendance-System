<?php 
    session_start();
    include 'db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){

        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql)){
            $row = mysqli_fetch_assoc($sql);
            if($row){
            $_SESSION['email'] = $row['email'];
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