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
    <title>Students</title>
    <?php include_once 'php/header.php'; ?>
    <style>
         #students{
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
     
        <div class="student_details">
          
            <div class="students">
                <div class="card_header">
                    <h2>Students</h2>
                </div>
                <table>
                        <thead>
                            <tr>
                                <td>Student ID</td>
                                <td>Student Name</td>
                                <td>Father Name</td>
                                <td>Attendance</td>
                                <td>Download</td>
                            </tr>
                        </thead>
                <tbody id="studentsdata">
                       
                      
                    </tbody>
                </table>
            </div>
            <div class="add_student">
                <div class="card_header">
                    <h2>Add Student</h2>
                </div>
                <form action=""  enctype="multipart/form-data"  method="post">
                <div class="error-text"></div>
                    <div class="form_group">
                    <div class="form_control">
                        <label for="studentfname">First Name</label>
                        <input type="text" placeholder="First name" id="studentfname" name="studentfname" required>
                    </div>
                    <div class="form_control">
                        <label for="studentlname">Last Name</label>
                        <input type="text" placeholder="Last Name" id="studentlname" name="studentlname" required>
                    </div>
                </div>
                    <div class="form_control">
                        <label for="fathername">Father's Name</label>
                        <input type="text" placeholder="Father's Name" id="fathername" name="fathername">
                    </div>
                    <div class="form_control">
                        <label for="teachercontact">Father Contact</label>
                        <input type="tel" placeholder="Father Contact" id="fathercontact" name="fathercontact" required>
                    </div>
                    <div class="form_group">
                    <div class="form_control">
                        <label for="studentid">Student ID</label>
                        <input type="text" placeholder="Student Id" id="studentid" name="studentid" required>
                    </div>
                    <div class="form_control">
                        <label for="studentclass">Class</label>
                        <select name="studentclassname" id="studentclassname" required>
                        <?php 
                            $sql = "SELECT `class_name` FROM `classes` order by id ASC";
                            $qry = mysqli_query($conn,$sql);
                            $x = mysqli_num_rows($qry);
                            if($x > 0){
                                // $teacher_name = array();
                                while($class_name = mysqli_fetch_array($qry)){                            
                            ?>
                        <option value="<?php echo $class_name['class_name']; ?>"><?php echo $class_name['class_name']; ?></option>
                        <?php 
                            }
                        }
                        ?>
                        </select>
                    </div>
                    </div>
                    <div class="form_control">
                        <label for="studentaddress">Student Address</label>
                        <input type="text" placeholder="Student Address" id="studentaddress" name="studentaddress" required>
                    </div>
                    <div class="student_pic">
                            <label for="studentpic">Picture</label>
                            <input type="file" placeholder="Upload Picture" id="studentpic" name="studentpic" required>
                        </div>
                        <div class="addstudent_btn">
                    <input type="submit" value="Add Student" class="btn">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
                    </div>
                    <script src="js/addstudent.js"></script>

    <script>
                // call ajax
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "php/studentsrecord.php";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    //sending request
    ajax.send();

    //receiving response from classesrecord.php
    ajax.onreadystatechange = function()
    {  
        if(this.readyState == 4 && this.status == 200){
            //converting JSON back to array
            var studentsdata = JSON.parse(this.responseText);
            //html value for <tbody>
            var html = "";
            //looping through the studentsdata
            for(var a = 0; a < studentsdata.length; a++){
                var student_id = studentsdata[a].student_id;
                var first_name = studentsdata[a].first_name;
                var last_name = studentsdata[a].last_name;
                var father_name = studentsdata[a].father_name;
                var attendance = studentsdata[a].attendance;
                var std_id = student_id.replace("Student", "");
                var fathername = father_name.split(' ').slice(0, 1).join(' ');
                // appending in html
                html += "<tr>";
                html += "<td>" + std_id + "</td>";
                html += "<td>" + first_name + " " + last_name + "</td>";
                html += "<td>" + fathername + "</td>"
                html += "<td>" + attendance + "</td>";
                html += "<td><a href='php/exportstudents.php?std_id="+student_id+"' class='btn'>Report</a></td>";
                html += "</tr>";
            }
            // replacing the <tbody> of <table>
            document.getElementById("studentsdata").innerHTML = html;
        }
    }

</script>


</body>
</html>