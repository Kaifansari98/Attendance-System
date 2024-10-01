<?php 
    session_start();
    include 'db.php';

    $studentid = $_POST['studentid'];

    if(!empty($studentid)){
        
        if (str_contains($studentid , 'Student')){
            $studentid;
        }
        else{
            $studentid = 'Student'.$studentid;
        }
        $sql = mysqli_query($conn, "SELECT * FROM students WHERE student_id = '{$studentid}'");
        if(mysqli_num_rows($sql)){
            $row = mysqli_fetch_assoc($sql);
            if($row){
            $_SESSION['studentid'] = $row['student_id'];
            echo "success";
        }
        else{
            echo "Something went wrong";

        }
        }
    else{
            echo "Wrong Student Id";
    }
    }
    else{
        echo "Enter Student Id";
    }

?>