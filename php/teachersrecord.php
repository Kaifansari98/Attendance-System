<?php 
    session_start();
    include 'db.php';
    
    //getting data from users
    $result = mysqli_query($conn, "SELECT * FROM teachers");

    // storing in array
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    

    //returning data in JSON format

    echo json_encode($data);

?>