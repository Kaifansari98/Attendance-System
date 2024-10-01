<?php 
include 'db.php';
if($_POST['Attendance_Attend'] != ''){
    //update attendance

    $sql = "UPDATE student_attendance SET  std_name = '".$_POST['Student_name']."', att_class = '".$_POST['Student_class']."',att_date = '".$_POST['Attendance_Attend']."' WHERE att_stdID = '".$_POST["Attendance_Id"]."'";
    mysqli_query($conn, $sql);
}
else{
    // insert attendance
    $sql = "INSERT INTO student_attendance (std_name, att_class, att_date, att_stdID) VALUES ('".$_POST['Student_name']."','".$_POST['Student_class']."','".$_POST['Attendance_Attend']."','".$_POST['Attendance_Id']."')";
    mysqli_query($conn, $sql);
    echo mysqli_insert_id($conn);
}
?>