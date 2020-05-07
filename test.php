<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>


<form method="post" enctype="multipart/form-data"><!--add action and link to trip.php-->
	<label for="fileupload">Upload file in pdf form</label><br/><br/>
	<input type="File" name="file" accept="application/pdf"/><br/><br/>
	<input type="submit" name="submit"/>
</form>
<br/><br/><br/>
	<?php
	
	if(isset($_POST["submit"]))
	{
		$allow=array('pdf');
		$temp=explode(".",$_FILES['file']['name']);
		$extension=end($temp);
		
		$tmpfile=$_FILES["file"]["tmp_name"];
		$upload_file=$_FILES['file']['name'];
	
		if(file_exists("pdf/".$_FILES['file']['name']))
			{print"yah";}
		else {print"no";
				move_uploaded_file($tmpfile,"pdf/".$_FILES['file']['name']);
}
		//echo'<script>alert("The file is submitted successfully.")</script>';
		//add argument to python
	}
		?>
		</body>
		</html>