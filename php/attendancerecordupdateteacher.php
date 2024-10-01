<?php 

include 'db.php';
// $attendance_data = $_POST;
// var_dump($attendance_data);

$count = count($_POST['std_name']);

for($i = 0; $i < $count; $i++){
    $qry = "UPDATE teacher_attendance SET `attend` = '{$_POST['attend'][$i]}' WHERE `att_teacherUID` = '{$_POST['std_id'][$i]}' AND `att_date` = '{$_POST['attendancedate'][$i]}'";
    $success = $conn->query($qry);
}
if($success){
    echo "success";
}
else{
    echo mysqli_error($conn);
}
// foreach ($_POST['std_name'] as $i => $value ){
//     $sql = "INSERT INTO `student_attendance` (`att_class`,`att_date`,`std_name`,`attend`,`att_stdID`) VALUES ('{$_POST['selectclass'][$i]}','{$_POST['attendancedate'][$i]}','{$_POST['std_name'][$i]}','{$_POST['attend'][$i]}','{$_POST['std_id'][$i]}');";
//     $conn->query($sql);
//     echo "success";
// }

?>