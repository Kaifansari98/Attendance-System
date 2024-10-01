<?php 
session_start();
include 'db.php';

$classname = $_POST['classname'];
$classteacher = $_POST['classteacher'];
$studentlimit = $_POST['studentlimit'];

//checking fields are not empty
if(!empty($classname) && !empty($classteacher) && !empty($studentlimit)){
    $sql = mysqli_query($conn, "SELECT class_teacher FROM classes WHERE class_teacher = '{$classteacher}'");
    if(mysqli_num_rows($sql) > 0){
        echo 'This Class Teacher Already Exist!';
    }
    else{
        $sql1 = mysqli_query($conn, "INSERT INTO classes (class_name,class_teacher,class_limit) VALUES ('{$classname}','{$classteacher}','{$studentlimit}')");
    if($sql1){
        echo "success";
    }
    else{
        echo "something went wrong!";
    }
}
}
else{
    echo "All Fields are Required";
}



?>