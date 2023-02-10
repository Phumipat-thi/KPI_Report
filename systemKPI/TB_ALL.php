<!-- ส่วนของการใส่ข้อมูล Record -->
<?php

//  ถ้ามีการติ๊ก ให้แสดงแค่ที่ติ๊ก
if (isset($_POST['typeP'])) {
  $pid = $_POST['typeP'];
  $glue = "','";
  $Spid = "'" . implode($glue, $pid) . "'";
?>

  <tbody>
    <?php
    require("connect.php");
    $sql = " SELECT * FROM report_it  INNER JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem WHERE rp_type_problem in ($Spid) GROUP BY rp_type_problem; ";

    $Loopresult = mysqli_query($conn, $sql);

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
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ผ่าน' AND year(rp_success_job) like '$y' ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $APD[] = $data;
          $PDsum = array_sum($APD);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ไม่ผ่าน' AND year(rp_success_job) like '$y';";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $AND[] = $data;
          $NDsum = array_sum($AND);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'No SLA' AND year(rp_success_job) like '$y' ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $ANoSLAD[] = $data;
          $NoSLADsum = array_sum($ANoSLAD);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND (rp_sla_job like 'เวลาไม่ถูกต้อง' or rp_sla_job like '') AND year(rp_success_job) like '$y' ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $ANullD[] = $data;
          $NullDsum = array_sum($ANullD);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r'AND year(rp_success_job) like '$y' ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $AAllD[] = $data;
          $AllDsum = array_sum($AAllD);
          echo $data; ?>
        </td>

      </tr>
    <?php } ?>

  <?php /*ถ้าไม่มีการติ๊กใดๆ ให้แสดงทั้งหมด*/ } elseif (empty($_POST['typeP'])) {  ?>
  <tbody>
    <?php
    require("connect.php");
    $sql = " SELECT * FROM report_it INNER JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem GROUP BY rp_type_problem; ";

    $Loopresult = mysqli_query($conn, $sql);
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
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ผ่าน' AND year(rp_success_job) like '$y';";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $APD[] = $data;
          $PDsum = array_sum($APD);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ไม่ผ่าน'AND year(rp_success_job) like '$y' ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $AND[] = $data;
          $NDsum = array_sum($AND);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'No SLA'AND year(rp_success_job) like '$y'  ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $ANoSLAD[] = $data;
          $NoSLADsum = array_sum($ANoSLAD);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND (rp_sla_job like 'เวลาไม่ถูกต้อง' or rp_sla_job like '') AND year(rp_success_job) like '$y' ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $ANullD[] = $data;
          $NullDsum = array_sum($ANullD);
          echo $data; ?>
        </td>

        <td>
          <?php
          $SSuc = "SELECT * FROM report_it WHERE rp_type_problem = '$r'AND year(rp_success_job) like '$y' ;";
          $result = mysqli_query($conn, $SSuc);
          $data = mysqli_num_rows($result);
          $AAllD[] = $data;
          $AllDsum = array_sum($AAllD);
          echo $data; ?>
        </td>

      </tr>
    <?php } ?>

  <?php }  ?>

  </tbody>
  <tbody style="background-color:black ; color:white; ">
    <tr style="font-size:18px; font-weight: 600; text-align: center;">
      <td colspan="">รวม</td>

      <td>
        <?php
        echo $PDsum; ?>
      </td>
      <td>
        <?php
        echo $NDsum; ?>
      </td>
      <td>
        <?php

        echo $NoSLADsum; ?>
      </td>
      <td>
        <?php

        echo $NullDsum; ?>
      </td>
      <td>
        <?php

        echo $AllDsum; ?>
      </td>


    </tr>
  </tbody>


  <!--  สินสุด ส่วนของการใส่ข้อมูล Record -->


  <!-- |-- Hidden --| ตัวแปรจากข้อมูลทั้งหมด เพื่อเอามาทำกับสัดส่วนจากงานทั้งหมด -->
  <?php
  //หากมีการกรอก filter
if (isset($_POST['typeP'])) {
    $pid = $_POST['typeP'];
    $glue = "','";
    $Spid = "'" . implode($glue, $pid) . "'";

    $sql = " SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem WHERE rp_type_problem in ($Spid) GROUP BY rp_type_problem; ";
    $Loopresult = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($Loopresult)) { ?>
      <?php
        $r = $row["rp_type_problem"];
        
        // ข้อมูลทั้งหมด
        $S2Suc = "SELECT * FROM report_it WHERE rp_type_problem = '$r'AND year(rp_success_job) like '$y';";
        $result = mysqli_query($conn, $S2Suc);
        $data4all = mysqli_num_rows($result);
        $AAll4allD[] = $data4all;
        $All4allDsum = array_sum($AAll4allD);// ตัวแปรที่จะนำไปใช้
    }

    //หากไม่มี จะแสดงผลให้หมดทุกตัว
} elseif (empty($_POST['typeP'])) {
  $sql = " SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem GROUP BY rp_type_problem; ";
    $Loopresult = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($Loopresult)) { ?>
      <?php
        $r = $row["rp_type_problem"];
        
        // ข้อมูลทั้งหมด
        $S2Suc = "SELECT * FROM report_it WHERE rp_type_problem = '$r'AND year(rp_success_job) like '$y';";
        $result = mysqli_query($conn, $S2Suc);
        $data4all = mysqli_num_rows($result);
        $AAll4allD[] = $data4all;
        $All4allDsum = array_sum($AAll4allD);// ตัวแปรที่จะนำไปใช้
    }
 }
      ?>