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
			
			$del="DELETE FROM feedbacktable where no=$_GET[id]";
			
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
	<title>View Feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="fyp">
     <link href="css/bootstrap.min.css" rel="stylesheet" />  
   
    <link href="css/mycss.css" rel="stylesheet" type="text/css">
</head>
<header>
	<?php include'navigation.php'?>
</header>
<body data-ng-controller="myctrl" data-ng-init="propertyName='tripID';reverse=false" style="margin-left:100px;margin-top:20px;">
<div class="container" data-ng-init="updatefeedbackdata()">
<?php if(isset($_SESSION['username'])){?>
	<?php include'driver_navi.php'?>
<br/><br/><br/>

	
		
		
	
<form>	
	<h2>Driver Feedback</h2><br/>

	
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
						<input type="checkbox" id="tripID" name="tripID" value="tripID" data-ng-init="searchtripid=false" data-ng-model="searchtripid">
						<label for="tripID">Trip ID</label>
						<div data-ng-if="!searchtripid">
							<div data-ng-init="obj.tripID=''"></div>
						</div>
						
							<span data-ng-show="searchtripid">
						 
                       <br/> <input id="tripID" type="text" placeholder="Trip ID" data-ng-model="obj.tripID"/> 
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
						
						<br/><input type="checkbox" id="description" name="description" value="description" data-ng-model="searchdescription" data-ng-init="searchdescription=false">
						<label for="description">Description</label>
						
						<div data-ng-if="!searchdescription">
							<div data-ng-init="obj.description=''"></div>
						</div>
						
							<span data-ng-show="searchdescription">
						 
                        <br/><input id="description" type="text" placeholder="Description" data-ng-model="obj.description"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
	
	</div>
	</div>
</div>
	<br/>
	
	
	
	
	<div style="overflow-x:auto;" class="row">
	<div class="col-md-12">
	<table id="myTable2" class="table table-responsive table-bordered table-striped table-hover">
	   <caption class="text-primary">Feedback</caption>
         <!--table head-->      <thead class="thead-dark">
		 <tr>
		 
		 	<th id="tripID">
				<button ng-click="sortBy('tripID')">Trip ID</button>
				<span class="sortorder" ng-show="propertyName === 'tripID'" ng-class="{reverse:reverse}"></span>
			</th>
			
			<th id="username">
				<button ng-click="sortBy('username')">Username</button>
				<span class="sortorder" ng-show="propertyName === 'username'" ng-class="{reverse:reverse}"></span>
			</th>
			<th id="image">
				<button ng-click="sortBy('image')">Image</button>
				<span class="sortorder" ng-show="propertyName === 'image'" ng-class="{reverse:reverse}"></span>
			</th>
			<th id="description">
				<button ng-click="sortBy('description')">Description</button>
				<span class="sortorder" ng-show="propertyName === 'description'" ng-class="{reverse:reverse}"></span>
			</th>
			<th id="video">
				<button ng-click="sortBy('video')">Video</button>
				<span class="sortorder" ng-show="propertyName === 'video'" ng-class="{reverse:reverse}"></span>
			</th>
		 
		<th>Action</th>
	
	</tr>	
	</thead>
	
	<tbody>
	<div class="row">
		<div class="col-md-12">
		<tr data-ng-repeat="u in filtered=(feedbackdata | orderBy:propertyName:reverse | filter:obj )| off: currentPage*studentsPerPage | limitTo : studentsPerPage"> 
	
		<td headers="tripID">{{u.tripID}}</td>
		<td headers="username">{{u.username}}</td>
		
		<td headers="image">
		<span data-ng-if="u.image!=null">
			<img src="{{u.image}}" height="200" width="200"/>
		</span>
		</td>
		
		<td headers="description">{{u.description}}</td>
		<td headers="video">
			<span data-ng-if="u.video!=null">
				<video width="320" height="200" controls>
					<source src="{{u.video}}" type="video/mp4">
					Your browser does not support the video tag.
					</video>
			</span>
		</td>

		
		<td><a href="viewfeedback.php?action=delete&id={{u.no}}" onclick="remove()">
		<span class="text-danger">Remove </span></a>
		
		</tr>
		
                                  </div>  
                              </div>  
                               </tbody>
		</table>

	 </div>   
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


<?php
$conn->close();
?>