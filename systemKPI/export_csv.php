<?php

	error_reporting (E_ALL ^ E_NOTICE);
	ini_set('display_errors', 'On');
	session_start();
	require_once("connect.php");

	if(!isset($_SESSION['emp_id']))
	{
		echo "<script language=\"JavaScript\">";
		echo "alert('กรุณาล็อกอินเข้าสู่ระบบ !!!');window.location='admin.html'";
		echo "</script>";
	}

	$sql = "UPDATE employee SET emp_lastupdate = NOW() WHERE emp_id = '".$_SESSION["emp_id"]."' ";
	$query = mysqli_query($con,$sql);

	$strSQL = "SELECT * FROM employee WHERE emp_id = '".$_SESSION['emp_id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>



<?php if (isset($_POST['exp_report_it'])) {

	$ex = explode('-',$_POST['daterange']);
	$date_start =  str_replace('/','-',trim($ex[0]));
	$date_end =  str_replace('/','-', trim($ex[1]));
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=report_it.csv');
	$output = fopen('php://output', 'w');
	fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($output, array('ลำดับ','รหัสงาน','รหัสพนักงาน','ชื่อผู้แจ้ง','นามสกุลผู้แจ้ง','ฝ่าย','อีเมล์ผู้แจ้ง','เบอร์โทรโต๊ะ','ประเภทปัญหา','วันที่แจ้ง','วันที่ดำเนินการ','วันที่ปิดงาน','จำนวนเวลาที่ใช้','SLA','รายละเอียดเพิ่มเติม','การแก้ไขปัญหา','ผู้รับผิดชอบ','สถานะ','ความคิดเห็น','ความพึงพอใจ','ผู้แจ้งปิดงาน','รับ Call CC','ตอบ Line CC','แจ้ง Line ตัวแทน','แจ้งสาเหตุปัญหา','รายละเอียดของปัญหา','แจ้ง Line CC ปิดงาน','แจ้ง Line ตัวแทน ปิดงาน'));



	if(empty($_POST['rp_type_problem'])){
		$SQL = "SELECT A.id, rp_order_id, rp_id_emp, rp_name, rp_surname, C.department_name, rp_email, rp_desk_phone, D.type_problem_name, rp_start_job, rp_pending_job, rp_success_job, rp_sumdate_job, rp_sla_job, rp_desc, rp_solve, rp_personnel_closed, rp_status, B.rp_comment, B.rp_feedback, B.rp_id_order, cc_report,cc_respond,report_agent,cc_problem_time,cc_problem,cc_closed,agent_closed ";
		$SQL = $SQL."FROM report_it A LEFT JOIN comment B ON (A.rp_order_id = B.rp_id_order) INNER JOIN department C ON (A.rp_dep = C.id_department) INNER JOIN type_problem D ON (A.rp_type_problem = D.id_problem) WHERE rp_start_job BETWEEN ' ".$date_start." 'AND' ".$date_end."' ";
		$SQL = $SQL."GROUP BY rp_order_id ORDER BY A.id DESC";
		$rows = mysqli_query($con,$SQL); 
	}else{
		$SQL = "SELECT A.id, rp_order_id, rp_id_emp, rp_name, rp_surname, C.department_name, rp_email, rp_desk_phone, D.type_problem_name, rp_start_job, rp_pending_job, rp_success_job, rp_sumdate_job, rp_sla_job, rp_desc, rp_solve, rp_personnel_closed, rp_status, B.rp_comment, B.rp_feedback, B.rp_id_order, cc_report,cc_respond,report_agent,cc_problem_time,cc_problem,cc_closed,agent_closed ";
		$SQL = $SQL."FROM report_it A LEFT JOIN comment B ON (A.rp_order_id = B.rp_id_order) INNER JOIN department C ON (A.rp_dep = C.id_department) INNER JOIN type_problem D ON (A.rp_type_problem = D.id_problem) WHERE a.rp_type_problem ='".$_POST['rp_type_problem']."' AND rp_start_job BETWEEN ' ".$date_start." 'AND' ".$date_end."' ";
		$SQL = $SQL."GROUP BY rp_order_id ORDER BY A.id DESC";
		$rows = mysqli_query($con,$SQL); 
	}
	
	// print_r( $SQL); exit();
	while ($row = mysqli_fetch_assoc($rows)) 
	{
		fputcsv($output, $row);
	}
	fclose($output);
	mysqli_close($con);
	exit();
	
	}
?>

<?
	include('connect.php');
?>

	<?php
		error_reporting(E_ALL);
		$cntsql="SELECT COUNT(*) AS '' FROM report_it where rp_status='รอคิว' ";
		$cntresult=$con->query($cntsql);
		$fst=true;
		while($cntrow=$cntresult->fetch_assoc())
		{
			$hd=''; $td='';
			foreach($cntrow as $key=>$vl)
			{
				if($fst) $hd .= ''.$key.'';
				$td .= ''.$vl.'';
			}
				if($hd) echo  '',$hd ,'';

				$fst=false;
		}
	?>
	<?php
		error_reporting(E_ALL);
		$cnt2sql="SELECT COUNT(*) AS '' FROM report_it where rp_status='กำลังดำเนินการ' ";
		$cnt2result=$con->query($cnt2sql);
		$fst2=true;
		while($cnt2row=$cnt2result->fetch_assoc())
		{
			$hd2=''; $td2='';
			foreach($cnt2row as $key2=>$v2)
			{
				if($fst2) $hd2 .= ''.$key2.'';
				$td2 .= ''.$v2.'';
			}
				if($hd2) echo  '',$hd2 ,'';

				$fst2=false;
		}
	?>
	<?php
		error_reporting(E_ALL);
		$cnt3sql="SELECT COUNT(*) AS '' FROM report_it where rp_status='เสร็จเรียบร้อย' ";
		$cnt3result=$con->query($cnt3sql);
		$fst3=true;
		while($cnt3row=$cnt3result->fetch_assoc())
		{
			$hd3=''; $td3='';
			foreach($cnt3row as $key3=>$v3)
			{
				if($fst3) $hd3 .= ''.$key3.'';
				$td3 .= ''.$v3.'';
			}
				if($hd3) echo  '',$hd3 ,'';

				$fst3=false;
		}
	?>
	<?php
		error_reporting(E_ALL);
		$cnt4sql="SELECT COUNT(*) AS '' FROM report_it where rp_status='จัดซื้อทดแทน' ";
		$cnt4result=$con->query($cnt4sql);
		$fst4=true;
		while($cnt4row=$cnt4result->fetch_assoc())
		{
			$hd4=''; $td4='';
			foreach($cnt4row as $key4=>$v4)
			{
				if($fst4) $hd4 .= ''.$key4.'';
				$td4 .= ''.$v4.'';
			}
				if($hd4) echo  '',$hd4 ,'';

				$fst4=false;
		}
	?>

	
	<link href='boonterm.ico' rel='icon' type='image/x-icon'/>
	<link rel="stylesheet" href="cssmenu/styles.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css"/>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Datatable/datatables.min.css"/>
	<script type="text/javascript" src="Datatable/datatables.min.js"></script>

	<!-- daterangepicker -->
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-face.css">
	
	<style>
      body	{
				font-family: 'Kanit', sans-serif;
			}
    </style>
	<style type="text/css">
	body 
	{
		background-color: #f5f5f0;
	}
	</style>

<center>

<table width="98%" border="0">
	<tr>
    <td>
<?php include 'menu.php'; ?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="Generator" content="EditPlus®">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="refresh" content="300" />


<title>รอคิว [ <?php echo $td;?> ] | กำลังทำ [ <?php echo $td2;?> ]</title>

	
	
</head>



	<script type="text/javascript">
		function getRefresh() {
			$("#auto").show("slow");
		    $("#autoRefreshReport").load("show_report_it_data.php", '', callback);
		}

		function callback() {
			$("#autoRefreshReport").fadeIn("slow");
			setTimeout("getRefresh();", 300000);
		}

		$(document).ready(getRefresh);

		 $(function(){
	      
		     var obj_check=$(".css-require");
		     $("#myform1").on("submit",function(){
		         obj_check.each(function(i,k){
		             var status_check=0;
		             if(obj_check.eq(i).find(":radio").length>0 || obj_check.eq(i).find(":checkbox").length>0){
		                 status_check=(obj_check.eq(i).find(":checked").length==0)?0:1;    
		             }else{
		                 status_check=($.trim(obj_check.eq(i).val())=="")?0:1;
		             }
		             formCheckStatus($(this),status_check);      
		         });
		         if($(this).find(".has-error").length>0){
		              return false;
		         }
		     });
		      
		     obj_check.on("change",function(){
		         var status_check=0;
		         if($(this).find(":radio").length>0 || $(this).find(":checkbox").length>0){
		             status_check=($(this).find(":checked").length==0)?0:1;    
		         }else{
		             status_check=($.trim($(this).val())=="")?0:1;
		         }
		         formCheckStatus($(this),status_check);       
		     });
		      
		     var formCheckStatus = function(obj,status){
		         if(status==1){
		             obj.parent(".form-group").removeClass("has-error").addClass("has-success");
		             obj.next(".glyphicon").removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");    
		         }else{
		             obj.parent(".form-group").removeClass("has-success").addClass("has-error");
		             obj.next(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");      
		         }
		     }
		 
		 });
	</script>

	<body>
	<br>

	<form align="left" style="display: inline-block;">
		<input type="button" class="btn btn-success" name="button" id="button" value="Create Job"  onclick="window.location='add_report_admin.php'"/>
	</form>
	
	<form align="left" action="#" method="post" style="display: inline-block;">
		<input align="center" class="btn btn-success" type="submit" value="Export File .CSV" name="exp_report_it" id="exp_report_it" />
		<input type="text"  id="daterange" name="daterange" value=" " />
		<?php
				$query = "SELECT * FROM type_problem ORDER BY id_problem asc" or die("Error:" . mysqli_error()); 
				$result = mysqli_query($con, $query); 
    			?>
				<select name="rp_type_problem" id="rp_type_problem">
				<option value="" Selected >ประเภทปัญหาที่ต้องการ Export</option>
				<?php
				while($row = mysqli_fetch_array($result))
				{
				?>
       			 <option value="<?php echo $row["id_problem"];?>"><?php echo $row["type_problem_name"];?></option>
        		<?php
  				  }
   				 ?>
					</select>
					
	<form align="right">รอคิว 
	<?php if($td >= "1"){?>
	<font class="blinkquick" color="red"><?php echo $td;?> </font>
	<?php }else{ ?>
	<font color="red"><?php echo $td;?> </font>
	<?php } ?>
	| กำลังทำ 
	<?php if($td2 >= "1"){?>
	<font class="blink"color="DarkOrange"><?php echo $td2;?> </font>
	<?php }else{ ?>
	<font color="DarkOrange"><?php echo $td2;?> </font>
	<?php } ?>
	| เสร็จเรียบร้อย <font color="green"><?php echo $td3;?> </font>| จัดซื้อทดแทน <font color="blue"><?php echo $td4;?> </font>--- <font color="purple">[ แสดงข้อมูล 50 งาน ]</font></form>
	
	<form>
	<tr>	
	<?php
	$query_announce = "SELECT * FROM announcement ORDER BY id DESC" or die("Error:" . mysqli_error()); 
	$result_announce = mysqli_query($con, $query_announce); 
    ?>

	<?php

	echo '<td colspan="1">';
	echo '<marquee onmouseover="this.stop();" onmouseout="this.start();" height:10px;>';
	while($rowannounce = mysqli_fetch_array($result_announce)) {
	if($rowannounce['status'] === "ใช้งานอยู่"){
	echo '<font size="2" color="red">' . ">>&nbsp;" . '</font><font size="2" color="black">' . $rowannounce["announcement"] .  "</font>&nbsp;";
	}else{
			echo "&nbsp;";
			}
		}
			echo "</marquee>";
			echo '</td>';
	mysqli_close($con);
	?>
	</tr>
	</form>
	
	</form>	
	</td>
	</tr>


</table>
<div  id="autoRefreshReport"></div>
</body>
</html>