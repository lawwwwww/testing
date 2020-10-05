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
	
	$qq="SELECT * FROM drivertable";
	$resultqq=mysqli_query($conn,$qq);
	
	
	
	if(isset($_POST["submit"]))
	{
	if(isset($_POST["dumpdriverid2"]))
		{

			$dd="UPDATE incompletetrip set dump_driver='".$_POST['dumpdriverid2']."' where invoiceID='".$edittrip."'";
			if(mysqli_query($conn,$dd))
			{
				echo '<script>if(confirm("Data is recorded.")){document.location.href="incompletetrip.php"};</script>';
			}
			else
		{
			echo '<script>alert("Data is not inserted")</script>';
			
		}
		}
	}
	
	
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

<form method="post" action="editincompletetrip.php?action=e" enctype="multipart/form-data"><!--add action and link to trip.php-->

	<h2>Edit incomplete trip</h2>

	
<?php
	$sel="SELECT * FROM incompletetrip WHERE invoiceID=$edittrip";
	$sell=mysqli_query($conn,$sel);
	
	if(mysqli_num_rows($sell)>0)
	{
		while($row=mysqli_fetch_array($sell))
		{
		?>
		
			<br/>
		<div class="row">
		<div class="col-md-2">
		<label>Invoice ID: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["invoiceID"];?>
		</span></div></div>
		
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Invoice Date: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["invoice_date"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Driver ID: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["driverID"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Trip ID </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["tripID"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Customer Name: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["cust_name"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Area ID: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["areaID"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Container Retrieve: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["container_retrieve"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Container Placed: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["container_placed"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Collection Time: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["collection_time"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Collection Type: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["collection_type"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Waste Type: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["waste_type"];?>
		</span></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Customer Sign: </label>
		</div>
		<div class="col-md-10">
		<img src="<?php echo $row["customer_sign"]?>" height="100" width="100"/>
		</div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Ship Date: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["ship_date"];?>
		</span></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Return Date: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["return_date"];?>
		</span></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Image: </label>
		</div>
		<div class="col-md-10">
		<?php if ($row["image"]!=NULL)
			{	
		?>
		<img src="<?php echo $row["image"]?>" height="100" width="100"/>
		<?php
		}?>
		</div></div>
		<br/>

		<div class="row">
		<div class="col-md-2">
		<label>Instruction: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["instruction"];?>
		</span></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Truck ID: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["truckID"];?>
		</span></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Sales Order No.: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["salesOrderNo"];?>
		</span></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Address: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["address"];?>
		</span></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Receiver: </label>
		</div>
		<div class="col-md-10">
		<span class="tru"><?php echo $row["p_receive"];?>
		</span></div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Dump Driver:</label></div>
		<div class="col-md-10">
		<select name="dumpdriverid2">
		<?php while($row1=mysqli_fetch_array($resultqq)){?>
			<option value="<?php echo $row1["driverID"];?>" 
			<?php if($row1["driverID"]==$row["dump_driver"])
				echo 'selected="selected"';?>><?php echo $row1["username"];?>
			</option>
		<?php }?>
		</select></div></div>
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
	
		