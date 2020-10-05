<?php
	include_once 'connection.php';

	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="delete")
		{
			echo '<script>alert("Are you sure you want to delete")</script>';
			
			$del="DELETE FROM incompletetrip where invoiceID=$_GET[id]";
			
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
<html data-ng-app="myapp" lang="en">
<head>
	<title>View Incomplete Trip</title>
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
       <meta name="keywords" content="fyp">
    <link href="css/bootstrap.min.css" rel="stylesheet" />  
     
    <link href="css/mycss.css" rel="stylesheet" type="text/css">
</head>


<header>
	<?php include'navigation.php'?>
</header>


<body data-ng-controller="myctrl" data-ng-init="propertyName='invoiceID';reverse=false" style="margin-left:100px;margin-top:20px;">
<div class="container" data-ng-init="updatetripincdata()">
	
<?php include 'trip_navi.php'?>

<br/><br/><br/>


<form>	
	<h2>Trip</h2><br/>

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
	
		<input type="checkbox" id="invoiceid" name="invoiceid" value="invoiceid" data-ng-init="searchinvoiceid=false" data-ng-model="searchinvoiceid">
						<label for="invoiceid">Invoice ID</label>
						<div data-ng-if="!searchinvoiceid">
							<div data-ng-init="obj.invoiceID=''"></div>
						</div>
						
							<span data-ng-show="searchinvoiceid">
						 
                       <br/> <input id="invoiceid" type="text" placeholder="Invoice ID" data-ng-model="obj.invoiceID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br><input type="checkbox" id="invoicedate" name="invoicedate" value="invoicedate" data-ng-init="searchinvoicedate=false" data-ng-model="searchinvoicedate">
						<label for="cust">Invoice Date</label>
						<div data-ng-if="!searchinvoicedate">
							<div data-ng-init="obj.invoice_date=''"></div>
						</div>
						
							<span data-ng-show="searchinvoicedate">
						 
                       <br/> <input id="invoicedate" type="text" placeholder="Invoice Date" data-ng-model="obj.invoice_date"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="driverid" name="driverid" value="driverid" data-ng-init="searchdriverid=false" data-ng-model="searchdriverid">
						<label for="driverid">Driver ID</label>
						<div data-ng-if="!searchdriverid">
							<div data-ng-init="obj.driverID=''"></div>
						</div>
						
							<span data-ng-show="searchdriverid">
						 
                       <br/> <input id="driverid" type="text" placeholder="Driver ID" data-ng-model="obj.driverID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="tripid" name="tripid" value="tripid" data-ng-init="searchtripid=false" data-ng-model="searchtripid">
						<label for="tripid">Trip ID</label>
						<div data-ng-if="!searchtripid">
							<div data-ng-init="obj.tripID=''"></div>
						</div>
						
							<span data-ng-show="searchtripid">
						 
                       <br/> <input id="tripid" type="text" placeholder="Trip ID" data-ng-model="obj.tripID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="cust" name="cust" value="cust" data-ng-init="searchcust=false" data-ng-model="searchcust">
						<label for="cust">Customer name</label>
						<div data-ng-if="!searchcust">
							<div data-ng-init="obj.cust_name=''"></div>
						</div>
						
							<span data-ng-show="searchcust">
						 
                       <br/> <input id="cust" type="text" placeholder="Customer name" data-ng-model="obj.cust_name"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="areaid" name="areaid" value="areaid" data-ng-model="searcharea" data-ng-init="searcharea=false">
						<label for="id">Area ID</label>
						<div data-ng-if="!searcharea">
							<div data-ng-init="obj.areaID=''"></div>
						</div>
							<span data-ng-show="searcharea">
						 
                       <br/> <input id="areaid" type="text" placeholder="Area ID" data-ng-model="obj.areaID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="container_retrieve" name="container_retrieve" value="container_retrieve" data-ng-model="searchcontainerretrieve" data-ng-init="searchcontainerretrieve=false">
						<label for="container_retrieve">Container retrieve</label>
						
						<div data-ng-if="!searchcontainerretrieve">
							<div data-ng-init="obj.container_retrieve=''"></div>
						</div>
						
							<span data-ng-show="searchcontainerretrieve">
						 
                        <br/><input id="container_retrieve" type="text" placeholder="Container retrieve" data-ng-model="obj.container_retrieve"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="container_placed" name="container_placed" value="container_placed" data-ng-model="searchcontainerplaced" data-ng-init="searchcontainerplaced=false">
						<label for="container_placed">Container placed</label>
						<div data-ng-if="!searchcontainerplaced">
							<div data-ng-init="obj.container_placed=''"></div>
						</div>
							<span data-ng-show="searchcontainerplaced">
						 
                        <br/><input id="container_placed" type="text" placeholder="Container placed" data-ng-model="obj.container_placed"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="collection_time" name="collection_time" value="collection_time" data-ng-model="searchcollectiontime" data-ng-init="searchcollectiontime=false">
						<label for="id">Collection time</label>
						<div data-ng-if="!searchcollectiontime">
							<div data-ng-init="obj.collection_time=''"></div>
						</div>
							<span data-ng-show="searchcollectiontime">
						 
                       <br/> <input id="collection_time" type="text" placeholder="Collection time" data-ng-model="obj.collection_time"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="collection_type" name="collection_type" value="collection_type" data-ng-model="searchcollectiontype" data-ng-init="searchcollectiontype=false">
						<label for="collection_type">Collection type</label>
						<div data-ng-if="!searchcollectiontype">
							<div data-ng-init="obj.collection_type=''"></div>
						</div>
							<span data-ng-show="searchcollectiontype">
						 
                       <br/> <input id="collection_type" type="text" placeholder="Collection type" data-ng-model="obj.collection_type"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="waste_type" name="waste_type" value="waste_type" data-ng-model="searchwastetrype" data-ng-init="searchwastetrype=false">
						<label for="waste_type">Waste type</label>
						<div data-ng-if="!searchwastetrype">
							<div data-ng-init="obj.waste_type=''"></div>
						</div>
							<span data-ng-show="searchwastetrype">
						 
                        <br/><input id="waste_type" type="text" placeholder="Waste type" data-ng-model="obj.waste_type"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
							
						<br/><input type="checkbox" id="ship_date" name="ship_date" value="ship_date" data-ng-model="searchshipdate" data-ng-init="searchshipdate=false">
						<label for="ship_date">Ship date</label>
						<div data-ng-if="!searchshipdate">
							<div data-ng-init="obj.ship_date=''"></div>
						</div>
							<span data-ng-show="searchshipdate">
						 
                        <br/><input id="ship_date" type="text" placeholder="Ship Date" data-ng-model="obj.ship_date"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						
						<br/><input type="checkbox" id="return_date" name="return_date" value="return_date" data-ng-model="searchreturndate" data-ng-init="searchreturndate=fale">
						<label for="return_date">Return Date</label>
						<div data-ng-if="!searchreturndate">
							<div data-ng-init="obj.return_date=''"></div>
						</div>
							<span data-ng-show="searchreturndate">
						 
                        <br/><input id="return_date" type="text" placeholder="Return date" data-ng-model="obj.return_date"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
								
						<br/><input type="checkbox" id="truckID" name="truckID" value="truckID" data-ng-model="searchtruck" data-ng-init="searchtruck=false">
						<label for="truckID">Truck ID</label>
						<div data-ng-if="!searchtruck">
							<div data-ng-init="obj.truckID=''"></div>
						</div>
							<span data-ng-show="searchtruck">
						 
                        <br/><input id="truckID" type="text" placeholder="Truck ID" data-ng-model="obj.truckID"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="salesOrderNo" name="salesOrderNo" value="salesOrderNo" data-ng-model="searchsales" data-ng-init="searchsales=false">
						<label for="salesOrderNo">Sales order no.</label>
						<div data-ng-if="!searchsales">
							<div data-ng-init="obj.salesOrderNo=''"></div>
						</div>
							<span data-ng-show="searchsales">
						 
                       <br/> <input id="salesOrderNo" type="text" placeholder="Sales order no" data-ng-model="obj.salesOrderNo"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="p_receive" name="p_receive" value="p_receive" data-ng-model="searchp_receive" data-ng-init="searchp_receive=false">
						<label for="container_size">Receiver</label>
						<div data-ng-if="!searchp_receive">
							<div data-ng-init="obj.p_receive=''"></div>
						</div>
							<span data-ng-show="searchp_receive">
						 
                       <br/> <input id="p_receive" type="text" placeholder="Receiver" data-ng-model="obj.p_receive"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
						<br/><input type="checkbox" id="dump_driver" name="dump_driver" value="dump_driver" data-ng-model="searchdump_driver" data-ng-init="searchdump_driver=false">
						<label for="container_size">Dump Driver</label>
						<div data-ng-if="!searchdump_driver">
							<div data-ng-init="obj.dump_driver=''"></div>
						</div>
							<span data-ng-show="searchdump_driver">
						 
                       <br/> <input id="dump_driver" type="text" placeholder="Dump Driver" data-ng-model="obj.dump_driver"/> 
         <!--allow the user to input their code and store it in obj.code-->
						</span>
						
		</div>
	</div>
</div>
	<br/>
	
	<div style="overflow-x:auto;" class="row">

	<div class="col-md-12">
				<table id="myTable2" class="table table-responsive table-bordered table-striped table-hover"> 
                                <caption class="text-primary">Incomplete Trip</caption>
         <!--table head-->      <thead class="thead-dark">
		 
		 
	<tr>
		<th id="invoiceID">
		
			<button ng-click="sortBy('invoiceID')">Invoice ID</button>
			<span class="sortorder" ng-show="propertyName === 'invoiceID'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="invoice_date">
		
			<button ng-click="sortBy('invoice_date')">Invoice Date</button>
			<span class="sortorder" ng-show="propertyName === 'invoice_date'" ng-class="{reverse:reverse}"></span>
		</th>
		 
		 <th id="driverID">
		
			<button ng-click="sortBy('driverID')">Driver ID</button>
			<span class="sortorder" ng-show="propertyName === 'driverID'" ng-class="{reverse:reverse}"></span>
		</th>
		 
		 <th id="tripID">
		
			<button ng-click="sortBy('tripID')">Trip ID</button>
			<span class="sortorder" ng-show="propertyName === 'tripID'" ng-class="{reverse:reverse}"></span>
		</th>
		 
		 <th id="cust_name">
		
			<button ng-click="sortBy('cust_name')">Customer name</button>
			<span class="sortorder" ng-show="propertyName === 'cust_name'" ng-class="{reverse:reverse}"></span>
		</th>
		 
		 <th id="areaID">
			<button ng-click="sortBy('areaID')">Area ID</button>
			<span class="sortorder" ng-show="propertyName === 'areaID'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="container_retrieve">
			<button ng-click="sortBy('container_retrieve')">Container retrieve</button>
			<span class="sortorder" ng-show="propertyName === 'container_retrieve'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="container_placed">
			<button ng-click="sortBy('container_placed')">Container placed</button>
			<span class="sortorder" ng-show="propertyName === 'container_placed'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="collection_time">
			<button ng-click="sortBy('collection_time')">Collection time</button>
			<span class="sortorder" ng-show="propertyName === 'collection_time'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="collection_type">
			<button ng-click="sortBy('collection_type')">Collection type</button>
			<span class="sortorder" ng-show="propertyName === 'collection_type'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="waste_type">
			<button ng-click="sortBy('waste_type')">Waste type</button>
			<span class="sortorder" ng-show="propertyName === 'waste_type'" ng-class="{reverse:reverse}"></span>
		</th>
		
		
		<th id="customer_sign">
			<button ng-click="sortBy('customer_sign')">Customer signature</button>
			<span class="sortorder" ng-show="propertyName === 'customer_sign'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="ship_date">
			<button ng-click="sortBy('ship_date')">Ship date</button>
			<span class="sortorder" ng-show="propertyName === 'ship_date'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="return_date">
			<button ng-click="sortBy('return_date')">Return date</button>
			<span class="sortorder" ng-show="propertyName === 'return_date'" ng-class="{reverse:reverse}"></span>
		</th>
		
			<th id="image">
			<button ng-click="sortBy('image')">Image</button>
			<span class="sortorder" ng-show="propertyName === 'image'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="instruction">
			<button ng-click="sortBy('instruction')">Instruction</button>
			<span class="sortorder" ng-show="propertyName === 'instruction'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="truckID">
			<button ng-click="sortBy('truckID')">Truck ID</button>
			<span class="sortorder" ng-show="propertyName === 'truckID'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="salesOrderNo">
			<button ng-click="sortBy('salesOrderNo')">Sales order no.</button>
			<span class="sortorder" ng-show="propertyName === 'salesOrderNo'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="address">
			<button ng-click="sortBy('address')">Address</button>
			<span class="sortorder" ng-show="propertyName === 'address'" ng-class="{reverse:reverse}"></span>
			
		</th>
		
		<th id="p_receive">
			<button ng-click="sortBy('p_receive')">Receiver</button>
			<span class="sortorder" ng-show="propertyName === 'p_receive'" ng-class="{reverse:reverse}"></span>
		</th>
		
		<th id="dump_driver">
			<button ng-click="sortBy('dump_driver')">Dump Driver</button>
			<span class="sortorder" ng-show="propertyName === 'dump_driver'" ng-class="{reverse:reverse}"></span>
		</th>
		
		 	<th>Action</th>
	</tr>	
	</thead>
	
	
<tbody>
	<div class="row">
		<div class="col-md-12">
		<tr data-ng-repeat="u in filtered=(tripincdata | orderBy:propertyName:reverse | filter:obj )| off: currentPage*studentsPerPage | limitTo : studentsPerPage"> 
	
		<td headers="invoiceID">{{u.invoiceID}}</td>
		<td headers="invoice_date">{{u.invoice_date}}</td>
		 <td headers="driverID">{{u.driverID}}</td>
		 <td headers="tripID">{{u.tripID}}</td>
		 <td headers="cust_name">{{u.cust_name}}</td>
		 <td headers="areaID">{{u.areaID}}</td>
		<td headers="container_retrieve">{{u.container_retrieve}}</td>
		<td headers="container_placed">{{u.container_placed}}</td>
		<td headers="collection_time">{{u.collection_time}}</td>
		<td headers="collection_type">{{u.collection_type}}</td>
		<td headers="waste_type">{{u.waste_type}}</td>
		<td headers="customer_sign">
	<span data-ng-if="u.customer_sign!=NULL">
		<img src="{{u.customer_sign}}" height="200" width="200"/>
		</span>
		</td>
		<td headers="ship_date">{{u.ship_date}}</td>
		<td headers="return_date">{{u.return_date}}</td>
		<td headers="image">
		<span data-ng-if="u.image!=NULL">
		<img src="{{u.image}}" height="200" width="200"/>
		</span>
		</td>
		<td headers="instruction">{{u.instruction}}</td>
		<td headers="truckID">{{u.truckID}}</td>
		<td headers="salesOrderNo">{{u.salesOrderNo}}</td>
		<td headers="address">{{u.address}}</td>
		<td headers="p_receive">{{u.p_receive}}</td>
		<td headers="dump_driver">{{u.dump_driver}}</td>
		<td><a href="incompletetrip.php?action=delete&id={{u.invoiceID}}" onclick="remove()">
		<span class="text-danger">Remove |</span></a>
		<a href="editincompletetrip.php?action=edit&id={{u.invoiceID}}" onclick="edit()">
			<span class="text-danger"> Edit</span></a>
		</form>
		</td>
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
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	