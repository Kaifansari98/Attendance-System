<?php
    include "db.php";
    $Delete_Id = $_GET['uid'];
    $qry = mysqli_query($conn, "SELECT * FROM teachers WHERE teacher_uid = '$Delete_Id'");
    $row = mysqli_fetch_assoc($qry);
    if($row){
        $teacher_name = $row['teacher_name'];
        $qry2 = mysqli_query($conn, "SELECT class_teacher FROM classes WHERE class_teacher = '$teacher_name'");
        if(mysqli_num_rows($qry2) > 0){
            ?>
            <script type="text/javascript">
            alert("This Teacher Already Involved as a Class Teacher!");
            window.location.href = "../teachers.php";
            </script>
            <?php 
    }   
    else{
        $qry3 = "DELETE FROM teachers WHERE teacher_uid = '$Delete_Id'";
        $x = mysqli_query($conn,$qry3);
        if($x){
        ?>
            <script type="text/javascript">
            alert("Record Deleted Successfully");
            window.location.href = "../teachers.php";
            </script>
            <?php
            }
    }
}
   
    else{
        echo "Error While Deleting"."".mysqli_error($conn);
    }
?>