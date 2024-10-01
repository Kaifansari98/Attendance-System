<?php
session_start();
include 'php/db.php';
$teacher_uid = $_SESSION['teacher_uid'];
if(empty($teacher_uid)){
    header("Location: trackteacher.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Teacher</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="trackstd">
    <h1>Attendance Data</h1>
    <table>
        <thead>
            <tr>
                <td>Sr#</td>
                <td>Date</td>
                <td>Day</td>
                <td>Attendance</td>
            </tr>
        </thead>
        <tbody>
        <?php 
        $qry = mysqli_query($conn , "SELECT * FROM `teacher_attendance` WHERE `att_teacherUID` = '{$teacher_uid}' ORDER BY `att_date` ASC");
        $i = 0;
        while($trackteacher = mysqli_fetch_assoc($qry)){
            $day = date('l', strtotime($trackteacher['att_date']));
            ?>
        <tr>
            <td><?php echo ++$i; ?></td>
            <td><?php echo date("d-m-Y",strtotime($trackteacher['att_date'])); ?></td>
            <td><?php echo $day ?></td>
            <td style="text-transform:capitalize;"><?php echo $trackteacher['attend'] ?></td>
        </tr>
        <?php
        }
        ?>

    </tbody>
    </table>
    </div>
</body>
</html>