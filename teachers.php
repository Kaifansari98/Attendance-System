<?php 
session_start();
include 'php/db.php';
$adminemail = $_SESSION['email'];
if(empty($adminemail)){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'php/header.php'; ?>
    <title>Teachers</title>
    <style>
        #teachers{
            background: #03a9f4;
        }
        .error-text{
            display: none;
            color: #851923;
            padding: 4px 6px;
            text-align: center;
            border-radius: 4px;
            background: #ffe3e5;
            border: 1px solid #dfa5ab;
            margin-bottom: 8px;
        }
      
    
    </style>
</head>
<body>
    <div class="container">
    <!-- navigation -->
       
      <?php include './php/navigation.php' ?>

    <!-- navigation end -->

        <div class="teacher_details">
           
            <?php include 'php/teachersdata.php' ?>
            <?php include 'php/addteacher.php' ?>

        </div>
    </div>
    </div>



</body>
</html>