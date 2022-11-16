<?php
require("conn.php");
$sql = "SELECT * FROM  `report_it` WHERE 1";


$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>KPI Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <script src="js/mobiscroll.javascript.min.js"></script>
  <script src="js/Drop.js"></script>
  < </head>

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
        <form align="left" action="#" method="post"
          style="display: inline-block; position: absolute; right: 0px; margin-top: 8px; margin-right: 10px;">
          <input align="center" class="btn btn-success" type="submit" value="Export file CSV." name="ext_report_it"
            name="ext_report_it">
          <input type="text" id="daterange" name="daterange" value="">
          <select name="rp_type_problem" id="rp_type_problem">
            <option value selected> ---- ประเภทปัญหาที่ต้องการ Export ----</option>
            <option value="1">Computer&Notebook ใช้งานไม่ได้</option>
            <option value="2">E-mail ใช้งานไม่ได้</option>
            <option value="3">File Share ใช้งานไม่ได้</option>
            <option value="4">Internet ใช้งานไม่ได้</option>
            <option value="5">รีเซ็ท/ปลดล็อค รหัสการใช้งานระบบ</option>
            <option value="6">ปัญหา Printer / Scanner / Fax</option>
            <option value="7">ขอติดตั้งโปรเเกรมเพิ่มเติม</option>
            <option value="8">ขอเพิ่ม สิทธิ์ การใช้งานระบบ</option>
            <option value="9">ขอยืม PC&Notebook / อุปกรณ์คอมพิวเตอร์</option>
            <option value="10">งานโปรเจ็ค</option>
            <option value="11">Service ตู้บุญเติมมีปัญหา</option>
            <option value="12">ปัญหา Cenpay</option>
            <option value="13">ส่งเครื่องพนักงงานใหม่</option>
            <option value="14">อื่นๆ</option>
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
      "This information shows the potential of the people in the team. There is no right to modify the information in
      any case."
    </font>
  </marquee>
  <!-- end slide -->

  <!-- dropdown month&people -->
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <select id="Month" name="Month"
          style="width:100%; height:max-content; font-size:24px; background-color:#FBDCE4; border-radius:8px; font-family: 'IBM Plex Sans Thai', sans-serif;">
          <option value selected> ---- เดือน ----</option>
          <option value="มกราคม">มกราคม</option>
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
          <option value="ธันวาคม">ธันวาคม</option>
        </select>
      </div>
      <div class="col-md-5">
        <select id="NameAdmin" name="Admin"
          style="width:100% ;height:max-content; font-size:24px; background-color:#E8C8DD; border-radius:8px; font-family: 'IBM Plex Sans Thai', sans-serif;">
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
        <?php if ($count > 0) { ?>
        <table class="table table-bordered">
          <!-- ส่วนของหัวตาราง -->
          <thead
            style="background-color: #ffb7f9b7; font-family: 'IBM Plex Sans Thai', sans-serif; font-size: 18px; text-align: center;">
            <tr>
              <th>ปัญหา
                <!-- ปุ่ม filter และ dropdown-->
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">
                    <span>
                      <img src="im/6488674.png" alt="ADbanner" class="filterbutton">
                    </span>
                  </button>
                  <!-- ส่วนของปุ่ม filter-->
                  <form action="" method="GET">
                    <div id="myDropdown" class="dropdown-content">
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
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">ขอเพิ่ม สิทธิ์
                      การใช้งานระบบ
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">ขอติดตั้งโปรแกรมเพิ่มเติม
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">งานโปรเจค
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">ขอยืม PC &
                      Notebook / อุปกรณ์คอมพิวเตอร์
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">ปัญหา Printer /
                      Scanner / FAX
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">ปัญหา
                      ระบบโทรศัพท์ / CRM
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">รีเซท / ปลดล็อค
                      รหัสการใช้งานระบบ
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">ส่งเครื่องพนักงานใหม่
                      <br>
                      <input type="checkbox" id="myCheck" onclick="myFunction2()">อื่น ๆ
                      <br>

                      <button type="submit" class="btn btn-warning" onclick="Checkingall()">ดูทั้งหมด</button>
                      <button type="submit" class="btn btn-success">confirm</button>
                    </div>
                  </form>
                </div>
                <!-- สิ้นสุด ปุ่ม filter -->
              </th>
              <th>เกินเวลา</th>
              <th>สำเร็จตามเวลา</th>
              <th>จำนวน</th>
            </tr>
          </thead>
          <!-- สินสุด ส่วนของหัวตาราง -->

          <!-- ส่วนของการใส่ข้อมูล Record -->
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td>
                <?php echo $row["rp_name"]; ?>
              </td>
              <td>
                <?php echo $row["rp_type_problem"]; ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
          <!--  สินสุด ส่วนของการใส่ข้อมูล Record -->
        </table>

        <?php } else { ?>
        <div class="alert alert-danger">
          ไม่มีข้อมูล
        </div>
        <?php }
            mysqli_close($conn); ?>

      </div>

      <!-- แสดงตารางฝั่งคำนวณ KPI-->
      <div class="col-3 col-sm-3">
        <table class="table table-bordered">
          <thead
            style="background-color:greenyellow; font-family: 'IBM Plex Sans Thai', sans-serif; text-shadow: 10px; font-size: 20px;">
            <tr>
              <th>คิดเป็นเปอร์เซนต์</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td style="text-align:center;">98.45%</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>

</html>