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
			
			$del="DELETE FROM rorotable where serialNo='$_GET[id]'";
			
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
	<title>View Roro</title>
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
<div class="container" data-ng-init="updaterorodata()">


	
	<?php if(isset($_SESSION['username'])){?>
<?php include 'roro_navi.php'?>
<br/><br/><br/>

<form>	
	<h2>Roro Container</h2><br/>

	
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
						<input type="checkbox" id="rorogroup" name="rorogroup" value="rorogroup" data-ng-init="searchrorogroup=false" data-ng-model="searchrorogroup">
						<label for="rorogroup">Roro group</label>
						<div data-ng-if="!searchrorogroup">
							<div data-ng-init="obj.rorogroup=''"></div>
						</div>
						
							<span data-ng-show="searchrorogroup">
						 
                       <br/> <input id="cust" type="text" placeholder="Roro group" data-ng-model="obj.rorogroup"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="size" name="size" value="size" data-ng-model="searchsize" data-ng-init="searchsize=false">
						<label for="size">Size</label>
						<div data-ng-if="!searchsize">
							<div data-ng-init="obj.size=''"></div>
						</div>
							<span data-ng-show="searchsize">
						 
                       <br/> <input id="size" type="text" placeholder="Size" data-ng-model="obj.size"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="serialNo" name="serialNo" value="serialNo" data-ng-model="searchserial" data-ng-init="searchserial=false">
						<label for="serialNo">Serial no.</label>
						<div data-ng-if="!searchserial">
							<div data-ng-init="obj.serialNo=''"></div>
						</div>
							<span data-ng-show="searchserial">
						 
                       <br/> <input id="serialNo" type="text" placeholder="Serial no." data-ng-model="obj.serialNo"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="productID" name="productID" value="productID" data-ng-model="searchproductid" data-ng-init="searchproductid=false">
						<label for="productID">Product ID</label>
						<div data-ng-if="!searchproductid">
							<div data-ng-init="obj.productID=''"></div>
						</div>
							<span data-ng-show="searchproductid">
						 
                       <br/> <input id="productID" type="text" placeholder="productID" data-ng-model="obj.productID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="qrcode" name="qrcode" value="qrcode" data-ng-model="searchqr" data-ng-init="searchqr=false">
						<label for="qrcode">QR code</label>
						<div data-ng-if="!searchqr">
							<div data-ng-init="obj.qrcode=''"></div>
						</div>
							<span data-ng-show="searchqr">
						 
                       <br/> <input id="qrcode" type="text" placeholder="qrcode" data-ng-model="obj.qrcode"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="in_house" name="in_house" value="in_house" data-ng-model="searchinhouse" data-ng-init="searchinhouse=false">
						<label for="in_house">In house</label>
						<div data-ng-if="!searchinhouse">
							<div data-ng-init="obj.in_house=''"></div>
						</div>
							<span data-ng-show="searchinhouse">
						 
                       <br/> <input id="in_house" type="text" placeholder="in_house" data-ng-model="obj.in_house"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="with_customer" name="with_customer" value="with_customer" data-ng-model="searchwith" data-ng-init="searchwith=false">
						<label for="with_customer">With customer</label>
						<div data-ng-if="!searchwith">
							<div data-ng-init="obj.with_customer=''"></div>
						</div>
							<span data-ng-show="searchwith">
						 
                       <br/> <input id="with_customer" type="text" placeholder="With customer" data-ng-model="obj.with_customer"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="lost" name="lost" value="lost" data-ng-model="searchlost" data-ng-init="searchlost=false">
						<label for="lost">Lost</label>
						<div data-ng-if="!searchlost">
							<div data-ng-init="obj.lost=''"></div>
						</div>
							<span data-ng-show="searchlost">
						 
                       <br/> <input id="lost" type="text" placeholder="Lost" data-ng-model="obj.lost"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="longitude" name="longitude" value="longitude" data-ng-model="searchlongitude" data-ng-init="searchlongitude=false">
						<label for="longitude">Longitude</label>
						<div data-ng-if="!searchlongitude">
							<div data-ng-init="obj.longitude=''"></div>
						</div>
							<span data-ng-show="searchlongitude">
						 
                       <br/> <input id="longitude" type="text" placeholder="Longitude" data-ng-model="obj.longitude"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="latitude" name="latitude" value="latitude" data-ng-model="searchlatitude" data-ng-init="searchlatitude=false">
						<label for="latitude">Latitude</label>
						<div data-ng-if="!searchlatitude">
							<div data-ng-init="obj.latitude=''"></div>
						</div>
							<span data-ng-show="searchlatitude">
						 
                       <br/> <input id="latitude" type="text" placeholder="Latitude" data-ng-model="obj.latitude"/> 
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
						
						<br/><input type="checkbox" id="day_held" name="day_held" value="day_held" data-ng-model="searchday" data-ng-init="searchday=false">
						<label for="day_held">Day held</label>
						<div data-ng-if="!searchday">
							<div data-ng-init="obj.day_held=''"></div>
						</div>
							<span data-ng-show="searchday">
						 
                       <br/> <input id="day_held" type="text" placeholder="day_held" data-ng-model="obj.day_held"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
	
		</div>
	</div>
</div>
	<br/>
	
	
	<div style="overflow-x:auto;" class="row">
<div class="col-md-12">
	<table id="myTable2" class="table table-responsive table-bordered table-striped table-hover"> 
                                <caption class="text-primary">Roro container</caption>
         <!--table head-->      <thead class="thead-dark">
        
    	<tr>
		
		<th id="rorogroup">
			<button ng-click="sortBy('rorogroup')">Roro group</button>
			<span class="sortorder" ng-show="propertyName === 'rorogroup'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="size">
			<button ng-click="sortBy('size')">Size</button>
			<span class="sortorder" ng-show="propertyName === 'size'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="serialNo">
			<button ng-click="sortBy('serialNo')">Serial No.</button>
			<span class="sortorder" ng-show="propertyName === 'serialNo'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="productID">
			<button ng-click="sortBy('productID')">Product ID</button>
			<span class="sortorder" ng-show="propertyName === 'productID'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="qrcode">
			<button ng-click="sortBy('qrcode')">QR Code</button>
			<span class="sortorder" ng-show="propertyName === 'qrcode'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="in_house">
			<button ng-click="sortBy('in_house')">In house</button>
			<span class="sortorder" ng-show="propertyName === 'in_house'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="with_customer">
			<button ng-click="sortBy('with_customer')">With Customer</button>
			<span class="sortorder" ng-show="propertyName === 'with_customer'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="lost">
			<button ng-click="sortBy('lost')">Lost</button>
			<span class="sortorder" ng-show="propertyName === 'lost'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="longitude">
			<button ng-click="sortBy('longitude')">Longitude</button>
			<span class="sortorder" ng-show="propertyName === 'longitude'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="latitude">
			<button ng-click="sortBy('latitude')">Latitude</button>
			<span class="sortorder" ng-show="propertyName === 'latitude'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="status">
			<button ng-click="sortBy('status')">Status</button>
			<span class="sortorder" ng-show="propertyName === 'status'" ng-class="{reverse:reverse}"></span>
		</th>
		<th id="day_held">
			<button ng-click="sortBy('day_held')">Day held</button>
			<span class="sortorder" ng-show="propertyName === 'day_held'" ng-class="{reverse:reverse}"></span>
		</th>
		<th>Action</td>
	</tr>	
	</thead>
	
<tbody>
	<div class="row">
		<div class="col-md-12">
		<tr data-ng-repeat="u in filtered=(rorodata | orderBy:propertyName:reverse | filter:obj)| off: currentPage*studentsPerPage | limitTo : studentsPerPage"> 
	
	
		<td headers="rorogroup">{{u.rorogroup}}</td>
		<td headers="size">{{u.size}}</td>
	<td headers="serialNo">{{u.serialNo}}</td>
		<td headers="productID">{{u.productID}}</td>
	<td headers="qrcode">{{u.qrcode}}</td>
		<td headers="in_house">{{u.in_house}}</td>
	<td headers="with_customer">{{u.with_customer}}</td>
		<td headers="lost">{{u.lost}}</td>
	<td headers="longitude">{{u.longitude}}</td>
		<td headers="latitude">{{u.latitude}}</td>
	<td headers="status">{{u.status}}</td>
		<td headers="day_held">
		{{u.day_held}}
		</td>
		<td><a href="roro.php?action=delete&id={{u.serialNo}}" onclick="remove()">
		<span class="text-danger">Remove |</span></a>
		
		<a href="editroro.php?action=edit&id={{u.serialNo}}" onclick="edit()">
			<span class="text-danger"> Edit</span></a>
	
		</td>
		</tr>
	
                                  </div>  
                              </div>  
                               </tbody>
							   
		</table> </div>   
	 
	
	 </div>   
        
		<br/>
		<button><a href="newroro.php">Create new roro</a></button>

 
        
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