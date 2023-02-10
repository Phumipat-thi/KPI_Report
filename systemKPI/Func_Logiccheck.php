<?php 
 error_reporting(0);
// Load the database configuration file 
include('MnY.php');
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
                $query = mysqli_query($conn, "SELECT * FROM report_it  LEFT JOIN comment ON report_it.rp_order_id = comment.rp_id_order INNER JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem INNER JOIN department ON report_it.rp_dep = department.id_department WHERE rp_type_problem in ($Spid) AND year(rp_success_job) like '$y' group by rp_order_id");
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                $QNR = mysqli_num_rows($query);
                if (!$QNR){
                  echo "<script>";
                  echo "alert(\"ไม่พบข้อมูลที่ต้องการครับ\");"; 
                  echo "window.history.back()";
                echo "</script>";
                }else if (isset($QNR)){include('Func_ExportCSV.php'); }
              }else if(isset($M) && empty($EMP)) {
                //คำสั่งquery
                $query = mysqli_query($conn, "SELECT * FROM report_it  LEFT JOIN comment ON report_it.rp_order_id = comment.rp_id_order INNER JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem INNER JOIN department ON report_it.rp_dep = department.id_department WHERE rp_type_problem in ($Spid) AND MONTHNAME(rp_success_job) like '$M' AND year(rp_success_job) like '$y' group by rp_order_id ");
                $QNR = mysqli_num_rows($query);
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                if (!$QNR){
                  echo "<script>";
                  echo "alert(\"ไม่พบข้อมูลที่ต้องการครับ\");"; 
                  echo "window.history.back()";
                echo "</script>";
                }else if (isset($QNR)) {include('Func_ExportCSV.php'); }
              }else if(empty($M) && isset($EMP)) {
                //คำสั่งquery
                $query = mysqli_query($conn, "SELECT * FROM report_it LEFT JOIN comment ON report_it.rp_order_id = comment.rp_id_order INNER JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem INNER JOIN department ON report_it.rp_dep = department.id_departmentJOIN department ON report_it.rp_dep = department.id_department WHERE rp_type_problem in ($Spid) AND rp_personnel_closed = '$EMP' AND year(rp_success_job) like '$y' group by rp_order_id ");
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                $QNR = mysqli_num_rows($query);
                if (!$QNR){
                  echo "<script>";
                  echo "alert(\"ไม่พบข้อมูลที่ต้องการครับ\");"; 
                  echo "window.history.back()";
                echo "</script>";
                }else if (isset($QNR)){include('Func_ExportCSV.php'); }
              }else {
                //คำสั่งquery
                $query = mysqli_query($conn, "SELECT * FROM report_it LEFT JOIN comment ON report_it.rp_order_id = comment.rp_id_order INNER JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem INNER JOIN department ON report_it.rp_dep = department.id_department WHERE rp_type_problem in ($Spid)  AND rp_personnel_closed = '$EMP' AND MONTHNAME(rp_success_job) like '$M' AND year(rp_success_job) like '$y' group by rp_order_id ");
                //ชุดการทำงานเพื่อqueryมา save เป็นcsv
                $QNR = mysqli_num_rows($query);
                if (!$QNR){
                  echo "<script>";
                  echo "alert(\"ไม่พบข้อมูลที่ต้องการครับ\");"; 
                  echo "window.history.back()";
                echo "</script>";
                }else if (isset($QNR)){include('Func_ExportCSV.php'); }
                
                
              }
              
}else{
  echo "<script>";
  echo "alert(\"ทำเครื่องหมายประเภทของคำถามก่อนครับ\");"; 
  echo "window.history.back()";
echo "</script>";

}
    
 

 
?>