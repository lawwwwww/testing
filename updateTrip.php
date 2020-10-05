<?php

include_once 'connection.php';

$json = file_get_contents("php://input");
$obj = json_decode($json,true);

	date_default_timezone_set("Asia/Kuala_Lumpur");

	$today=date("Y-m-d H:i:s");
	$date=date("Y-m-d");
	$time=date('H:i:s');

	
	$name=$obj['name'];
	$tid=$obj['tid'];
	
	
	$sqltest="SELECT * FROM triptable where tripID='".$tid."'";
	$resulttest=mysqli_query($conn,$sqltest);
	
	if(mysqli_num_rows($resulttest)>0)
	{
		while($row=mysqli_fetch_array($resulttest))
		{
			//different trip type, container-retrieve/ placed may be empty
			if($row["collection_type"]=='Exchange')
			{
				if($row["container_retrieve"]=='' || $row["container_placed"]=='' || $row["customer_sign"]=='')
				{

					$testfill=0;
				
				}
				else
				{
					$testfill=11;
				}
			}
			
			else if($row["collection_type"]=='Send')
			{
				if($row["container_placed"]=='' || $row["customer_sign"]=='')
				{
					$testfill=0;
				}	
				else
				{
					$tempcr=$row["container_placed"];
					$tempcn=$row["cust_name"];
					$testfill=12;
				}
			}
			
			else if($row["collection_type"]=='Pull')
			{
				if($row["container_retrieve"]=='' || $row["customer_sign"]=='')
				{
					$testfill=0;
				}
				else
				{
					$testfill=11;
				}
			}
			
			
			if($testfill==0)
			{

				echo "error";
				
				

			}
			
			else if($testfill==12)
			{
				//$ins="INSERT INTO roroservice (serialNo,customername,shipdate,longtitude,latitude)values('$tempcr','$tempcn','$today','$longitude','$latitude')";
				//mysqli_query($conn,$ins);
				
				
				$sqlsec="UPDATE triptable set ship_date='".$date."',trip_status='Done',p_receive='".$name."',collection_time='".$time."' where tripID='".$tid."'";
				if(mysqli_query($conn,$sqlsec))
				{
					$in="INSERT INTO tripdonetable(invoice_date,driverID,tripID,p_receive,cust_name,areaID,container_retrieve,container_placed,collection_time,collection_type,waste_type,customer_sign,ship_date,return_date,image,instruction,truckID,salesOrderNo,address,dump_driver)(SELECT return_date,driverID,tripID,p_receive ,cust_name,areaID,container_retrieve,container_placed,collection_time,collection_type,waste_type,customer_sign,ship_date,return_date,image,instruction,truckID,salesOrderNo,address,driverID FROM triptable where tripID='".$tid."')";

					
					if(mysqli_query($conn,$in))
					{
						$de="DELETE FROM triptable where tripID='".$tid."'";
						if(mysqli_query($conn,$de))
						{
							echo "successful";
						}
					}
					
				}
				
				
				
				
			}
			
			else if($testfill==11)
			{
				$sqlsec="UPDATE triptable set return_date='".$date."',trip_status='Done',p_receive='".$name."',collection_time='".$time."' where tripID='".$tid."'";
				if(mysqli_query($conn,$sqlsec))
				{
					$in="INSERT INTO incompletetrip(invoice_date,driverID,tripID,p_receive,cust_name,areaID,container_retrieve,container_placed,collection_time,collection_type,waste_type,customer_sign,ship_date,return_date,image,instruction,truckID,salesOrderNo,address,dump_driver)(SELECT return_date,driverID,tripID,p_receive ,cust_name,areaID,container_retrieve,container_placed,collection_time,collection_type,waste_type,customer_sign,ship_date,return_date,image,instruction,truckID,salesOrderNo,address,driverID FROM triptable where tripID='".$tid."')";
					
					if(mysqli_query($conn,$in))
					{
						$de="DELETE FROM triptable where tripID='".$tid."'";
						if(mysqli_query($conn,$de))
						{
							echo "successful";
						}
					}
				
				
				}
				
			}
		}
	}
	
	//mysqli_query($conn,$sqltest);
	
	
	
	
		
		
	
	
?>