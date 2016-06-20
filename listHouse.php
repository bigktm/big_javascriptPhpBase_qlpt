<?php
	include("connect.php");
	require"function.php";
			$sql_ds="select DISTINCT pt.idpt, nt.idnt, tp.tentp, qh.tenqh, px.tenpx, d.tend, tr.tentr,
	 nt.nit, nt.idnt, nt.tdk, nt.tdv, ct.sdt, ct.email,
	 nt.motadiachi, pt.dt, pt.loai, pt.gia, pt.tinhtrang, pt.chuthich
			from nhatro as nt left join phuongxa as px on nt.idpx=px.idpx
		   left join quanhuyen as qh on px.idqh=qh.idqh
		   left join thanhpho as tp on tp.idtp=qh.idtp
		   inner join duong as d on d.idd=nt.idd
		   left join truong as tr on d.idd=tr.idd
		   left join chutro as ct on nt.nit=ct.nit
		   left join phongtro as pt on pt.idnt=nt.idnt";
	
			$q_dsa=mysql_query($sql_ds);
			$rec_limit_ds = 10;
			$rec_count_ds= mysql_num_rows($q_dsa);
			//echo $rec_count_ds ;
			$rec_count_ds = floor($rec_count_ds/$rec_limit_ds) + 1;
			//echo $rec_count_ds ;
			if( isset($_GET{'page_ds'})|| $page_ds != 0 )
			{
				$page_ds = $_GET{'page_ds'};
				if($page_ds != 0)
				{
					$offset_ds = ($rec_limit_ds * $page_ds) - ($rec_limit_ds);
				}
			}
			else
			{
				$page_ds = 0;
				$offset_ds = 0;
			}
			///////////
		$q_ds=mysql_query($sql_ds." LIMIT $offset_ds, $rec_limit_ds");
		if(! $q_ds )
		{
			die('Không lấy được dữ liệu: ' . mysql_error());
		}
		echo "<div id='phantrang' align='center'><table border='1' >
			<tr width='98%' ><td height='25px' align='center' colspan='6' ><b>DANH SÁCH PHÒNG TRỌ</b></td></tr>
			  <tr width='98%' bgcolor='#EEEEEE' align='center'>
				  <th width='5%'>STT</th> 
				  <th width='20%'>Tên Chủ Trọ</th> 
				  <th width='30%'>Địa Chỉ</th> 
				  <th width='20%'>Tên Trường</th>
				  <th width='10%'>Vị Trí</th>
				  <th width='10%'>Chi Tiết Phòng</th></tr>";
				  
		$dem=$offset_ds + 1;
		while($row_ds=mysql_fetch_array($q_ds))
		{
			/*$tend=get_d($row_ds['IDD']);
			$tenpx=get_px($row_ds['IDPX']);
			$tenqh=get_qh($row_ds['IDPX']);*/
			//echo $row_ds['MAD'];
			//echo $row_ds['MAPX'];
			echo "<tr bgcolor='#fffff0' ><td align='center'> ".$dem."</td>
				<td align='center'><a href='#' onclick='detailHouse(".$page_ds.",".$row_ds['nit'].");'>".$row_ds['nit']."</a></td>
				<td align='center'>".$row_ds['motadiachi'].",&nbsp".$row_ds['tend'].",&nbsp".$row_ds['tenpx'].",&nbsp".$row_ds['tenqh'].",&nbsp".$row_ds['tentp']."</td>
				<td align='center'>".$row_ds['tentr']."</td>
				<td align='center'><a href='#' onclick='loadMap(".$row_ds['tdv'].",".$row_ds['tdk'].");'>Xem</a></td>
				<td><Div class='xem'><a class='tips' href='#'>Chi Tiết<Div class='phogtro'>";
						echo "<b>THÔNG TIN PHÒNG TRỌ</b>&nbsp&nbsp&nbsp<span style='color: rgb(255, 0, 0);'><b>SĐT</b></span>:&nbsp".$row_ds['sdt']."&nbsp|&nbsp<span style='color: rgb(255, 0, 0);'><b>Email</b></span>:&nbsp".$row_ds['email']."<br/><br/>
							<table id='tablept' width='100%'><tr><th align='center'>Phòng</th><th align='center'>Diện tích (m2)</th><th align='center'>Loại phòng</th><th align='center'> Giá (Đồng/Tháng)</th><th align='center'>Chú Thích</th><th align='center'>TT</th></tr>";
					
					
						echo "<tr><td align='center'>Phòng ".$row_ds['idpt']."</td><td align='center'>".$row_ds['dt']."</td><td align='center'>".$row_ds['loai']."</td><td align='center'>".$row_ds['gia']."</td><td align='center'>".$row_ds['chuthich']."</td><td>";
						if($row_ds['tinhtrang']==0){echo "Trống";}else{echo "Đã Thuê";}
						echo "</td></tr>";
						
			
					echo "</table>";
					echo "</div></a> </Div></td>
				
				</tr>";
				$dem++;
		}
		
		echo "<tr>
				<td colspan='6' align='center' style='background-color: #3cb642;'>";
				if( $page_ds > 1)
				{
					echo "<a href='#' onclick='javascript:loadXMLDoc($page_ds - 1);'>Trước</a>";
				}
				 for ($i_ds=1 ; $i_ds<=$rec_count_ds ; $i_ds++)
				 {
					if ($i_ds == $page_ds) 
					{
					   echo "<span style='color:red;'>[<u>".$i_ds."</u>]</span>";
					   
					} 
					else 
					{
					   echo "<a href='#' onclick='javascript:loadXMLDoc($i_ds);'>[".$i_ds."] </a> ";
					   
					}
				 }
				if( $page_ds < $rec_count_ds)
				{
					echo "<a href='#' onclick='javascript:loadXMLDoc($page_ds + 1);'>Sau</a>";
				}
	
			echo "</td></tr></table></div>";

?>