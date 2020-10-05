<?php
	session_start();
?>
<?php
	include_once 'connection.php';
	
	
	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="delete")
		{
			echo '<script>alert("Are you sure you want to delete")</script>';
			
			$del="DELETE FROM trucktable where truckID='$_GET[id]'";
		
			if(mysqli_query($conn,$del))
			{
				echo '<script>confirm("Data is deleted")</script>';
			}
			else
			{
				echo '<script>alert("Error")</script>';
			}
		}
		
	}
	

	

?>

<!DOCTYPE html>
<html data-ng-app="myapp" lang="eng">
<head>
	<title>View Truck</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="fyp">
	 <link href="css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="css/mycss.css" rel="stylesheet">
	   
</head>
<header>
	<?php include'navigation.php'?>
</header>
<body data-ng-controller="myctrl" data-ng-init="propertyName='truckID';reverse=false" style="margin-left:100px;margin-top:20px;">
<div class="container" data-ng-init="updatetruckdata()">

	<?php if(isset($_SESSION['username'])){?>

<?php include'truck_navi.php'?>

<br/><br/><br/>
<form>	
	<h2>Truck</h2><br/>

	<div class="row">
		<div class="col-md-12" data-ng-init="yesorno='no'">
			<label>Do you want to search?</label></br/>
			<input type="radio" id="yes" value="yes" name="yesorno" data-ng-model="yesorno"/>
			<label for="yes"> Yes </label><br/>
			
			<input type="radio" id="no" value="no" name="yesorno" data-ng-model="yesorno"/>
			<label for="no"> No </label><br/>
			
		</div>
	</div>
	
	
<div class="row">
	<div class="col-md-12">
	
	<div data-ng-show="yesorno=='yes'">
	
	<br/>

		<label for="search">Select the variable that you want to search for</label><br/>
						<input type="checkbox" id="truckID" name="truckID" value="truckID" data-ng-init="searchtruck=false" data-ng-model="searchtruck">
						<label for="truckID">Truck ID</label>
						<div data-ng-if="!searchtruck">
							<div data-ng-init="obj.truckID=''"></div>
						</div>
						
							<span data-ng-show="searchtruck">
						 
                       <br/> <input id="truckID" type="text" placeholder="Truck ID" data-ng-model="obj.truckID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="status" name="status" value="status" data-ng-model="searchstatus" data-ng-init="searchstatus=false">
						<label for="status">Status</label>
						<div data-ng-if="!searchstatus">
							<div data-ng-init="obj.status=''"></div>
						</div>
							<span data-ng-show="searchstatus">
						 
                       <br/> <input id="status" type="text" placeholder="Status" data-ng-model="obj.status"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
			</div>
	</div>
</div>
	<br/>
					
	
	
	
	
	<div style="overflow-x:auto;" class="row">
<div class="col-md-12">
	<table id="myTable2" class="table table-responsive table-bordered table-striped table-hover">
	
                                <caption class="text-primary">Truck</caption>
         <!--table head-->      <thead class="thead-dark">
	<tr>
	<th id="truckID">
			<button ng-click="sortBy('truckID')">Truck ID</button>
			<span class="sortorder" ng-show="propertyName === 'truckID'" ng-class="{reverse:reverse}"></span>
		</th>
	<th id="status">
			<button ng-click="sortBy('status')">Status</button>
			<span class="sortorder" ng-show="propertyName === 'status'" ng-class="{reverse:reverse}"></span>
		</th>
	
		<th id="action">Action</th>
	</tr>	
	</thead>
	<tbody>
	<div class="row">
		<div class="col-md-12">
		<tr data-ng-repeat="u in filtered=(truckdata | orderBy:propertyName:reverse | filter:obj)| off: currentPage*studentsPerPage | limitTo : studentsPerPage"> 
	
		<td headers="truckID">{{u.truckID}}</td>
		<td headers="status">{{u.status}}</td>
		
		<td><a href="truck.php?action=delete&id={{u.truckID}}" onclick="remove()">
		<span class="text-danger">Remove |</span></a>
		
		<a href="edittruck.php?action=edit&id={{u.truckID}}" onclick="edit()">
			<span class="text-danger"> Edit</span></a>
	
		</td>
		</tr>
	     </div>  
                              </div>  
                               </tbody>
							   
		</table></div></div>
		<br/>
		<button><a href="newtruck.php">Create new truck</a></button>


        
 </form>  
 <ul class="pagination">
						<li data-ng-class="prevpagedisabled()">
							<a href="" data-ng-click="prev()">Prev</a>
						</li>
                        <!-- 3 -->
						<!-- This display the numbering in the pagination button -->
						<!-- This will keep print the "li" button until range 5  -->
						<li data-ng-repeat="n in range()" 
                            data-ng-class="{active: n == currentPage}"
				            data-ng-click="setPage(n)">
							     <a href="">{{n+1}}</a>
						</li>
                        
						<li data-ng-class="nextPageDisabled()">
							<a href = "" data-ng-click="nextPage()">Next</a>
						</li>
					</ul>

 
 
 <?php }
else{
			echo 'Please <a href="login.php">Login</a>';
		}?>
	</div>  <script src="js/jquery.min.js"></script> 
        
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


<?php
$conn->close();
?>