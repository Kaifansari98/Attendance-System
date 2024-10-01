<?php 
// Load the database configuration file 
include_once 'db.php'; 
$teachers = $_GET['data'] === 'teachers';
if(isset($teachers)){ 
// Filter the excel data =
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "All Teachers Record" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'TEACHER NAME', 'SUBJECT SPECIALIST', 'TEACHER EMAIL', 'TEACHER CONTACT', 'TEACHER SALARY', 'TEACHER ADDRESS' ,'ATTENDANCE'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM teachers ORDER BY teacher_id ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['teacher_id'], $row['teacher_name'], $row['subject_specialist'],$row['teacher_email'], $row['teacher_contact'], $row['teacher_salary'], $row['teacher_address'], $row['teacher_attendance']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    }
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"$fileName\""); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
 
// Render excel data 
echo $excelData; 
 
exit;

}