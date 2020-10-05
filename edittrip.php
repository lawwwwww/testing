<?php
	session_start();

	include_once 'connection.php';
	
	
	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="edit")
		{
			$_SESSION['editid']=$_GET["id"];
			
		}
	}
	$edittrip=$_SESSION['editid'];
	
		if(isset($_POST["customersigndel"]))
		{
			
			$delsign="UPDATE triptable set customer_sign='' where tripID='".$edittrip."'";
					mysqli_query($conn,$delsign);
			
					
				
				
			
				
			
			
		}
		
		if(isset($_POST["imagedel"]))
		{
			$delimg="UPDATE triptable set image='' where tripID='".$edittrip."'";
			mysqli_query($conn,$delimg);
		}
		
	
	if(isset($_POST["submit"]))
	{
		if($_POST["cust2"]!="" && $_POST["area2"]!="" && $_POST["collecttype2"]!="" && $_POST["shipdate2"]!=""  && $_POST["adminid2"]!="" && $_POST["truckid2"]!="" &&$_POST["son2"]!="" &&$_POST["addr2"]!="" && $_POST["containersize2"]!="")
{
	if(isset($_POST["cust2"]))
	{
			echo $_POST["hiddentripid"];
			$cc="UPDATE triptable set cust_name='".$_POST['cust2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$cc);
	
	}
	
		if(isset($_POST["area2"]))
	{
			$aa="UPDATE triptable set areaID='".$_POST['area2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$aa);
	}
	
		if(isset($_POST["cr2"]))
		{
			$crcr="UPDATE triptable set container_retrieve='".$_POST['cr2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$crcr);
		}
		
		if(isset($_POST["cp2"]))
		{
			$cpcp="UPDATE triptable set container_placed='".$_POST['cp2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$cpcp);
		}
		
		if(isset($_POST["collecttime2"]))
		{
			$ct="UPDATE triptable set collection_time='".$_POST['collecttime2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$ct);
		}
		
		if(isset($_POST["collecttype2"]))
		{
			$cty="UPDATE triptable set collection_type='".$_POST['collecttype2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$cty);
		}
	
		if(isset($_POST["wastetype2"]))
		{
			$wt="UPDATE triptable set waste_type='".$_POST['wastetype2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$wt);
		}
	
	
		if($_FILES['customersign2']['name'])
		{
			$tmpfile=$_FILES["customersign2"]["tmp_name"];
			$upload_file=$_FILES['customersign2']['name'];
			
			move_uploaded_file($tmpfile,"img/".$_FILES['customersign2']['name']);
			
			$cs="UPDATE triptable set customer_sign='img/".$_FILES['customersign2']['name']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$cs);
		}
	
		if(isset($_POST["shipdate2"]))
		{
			$sd="UPDATE triptable set ship_date='".$_POST['shipdate2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$sd);
		}
	
		if(isset($_POST["driverid2"]))
		{

			$dd="UPDATE triptable set driverID='".$_POST['driverid2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$dd);
		}
	
		if(isset($_POST["adminid2"]))	
		{
			$ad="UPDATE triptable set adminID='".$_POST['adminid2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$ad);
		}

		if(isset($_POST["assignstatus2"]))
		{
			$as="UPDATE triptable set assign_status='".$_POST['assignstatus2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$as);
		}
	
		if(isset($_POST["tripstatus2"]))
		{
			$ts="UPDATE triptable set trip_status='".$_POST['tripstatus2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$ts);
			
			
		}
	
		if($_FILES['img2']['name'])
		{
			
			$tmpfile=$_FILES["img2"]["tmp_name"];
			$upload_file=$_FILES['img2']['name'];
			
			move_uploaded_file($tmpfile,"img/".$_FILES['img2']['name']);
			
			$im="UPDATE triptable set image='img/".$_FILES['img2']['name']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$im);
		}
	
		if(isset($_POST["instruction2"]))
		{
			$inst="UPDATE triptable set instruction='".$_POST['instruction2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$inst);
		}
	
		if(isset($_POST["truckid2"]))
		{
			$tid="UPDATE triptable set truckID='".$_POST['truckid2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$tid);
		}
	
		if(isset($_POST["son2"]))
		{
			$sos="UPDATE triptable set salesOrderNo='".$_POST['son2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$sos);
		}
	
		if(isset($_POST["addr2"]))
		{
			$adr="UPDATE triptable set address='".$_POST['addr2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$adr);
		}
	
		if(isset($_POST["containersize2"]))
		{
			$csize="UPDATE triptable set container_size='".$_POST['containersize2']."' where tripID='".$edittrip."'";
			mysqli_query($conn,$csize);
		}
	$test=true;
	
	if($_POST["returndate2"]!="")
	{
		
		if(isset($_POST["returndate2"]))
		{
			$rd="UPDATE triptable set return_date='".$_POST['returndate2']."' where tripID='".$edittrip."'";
			if($_POST["returndate2"]>=$_POST["shipdate2"]){
			mysqli_query($conn,$rd);
			$test=true;}
			else
	{
		$test=false;
			
	}
		}
	
	}
	
	if(mysqli_query($conn,$cc) && mysqli_query($conn,$aa) && mysqli_query($conn,$crcr) && mysqli_query($conn,$cpcp) && mysqli_query($conn,$ct) && mysqli_query($conn,$cty) && mysqli_query($conn,$wt) && mysqli_query($conn,$sd) && mysqli_query($conn,$sd) && mysqli_query($conn,$dd) && mysqli_query($conn,$ad) && mysqli_query($conn,$as) && mysqli_query($conn,$ts)  && mysqli_query($conn,$inst) && mysqli_query($conn,$tid) && mysqli_query($conn,$sos) && mysqli_query($conn,$adr) && mysqli_query($conn,$csize) && $test 
	)
	{
		
		echo '<script>if(confirm("Data is recorded.")){document.location.href="trip.php"};</script>';
		
	}
		else
	{
		echo '<script>alert("Data is not inserted")</script>';
			
	}
	
	
	}
	

else{
		echo '<script>alert("Invalid input!")</script>';
	
}	
	}
	
	
	
	
	$qq="SELECT * FROM drivertable";
	$resultqq=mysqli_query($conn,$qq);
	
	$qqq="SELECT * FROM rorotable";
	$resultqqq=mysqli_query($conn,$qqq);
	
	$lala="SELECT * FROM rorotable";
	$resultlala=mysqli_query($conn,$lala);
	
	
	$qqqq="SELECT * FROM admintable";
	$resultqqqq=mysqli_query($conn,$qqqq);
	
	
	$tttt="SELECT * FROM trucktable";
	$resulttttt=mysqli_query($conn,$tttt);
?>


<!DOCTYPE html>
<html data-ng-app="myapp" lang="eng">
<head>
	<title>Edit Trip</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Trieneken">
	  <link href="css/bootstrap.min.css" rel="stylesheet" />  
  
    <link href="css/mycss.css" rel="stylesheet" type="text/css">
</head>


<header>
	<?php include'navigation.php'?>
</header>
<body data-ng-controller="myctrl">
<div class="container">
<?php include 'trip_navi.php'?>

<br/><br/><br/>

<form method="post" action="edittrip.php?action=e" enctype="multipart/form-data"><!--add action and link to trip.php-->

	<h2>Edit trip</h2>
	

<?php
	$sel="SELECT * FROM triptable WHERE tripID=$edittrip";
	$sell=mysqli_query($conn,$sel);
	
	if(mysqli_num_rows($sell)>0)
	{
		while($row=mysqli_fetch_array($sell))
		{
		?>
		<br/>
		<div class="row">
		<div class="col-md-2">
		<label>Customer Name: </label>
		</div>
		<div class="col-md-10">
		<input type="text" name="cust2" value="<?php echo $row["cust_name"];?>">
		</div></div>
		
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Area ID: </label>
		</div>
		<div class="col-md-10">
		<input type="text" name="area2" value="<?php echo $row["areaID"];?>">
		</div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Container Retrieve:</label>
			</div>
			<div class="col-md-10">
			<select name="cr2">
			<option value="" <?php if($row["container_retrieve"]=='')
				echo 'selected="selected"';?>> </option>
		<?php while($row0=mysqli_fetch_array($resultqqq)){?>
			<option value="<?php echo $row0["serialNo"];?>" 
			<?php if($row0["serialNo"]==$row["container_retrieve"])
				echo 'selected="selected"';?>><?php echo $row0["serialNo"];?>
			</option>
		<?php }?>
		</select></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Container Placed:</label>
		</div>
		<div class="col-md-10">
			<select name="cp2">
			<option value="" <?php if($row["container_placed"]=='')
				echo 'selected="selected"';?>> </option>
		
		<?php while($row5=mysqli_fetch_array($resultlala)){?>
			<option value="<?php echo $row5["serialNo"];?>" 
			<?php if($row5["serialNo"]==$row["container_placed"])
				echo 'selected="selected"';?>><?php echo $row5["serialNo"];?>
			</option>
		<?php }?>
		</select>
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Collection Time:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="collecttime2" value="<?php echo $row["collection_time"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Collection Type:</label>
		</div>
		<div class="col-md-10">
		<select name="collecttype2">
			<option value="Send"  <?php if ($row["collection_type"]=="Send") echo 'selected="selected"';?>>
			Send
			</option>
			<option value="Pull"  <?php if ($row["collection_type"]=="Pull") echo 'selected="selected"';?>>
			Pull
			</option>
			<option value="Exchange"  <?php if ($row["collection_type"]=="Exchange") echo 'selected="selected"';?>>
			Exchange
			</option>
			
			<option value="Empty"  <?php if ($row["collection_type"]=="Empty") echo 'selected="selected"';?>>
			Empty
			</option>

		</select>
		</div>
		</div>
		
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Waste Type:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="wastetype2" value="<?php echo $row["waste_type"];?>">
		</div></div><br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Trip ID:</label></div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["tripID"];?>
		</span></div></div><br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Customer Sign:</label>
		</div>
		
		<div class="col-md-10">
		<?php if ($row["customer_sign"]!=NULL)
			{	
		?>
			<img src="<?php echo $row["customer_sign"]?>" height="100" width="100"/>
		<input type="submit" name="customersigndel" id="customersigndel" value="remove"/>
		<br/>
	<?php
		}
		 else{
			?>
			<input type="file" name="customersign2" id="customersign2" value="<?php echo $row["customer_sign"]?>"/> 
			<?php
		}
		?></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Ship Date:</label></div>
		<div class="col-md-10">
		<input type="date" name="shipdate2" value="<?php echo $row["ship_date"];?>">
		</div></div><br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Return Date:</label></div>
		<div class="col-md-10">
		<input type="date" name="returndate2" value="<?php echo $row["return_date"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Driver:</label></div>
		<div class="col-md-10">
		<select name="driverid2">
		<?php while($row1=mysqli_fetch_array($resultqq)){?>
			<option value="<?php echo $row1["driverID"];?>" 
			<?php if($row1["driverID"]==$row["driverID"])
				echo 'selected="selected"';?>><?php echo $row1["username"];?>
			</option>
		<?php }?>
		</select></div></div>
			<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Admin ID:</label>
		</div>
		<div class="col-md-10">
		<select name="adminid2">
		<?php while($row2=mysqli_fetch_array($resultqqqq)){?>
			<option value="<?php echo $row2["adminID"];?>" 
			<?php if($row2["adminID"]==$row["adminID"])
				echo 'selected="selected"';?>><?php echo $row2["username"];?>
			</option>
		<?php }?>
		</select></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Assign Status:</label></div>
		<div class="col-md-10">
		<select name="assignstatus2">
		<option value="Assign" <?php if($row["assign_status"]=="Assign") echo 'selected="selected"';?>>Assign</option>
		<option value="Not assign" <?php if ($row["assign_status"]=="Not assign") echo 'selected="selected"';?>>Not assign</option>
		
		</select>
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Trip Status:</label></div>
		<div class="col-md-10">
		<select name="tripstatus2">
		<option value="Pending" <?php if($row["trip_status"]=="Pending") echo 'selected="selected"';?>>Pending</option>
		<option value="On going" <?php if ($row["trip_status"]=="On going") echo 'selected="selected"';?>>On going</option>
		
		<option value="Done" <?php if ($row["trip_status"]=="Done") echo 'selected="selected"';?>>Done</option>
		<option value="" <?php if ($row["trip_status"]=="") echo 'selected="selected"';?>></option>
		</select></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Image:</label>
		</div>
		<div class="col-md-10">
		<?php if ($row["image"]!=NULL)
			{	
		?>
			<img src="<?php echo $row["image"]?>" height="100" width="100"/>
		<input type="submit" name="imagedel" id="imagedel" value="remove"/>
		<br/>
		<?php
		}
		 else{
			?>
			<input type="file" name="img2" id="img2" value="<?php echo $row["image"]?>"/> 
			<?php
		}
		?>
		
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Instruction:</label></div>
		<div class="col-md-10">
		<input type="text" name="instruction2" value="<?php echo $row["instruction"];?>">
		</div></div><br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Truck ID:</label></div>
		<div class="col-md-10">
		<select name="truckid2">
		<?php while($rowt=mysqli_fetch_array($resulttttt)){?>
			<option value="<?php echo $rowt["truckID"];?>" 
			<?php if($rowt["truckID"]==$row["truckID"])
				echo 'selected="selected"';?>><?php echo $rowt["truckID"];?>
			</option>
		<?php }?>
		</select>
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Sales Order No:</label></div>
		<div class="col-md-10">
		<input type="text" name="son2" value="<?php echo $row["salesOrderNo"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		
		<label>Address:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="addr2" value="<?php echo $row["address"];?>">
		</div></div><br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Container Size:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="containersize2" value="<?php echo $row["container_size"];?>">
		</div></div>
		<br/><br/><br/>

		
		<div class="row">
		
	<div class="col-md-6">
	<button><a href="trip.php">Back</a></button></div>
		<div class="col-md-6">
	<input type="hidden" name="hiddentripid" value="<?php $row["tripID"];?>">
	
	<input type="submit" name="submit" value="Submit"/>
	</div>
	</form>
		<?php
	}
	}
?>

<br/><br/>

<br/><br/><br/>
</div>
		<script src="js/jquery.min.js"></script> 
        
        <noscript>Alternate content for script</noscript>
        
        <!-- All Bootstrap  plug-ins  file --> 
        <script src="js/bootstrap.min.js"></script> 
        
        <noscript>Alternate content for script</noscript>
       
        <!-- Basic AngularJS --> 
        <script src="js/angular.min.js"></script> 
        
        <noscript>Alternate content for script</noscript>
        
        <!-- AngularJS - Routing --> 
        <script src="js/angular-route.min.js"></script>
        
        <noscript>Alternate content for script</noscript>
        
            <!-- AngularJS - Routing --> 
        <script src="js/javajava.js"></script>
        
        <noscript>Alternate content for script</noscript>	


</body>
</html>
