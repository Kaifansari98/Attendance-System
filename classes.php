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
    <title>Classes</title>
    <?php include_once 'php/header.php'; ?>
    <style>
        #classes{
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
        table tbody tr td:nth-last-child(2){
            text-align: center;
        }
        table tbody tr td:last-child .btn{
            background: #851923;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- navigation -->
       
        <?php include './php/navigation.php' ?>

       <!-- navigation end -->

        <div class="class_details">
            <div class="add_class">
                <div class="card_header">
                    <h2>Add Classes</h2>
                </div>
                <form action="" method="post">
                <div class="error-text"></div>
                    <div class="form_control">
                        <label for="classname">Class Name</label>
                        <input type="text" placeholder="Class name" id="classname" name="classname" required>
                    </div>
                    <div class="form_control">
                        <label for="classteacher">Class Teacher</label>
                        <select name="classteacher" id="classteacher" required>
                            <?php 
                            $sql = "SELECT `teacher_name` FROM `teachers` order by teacher_id ASC";
                            $qry = mysqli_query($conn,$sql);
                            $x = mysqli_num_rows($qry);
                            if($x > 0){
                                // $teacher_name = array();
                                while($teacher_name = mysqli_fetch_array($qry)){                            
                            ?>
                        <option value="<?php echo $teacher_name['teacher_name']; ?>"><?php echo $teacher_name['teacher_name']; ?></option>
                        <?php 
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form_control">
                        <label for="studentlimit">Student Limit</label>
                        <input type="number" placeholder="Student Limit" id="studentlimit" name="studentlimit" required>
                    </div>
                    <div class="addclass_btn">
                    <input type="submit" value="Add Class" class="btn">
                    </div>
                </form>
            </div>
            <div class="classes">
                <div class="card_header">
                    <h2>Classes</h2>
                </div>
                <table>
                        <thead>
                            <tr>
                                <td>Class ID</td>
                                <td>Class Name</td>
                                <td>Class Teacher</td>
                                <td>Students Limit</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="classesdata">
                    </tbody>
                </table>
            </div>
       
        </div>
        </div>
    
    
    </div>
    </div>
    <script src="js/addclass.js"></script>

    <script>
                // call ajax
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "php/classesrecord.php";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    //sending request
    ajax.send();

    //receiving response from classesrecord.php
    ajax.onreadystatechange = function()
    {  
        if(this.readyState == 4 && this.status == 200){
            //converting JSON back to array
            var classesdata = JSON.parse(this.responseText);
            //html value for <tbody>
            var html = "";
            //looping through the teachersdata
            for(var a = 0; a < classesdata.length; a++){
                var class_uid = classesdata[a].id;
                var class_name = classesdata[a].class_name;
                var class_teacher = classesdata[a].class_teacher;
                var class_limit = classesdata[a].class_limit;
                // var firstName = teachername.split(' ').slice(0, 1).join(' ');
                // appending in html
                html += "<tr>";
                html += "<td>" + class_uid + "</td>";
                html += "<td>" + class_name + "</td>";
                html += "<td>" + class_teacher + "</td>"
                html += "<td>" + class_limit + "</td>";
                html += "<td><a href='php/exportclass.php?cid="+class_name+"' class='btn'>Report</a></td>";
                html += "</tr>";
            }
            // replacing the <tbody> of <table>
            document.getElementById("classesdata").innerHTML = html;
        }
    }

</script>

</body>
</html>