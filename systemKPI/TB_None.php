<!-- ส่วนของการใส่ข้อมูล Record --> 
<?php 
require ("conn.php");
      if (isset($_POST['typeP'])){
        $pid = $_POST['typeP'];
        $glue = "','";
          $Spid = "'" . implode($glue, $pid) . "'" ;
          ?>
      <tbody>
      </tbody>
  <?php } ?>
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