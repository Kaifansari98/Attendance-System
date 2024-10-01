<?php 
session_start();
include 'db.php';

$teachername = $_POST['teachername'];
$specialist = $_POST['specialist'];
$teacheremail = $_POST['teacheremail'];
$teachercontact = $_POST['teachercontact'];
$teachersalary = $_POST['teachersalary'];
$teacheraddress = $_POST['teacheraddress'];
$teacherpassword = $_POST['teacherpassword'];

//checking fields are not empty
if(!empty($teachername) && !empty($teacheremail) && !empty($teachercontact) && !empty($teachersalary) && ($teacheraddress) && ($teacherpassword)){
    //if email is valid
    if(filter_var($teacheremail, FILTER_VALIDATE_EMAIL)){
    //checking email already exists
    $sql = mysqli_query($conn, "SELECT teacher_email FROM teachers WHERE teacher_email = '{$teacheremail}'" );
    if(mysqli_num_rows($sql) > 0){
        echo "$teacheremail - Already Exists!";
    }
    else{

        if(isset($_FILES['image'])) {              //if file is uploaded 
            $img_name = $_FILES['image']['name'];       //getting image name
            $img_type = $_FILES['image']['type'];       //getting image type
            $tmp_name = $_FILES['image']['tmp_name'];       //set temporary name
            $img_explode = explode('.',$img_name);       //let's Explode Image
            $img_extension = end($img_explode);         //getting image extension
            $extensions = ['png', 'jpeg', 'jpg'];        // these are some valid image file extensions

            if(in_array($img_extension,$extensions) === true){
                $time = time();
                $newimagename = $time . $img_name;
                if(move_uploaded_file($tmp_name,"../img/profiles/" . $newimagename)){
                    $random_id = rand(time(),10000000);
                    
                    //let's start inserting data into database

                    $sql2 = mysqli_query($conn, "INSERT INTO teachers (teacher_uid, teacher_name, subject_specialist, teacher_email, teacher_contact, teacher_salary, teacher_address, teacher_password, teacher_pic) VALUES
                    ({$random_id}, '{$teachername}', '{$specialist}', '{$teacheremail}', {$teachercontact}, {$teachersalary}, '{$teacheraddress}', '{$teacherpassword}', '{$newimagename}')");
                    if($sql2){
                        echo "success";
                    }
                    else{
                        echo "Something went wrong!" . mysqli_error($conn);

                    }
                    // if($sql2){
                    //     $sql3 = mysqli_query($conn , "SELECT * FROM teachers WHERE teacher_email = '{$teacheremail}'");
                    //     if(mysqli_num_rows($sql3) > 0){

                    //     }
                    
                    // }
                
                }
            }
            else{
                echo "Please Select an Profile Image - JPEG, PNG, JPG!";
            }

        }
        else{
            echo "Please Select an Profile Image";
        }
    }
    }
    else{
        echo "$teacheremail ~ This is not valid Email!";
    }
}
else{
    echo "All Fields are Required";
}


?>