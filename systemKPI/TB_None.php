<!-- ส่วนของการใส่ข้อมูล Record -->
<tbody>
        <?php 
        require ("conn.php");
       ?>
       <tbody>
           
           <?php echo "None" ;?>
           </tbody>


      </tbody>
      <tbody style="background-color:black ; color:white; ">
        <tr style="font-size:18px; font-weight: 600; text-align: center;" >
          <td>รวม</td>

          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like 'ผ่าน' ;";
    $result = mysqli_query($con, $SSuc);
    $sucdata=mysqli_num_rows($result);
    echo $sucdata;?>
    </td>
          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like 'ไม่ผ่าน' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
    </td>
          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like 'No SLA' ;";
    $result = mysqli_query($con, $SSuc);
    $NSdata=mysqli_num_rows($result);
    echo $NSdata;?>
    </td>
    <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_sla_job like '' ;";
    $result = mysqli_query($con, $SSuc);
    $Nudata=mysqli_num_rows($result);
    echo $Nudata;?>
    </td>
          <td>
            <?php 
    $SSuc= "SELECT * FROM report_it WHERE 1 ;";
    $result = mysqli_query($con, $SSuc);
    $Adata=mysqli_num_rows($result);
    echo $Adata;?>
    </td>
          

        </tr>
      </tbody>
      <!--  สินสุด ส่วนของการใส่ข้อมูล Record -->