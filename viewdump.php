<?php
	session_start();
	include_once 'connection.php';
?>

<!DOCTYPE html>
<html data-ng-app="myapp" lang="eng">
<head>
	<title>View Dump</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="fyp">
	<link href="css/bootstrap.min.css" rel="stylesheet" />  
    
    <link href="css/mycss.css" rel="stylesheet" type="text/css">
</head>
<header>
	<?php include'navigation.php'?>
</header>
<body data-ng-controller="myctrl" data-ng-init="propertyName='serialNo';reverse=false" style="margin-left:100px;margin-top:20px;">
<div class="container" data-ng-init="updatedumpdata()">

	<?php if(isset($_SESSION['username'])){?>

<?php include'roro_navi.php'?>

<br/><br/><br/>
<form>	
	<h2>Dump</h2><br/>

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
						<input type="checkbox" id="serialNo" name="serialNo" value="serialNo" data-ng-init="searchserial=false" data-ng-model="searchserial">
						<label for="serialNo">Serial no.</label>
						<div data-ng-if="!searchserial">
							<div data-ng-init="obj.serialNo=''"></div>
						</div>
						
							<span data-ng-show="searchserial">
						 
                       <br/> <input id="serialNo" type="text" placeholder="Serial no." data-ng-model="obj.serialNo"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="tonnage" name="tonnage" value="tonnage" data-ng-model="searchtonnage" data-ng-init="searchtonnage=false">
						<label for="tonnage">Tonnage</label>
						<div data-ng-if="!searchtonnage">
							<div data-ng-init="obj.tonnage=''"></div>
						</div>
							<span data-ng-show="searchtonnage">
						 
                       <br/> <input id="tonnage" type="text" placeholder="Tonnage" data-ng-model="obj.tonnage"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="cust_name" name="cust_name" value="cust_name" data-ng-model="searchcustname" data-ng-init="searchcustname=false">
						<label for="cust_name">Customer name</label>
						<div data-ng-if="!searchcustname">
							<div data-ng-init="obj.cust_name=''"></div>
						</div>
							<span data-ng-show="searchcustname">
						 
                       <br/> <input id="cust_name" type="text" placeholder="Customer name" data-ng-model="obj.cust_name"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="date" name="date" value="date" data-ng-model="searchdate" data-ng-init="searchdate=false">
						<label for="date">Date</label>
						<div data-ng-if="!searchdate">
							<div data-ng-init="obj.date=''"></div>
						</div>
							<span data-ng-show="searchdate">
						 
                       <br/> <input id="date" type="text" placeholder="Date" data-ng-model="obj.date"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						
		</div>
	</div>
</div>
	<br/>
	
	
	<div style="overflow-x:auto;" class="row">
	<div class="col-md-12">
	<table id="myTable2" class="table table-responsive table-bordered table-striped table-hover">
	 <caption class="text-primary">Dump trip</caption>
         <!--table head-->      <thead class="thead-dark">
		 <tr>
		 
		 <th id="serialNo">
			<button ng-click="sortBy('serialNo')">Serial No.</button>
			<span class="sortorder" ng-show="propertyName === 'serialNo'" ng-class="{reverse:reverse}"></span>
		</th>
		
		 <th id="tonnage">
			<button ng-click="sortBy('tonnage')">Tonnage</button>
			<span class="sortorder" ng-show="propertyName === 'tonnage'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="cust_name">
			<button ng-click="sortBy('cust_name')">Customer name</button>
			<span class="sortorder" ng-show="propertyName === 'cust_name'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="date">
			<button ng-click="sortBy('date')">Date</button>
			<span class="sortorder" ng-show="propertyName === 'date'" ng-class="{reverse:reverse}"></span>
		</th>
		
	</tr>	
	</thead>
	
		
<tbody>
	<div class="row">
		<div class="col-md-12">
		<tr data-ng-repeat="u in filtered=(dumpdata | orderBy:propertyName:reverse | filter:obj)| off: currentPage*studentsPerPage | limitTo : studentsPerPage"> 
	
	
	<td headers="serialNo">{{u.serialNo}}</td>
		
		<td headers="tonnage">{{u.tonnage}}</td>
		
	<td headers="cust_name">{{u.cust_name}}</td>
<td headers="date">{{u.date}}</td>
				

		
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