<?php 
// Load the database configuration file 
include_once 'db.php'; 
$student_id = $_GET['std_id'];
 


// Filter the excel data
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = $student_id . "-data-" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('STUDENT ID', 'CLASS NAME', 'STUDENT NAME', 'Date', 'Attendance'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM student_attendance WHERE att_stdID = '$student_id' ORDER BY att_id ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        // $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['att_stdID'], $row['att_class'], $row['std_name'], $row['att_date'], $row['attend']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;


?>