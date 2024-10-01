<?php 
session_start();
include 'php/db.php';
$adminemail = $_SESSION['email'];
if(empty($adminemail)){
    header("Location: login.php");
}

$qry1 = mysqli_query($conn, "SELECT `id` FROM students");
$students_total = mysqli_num_rows($qry1); 

$qry2 = mysqli_query($conn, "SELECT `teacher_id` FROM teachers");
$teachers_total = mysqli_num_rows($qry2); 

$qry3 = mysqli_query($conn, "SELECT `id` FROM classes");
$classes_total = mysqli_num_rows($qry3); 

date_default_timezone_set("Asia/Karachi");
$today_date = date("Y-m-d");

$qry4 = mysqli_query($conn, "SELECT `att_stdID` FROM student_attendance WHERE att_date = '{$today_date}' AND attend = 'present'");
$attendance_total = mysqli_num_rows($qry4); 

$sql1 = mysqli_query($conn, "SELECT * FROM students order by id ASC");
$sql2 = mysqli_query($conn, "SELECT * FROM teachers");

$sql3 = mysqli_query($conn, "SELECT * FROM students INNER JOIN student_attendance ON Students.student_id = Student_attendance.att_StdID WHERE Student_attendance.att_date = '{$today_date}'");


?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <?php include_once 'php/header.php'; ?>
    <style>
        #home{
            background: var(--primary-color);
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- navigation -->
       
        <?php include './php/navigation.php' ?>

       <!-- navigation end -->

        <!-- cards  -->
           <div class="togetherContainer">
             <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $students_total; ?></div>
                        <div class="cardName">Students</div>
                    </div>
                    <div class="iconBox">
                    <i class="fa-solid fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                    <div class="numbers"><?php echo $teachers_total; ?></div>
                        <div class="cardName">Teachers</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-chalkboard-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                    <div class="numbers"><?php echo $classes_total; ?></div>
                        <div class="cardName">Classes</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-people-roof" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $attendance_total;?></div>
                        <div class="cardName">Student Present's Today</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            
                <div class="teachers">
            <div class="card_header">
                <h2>Teachers</h2>
            </div>
            
            <table>
                <tbody>
                <?php 
                        
                        while($teachers = mysqli_fetch_assoc($sql2)){                        
                        ?>
                    <tr class="teacher-row">
                        <td width='60px'>
                            <div class="imgBx"><img src="img/profiles/<?php echo $teachers['teacher_pic']; ?>"></div>
                        </td>
                        <td class="content-row"><h4><?php echo $teachers['teacher_name']; ?> </h4> <span><?php echo $teachers['subject_specialist']; ?></span></td>
                    </tr>
                    <?php
                    $sql6 = mysqli_query($conn, "SELECT `attend` FROM `teacher_attendance` WHERE `att_teacherUID` = {$teachers['teacher_uid']}");
                    $total_teacher_progress = mysqli_num_rows($sql6); 

                    $sql7 = mysqli_query($conn, "SELECT `attend` FROM `teacher_attendance` WHERE `att_teacherUID` = {$teachers['teacher_uid']} AND `attend` = 'present'");
                    $teacher_progress = mysqli_num_rows($sql7);  

                        if($teacher_progress != 0){
                            $teacher_attrecord = floor($teacher_progress * 100) / $total_teacher_progress;        
                        }
                        else{
                            $teacher_attrecord = 0;
                        }
                    $sql8 = mysqli_query($conn, "UPDATE teachers SET `teacher_attendance` = '{$teacher_attrecord}' WHERE `teacher_uid` = {$teachers['teacher_uid']}  ");
                } ?>
                </tbody>
            </table>
        </div>

           </div>
        <!-- cards end -->

        <div class="fee_details">
            <div class="recent_fees">
                <div class="card_header">
                    <h2>Today Attendance</h2>
                    <a href="students.php" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Contact #</td>
                            <td>Attendance</td>
                            <td>Today</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        while($students = mysqli_fetch_assoc($sql3)){                        
                        ?>
                       <tr>
                            <td><?php echo $students['first_name'] . " " . $students['last_name']; ?></td>
                            <td><?php echo $students['father_contact']; ?></td>
                            <?php 
                            $std_id = $students['student_id'];
                            $sql4 = mysqli_query($conn, "SELECT * FROM `student_attendance` WHERE `att_StdID` = '{$std_id}'");
                            $total_progress = mysqli_num_rows($sql4); 

                            $sql5 = mysqli_query($conn, "SELECT * FROM `student_attendance` WHERE `att_StdID` = '{$std_id}' AND `attend` = 'present'");
                            $student_progress = mysqli_num_rows($sql5); 
                            ?>
                            <td> <progress id="progress_bar" value="<?php echo $student_progress; ?>" max="<?php echo $total_progress; ?>"></progress></td>
                            <td><span class="status <?php echo $students['attend']; ?>">
                            <?php
                                if($students['att_date'] == $today_date && $students['attend'] == "present"){
                                    echo "Present";
                                }
                                else if($students['att_date'] == $today_date && $students['attend'] == "leave"){
                                    echo "Leave";
                                }
                                else{
                                    echo "Absent";
                                }
                            ?>

                            </span></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <!-- <div class="teachers">
            <div class="card_header">
                <h2>Teachers</h2>
            </div>
            <table>
                <tbody>
                <?php 
                        
                        while($teachers = mysqli_fetch_assoc($sql2)){                        
                        ?>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="img/profiles/<?php echo $teachers['teacher_pic']; ?>"></div>
                        </td>
                        <td><h4><?php echo $teachers['teacher_name']; ?> <br> <span><?php echo $teachers['subject_specialist']; ?></span></h4></td>
                    </tr>
                    <?php
                    $sql6 = mysqli_query($conn, "SELECT `attend` FROM `teacher_attendance` WHERE `att_teacherUID` = {$teachers['teacher_uid']}");
                    $total_teacher_progress = mysqli_num_rows($sql6); 

                    $sql7 = mysqli_query($conn, "SELECT `attend` FROM `teacher_attendance` WHERE `att_teacherUID` = {$teachers['teacher_uid']} AND `attend` = 'present'");
                    $teacher_progress = mysqli_num_rows($sql7);  

                        if($teacher_progress != 0){
                            $teacher_attrecord = floor($teacher_progress * 100) / $total_teacher_progress;        
                        }
                        else{
                            $teacher_attrecord = 0;
                        }
                    $sql8 = mysqli_query($conn, "UPDATE teachers SET `teacher_attendance` = '{$teacher_attrecord}' WHERE `teacher_uid` = {$teachers['teacher_uid']}  ");
                } ?>
                </tbody>
            </table>
        </div> -->
        </div>
        </div>
    </div>
            </div>
</body>
</html>