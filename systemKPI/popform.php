<?php
include('MnY.php');

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

  <body>

  <div class="container">
    <div class="row justify-content-md-center">
    <h1 align="center" style="font-family: 'IBM Plex Sans Thai', sans-serif;" >เมนู Export</h1>
      <br>
        <form method="POST"  action="Func_Logiccheck.php">
          <select  id="Year" name="Year"  style="width:34%; height:max-content; font-size:24px; background-color:#a3d68f; border-radius:8px; border-color:black; font-family: 'IBM Plex Sans Thai', sans-serif;  text-align:center;">
            <?php
            $selected_Year = isset($_POST['Year']) ? $_POST['Year'] : null;
            foreach ($Year as $Year_index => $Year_name) {
            ?>
              <option value="<?php echo $Year_name; ?>" <?php if ($Year_name == $selected_Year) {echo "selected";} ?>>
                <?php echo $Year_name; ?>
              </option>
            <?php } ?>
          </select>
          <select id="Month" name="Month"  style="width:34%; height:max-content; font-size:24px; background-color:#a3d68f; border-radius:8px; border-color:black; font-family: 'IBM Plex Sans Thai', sans-serif;  text-align:center;">
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

          <select id="NameAdmin" name="NameAdmin"  style="width:30% ;height:max-content; font-size:24px; background-color:#a3d68f ; border-radius:8px; border-color:black; text-align:center; font-family: 'IBM Plex Sans Thai', sans-serif;">
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


  <!-- สิ้นสุดdropdown month,people&year -->
  <br><br>

    <table class="table table-bordered">
            <thead style=" background-color: #ff549690; font-family: 'IBM Plex Sans Thai', sans-serif; font-size: 18px; text-align: center;">
              <tr>
                <th>
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
                          

                        
                </th>
                        </tr>
                        </thead>
                        </table>
                        <input type="submit" style="width:100% ;" class="btn btn-success" name="confirm" value="confirm " >
                        <br><br>
                      </form>
                      
                        <!-- สิ้นสุด Filter แสดงปัญหา/ไม่แสดงปัญหา-->
    
    </div>
  </div>
    

    
                    </body>