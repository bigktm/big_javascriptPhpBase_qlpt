<?php
include("connect.php");

		$upr_tp=0;
		$upr_qh=0;
		$upr_px=0;
		$upr_du=0;
		$upr_tr=0;
		$upr_gi=0;
		$upr_lp=0;
		$chuoi="";
		$chuoix="";
		$chuoik="";
		$page_ds="";
		$dem=0;
	if(isset($_REQUEST['stp']))
	{
		$upr_tp=$_REQUEST['stp'];
	}
	if(isset($_REQUEST['sqh']))
	{
		$upr_qh=$_REQUEST['sqh'];
	}
	if(isset($_REQUEST['spx']))
	{
		$upr_px=$_REQUEST['spx'];
		
	}
	if(isset($_REQUEST['sdu']))
	{	
		$upr_du=$_REQUEST['sdu'];
	}
	if(isset($_REQUEST['str']))
	{
		$upr_tr=$_REQUEST['str'];
	}
	if(isset($_REQUEST['sgi']))
	{
		$upr_gi=$_REQUEST['sgi'];
	}
	if(isset($_REQUEST['slp']))
	{
		$upr_lp=$_REQUEST['slp'];
	}
		
if($upr_tp==0 and $upr_qh==0 and $upr_px==0 and $upr_du==0 and $upr_tr==0 and $upr_gi==0 and $upr_lp==0)
{	
			echo "vui lòng chọn danh mục tìm kiếm!";
}else
{
//echo $upr_tp,$upr_qh, $upr_px, $upr_du, $upr_tr, $upr_gi, $upr_lp;
	 if($upr_tp!=null and $upr_tp!=0)
	 {
		$chuoi=$chuoi."tp.IDTP =".$upr_tp." AND ";
	 }
	  if($upr_qh!=null and $upr_qh!=0)
	 {
		$chuoi=$chuoi."qh.IDQH =".$upr_qh." AND ";
	 }
	  if($upr_px!=null and $upr_px!=0)
	 {
		$chuoi=$chuoi."px.IDPX =".$upr_px." AND ";
	 }
	  if($upr_du!=null and $upr_du!=0)
	 {
		$chuoi=$chuoi."d.IDD =".$upr_du." AND ";
	 }
	  if($upr_tr!=null and $upr_tr!=0)
	 {
		$chuoi=$chuoi."tr.IDTR =".$upr_tr." AND ";
	 }
	  if($upr_gi!=null and $upr_gi!=0)
	 {
		 if($upr_gi==1)
			 {
				$chuoi=$chuoi."pt.GIA >=300000 AND pt.GIA <=600000 AND ";
			 }
			 if($upr_gi==2)
			 {
				$chuoi=$chuoi."pt.GIA >=600000 AND pt.GIA <=1000000 AND ";
			 }
			 if($upr_gi==3)
			 {
				$chuoi=$chuoi."pt.GIA >=1000000 AND ";
			 }
		}
	  if($upr_lp!=null and $upr_lp!=0)
	 {
		 if($upr_lp==1)
		 {
			$chuoi=$chuoi."pt.LOAI like '%2%' AND ";
		 }
		 if($upr_lp==2)
		 {
			$chuoi=$chuoi."pt.LOAI like '%3%' AND ";
		 }
		 if($upr_lp==3)
		 {
			$chuoi=$chuoi."pt.LOAI like '%4%' AND ";
		 }
	 }
	 
	// echo $chuoi;
	 $chuoix=strlen($chuoi);
	 $chuoik=substr($chuoi,0,$chuoix-4);
	 //echo"</br>";
	// echo $chuoik;
	/*echo "select DISTINCT pt.idpt, nt.idnt, tp.tentp, qh.tenqh, px.tenpx, d.tend, tr.tentr, nt.nit, nt.motadiachi, pt.dt, pt.loai, pt.gia, pt.tinhtrang
			from nhatro as nt left join phuongxa as px on nt.idpx=px.idpx
		   left join quanhuyen as qh on px.idqh=qh.idqh
		   left join thanhpho as tp on tp.idtp=qh.idtp
		   inner join duong as d on d.idd=nt.idd
		   left join truong as tr on d.idd=tr.idd
		   left join phongtro as pt on pt.idnt=nt.idnt
	where ".$chuoik;*/
	 
	 $truyvanl="select DISTINCT pt.idpt, nt.idnt, tp.tentp, qh.tenqh, px.tenpx, d.tend, tr.tentr,
	 nt.nit, nt.idnt, nt.tdk, nt.tdv, ct.sdt, ct.email,
	 nt.motadiachi, pt.dt, pt.loai, pt.gia, pt.tinhtrang, pt.chuthich
			from nhatro as nt left join phuongxa as px on nt.idpx=px.idpx
		   left join quanhuyen as qh on px.idqh=qh.idqh
		   left join thanhpho as tp on tp.idtp=qh.idtp
		   inner join duong as d on d.idd=nt.idd
		   left join truong as tr on d.idd=tr.idd
		   left join chutro as ct on nt.nit=ct.nit
		   left join phongtro as pt on pt.idnt=nt.idnt
	where ".$chuoik;
			
			
			
			$q_dsa=mysql_query($truyvanl) or die('Không lấy được dữ liệu: ' . mysql_error());;
			$rec_limit_ds = 3;
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
				$page_ds = 1;
				$offset_ds = 0;
			}
			///////////
		$q_ds=mysql_query($truyvanl." LIMIT $offset_ds, $rec_limit_ds");
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
				<td align='center'><a href='#' onclick='loadSearch($page_ds,".$upr_tp.",".$upr_qh.",".$upr_px.",".$upr_du.",".$upr_tr.",".$upr_gi.",".$upr_lp."),loadMap(".$row_ds['tdv'].",".$row_ds['tdk'].");'>Xem</a></td>
				<td><Div class='xem'><a class='tips' href='#'>Chi Tiết<Div class='phogtro'>";
						echo "<b>THÔNG TIN PHÒNG TRỌ</b>&nbsp&nbsp&nbsp<span style='color: rgb(255, 0, 0);'><b>SĐT</b></span>:&nbsp".$row_ds['sdt']."&nbsp|&nbsp<span style='color: rgb(255, 0, 0);'><b>Email</b></span>:&nbsp".$row_ds['email']."<br/><br/>
							<table id='tablept' width='100%'><tr><th align='center'>Phòng</th><th align='center'>Diện tích (m2)</th><th align='center'>Loại phòng</th><th align='center'> Giá (Đồng/Tháng)</th><th align='center'>Chú Thích</th><th align='center'>TT</th></tr>";
					
					
						echo "<tr><td align='center'>Phòng ".$row_ds['idpt']."</td><td align='center'>".$row_ds['dt']."</td><td align='center'>".$row_ds['loai']."</td><td align='center'>".$row_ds['gia']."</td><td align='center'>".$row_ds['chuthich']."</td><td>";
						if($row_ds['tinhtrang']==0){echo "Trống";}else{echo "Đã Thuê";}
						echo "</td></tr>";
						
			
						echo "</table>";
						echo "</div></a> 
					</Div>
				</td>
				</tr>";
				$dem++;
		}
		echo "<tr>
				<td colspan='6' align='center' style='background-color: #3cb642;'>";
				if( $page_ds > 1)
				{
					echo "<a href='#' onclick='javascript:loadSearch($page_ds - 1,".$upr_tp.",".$upr_qh.",".$upr_px.",".$upr_du.",".$upr_tr.",".$upr_gi.",".$upr_lp.");'>Trước</a>";
				}
				 for ($i_ds=1 ; $i_ds<=$rec_count_ds ; $i_ds++)
				 {
					if ($i_ds == $page_ds) 
					{
					   echo "<span style='color:red;'>[<u>".$i_ds."</u>]</span>";
					   
					} 
					else 
					{
					   echo "<a href='#' onclick='javascript:loadSearch($i_ds,".$upr_tp.",".$upr_qh.",".$upr_px.",".$upr_du.",".$upr_tr.",".$upr_gi.",".$upr_lp.");'>[".$i_ds."] </a> ";
					   
					}
				 }
				if( $page_ds < $rec_count_ds)
				{
					echo "<a href='#' onclick='javascript:loadSearch($page_ds + 1,".$upr_tp.",".$upr_qh.",".$upr_px.",".$upr_du.",".$upr_tr.",".$upr_gi.",".$upr_lp.");'>Sau</a>";
				}
	
			echo "</td></tr></table></div>";
}
?>