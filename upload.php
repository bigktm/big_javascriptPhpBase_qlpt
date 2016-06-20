<?php
include"connect.php";
session_start();
?>


</br>
    Chọn ảnh để upload:
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    &nbsp &nbsp &nbsp &nbsp <input type="submit" value="Upload" name="uplo" ></form>
</form>
	
	<hr/>
<?php
if(isset($_REQUEST["uplo"]))
{
		$target_dir = "anh/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["uplo"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
}


if(isset($_SESSION['currUser']))
{
			//echo "sdgdfg".$_SESSION['currUser'];
			$sql_ds="select a.link, ct.ten, ct.nit, pt.idpt from chutro as ct right join nhatro as nt on ct.nit=nt.nit 
			right join phongtro as pt on nt.idnt=pt.idnt 
			right join anh as a on pt.idpt=a.idpt where ct.nit='".$_SESSION['currUser']."' group by a.link";

		 
	
			$q_dsa=mysql_query($sql_ds);
			$page_ds = 0;
			$rec_limit_ds = 12;
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
		$q_ds=mysql_query($sql_ds." LIMIT $offset_ds, $rec_limit_ds");
	if(! $q_ds )
		{
			die('Không lấy được dữ liệu: ' . mysql_error());
		}
		echo "<div id='cont_up'><div id='dsanh' align='center'><br/><b>Danh sách ảnh các phòng trọ</b></div>";
		
		while($row_ds=mysql_fetch_array($q_ds))
		{
			echo"<div id='anh'><img src='timages/".$row_ds['link']."' /><div class='tenchua' align='center'>phòng ".$row_ds['idpt']."</div></div>";
		
		}
		echo "</div><div id='loadImg' align='center'>";
				if( $page_ds > 1)
				{
					echo "<a href='#' onclick='javascript:loadImage($page_ds - 1);'>Trước</a>";
				}
				 for ($i_ds=1 ; $i_ds<=$rec_count_ds ; $i_ds++)
				 {
					if ($i_ds == $page_ds) 
					{
					   echo "<span style='color:red;'>[<u>".$i_ds."</u>]</span>";
					   
					} 
					else 
					{
					   echo "<a href='#' onclick='javascript:loadImage($i_ds);'>[".$i_ds."] </a> ";
					   
					}
				 }
				if( $page_ds < $rec_count_ds)
				{
					echo "<a href='#' onclick='javascript:loadImage($page_ds + 1);'>Sau</a>";
				}
	
			echo "</div>";
}
?>