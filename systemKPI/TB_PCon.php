<!-- ส่วนของการใส่ข้อมูล Record -->
<tbody>
        <?php 

        require ("conn.php");
        $sql = " SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem  GROUP BY `rp_type_problem`;  ";
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
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ผ่าน' AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ไม่ผ่าน' AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'No SLA' AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like '' AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r'AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>

        </tr>
         <?php } ?>

      </tbody>
      <tbody style="background-color:black ; color:white; ">
        <tr style="font-size:18px; font-weight: 600; text-align: center;" >
          <td colspan="">รวม</td>

          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like 'ผ่าน' AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $sucdata=mysqli_num_rows($result);
    echo $sucdata;?>
    </td>
          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like 'ไม่ผ่าน' AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
    </td>
          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like 'No SLA'AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $NSdata=mysqli_num_rows($result);
    echo $NSdata;?>
    </td>
    <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like '' AND rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $Nudata=mysqli_num_rows($result);
    echo $Nudata;?>
    </td>
          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_personnel_closed = '$EMP' ;";
    $result = mysqli_query($con, $SSuc);
    $Adata=mysqli_num_rows($result);
    echo $Adata;?>
    </td>
          

        </tr>
      </tbody>
      <!--  สินสุด ส่วนของการใส่ข้อมูล Record -->