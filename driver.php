<?php
	session_start();
?>
<?php
	include_once 'connection.php';
	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="delete")
		{
			echo '<script>confirm("Are you sure you want to delete")</script>';
			
			$del="DELETE FROM drivertable where driverID='$_GET[id]'";
			
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
	<title>View Driver</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="fyp">
	
    <link href="css/bootstrap.min.css" rel="stylesheet" />  
    
    <link href="css/mycss.css" rel="stylesheet" type="text/css">
</head>
<header>
	<?php include'navigation.php'?>
</header>
<body data-ng-controller="myctrl" data-ng-init="propertyName='driverID';reverse=false" style="margin-left:100px;margin-top:20px;">
<div class="container" data-ng-init="updatedriverdata()">


	<?php if(isset($_SESSION['username'])){?>
	<?php include'driver_navi.php'?><br/><br/><br/>

	
		
		
	
<form>	
	<h2>Driver</h2><br/>

	
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
						<input type="checkbox" id="driverID" name="driverID" value="driverID" data-ng-init="searchdriver=false" data-ng-model="searchdriver">
						<label for="driverID">Driver ID</label>
						<div data-ng-if="!searchdriver">
							<div data-ng-init="obj.driverID=''"></div>
						</div>
						
							<span data-ng-show="searchdriver">
						 
                       <br/> <input id="driverID" type="text" placeholder="Driver ID" data-ng-model="obj.driverID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="username" name="username" value="username" data-ng-model="searchusername" data-ng-init="searchusername=false">
						<label for="username">Username</label>
						<div data-ng-if="!searchusername">
							<div data-ng-init="obj.username=''"></div>
						</div>
							<span data-ng-show="searchusername">
						 
                       <br/> <input id="username" type="text" placeholder="Username" data-ng-model="obj.username"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
	</div>
	</div>
</div>
	<br/>
	
	
	<div style="overflow-x:auto;" class="row">
<div class="col-md-12">
	<table id="myTable2"  class="table table-responsive table-bordered table-striped table-hover">
	 <caption class="text-primary">Driver</caption>
         <!--table head-->      <thead class="thead-dark">
		 
		 <tr>
		 
		 <th id="driverID">
			<button ng-click="sortBy('driverID')">Driver ID</button>
			<span class="sortorder" ng-show="propertyName === 'driverID'" ng-class="{reverse:reverse}"></span>
		</th>
		 
		 <th id="username">
			<button ng-click="sortBy('username')">Username</button>
			<span class="sortorder" ng-show="propertyName === 'username'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th>Action</th>
	</tr>	
	</thead>
	
	<tbody>
	<div class="row">
		<div class="col-md-12">
		<tr data-ng-repeat="u in filtered=(driverdata | orderBy:propertyName:reverse | filter:obj)| off: currentPage*studentsPerPage | limitTo : studentsPerPage"> 
	
	
		<td headers="driverID">{{u.driverID}}</td>
		<td headers="username">{{u.username}}</td>

	
	
		
	<td><a href="driver.php?action=delete&id={{u.driverID}}" onclick="remove()">
		<span class="text-danger">Remove |</span></a>
		
		<a href="editdriver.php?action=edit&id={{u.driverID}}" onclick="edit()">
			<span class="text-danger"> Edit</span></a>
	
		</td>
		</tr>
	        </div>  
                              </div>  
                               </tbody>
							   
		</table>
		<br/>
		<button><a href="newdriver.php">Create new driver</a></button>

	 </div>   
        
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