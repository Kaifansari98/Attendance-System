<?php 
session_start();
include 'db.php';

$first_name = $_POST['studentfname'];
$last_name = $_POST['studentlname'];
$father_name = $_POST['fathername'];
$father_contact = $_POST['fathercontact'];
$student_id = $_POST['studentid'];
$class = $_POST['studentclassname'];
$student_address = $_POST['studentaddress'];
// $attendance = $_POST['attendance'];
$student_uid = 'Student' . $student_id;


//checking fields are not empty
if(!empty($first_name) && !empty($last_name) && !empty($father_name) && !empty($father_contact) && !empty($student_id) && !empty($class) && !empty($student_address)){
    $sql = mysqli_query($conn, "SELECT student_id FROM students WHERE student_id = '{$student_uid}'" );
    if(mysqli_num_rows($sql) > 0){
        echo "$student_uid - Already Exists!";
    }
    else{    
    if(isset($_FILES['studentpic'])) {              //if file is uploaded 
            $img_name = $_FILES['studentpic']['name'];       //getting image name
            $img_type = $_FILES['studentpic']['type'];       //getting image type
            $tmp_name = $_FILES['studentpic']['tmp_name'];       //set temporary name
            $img_explode = explode('.',$img_name);       //let's Explode Image
            $img_extension = end($img_explode);         //getting image extension
            $extensions = ['png', 'jpeg', 'jpg'];        // these are some valid image file extensions

            if(in_array($img_extension,$extensions) === true){
                $time = time();
                $newimagename = $time . $img_name;
                if(move_uploaded_file($tmp_name,"../img/profiles/students/" . $newimagename)){                    
                    //let's start inserting data into database
                    $newstudent_id = 'Student' . $student_id;    
                    $attendance = "Not Specified";
                    $sql2 = mysqli_query($conn, "INSERT INTO students (first_name, last_name, father_name, father_contact, student_id, class, student_address, student_img, attendance) VALUES
                    ('{$first_name}','{$last_name}','{$father_name}','{$father_contact}','{$newstudent_id}','{$class}','{$student_address}','{$newimagename}','{$attendance}')");
                    if($sql2){
                        echo "success";
                    }
                    else{
                        echo "Something went wrong!" . mysqli_error($conn);

                    }
                }
            }
            else{
                echo "Please Select a Student Image - JPEG, PNG, JPG!";
            }

        }
        else{
            echo "Please Select a Student Image";
        }
    }
}
else{
    echo "All Fields are Required";
}


?>