<?php 
session_start();
include 'php/db.php';
$adminemail = $_SESSION['email'];
if(empty($adminemail)){
    header("Location: login.php");
}
//cr dd help to getting date after reload
$cr_dd = "";

$attendance_detail = "";
if ($take = isset($_GET['takeattendance'])) {
if ($take) {
   $cr_dd = $_GET['attendancedate'];
   $slt_class = $_GET['selectclass'];
   $atend_type = $_GET['attendancetype'];
   $attendance_detail .= "<h3>" . $slt_class . "&nbsp; | &nbsp;" . $atend_type . "&nbsp; | &nbsp;" . $cr_dd . "</h3>" . "<br/>";
}
else{
    date_default_timezone_set("Asia/Karachi");
    $cr_dd .= date("d-m-Y");
    // $cr_dd .= strftime("%d-%m-%Y", strtotime("weekday"));
} 
}
else{
    date_default_timezone_set("Asia/Karachi");
    $cr_dd .= date("d-m-Y");
    // $cr_dd .= strftime("%d-%m-%Y", strtotime("weekday"));

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <?php include_once 'php/header.php'; ?>
  
    <style>
        #attendance{
            background: #03a9f4;
        }
    </style>
</head>

<body>
    <div class="container">
        
     <!-- navigation -->
       
     <?php include './php/navigation.php' ?>

<!-- navigation end -->

        <div class="attendance">
            <h2>Attendance</h2>
            <form action="" method="GET" class="attendance_nav">
                <div class="form_control">
                    <label for="selectclass">Select Class</label>
                    <select name="selectclass" id="selectclass" required>
                    <?php 
                            $sql = "SELECT `class_name` FROM `classes` order by id ASC";
                            $qry = mysqli_query($conn,$sql);
                            $x = mysqli_num_rows($qry);
                            if($x > 0){
                                while($class_name = mysqli_fetch_array($qry)){                            
                            ?>
                        <option value="<?php echo $class_name['class_name']; ?>"><?php echo $class_name['class_name']; ?></option>
                        <?php 
                            }
                        }
                        ?>
                        </select>
                </div>
                <div class="form_control">
                    <label for="attendancetype">Attendance Type</label>
                    <select name="attendancetype" id="attendancetype" required>
                        <option value="Students">Students</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                </div>
                <div class="form_control">
                    <label for="attendancedate">Attendance Date</label>
                    <!-- pattern="\d{1,2}/\d{1,2}/\d{4}" -->
                    <input type="text" name="attendancedate" placeholder="Select Attendance Date" id="attendancedate" value="<?php echo $cr_dd; ?>" readonly >
                </div>
                <div id="take_attendance">
                <input type="submit" value="Take Attendance" name="takeattendance" class="btn">
                </div>
            </form>     
            <?php echo $attendance_detail; ?>
            <div class="attendance_area">
                        <!-- php start -->
            <!-- attendance record data fetch -->
        <form action="">
 <?php           
 
if(isset($_GET['takeattendance'])){ //check if form was submitted
  $selectclass = $_GET['selectclass']; //get input text
  $attendancetype = $_GET['attendancetype']; //get input text
  $attendancedate=strtotime($_GET['attendancedate']); 
  $attendancedate=date("Y-m-d",$attendancedate);
  //   if attendance type student  
  if($attendancetype === "Students"){
        $sql = mysqli_query($conn, "SELECT att_date FROM student_attendance WHERE att_date = '{$attendancedate}' AND att_class = '{$selectclass}'" );
        if(mysqli_num_rows($sql) > 0){
            // update data    
            $sql2 = mysqli_query($conn, "SELECT * FROM student_attendance WHERE att_date = '{$attendancedate}' AND att_class = '{$selectclass}' order by att_id ASC" );
            if(mysqli_num_rows($sql2)){
                while($attendance_update = mysqli_fetch_assoc($sql2)){ 
                    $std_name = $attendance_update['std_name'];
                    $std_id = $attendance_update['att_stdID'];
                    $attend = $attendance_update['attend'];
                    $att_class = $attendance_update['att_class'];
                    // echo $attend;
                    ?>  
                    <div class="attendance_box">
                         <h5 class="name" id="std_name"></h5><?php echo $std_name; ?></h5>
                            <div class="radio_group">
                                <input label="P" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $std_id?>" value="present" <?php echo ($attend == 'present')?'checked':'' ?>>
                                <input label="A" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $std_id?>" value="absent" <?php echo ($attend == 'absent')?'checked':'' ?>>
                                <input label="L" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $std_id?>" value="leave" <?php echo ($attend == 'leave')?'checked':'' ?>>
                                <input type="hidden" id="attendance_id" name="std_id[]" value="<?php echo $std_id; ?>">    
                                <input type="hidden" id="student_name" name="std_name[]" value="<?php echo $std_name; ?>">    
                                <input type="hidden" id="selectclass" name="stdclass[]" value="<?php echo $att_class; ?>">    
                                <input type="hidden" id="attendancedate" name="attendancedate[]" value="<?php echo $attendancedate; ?>">    
                            </div>    
                         </div>
                        <?php
                }
            }
        }
        else{
            // create student attendance first time
        $sql2 = mysqli_query($conn, "SELECT * FROM students WHERE class = '{$selectclass}' order by id ASC" );
        if(mysqli_num_rows($sql2) > 0){
            while($students_data = mysqli_fetch_assoc($sql2)){ 
                $std_name = $students_data['first_name'].' '.$students_data['last_name'];
                $std_id = $students_data['student_id'];
                    ?>
                <div class="attendance_box">
                     <div class="img"><img src="img/profiles/students/<?php echo $students_data['student_img']; ?>" alt=""></div>
                     <h5 class="name" id="std_name"></h5><?php echo $std_name; ?></h5>
                                <div class="radio_group">
                            <input label="P" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $std_id?>" value="present" checked>
                            <input label="A" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $std_id?>" value="absent">
                            <input label="L" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $std_id?>" value="leave">
                            <input type="hidden" id="attendance_id" name="std_id[]" value="<?php echo $std_id; ?>">    
                            <input type="hidden" id="student_name" name="std_name[]" value="<?php echo $std_name; ?>">    
                            <input type="hidden" id="selectclass" name="stdclass[]" value="<?php echo $selectclass; ?>">    
                            <input type="hidden" id="attendancedate" name="attendancedate[]" value="<?php echo $attendancedate; ?>">    
                        
                            </div>    
                     </div>
                    <?php
            }


        }
        }
    }
    // if attendance type teachers
    else if($attendancetype === "Teacher"){
        $sql = mysqli_query($conn, "SELECT att_date FROM teacher_attendance WHERE att_date = '{$attendancedate}' AND att_class = '{$selectclass}'" );
        if(mysqli_num_rows($sql) > 0){
            // update data    

            $sql2 = mysqli_query($conn, "SELECT * FROM teacher_attendance WHERE att_date = '{$attendancedate}' AND att_class = '{$selectclass}' order by att_id ASC" );
            if(mysqli_num_rows($sql2)){
                while($attendance_update = mysqli_fetch_assoc($sql2)){ 
                    $teacher_name = $attendance_update['teacher_name'];
                    $teacher_id = $attendance_update['att_teacherUID'];
                    $attend = $attendance_update['attend'];
                    $att_class = $attendance_update['att_class'];
                    // echo $attend;
                    ?>  
                    <div class="attendance_box">
                         <h5 class="name" id="std_name"></h5><?php echo $teacher_name; ?></h5>
                            <div class="radio_group">
                                <input label="P" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $teacher_id?>" value="present" <?php echo ($attend == 'present')?'checked':'' ?>>
                                <input label="A" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $teacher_id?>" value="absent" <?php echo ($attend == 'absent')?'checked':'' ?>>
                                <input label="L" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $teacher_id?>" value="leave" <?php echo ($attend == 'leave')?'checked':'' ?>>
                                <input type="hidden" id="attendance_id" name="std_id[]" value="<?php echo $teacher_id; ?>">    
                                <input type="hidden" id="student_name" name="std_name[]" value="<?php echo $teacher_name; ?>">    
                                <input type="hidden" id="selectclass" name="stdclass[]" value="<?php echo $att_class; ?>">    
                                <input type="hidden" id="attendancedate" name="attendancedate[]" value="<?php echo $attendancedate; ?>">    
                            </div>    
                         </div>
                        <?php
                }
            }
        }
        else{
            // create teacher attendance first time
            $sql2 = mysqli_query($conn , "SELECT * FROM teachers INNER JOIN classes ON Teachers.teacher_name = Classes.class_teacher WHERE  classes.class_name = '{$selectclass}';");
        if(mysqli_num_rows($sql2) > 0){
            while($teacher_data = mysqli_fetch_assoc($sql2)){ 
                $teacher_name = $teacher_data['teacher_name'];
                $teacher_id = $teacher_data['teacher_uid'];
                    ?>
                <div class="attendance_box">
                     <div class="img"><img src="img/profiles/<?php echo $teacher_data['teacher_pic']; ?>" alt=""></div>
                     <h5 class="name" id="std_name"></h5><?php echo $teacher_name; ?></h5>
                                <div class="radio_group">
                            <input label="P" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $teacher_id?>" value="present" checked>
                            <input label="A" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $teacher_id?>" value="absent">
                            <input label="L" type="radio" id="attendance_attend" name="attend[]<?php echo "" . $teacher_id?>" value="leave">
                            <input type="hidden" id="attendance_id" name="std_id[]" value="<?php echo $teacher_id; ?>">    
                            <input type="hidden" id="student_name" name="std_name[]" value="<?php echo $teacher_name; ?>">    
                            <input type="hidden" id="selectclass" name="stdclass[]" value="<?php echo $selectclass; ?>">   
                            <input type="hidden" id="attendancedate" name="attendancedate[]" value="<?php echo $attendancedate; ?>">    
                            <input type="hidden" id="attendancetype" name="attendancetype[]" value="<?php echo $attendancetype; ?>">    
                            
                            </div>    
                     </div>
                    <?php
            }


        }
        }
    }
    // other wise show all data on attendance
else{
    echo "Select Date";
}

}

// updated data

?>
    </form>
</div>
<?php 
// error_reporting(0);
if(isset($_GET['takeattendance'])){
    // if attendance type is Students
    if($_GET['attendancetype'] === "Students"){
    $qq = mysqli_query($conn, "SELECT att_date FROM student_attendance WHERE att_date = '{$attendancedate}' AND att_class = '{$selectclass}'" );
    if(mysqli_num_rows($qq) > 0){
        ?>
        <div class="update_attendance_btn">
        <input type="submit" name="save" class="btn" value="Update Record">
        </div>
        <script src="js/attendanceupdate.js"></script>
    <?php 
    }
    else{
      
        ?>
        <div class="save_attendance_btn">
        <input type="submit" name="save" class="btn" value="Save Record">
        </div>
        <script src="js/attendance.js"></script>
        <?php
}
    }

    // if attendance type is teachers
    else if($_GET['attendancetype'] === "Teacher"){
    $qq = mysqli_query($conn, "SELECT att_date FROM teacher_attendance WHERE att_date = '{$attendancedate}' AND att_class = '{$selectclass}'" );
    if(mysqli_num_rows($qq) > 0){
        ?>
        <div class="update_attendance_btn">
        <input type="submit" name="save" class="btn" value="Update Record">
        </div>
        <script src="js/attendanceupdateteacher.js"></script>
    <?php 
    }
    else{
      
        ?>
        <div class="save_attendance_btn">
        <input type="submit" name="save" class="btn" value="Save Record">
        </div>
        <script src="js/attendanceteacher.js"></script>
        <?php
}
    }
    }
       // Empty Part 
        // you will fetch all the attendance record at your choice
    else{
        echo "Take Attendance";
    }
?>

        </div>

        </div>
    </div>

    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function () {
            // $( "#attendancedate" ).datepicker("setDate", "10w+1");
            $("#attendancedate").datepicker({
                defaultDate: new Date() ,
                dateFormat : 'dd-mm-yy',
                changeMonth: true,
                numberOfMonths: 1,
                minDate: "0",
                beforeShowDay: $.datepicker.noWeekends
            });
            
        });
    </script>
    </body>
</html>