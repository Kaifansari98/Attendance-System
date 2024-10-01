<?php 
session_start();
include 'db.php';
include 'phpqrcode/qrlib.php';
if(empty($_SESSION['studentid']) && $_GET['studentid']){
    header("Location: ../trackstd.php");
}
$sql = mysqli_query($conn, "SELECT * FROM students WHERE `student_id` = '{$_GET['studentid']}'");
if(mysqli_num_rows($sql)){
    $studentcard = mysqli_fetch_assoc($sql);

    // Generate a Student Id Card
    header('content-type:image/jpeg');
    $font = "../Fonts/Montserrat-Bold.ttf" ;       //font name
    $font2 = "../Fonts/Montserrat-Light.ttf" ;       //font name
    $font3 = "../Fonts/Montserrat-Regular.ttf" ;       //font name
    $image = imagecreatefromjpeg("../img/Id/Student_card.jpg");   //image
    $color = imagecolorallocate($image , 19,21,22);          //black color rgb code
    
    // Adding student image
    $image2 = imagecreatefromjpeg("../img/profiles/students/".$studentcard['student_img']);   //image
    //$image2 = imagecreatefromjpeg("../img/profiles/students/500x500.jpg");   //image
   
    $width = imagesx($image2);
    $height = imagesy($image2);
    $new_width = round($width * 0.85);
    $new_height = round($height * 0.85);

    imagecopyresized($image, $image2, 230,310,0,0, $new_width, $new_height, $width, $height);
    
    // image variable , font size , text angle, X-axis , Y-axis, color variable, font variable , name variable 
    imagettftext($image,50,0,220,860,$color,$font,strtoupper($studentcard['first_name']));     //its used for adding text on your image
    imagettftext($image,60,0,220,930,$color,$font2,strtoupper($studentcard['last_name']));     //its used for adding text on your image
    imagettftext($image,35,0,200,990,$color,$font3,$studentcard['class']);     //its used for adding text on your image
   
    imagettftext($image,26,0,1230,220,$color,$font3,$studentcard['student_id']);     //its used for adding text on your image
    imagettftext($image,26,0,1130,295,$color,$font3,$studentcard['father_contact']);     //its used for adding text on your image
    imagettftext($image,20,0,1155,370,$color,$font3,$studentcard['student_address']);     //its used for adding text on your image
    
    // imagejpeg($image, $studentcard['student_id'].".jpg");    //this function see the image on browser
    imagejpeg($image);    //this function see the image on browser
    imagedestroy($image);


}

else{
    echo "Something went wrong";
}



?>