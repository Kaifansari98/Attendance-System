<!-- custom popup with table -->
<style>
    #view_data_popup{
        position: absolute;
        top:50%;
        left:50%;
        width: auto;
        display: none;
        transform: translate(-50%,-50%);
        background: #fff;
        padding: 20px;  
        border-radius: 8px;
        box-shadow: 3px 1px 2px 3px rgba(0,0,0,0.3);
        text-align: center;
        overflow:hidden;
        user-select: none;
        z-index: 10000;
    }
    #view_data_popup.active{
        display: block;
    }
    .popup_header{
        display:flex;
        justify-content:space-between;
        padding: 12px;
        margin-bottom:5px;
        border-bottom:1px solid #ccc;
    }
    #close{
        cursor:pointer;
    }
    .image{
        width:100%;
        display:flex;
        justify-content: center;
        align-items:center;
    }
    .image img{
        width:200px;
    }
    #view_data_popup .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    }
    #view_data_popup table thead td {
    font-weight: 600;
    background:#262626;
    color:#fff;
    width:100%;
    }
    #view_data_popup table tr {
    border-bottom: 1px solid #ffa900;
    width:100%; 
    }
    #view_data_popup table tr td {
    padding: 12px 8px;
    }
    /* ::-webkit-scrollbar {
  height: 8px;
}

::-webkit-scrollbar-track {
  background: #262626;
}

::-webkit-scrollbar-thumb {
  background: #cacaca;
}

::-webkit-scrollbar-thumb:hover {
  background: #ffa900;
} */
</style>
<?php 
error_reporting(0);
$ViewTeacher = mysqli_real_escape_string($conn, $_GET['uid']);
if(isset($ViewTeacher)){
    $sql = mysqli_query($conn,"SELECT * FROM teachers WHERE teacher_uid = {$ViewTeacher}");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $img = $row['teacher_pic'];
    }
}
?>
<div id="view_data_popup">
    <div class="popup_header"><h2>Teacher Profile</h2><h2 id="close_view">X</h2></div>
    <div class="image">
    <img src="img/profiles/<?php echo $img;?>" alt="<?php echo $img; ?>">
</div>
    <table class="table">
                        <thead>
                            <tr>
                                <td>Teacher Name's</td>
                                <td>Subject Specialist</td>
                                <td>Email</td>
                                <td>Contact#</td>
                                <td>Salary</td>
                                <td>Address</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $row['teacher_name']; ?></td>
                            <td><?php echo $row['subject_specialist']; ?></td>
                            <td><?php echo $row['teacher_email']; ?></td>
                            <td><?php echo $row['teacher_contact']; ?></td>
                            <td><?php echo $row['teacher_salary']; ?></td>
                            <td><?php echo $row['teacher_address']; ?></td>
                        </tr>
                    </tbody>
                    
                </table>
</div>