<?php
session_start();

if(isset($_SESSION['idnt']))
{
	unset($_SESSION['idnt']);
}
if(isset($_SESSION['idpt']))
{
	unset($_SESSION['idpt']);
}
$_SESSION['idnt']=$_REQUEST['lb_idnt'];
include("connect.php");
	require"function.php";
			$hs_ttr="";
			$sql_ds=dsphongtro($_REQUEST['lb_idnt']);
			$page_ds=0;
			$q_dsa=mysql_query($sql_ds);
			$rec_limit_ds = 3;
			$rec_count_ds= mysql_num_rows($q_dsa);
			//echo $rec_count_ds ;
			$rec_count_ds = floor($rec_count_ds/$rec_limit_ds) + 1;
			//echo $rec_count_ds ;
			if( isset($_REQUEST['page_ds']) || $page_ds != 0 )
			{
				$page_ds = $_GET['page_ds'];
				if($page_ds != 0)
				{
					$offset_ds = ($rec_limit_ds * $page_ds) - ($rec_limit_ds);
				}
			}
			else
			{
				$page_ds = 1;
				$offset_ds = 0;
			}
			///////////
		$q_ds=mysql_query($sql_ds." LIMIT $offset_ds, $rec_limit_ds");
		if(! $q_ds )
		{
			die('Không lấy được dữ liệu: ' . mysql_error());
		}
		echo "<div id='phantrang' align='center'><table border='1' >
			<tr width='98%' ><td align='center' height='25px' colspan='7' ><b>Danh sách các nhà trọ</b></td>
			<td><input type='button' value='Tạo mới' onclick='addB(".$_REQUEST['lb_idnt'].");' /></td></tr>
			  <tr width='98%' bgcolor='gray' align='center'>
				  <td width='5%'>STT</td> 
				  <td width='10%'>Diện Tích(m2)</td> 
				  <td width='10%'>Loại Phòng</td>
				  <td width='10%'>Giá(Đồng)</td>
				  <td width='10%'>Tình Trạng</td>
				  <td width='30%'>Chú Thích</td>
				  <td width='10%'>Lưu Lại</td>
				  <td width='10%'>Xóa</td>
				  </tr>";
		$dem=1;		  
		while($row_ds=mysql_fetch_array($q_ds))
		{
			echo "<tr bgcolor='#fffff0' >
				<td align='center'>Phòng Số&nbsp".$row_ds['IDPT']."</a></td>
				<td align='center'><input id='dientich".$dem."' type='text' name='dientich".$dem."'  size='10' value='".$row_ds['DT']."' /></td>
				<td align='center'><input id='loai".$dem."' type='text' name='loai".$dem."'  size='10' value='".$row_ds['LOAI']."' /></td>
				<td align='center'><input id='gia".$dem."' type='text' name='gia".$dem."' size='10' value='".$row_ds['GIA']."' /></td>
				<td align='center'>
				<select id='ttr' name='ttr' onchange='listttr(this.value);'>";
					$hs_ttr=$row_ds['TINHTRANG'];
					echo "<option value='' size='20'>Chọn tình trạng</option>";
					if(isset($_REQUEST['ttr']))
					{
							$hs_ttr=$_REQUEST['ttr'];
					}
					
							echo"<option value='0' "; if($hs_ttr==0) echo"selected='selected'"; echo">Chưa Thuê</option>
							<option value='1' "; if($hs_ttr==1) echo"selected='selected'"; echo">Đã Thuê</option>";
					
					echo"</select></td>
				<td align='center'><input id='chuthich".$dem."' type='text' name='chuthich".$dem."'  size='10' value='".$row_ds['CHUTHICH']."' /></td>
				<td align='center'><input type='button' value='Lưu' onclick='upHBoard(".$row_ds['IDPT'].",".$row_ds['IDNT'].",".$hs_ttr.",".$dem.");' />
					</td><td align='center'><input type='button' value='Xóa' onclick='deB(".$_REQUEST['lb_idnt'].",".$row_ds['IDPT'].");' />
				</td>
				</tr>";
			$dem++;
		}
		echo "<tr>
				<td colspan=8 align='center' style='background-color: #3cb642;'>";
				if( $page_ds > 1)
				{
					echo "<a href='#' onclick='javascript:loadListBoard(".$_REQUEST['lb_idnt'].",$page_ds - 1);'>Trước</a>";
				}
				 for ($i_ds=1 ; $i_ds<=$rec_count_ds ; $i_ds++)
				 {
					if ($i_ds == $page_ds) 
					{
					   echo "<span style='color:red;'>[<u>".$i_ds."</u>]</span>";
					   
					} 
					else 
					{
					   echo "<a href='#' onclick='javascript:loadListBoard(".$_REQUEST['lb_idnt'].",$i_ds);'>[".$i_ds."] </a> ";
					   
					}
				 }
				if( $page_ds < $rec_count_ds)
				{
					echo "<a href='#' onclick='javascript:loadListBoard(".$_REQUEST['lb_idnt'].",$page_ds + 1);'>Sau</a>";
				}
	
			echo "</td></tr></table></div>";

?>