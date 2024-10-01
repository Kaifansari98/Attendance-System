<?php
session_start();
include 'php/db.php';
$studentid = $_SESSION['studentid'];
if(empty($studentid)){
    header("Location: trackstd.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="trackstd">
    <h1>Attendance Data</h1>
    <a href="php/studentcard.php?studentid=<?php echo $studentid ?>" class="btn">Download Id Card</a>
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
        $qry = mysqli_query($conn , "SELECT * FROM `student_attendance` WHERE `att_StdID` = '{$studentid}' ORDER BY `att_date` ASC");
        $i = 0;
        while($trackstd = mysqli_fetch_assoc($qry)){
            $day = date('l', strtotime($trackstd['att_date']));
            ?>
        <tr>
            <td><?php echo ++$i; ?></td>
            <td><?php echo date("d-m-Y",strtotime($trackstd['att_date'])); ?></td>
            <td><?php echo $day ?></td>
            <td style="text-transform:capitalize;"><?php echo $trackstd['attend'] ?></td>
        </tr>
        <?php
        }
        ?>

    </tbody>
    </table>
    </div>
</body>
</html>