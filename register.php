<div id="dangky">
	<h3><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspĐăng ký tài khoản</b></h3>
	<form action="#" method="post">
        <pre>    <b>Họ và Tên:</b>		        <input id="ht" type="text" name="ht"/></pre>
		<pre>    <b>Tên đăng nhập:</b>            	<input id="tennd" type="text" name="tennd" /></pre>
		<pre>    <b>Mật khẩu:</b>                	<input id="mk" type="password" name="mk"/></pre>
		<pre>    <b>Xác nhận mật khẩu:</b>        	<input id="mkk" type="password" name="mkk"/></pre>
		<pre>    <b>CMND:</b>		        <input id="cmnd" type="text" name="cmnd"/></pre>
		<pre>    <b>Email:</b>                    	<input id="email" type="text" name="email" /></pre>
		<pre>    <b>Số điện thoại:</b>		<input id="sdt" type="text" name="sdt"/></pre>
		<pre>    <b>Năm sinh:</b>                 <?php 
				
				require"function.php";
				echo"<select name='nsinh' onchange='listnams(this.value);' >";
				echo "<option value=-1 >Năm sinh</option>";
				if(isset($_REQUEST['nsinh']))
				{
						$nams= $_REQUEST['nsinh'];
		
				}
				else{$nams="null";}
				for($i=1950;$i<=2030;$i++)
				{
					if($i==$nams)
						{
							echo "<option class='nams' value='".$nams."' selected='selected' >".$nams."</option>";
						}else {
							echo "<option class='".$i."' value='".$i."'>".$i."</option>";
						}
					
				}
				//echo $nams;
				
		echo"</select>	
		</pre>";
		
		echo"</select></pre>
		<pre>                   <input type='button' value='Đăng ký' onclick='checkrg(".$nams.");'/></pre>";
		?>
	</form>
</div>