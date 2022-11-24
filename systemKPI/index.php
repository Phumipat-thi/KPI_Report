<?php
$a = 666;
$b = 777;
?>
<?php 
// if (isset($_POST['exp_report_it'])) {

// $ex = explode('-', $_POST['daterange']);
// $date_start = str_replace('/', '-', trim($ex[0]));
// $date_end = str_replace('/', '-', trim($ex[1]));
// header('Content-Type: text/csv; charset=utf-8');
// header('Content-Disposition: attachment; filename=report_it.csv');
// $output = fopen('php://output', 'w');
// fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));
// fputcsv($output, array('ลำดับ', 'รหัสงาน', 'รหัสพนักงาน', 'ชื่อผู้แจ้ง', 'นามสกุลผู้แจ้ง', 'ฝ่าย', 'อีเมล์ผู้แจ้ง', 'เบอร์โทรโต๊ะ', 'ประเภทปัญหา', 'วันที่แจ้ง', 'วันที่ดำเนินการ', 'วันที่ปิดงาน', 'จำนวนเวลาที่ใช้', 'SLA', 'รายละเอียดเพิ่มเติม', 'การแก้ไขปัญหา', 'ผู้รับผิดชอบ', 'สถานะ', 'ความคิดเห็น', 'ความพึงพอใจ', 'ผู้แจ้งปิดงาน', 'รับ Call CC', 'ตอบ Line CC', 'แจ้ง Line ตัวแทน', 'แจ้งสาเหตุปัญหา', 'รายละเอียดของปัญหา', 'แจ้ง Line CC ปิดงาน', 'แจ้ง Line ตัวแทน ปิดงาน'));

// if (empty($_POST['rp_type_problem'])) {
//   $SQL = "SELECT A.id, rp_order_id, rp_id_emp, rp_name, rp_surname, C.department_name, rp_email, rp_desk_phone, D.type_problem_name, rp_start_job, rp_pending_job, rp_success_job, rp_sumdate_job, rp_sla_job, rp_desc, rp_solve, rp_personnel_closed, rp_status, B.rp_comment, B.rp_feedback, B.rp_id_order, cc_report,cc_respond,report_agent,cc_problem_time,cc_problem,cc_closed,agent_closed ";
//   $SQL = $SQL . "FROM report_it A LEFT JOIN comment B ON (A.rp_order_id = B.rp_id_order) INNER JOIN department C ON (A.rp_dep = C.id_department) INNER JOIN type_problem D ON (A.rp_type_problem = D.id_problem) WHERE rp_start_job BETWEEN ' " . $date_start . " 'AND' " . $date_end . "' ";
//   $SQL = $SQL . "GROUP BY rp_order_id ORDER BY A.id DESC";
//   $rows = mysqli_query($con, $SQL);
// } else {
//   $SQL = "SELECT A.id, rp_order_id, rp_id_emp, rp_name, rp_surname, C.department_name, rp_email, rp_desk_phone, D.type_problem_name, rp_start_job, rp_pending_job, rp_success_job, rp_sumdate_job, rp_sla_job, rp_desc, rp_solve, rp_personnel_closed, rp_status, B.rp_comment, B.rp_feedback, B.rp_id_order, cc_report,cc_respond,report_agent,cc_problem_time,cc_problem,cc_closed,agent_closed ";
//   $SQL = $SQL . "FROM report_it A LEFT JOIN comment B ON (A.rp_order_id = B.rp_id_order) INNER JOIN department C ON (A.rp_dep = C.id_department) INNER JOIN type_problem D ON (A.rp_type_problem = D.id_problem) WHERE a.rp_type_problem ='" . $_POST['rp_type_problem'] . "' AND rp_start_job BETWEEN ' " . $date_start . " 'AND' " . $date_end . "' ";
//   $SQL = $SQL . "GROUP BY rp_order_id ORDER BY A.id DESC";
//   $rows = mysqli_query($con, $SQL);
// }

// print_r( $SQL); exit();
// while ($row = mysqli_fetch_assoc($rows)) {
//   fputcsv($output, $row);
// }
// fclose($output);
// mysqli_close($con);
// exit();
// }
$months[1] = 'มกราคม';
$months[2] = 'กุมภาพันธ์';
$months[3] = 'มีนาคม';
$months[4] = 'เมษายน';
$months[5] = 'พฤษภาคม';
$months[6] = 'มิถุนายน';
$months[7] = 'กรกฎาคม';
$months[8] = 'สิงหาคม';
$months[9] = 'กันยายน';
$months[10] = 'ตุลาคม';
$months[11] = 'พฤศจิกายน';
$months[12] = 'ธันวาคม';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">


<head>
  <title>KPI Report</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/style.css" rel="stylesheet" />
  <script src="js/Drop.js"></script>
  <!--START-DateRangePicker-->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <script>
    /*$(function () {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function (start, end, label) {
console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' +
          end.format('DD-MM-YYYY'));
      });
    });*/

    $(function() {
  $('input[name="datetimes"]').daterangepicker({
    timePicker: false,
    // startDate: moment().startOf('hour'),
    // endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'YYYY/MM/DD '
    }
  });
});
  </script>
  <!--END-DateRangePicker-->

</head>

<body>
  <style>
    body {
      background-color: #ffffff;
    }
  </style>

  <!--ส่วน navbar-->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">KPI Report</a>
        <form align="left" action="Func_Exportcsv.php" method="post"
          style="display: inline-block; position: absolute; right: 0px; margin-top: 8px; margin-right: 10px;">

          <button class="btn btn-success" value="Export file CSV." type="submit"> Export file CSV.</button>
          
          <input type="text" name="datetimes" value="datetimes" style="height: 33px;" width="80px"/>
          <!-- <input type="text" name="daterange" value="daterange" style="height: 33px;" width="80px" ;>  -->

          <select name="rp_type_problem" id="rp_type_problem" style="height: 33px;" width="80px" ;>
            <option name="TP" value selected> ---- ประเภทปัญหาที่ต้องการ Export ----</option>
            <option value="1">Computer&Notebook ใช้งานไม่ได้</option>
            <option value="2">E-mail ใช้งานไม่ได้</option>
            <option value="3">File Share ใช้งานไม่ได้</option>
            <option value="4">Internet ใช้งานไม่ได้</option>
            <option value="5">รีเซ็ท/ปลดล็อค รหัสการใช้งานระบบ</option>
            <option value="6">ปัญหา ระบบโทรศัพท์ / CRM</option>
            <option value="7">ปัญหา Printer / Scanner / Fax</option>
            <option value="9">ขอติดตั้งโปรเเกรมเพิ่มเติม</option>
            <option value="10">ขอเพิ่ม สิทธิ์ การใช้งานระบบ</option>
            <option value="11">ขอยืม PC&Notebook / อุปกรณ์คอมพิวเตอร์</option>
            <option value="12">งานโปรเจ็ค</option>
            <option value="13">Service ตู้บุญเติมมีปัญหา</option>
            <option value="14">อื่นๆ</option>
            <option value="15">ส่งเครื่องพนักงานใหม่ </option>
            <option value="16">ปัญหา Cenpay</option>
          </select>
        </form>
      </div>
    </div>
  </nav>
  <!--End ส่วน navbar-->

  <!-- slide -->
  <marquee onmouseover="this.stop();" onmouseout="this.start();" height:10px;>
    <font size="2" color="red">>> &nbsp; </font>
    <font size="2" color="black">
      "This information shows the potential of the people in the team. There is no right to modify the information
      in
      any case. "
    </font>
  </marquee>
  <!-- end slide -->

  <!-- dropdown month&people -->
  <div class="container">
    <div class="row">
      <div class="col-9 col-sm-9">
      <select id="Month" name="Month" style="width:100%; height:max-content; font-size:24px; background-color:#d9edf7; border-radius:8px; border-color:#BEBEBE; font-family: 'IBM Plex Sans Thai', sans-serif;  text-align:center;">
                        <option value=""> ------ทั้งปี----- </option>
                        <?php
                            for ($i = 1; $i <= 12; $i++) {
                        ?>
                            <option value="<?php echo $months[$i]; ?>" <?php if ($i == date('m')) { echo "selected";  } ?>>
                            <?php echo $months[$i]; ?>
                            </option>
                        <?php } ?>
          <!-- <option value="มกราคม">มกราคม</option>
          <option value="กุมภาพันธ์">กุมภาพันธ์</option>
          <option value="มีนาคม">มีนาคม</option>
          <option value="เมษายน">เมษายน</option>
          <option value="พฤษภาคม">พฤษภาคม</option>
          <option value="มิถุนายน">มิถุนายน</option>
          <option value="กรกฎาคม">กรกฎาคม</option>
          <option value="สิงหาคม">สิงหาคม</option>
          <option value="กันยายน">กันยายน</option>
          <option value="ตุลาคม">ตุลาคม</option>
          <option value="พฤศจิกายน">พฤศจิกายน</option>
          <option value="ธันวาคม">ธันวาคม</option> -->
      </select>

      </div>
      <div class="col-3 col-sm-3">
        <select id="NameAdmin" name="Admin"
          style="width:100% ;height:max-content; font-size:24px; background-color:#d9edf7; border-radius:8px; border-color:#BEBEBE; text-align:center; font-family: 'IBM Plex Sans Thai', sans-serif;">
          <option value="1">ALL</option>
          <option value="2">จักรรินทร์</option>
          <option value="3">นุจรีย์</option>
          <option value="4">พีรพงศ์</option>
          <option value="5">วิจิตร</option>
          <option value="6">วิชิต</option>
          <option value="7">วีรยุทธ</option>
          <option value="8">วุฒิไกร</option>
          <option value="9">สุทัศน์</option>
          <option value="10">อนุชา</option>
          <option value="11">อุบลรัตน์</option>
          <option value="12">Admin</option>
          <option value="13">นักศึกษาฝึกงาน</option>
        </select>
      </div>
    </div>
  </div>
  <!-- สิ้นสุดdropdown month&people -->

  <br>

  <!-- แสดงตารางทั้งหมด-->
  <div class="container">
    <div class="row">
      <!-- แสดงตารางฝั่งปัญหา-->
      <div class="col-9 col-sm-9">
        <table class="table table-bordered">
          <!-- ส่วนของหัวตาราง -->
          <thead
            style="background-color: #ffb7f9b7; font-family: 'IBM Plex Sans Thai', sans-serif; font-size: 18px; text-align: center;">
            <tr>
              <th style=" text-align:center;">ปัญหา
                <!-- ปุ่ม filter และ dropdown-->
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">

                    <span>
                      <img src="im/6488674.png" alt="ADbanner" class="filterbutton">
                    </span>

                  </button>

                  <!-- ส่วนของปุ่ม filter-->
                  <form action="" method="GET">
                    <div id="myDropdown" class="dropdown-content ">
                      <div style="text-align:left;">
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">Computer&Notebook
                        ใช้งานไม่ได้
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">E-mail
                        รับส่งใช้งานไม่ได้
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">File Share
                        ใช้งานไม่ได้
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">Internet
                        ใช้งานไม่ได้
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">Service
                        ตู้บุญเติมมีปัญหา
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">ขอเพิ่ม
                        สิทธิ์
                        การใช้งานระบบ
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">ขอติดตั้งโปรแกรมเพิ่มเติม
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">งานโปรเจค
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">ขอยืม PC &
                        Notebook / อุปกรณ์คอมพิวเตอร์
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">ปัญหา
                        Printer /
                        Scanner / FAX
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">ปัญหา
                        ระบบโทรศัพท์ / CRM
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">รีเซท /
                        ปลดล็อค
                        รหัสการใช้งานระบบ
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">ส่งเครื่องพนักงานใหม่
                        <br>
                        <input type="checkbox" id="myCheck" onclick="myFunction2()">อื่น ๆ
                        <br><input type="checkbox" id="myCheck" onclick="myFunction2()">ส่งเครื่องพนักงานใหม่
                        <br><input type="checkbox" id="myCheck" onclick="myFunction2()">ปัญหา
                        Cenpay
                        <br>

                        <button type="submit" class="btn btn-warning" onclick="Checkingall()">ดูทั้งหมด </button>
                        <button type="submit" class="btn btn-success">confirm</button>
                      </div>

                    </div>
                  </form>
              </th>

      </div>
      <!-- สิ้นสุด ปุ่ม filter -->

      <th style=" text-align:center;">ผ่าน</th>
      <th style="  text-align:center;">ไม่ผ่าน</th>
      <th style=" text-align:center;">No Sla</th>
      <th style=" text-align:center;">Null</th>
      <th style=" text-align:center;">ผลรวม</th>
      </tr>
      </thead>
      <!-- สินสุด ส่วนของหัวตาราง -->

      <!-- ส่วนของการใส่ข้อมูล Record -->
      <tbody>
        <?php 
        require ("conn.php");
        $sql = " SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem GROUP BY rp_type_problem; ";
        
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
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ผ่าน' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'ไม่ผ่าน' ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>

          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like 'No SLA'  ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' AND rp_sla_job like ''  ;";
    $result = mysqli_query($con, $SSuc);
    $data=mysqli_num_rows($result);
    echo $data;?>
          </td>
          
          <td>
          <?php 
    $SSuc= "SELECT * FROM report_it WHERE rp_type_problem = '$r' ;";
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
      </table>
    </div>

    <!-- แสดงตารางฝั่งคำนวณ KPI-->
    <div class="col-9 col-sm-3">
      <table class="table table-bordered">
        <thead
          style="background-color:#FFCCCC; font-family: 'IBM Plex Sans Thai', sans-serif; text-shadow: 10px; font-size: 20px;">
          <tr>
            <th style="text-align:center;">คิดเป็นเปอร์เซนต์</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td style="text-align:center; height:600px; font-size: 28px; background-color: #AEFDD8;">
              <br><br><br><br><br><br>
              <?php
                            $AA = $Adata - ($NSdata + $Nudata);
                            $KPI = ($sucdata / $AA) * 100;
                            $ans = number_format($KPI, 2);
                            echo "$ans" . "%";
                            ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- จบ ตาราง-->
</body>

</html>