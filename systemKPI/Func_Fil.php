<?php 
$pid = array();
if (isset($_GET['typeP'])) {
    // Add the value of the typeP parameter to the array
    $pid[] = $_GET['typeP'];
    // Build the SQL query using the IN operator and the implode function
$sql = "SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem GROUP BY rp_type_problem WHERE rp_type_problem IN ('" . implode("', '", $pid) . "')";

// Execute the query
$result = mysqli_query($conn, $query);
  }else{
    include "index_non.php";
  }
  

?>
