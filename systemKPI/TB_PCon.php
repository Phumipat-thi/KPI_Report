<!-- ส่วนของการใส่ข้อมูล Record -->
<?php 

      if (isset($_POST['typeP'])){
             $pid = $_POST['typeP'];
             $glue = "','";
               $Spid = "'" . implode($glue, $pid) . "'" ;
               ?>
<tbody>
        <?php 

        require ("conn.php");
        $sql = " SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem WHERE rp_type_problem in ($Spid)  GROUP BY `rp_type_problem`;  ";
        $Loopresult = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($Loopresult)) { ?>
        <tr>
          <td>
            <?php
  echo $row["type_problem_name"];
  $r = $row["rp_type_problem"];
    ?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ผ่าน' AND rp_personnel_closed = '$EMP' AND year(rp_success_job) like '$y' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $APD[] = $data; 
$PDsum = array_sum($APD);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ไม่ผ่าน' AND rp_personnel_closed = '$EMP'  AND year(rp_success_job) like '$y';";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $AND[] = $data; 
$NDsum = array_sum($AND);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'No SLA' AND rp_personnel_closed = '$EMP' AND year(rp_success_job) like '$y' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $ANoSLAD[] = $data; 
$NoSLADsum = array_sum($ANoSLAD);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND (rp_sla_job like 'เวลาไม่ถูกต้อง' or rp_sla_job like '') AND rp_personnel_closed = '$EMP'  AND year(rp_success_job) like '$y';";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $ANullD[] = $data; 
    $NullDsum = array_sum($ANullD);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r'AND rp_personnel_closed = '$EMP'  AND year(rp_success_job) like '$y';";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $AAllD[] = $data; 
$AllDsum = array_sum($AAllD);
    echo $data;?>
          </td>

        </tr>
         <?php } ?>
         <?php }elseif (empty($_POST['typeP'])){ ?>
          <tbody>
        <?php 

        require ("z.php");
        $sql = " SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem   GROUP BY `rp_type_problem`;  ";
        $Loopresult = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($Loopresult)) { ?>
        <tr>
          <td>
            <?php
  echo $row["type_problem_name"];
  $r = $row["rp_type_problem"];
    ?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ผ่าน' AND rp_personnel_closed = '$EMP' AND year(rp_success_job) like '$y' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $APD[] = $data; 
$PDsum = array_sum($APD);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ไม่ผ่าน' AND rp_personnel_closed = '$EMP' AND year(rp_success_job) like '$y' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $AND[] = $data; 
$NDsum = array_sum($AND);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'No SLA' AND rp_personnel_closed = '$EMP' AND year(rp_success_job) like '$y' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $ANoSLAD[] = $data; 
$NoSLADsum = array_sum($ANoSLAD);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND (rp_sla_job like 'เวลาไม่ถูกต้อง' or rp_sla_job like '') AND rp_personnel_closed = '$EMP' AND year(rp_success_job) like '$y' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $ANullD[] = $data; 
    $NullDsum = array_sum($ANullD);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r'AND rp_personnel_closed = '$EMP'AND  year(rp_success_job) like '$y'  ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    $AAllD[] = $data; 
$AllDsum = array_sum($AAllD);
    echo $data;?>
          </td>

        </tr>
         <?php } ?>
         <?php } ?>

      </tbody>
      <tbody style="background-color:black ; color:white; ">
        <tr style="font-size:18px; font-weight: 600; text-align: center;" >
        <td colspan="">รวม</td>

<td>
  <?php 
echo $PDsum;?>
</td>
<td>
  <?php 
echo $NDsum;?>
</td>
<td>
  <?php 

echo $NoSLADsum;?>
</td>
<td>
  <?php 

echo $NullDsum;?>
</td>
<td>
  <?php 

echo $AllDsum;?>
</td>


</tr>
</tbody>
      <!--  สินสุด ส่วนของการใส่ข้อมูล Record -->