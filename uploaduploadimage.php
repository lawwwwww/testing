<?php

	include_once 'connection.php';
	
	$date=date("Y-m-d");
	
	$tid=$_POST['tid'];
	//time
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$time=date('H:i');
	
	
	$target_dir="upload/images";
	if(!file_exists($target_dir)){
		mkdir($target_dir,0777,true);
	}
		
	$target_dire=$target_dir."/img"."_".rand().'_'.time().'.jpg';
		
	$tid=$_POST['tid'];
	
	if(move_uploaded_file($_FILES['img']['tmp_name'],$target_dire))
	{
		$teto="Update triptable set customer_sign='".$target_dire."' where tripID='".$tid."'";
		mysqli_query($conn,$teto);
		
		echo json_encode([
			"Message"=>"The signature has been uploaded.",
			"Status"=>"OK"
		]);
	}
	
	else
	{
	//	$tfa="Update triptable set customer_sign='error' where tripID='".tid."'";
	//	mysqli_query($conn,$tfa);
		
		
		echo json_encode([
			"Message"=>"Sorry, there was an error.",
			"Status"=>"Error"
		
		]);
	}
	
	
	
	
	header('Access-Control-Allow-Origin: *');
	header('Content-type:application/json');

	
	echo json_encode([
				"Message"=>"testing.",
				"Status"=>"OK"
			]);
	
	?>