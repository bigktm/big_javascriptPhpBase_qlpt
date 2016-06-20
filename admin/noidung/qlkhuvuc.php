<?php 
	
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	require 'hamnd.php';
	ob_start();
?>

<Div id="topnd">
	<Div id="topndtrai"><b>Quản Lý Khu Vực:</b></Div>
</Div>

<!-- div chon menu -->
	<?php 
		echo "<img src='img/home.png'width='25' >>>";
		if(isset($_REQUEST['tp']))
		{
			if($_REQUEST['tp']!=-1)
			{
				$tentp=get_idtp($_REQUEST['tp']);
				echo $tentp[1];
			}else 
			{
				echo "Chọn Thành Phố";
			}
		}
		else 
		{
			echo "Chọn Thành Phố";
		}
		if(isset($_REQUEST['qh']))
		{
			$tenqh=get_idqh($_REQUEST['qh']);
			echo " >> ".$tenqh[1];
		}
	?>
	
<!--  -->
<hr>


<?php 
	if(!isset($_REQUEST['tp']) && !isset($_REQUEST['qh']))
	{
		$_REQUEST['tp']=1;
		$_REQUEST['qh']=1;
	}
?>





<Div id="ndtrai"><Div id="ndtrai-l">
<?php 
					if(isset($_REQUEST['qltp']))
					{
						if($_REQUEST['qltp']=='them')
						{
							require 'qlkhuvuc/tp/tpthem.php';
						}
					}
					else
					{
						echo "<Div class='button'><a href='?option=qldc&mn1=dc&tp=-1&qltp=them'>Thêm Tỉnh(Thàng Phố)</a></Div><br />";
					}
					echo "<table class='tablekv' align='left'>";
					echo "<tr><th>STT</th><th>Tỉnh(Thàng Phố)</th><th colspan='2'>Sửa / Xóa</th></tr>";
					$tp=get_tp();
					$cot=1;
					while($row=mysql_fetch_array($tp))
					{
						echo "<tr ><td><center>$cot</center></td>";
						if(isset($_REQUEST['suatp']))
						{
							if($_REQUEST['tp']==$row[0])
							{
								require 'qlkhuvuc/tp/tpsua.php';
							}else 
							{
								echo "<td><a href='?option=qldc&mn1=dc&tp=$row[0]'>$row[1]</a></td>";
								echo "<td><a href='?option=qldc&mn1=dc&tp=$row[0]&qltp=suatp'><img src='img/sua.png' width='20'></a></td>";
							}
							
						}else{	
							echo "<td><a href='?option=qldc&mn1=dc&tp=$row[0]'>$row[1]</a></td>";
							echo "<td><a href='?option=qldc&mn1=dc&tp=$row[0]&suatp=sua'><img src='img/sua.png' width='20'></a></td>";
						}
						echo "<td><a href='?option=qldc&mn1=dc&tp=$row[0]&xoatp=xoa'><img src='img/xoa.png' width='20'></a></td></tr>";
						$cot++;
					}
					echo "</tr>";
					echo "</table>";
					echo "&nbsp<img src='img/muiten.gif' width='32'>";
					if(isset($_REQUEST['xoatp']))
					{
						require 'qlkhuvuc/tp/tpxoa.php';
					}
?>

</Div>
<Div id="ndtrai-r">
<?php 
					//bang huyen
					if(isset($_REQUEST['tp']))
					{
						if($_REQUEST['tp'] != -1)
						{
							
							if(isset($_REQUEST['qlqh']))
							{
								if($_REQUEST['qlqh']=='them')
								{
									require 'qlkhuvuc/qh/qhthem.php';
								}
							}
							else
							{
								echo "<Div class='button'><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=-1&qlqh=them'>Thêm Huyện(Quận)</a></Div><br />";
							}
							echo "<table class='tablekv' align='left'>";
							echo "<tr><th>STT</th><th>Huyện(Quận)</th><th colspan='2'>Sửa / Xóa</th></tr>";
							$qh=get_qh($_REQUEST['tp']);
							$cot=1;
							while($row=mysql_fetch_array($qh))
							{
								
								echo "<tr><td><center>$cot</center></td>";
								if(isset($_REQUEST['suaqh']))
								{
									
									if($_REQUEST['qh']==$row[0])
									{
										require 'qlkhuvuc/qh/qhsua.php';
									}else
									{
										echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=$row[0]'>$row[1]</a></td>";
								echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=$row[0]&suaqh=sua'><img src='img/sua.png' width='20'></a></td>";
									}
										
								}else{
									echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=$row[0]'>$row[1]</a></td>";
									echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=$row[0]&suaqh=sua'><img src='img/sua.png' width='20'></a></td>";
								}
								echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=$row[0]&xoaqh=xoa'><img src='img/xoa.png' width='20'></a></td></tr>";
								$cot++;
							}
							echo "</tr>";
							echo "</table>";
							echo "&nbsp<img src='img/muiten.gif' width='32'>";
							if(isset($_REQUEST['xoaqh']))
							{
								require 'qlkhuvuc/qh/qhxoa.php';
							}

							
						}
					}
					
?>
</Div>
</Div>
<Div id="ndphai">
<?php 
				//bang xa phuong
				if(isset($_REQUEST['qh']))
				{	if($_REQUEST['qh'] != -1)							
					{	if(isset($_REQUEST['qlpx']))
						{
							if($_REQUEST['qlpx']=='them')
							{
								require 'qlkhuvuc/px/pxthem.php';
							}
						}
						else
						{
							echo "<Div class='button'><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=".$_REQUEST['qh']."&qlpx=them'>Thêm xã(Phường)</a></Div><br />";
						}
						if(isset($_REQUEST['qh']))
						{
							
							echo "<table class='tablekv' align='left'>";
							echo "<tr><th>STT</th><th>Xã (Phường)</th><th colspan='2'>Sửa / Xóa</th></tr>";
							$px=get_px($_REQUEST['qh']);
							$cot=1;
							while($row=mysql_fetch_array($px))
							{
								echo "<tr><td><center>$cot</center></td>";
								if(isset($_REQUEST['suapx']))
								{
									
									if($_REQUEST['px']==$row[0])
									{
										require 'qlkhuvuc/px/pxsua.php';
									}else
									{
										echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=".$_REQUEST['qh']."&px=$row[0]'>$row[1]</a></td>";
										echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=".$_REQUEST['qh']."&px=$row[0]&suapx=sua'><img src='img/sua.png' width='20'></a></td>";
									}
								
								}else{
									echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=".$_REQUEST['qh']."&px=$row[0]'>$row[1]</a></td>";
									echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=".$_REQUEST['qh']."&px=$row[0]&suapx=sua'><img src='img/sua.png' width='20'></a></td>";
								}
								echo "<td><a href='?option=qldc&mn1=dc&tp=".$_REQUEST['tp']."&qh=".$_REQUEST['qh']."&px=$row[0]&xoapx=xoa'><img src='img/xoa.png' width='20'></a></td></tr>";
								$cot++;
							}
							echo "</tr>";
							echo "</table>";
							if(isset($_REQUEST['xoapx']))
							{
								require 'qlkhuvuc/px/pxxoa.php';
							}
						}
					}
				}
				
?>
</div>

	



	
	
	
	
	
	
	
	
	
	
	
	