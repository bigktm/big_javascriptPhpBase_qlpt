<?php
session_start();
//echo $_SESSION['currUser']."fhdfh";
include("connect.php");
include("function.php");
$hs_idnt="null";
if(isset($_REQUEST['mantr']))
{
		
		$hs_idnt=$_REQUEST['mantr'];
}
		$hs_idpt="null";
		$hs_dt="null";
		$hs_loai="";
		$hs_gia="null";
		$hs_chuthich="";
		$hs_tt="null";
		if(isset($_SESSION['idnt']))
		{
			$hs_idnt=$_SESSION['idnt'];
			
		}
		if(isset($_SESSION['idpt']))
		{
			$hs_idpt=$_SESSION['idpt'];
			
		}
		$sql_p="SELECT * FROM phongtro WHERE IDNT =".$hs_idnt;
		if(!$sql_p){
			die('Không có phòng trọ nào!: ' . mysql_error());
		}
		$ql_px = mysql_query("select * from phongtro");
		$add_idpt=mysql_num_rows($ql_px);
		$add_idpt = $add_idpt + 1;
		$_SESSION['idpt']=$add_idpt;
		echo"<div id='upPx' align='center'><table>
				<tr>
					<td colspan=2 align='center' ><h2><b>Thêm phòng trọ</b></h2></td>
				</tr>
				<tr>
					<td>Diện tích:&nbsp&nbsp</td><td><input id='dientichck' type='text' name='dientichck'/></td>
				</tr>
				<tr>
					<td>Loại phòng:&nbsp&nbsp</td><td><select id='lptr' name='lptr' onchange='listlptr(this.value);'>
					
					<option value='' size='20'>Chọn lọai phòng</option>
						<option value='2' >2 người</option>
						<option value='3' >3 người</option>
						<option value='4' >Trên 3 người</option>
					
					</select></td>
				</tr>
				<tr>
					<td>Giá:&nbsp&nbsp</td><td><input id='giack' type='text' name='giack'/></td>
				</tr>
				<tr>
					<td>Chú thích:&nbsp&nbsp</td><td><input id='chuthichck' type='text' name='chuthichck'/></td>
				</tr>
				<tr>
					<td>Trạng thái:&nbsp&nbsp</td><td><select id='ttrt' name='ttrt' onchange='listttrt(this.value);'>";
					
					echo "<option value='' size='20'>Chọn tình trạng</option>
						<option value='0' >Chưa Thuê</option>
						<option value='1' >Đã Thuê</option>";
					
					echo"</select></td>
				</tr>
			</table>";
			echo"<pre>                   <input type='button' value='Tạo' onclick='ckAddB(".$hs_idnt.",".$add_idpt.",1,2);'/>&nbsp||&nbsp<input type='button' value='Quay lại' onclick='dsPhong(".$hs_idnt.");'/></pre></div>";	
				
				
?>
		