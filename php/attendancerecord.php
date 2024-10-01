<?php 
session_start();
include 'db.php';

// $att_class = $_GET['selectclass'];
$att_date = $_POST['attendancedate'];
$att_class = $_POST['selectclass'];
// $std_name = $_POST['std_name'];
// $att_stdID = $_POST['std_id'];


$attendance_data = array(
    'att_class'=>$att_class,
    'att_date'=>$att_date,
    'std_name'=>$_POST['std_name'],
    'attend'=>$_POST['attend'],
    'att_stdID'=>$_POST['std_id']
);
// $attendance_data = array(
//     'att_class'=>$att_class,
//     'att_date'=>$att_date,
//     'std_name'=>$std_name,
//     'att_stdID'=>$att_stdID
// );
foreach ($attendance_data as $key => $value){
    $k[] = $key;
    $v[] = "'".$value."'";
}

$k = implode(",",$k);
$v = implode(",",$v);


    $sql = mysqli_query($conn, "SELECT att_stdID FROM student_attendance WHERE att_date = '{$att_date}' AND att_class = '{$att_class}'");
    if(mysqli_num_rows($sql) > 0){
        // update query
        echo 'Update Query';
    }
    else{
        // $sql1 = mysqli_query($conn, "INSERT INTO student_attendance (att_class,att_date,std_name,att_stdID) VALUES ('{$att_class}','{$att_date}','{$std_name}','{$att_stdID}')");
        $sql1 = mysqli_query($conn, "INSERT INTO student_attendance ($k) VALUES ($v)");
    if($sql1){
        echo "success";
    }
    else{
        echo "something went wrong!";
    }
}




?>