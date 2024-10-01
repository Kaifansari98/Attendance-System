<?php 
    session_start();
    include 'db.php';
    
    //getting data from users
    $result = mysqli_query($conn, "SELECT * FROM classes");

    // storing in array
    $classes = array();
    while($row = mysqli_fetch_assoc($result)){
        $classes[] = $row;
    }
    

    //returning data in JSON format

    echo json_encode($classes);

?>