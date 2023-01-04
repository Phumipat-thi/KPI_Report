<?php 
 
// Load the database configuration file 
include_once 'conn.php'; 
 
$ex = explode('-',$_POST['datetimes']);
$date_start =  str_replace('/','-',trim($ex[0]));
$date_end =  str_replace('/','-', trim($ex[1]));
//$datepick = $_POST['daterange'];
$probType=$_POST['rp_type_problem'];
// Fetch records from database 
if(empty($_POST['rp_type_problem'])){
    $query = $con->query("SELECT * FROM report_it  WHERE rp_start_job Between  '$date_start' and '$date_end' ORDER BY id ASC "); 
}else{
    $query = $con->query("SELECT * FROM report_it   WHERE rp_start_job Between '$date_start' and '$date_end' AND rp_type_problem = '$probType' ORDER BY id ASC ");
}

 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "report_it.csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w');   
     fprintf( $f, chr(0xEF).chr(0xBB).chr(0xBF));  
     
    // Set column headers 
    $fields = array('ลำดับ','รหัสงาน','รหัสพนักงาน','ชื่อผู้แจ้ง','นามสกุลผู้แจ้ง','ฝ่าย','อีเมล์ผู้แจ้ง','เบอร์โทรโต๊ะ','ประเภทปัญหา','วันที่แจ้ง','วันที่ดำเนินการ','วันที่ปิดงาน','จำนวนเวลาที่ใช้','SLA','รายละเอียดเพิ่มเติม','การแก้ไขปัญหา','ผู้รับผิดชอบ','สถานะ','ความคิดเห็น','ผู้แจ้งปิดงาน','รับ Call CC','ตอบ Line CC','แจ้ง Line ตัวแทน','แจ้งสาเหตุปัญหา','รายละเอียดของปัญหา','แจ้ง Line CC ปิดงาน','แจ้ง Line ตัวแทน ปิดงาน'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['rp_id_emp'],$row['rp_order_id'], $row['rp_name'], $row['rp_surname'], $row['rp_dep'], $row['rp_email'], $row['rp_desk_phone'],$row['rp_type_problem'],$row['rp_start_job'],$row['rp_pending_job'],$row['rp_success_job'],$row['rp_sumdate_job'],$row['rp_sla_job'],$row['rp_desc'],$row['rp_solve'],$row['rp_personnel_closed'],$row['rp_status'],$row['rp_result'],$row['rp_personnel_closed'],$row['cc_problem'],$row['cc_respond'],$row['report_agent'],$row['cc_problem_time'],$row['rp_desc'],$row['cc_problem'],$row['cc_closed'],$row['agent_closed']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>