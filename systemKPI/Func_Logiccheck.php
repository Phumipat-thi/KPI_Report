<?php 

// Load the database configuration file 
include('MnP_IT.php');
$M = $_POST['Month'];
$y = $_POST['Year'];
$EMP = $_POST['NameAdmin'];
 $pid = $_POST['typeP'];
             
include_once 'connect.php'; 


// Fetch records from database 
if(isset($_POST['typeP'])){
    $glue = "','";
    $Spid = "'" . implode($glue, $pid) . "'" ;
            if(empty($M) && empty($EMP)){
                //คำสั่งquery
                $query = mysqli_query($conn, "SELECT * FROM report_it  JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem  WHERE rp_type_problem in ($Spid) AND year(rp_success_job) like '$y' ORDER BY id ASC");
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                include('Func_ExportCSV.php');
              }else if(isset($M) && empty($EMP)) {
                //คำสั่งquery
                $query = $conn->query("SELECT * FROM report_it  WHERE rp_type_problem in ($Spid) AND MONTHNAME(rp_success_job) like '$M' AND year(rp_success_job) like '$y'   ORDER BY id ASC ");
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                include('Func_ExportCSV.php'); 
              }else if(empty($M) && isset($EMP)) {
                //คำสั่งquery
                $query = $conn->query("SELECT * FROM report_it  WHERE rp_type_problem in ($Spid) AND year(rp_success_job) like '$y' AND rp_personnel_closed	 like '$EMP'   ORDER BY id ASC ");
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                include('Func_ExportCSV.php'); 
              }else {
                //คำสั่งquery
                $query = $conn->query("SELECT * FROM report_it  WHERE rp_type_problem in ($Spid) AND MONTHNAME(rp_success_job) like '$M' AND year(rp_success_job) like '$y' AND rp_personnel_closed	 like '$EMP'   ORDER BY id ASC ");
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                include('Func_ExportCSV.php'); 
              }
              
}else{
  echo "<script>";
  echo "alert(\"ทำเครื่องหมายประเภทของคำถามก่อนครับ\");"; 
  echo "window.history.back()";
echo "</script>";

}
    
 

 
?>