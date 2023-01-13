<?php
 error_reporting(0);
 include('MnY.php');
 $M = $_POST['Month'];
 $y = $_POST['Year'];
 $EMP = $_POST['NameAdmin'];
// ทำ เข้า server 
// session_start(); 
// 	require_once("connect.php");

// 	if(!isset($_SESSION['emp_id']))
// 	{
// 		echo "<script language=\"JavaScript\">";
// 		echo "alert('กรุณาล็อกอินเข้าสู่ระบบ !!!');window.location='login.html'";
// 		echo "</script>";
// 	}

// 	if($_SESSION['emp_status'] != "Admin")
// 	{
// 		echo "<script language=\"JavaScript\">";
// 		echo "alert('เฉพาะ Admin เท่านั้น !!!');window.location='admin.html'";
// 		echo "</script>";
// 	}

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
  <?php

  ?>
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
        <button align="left"   class="btn btn-success" style="display: inline-block; position: absolute; right: 0px; margin-top: 8px; margin-right: 10px;" onclick="window.open('popform.php','Popup','height=400,width=700,status=no,toolbar=no,menubar=no')">Export CSV.</button>
        <!-- <form align="left" action="Func_Exportcsv.php" method="post" style="display: inline-block; position: absolute; right: 0px; margin-top: 8px; margin-right: 10px;">

          <button class="btn btn-success" value="Export file CSV." type="submit"> Export file CSV.</button>

          <input type="text" name="datetimes" value="datetimes" style="height: 33px;" width="80px" />
         
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
        </form> -->
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

  <!-- dropdown month,people&year -->
  <div class="container">
    <div class="row">
    <div class="col-3 col-sm-3">
        <form method="POST">
        <select id="Year" name="Year" onchange="this.form.submit();" style="width:100%; height:max-content; font-size:24px; background-color:#d9edf7; border-radius:8px; border-color:#BEBEBE; font-family: 'IBM Plex Sans Thai', sans-serif;  text-align:center;">
          <?php
          $selected_Year = isset($_POST['Year']) ? $_POST['Year'] : null;
          foreach ($Year as $Year_index => $Year_name) {
          ?>
            <option value="<?php echo $Year_name; ?>" <?php if ($Year_name == $selected_Year) {
                                                            echo "selected";
                                                          } ?>>
              <?php echo $Year_name; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="col-6 col-sm-6">
        <form method="POST">
        <select id="Month" name="Month" onchange="this.form.submit();" style="width:100%; height:max-content; font-size:24px; background-color:#d9edf7; border-radius:8px; border-color:#BEBEBE; font-family: 'IBM Plex Sans Thai', sans-serif;  text-align:center;">
          <option value=""> ------ทั้งปี----- </option>
          <?php
          $selected_month = isset($_POST['Month']) ? $_POST['Month'] : null;
          foreach ($months as $month_index => $month_name) {
          ?>
            <option value="<?php echo $month_name; ?>" <?php if ($month_name == $selected_month) {
                                                            echo "selected";
                                                          } ?>>
              <?php echo $month_name; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      

      <div class="col-3 col-sm-3">
        <select id="NameAdmin" name="NameAdmin" onchange="this.form.submit();" style="width:100% ;height:max-content; font-size:24px; background-color:#d9edf7; border-radius:8px; border-color:#BEBEBE; text-align:center; font-family: 'IBM Plex Sans Thai', sans-serif;">
        <option value=""> ------ทุกคน----- </option>
          <?php
          $selected_Peoples = isset($_POST['NameAdmin']) ? $_POST['NameAdmin'] : null;
          require ("connect.php");
          $query = "SELECT * FROM report_it GROUP BY rp_personnel_closed;";
          $query_run  = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($query_run)) {
            $name = $row['rp_personnel_closed'];
            $selected = "";
            if ($name == $selected_Peoples) {
              $selected = "selected";
            }
            echo "<option value='$name' $selected>$name</option>";
          }?>
        </option>
        </select>
        
      </div>
    </div>
  </div>
  <!-- สิ้นสุดdropdown month,people&year -->

  <br>

  <!-- แสดงตารางทั้งหมด-->
  <div class="container">
    <div class="row">
<!-- Filter แสดงปัญหา/ไม่แสดงปัญหา-->
    <div class="col-3 col-sm-3">
    <table class="table table-bordered">
          <thead style="background-color: #e9e1ed; font-family: 'IBM Plex Sans Thai', sans-serif; font-size: 16px; text-align: center;">
            <tr>
              <th>
              <form method="POST">
                        <?php
                        require ("connect.php");
                        $brand_query = "SELECT * FROM report_it JOIN type_problem ON report_it.rp_type_problem = type_problem.id_problem GROUP BY rp_type_problem;";
                        $brand_query_run  = mysqli_query($conn, $brand_query);

                        if (mysqli_num_rows($brand_query_run) > 0) {
                          foreach ($brand_query_run as $Typeproblem) {
                            $checked = [];
                            if (isset($_POST['typeP'])) {
                              $checked = $_POST['typeP'];
                            }
                        ?>
                            <div>
                              <input type="checkbox" name="typeP[]"  value="<?= $Typeproblem['id_problem']; ?>" <?php if (in_array($Typeproblem['id_problem'], $checked)) { echo "checked"; } ?> />
                              <?= $Typeproblem['type_problem_name']; ?>
                            </div>
                        <?php
                          }
                        }
                        ?>
                        <input type="button" class="btn btn-info"  name="Check_All" value="Check All" onClick="checkAll()">
                        <input type="button" class="btn btn-seconary" name="UnCheck_All" value="UnCheck All " onClick="toggle(this)">
                        <input type="submit" class="btn btn-success" name="confirm" value="confirm " >

                      
                    </form>
              </th>
                      </tr>
                      </thead>
                      </table>
                      </div>
                      <!-- สิ้นสุด Filter แสดงปัญหา/ไม่แสดงปัญหา-->
    
      <!-- แสดงตารางฝั่งปัญหา-->
      <div class="col-6 col-sm-6">
        <table class="table table-bordered">
          <!-- ส่วนของหัวตาราง -->
          <thead style="background-color: #ffb7f9b7; font-family: 'IBM Plex Sans Thai', sans-serif; font-size: 16px; text-align: center;">
            <tr>
              <th style=" text-align:center;">ปัญหา</th>
              <th style=" text-align:center;">ผ่าน</th>
              <th style="  text-align:center;">ไม่ผ่าน</th>
              <th style=" text-align:center;">No Sla</th>
              <th style=" text-align:center;">Null</th>
              <th style=" text-align:center;">ผลรวม</th>
            </tr>
          </thead>
      <!-- สินสุด ส่วนของหัวตาราง -->

      <!-- ส่วนของการใส่ข้อมูล Record -->
      <?php
      if(empty($M) && empty($EMP)){
        include('TB_ALL.php');
      }else if(isset($M) && empty($EMP)) {
        include('TB_MCon.php');
      }else if(empty($M) && isset($EMP)) {
        include('TB_PCon.php');
      }else {
        include('TB_2Con.php');
      }
?>
      <!--  สินสุด ส่วนของการใส่ข้อมูล Record -->
      </table>     
    </div>
    <!-- จบ แสดงตารางฝั่งปัญหา-->

    <!-- แสดงตารางฝั่งคำนวณ KPI-->
    <div class="col-3 col-sm-3">
      <table class="table table-bordered">
        <thead style="background-color:#FFCCCC; font-family: 'IBM Plex Sans Thai', sans-serif; text-shadow: 10px; font-size: 20px;">
          <tr>
            <th style="text-align:center;">คิดเป็นเปอร์เซนต์</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td style="text-align:center; height:534px; font-size: 28px; background-color: #AEFDD8; ">
              <br><br><br><br><br><br>
              <?php
              try {
                if ($AllDsum == 0 ){echo "<span style='color:red;font-weight:bold;'>0.00%</span>";
                  }
              else{ 
                $KPI = ((($PDsum+$NoSLADsum)-$NullDsum) / $AllDsum) * 100;
                $ans = number_format($KPI, 2);
                echo "$ans" . "%";}
            } catch (DivisionByZeroError $e) {
                // log the error message
                error_log($e->getMessage());
                // display a custom error page
                 echo "<span style='color:red;font-weight:bold;'>0.00%</span>";
            }
              ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
      <!-- จบ แสดงตารางฝั่งคำนวณ KPI-->
   
  </div>
   <!-- จบ ตาราง-->
   </div>
</body>

</html>