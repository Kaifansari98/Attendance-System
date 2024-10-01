<?php 

include 'db.php';
$count = count($_POST['std_name']);
// students

    for($i = 0; $i < $count; $i++){
    $sql = "INSERT INTO `student_attendance` (`att_class`,`att_date`,`std_name`,`attend`,`att_stdID`) VALUES ('{$_POST['stdclass'][$i]}','{$_POST['attendancedate'][$i]}','{$_POST['std_name'][$i]}','{$_POST['attend'][$i]}','{$_POST['std_id'][$i]}');";
    $success = $conn->query($sql);
}
if($success){
    echo "success";
}
else{
    echo mysqli_error($conn);
}

?>