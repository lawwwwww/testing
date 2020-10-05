/*global angular*/
var app=angular.module("myapp",[]);

app.filter("off",function(){
	return function(input,start)
	{
		//start=parseInt(start,10);
		return input.slice(start);       //return the selected data 
	}
})
app.controller('myctrl',['$scope','$http',function($scope,$http)
{
	
	 $scope.updateuploaddata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displayuploaddata.php"
										}).then(function successCallback (response){
											$scope.uploaddata = response.data;
										});
				   }
	
	 $scope.updatetripdata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displaytripdata.php"
										}).then(function successCallback (respons){
											$scope.tripdata = respons.data;
										});
				   }
				   
	 $scope.updatetripincdata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displaytripincompletedata.php"
										}).then(function successCallback (rr){
											$scope.tripincdata = rr.data;
										});
				   }
				   
		 $scope.updatetripdonedata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displaytripdonedata.php"
										}).then(function successCallback (respon){
											$scope.tripdonedata = respon.data;
										});
				   }
		 $scope.updaterorodata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displayrorodata.php"
										}).then(function successCallback (respo){
											$scope.rorodata = respo.data;
										});
				   }
				    $scope.updatedumpdata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displaydumpdata.php"
										}).then(function successCallback (resp){
											$scope.dumpdata = resp.data;
										});
				   }
			    $scope.updatedriverdata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displaydriverdata.php"
										}).then(function successCallback (res){
											$scope.driverdata = res.data;
										});
				   }
				   	    $scope.updatetruckdata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displaytruckdata.php"
										}).then(function successCallback (re){
											$scope.truckdata = re.data;
										});
				   }
				   	    $scope.updatefeedbackdata =function(){ //DISPLAY PRODUCT
				   $http({
											method: "get",
											url:"displayfeedbackdata.php"
										}).then(function successCallback (r){
											$scope.feedbackdata = r.data;
										});
				   }
		
	
	
	$scope.studentsPerPage=5;             //5 data per page
	$scope.currentPage=0;                 //current page 0
	
	
	$scope.dd=" ";                        //used to keep track of the changes of the radio button
	/*$scope.test=function(){               //radio button on click will run this function
	if($scope.obj.type!=$scope.dd)        //if obj.type is changed
	{
		$scope.currentPage=0;			  //change current page to prevent happen like access all unit type and stop at page 5, and access other unit type return blank page 
		$scope.dd=$scope.obj.type;        //assign value
	}};
	
	
	var countc=0;                                        //initialize variable
	var countsd=0;
	var countsa=0;
	*/
	$scope.count=function()          //used to count the page length
	{
		return Math.ceil($scope.filtered.length/$scope.studentsPerPage)-1;
		//filtered array is the array that is filtered in html file
	};
	
	$scope.range=function()           //get numbtn
	{
		var rangesize;
		
		if($scope.count()>=5)         //if big data then range size 5
		{
			rangesize=5;
		}    
		
		else     //if only small amount of data, range size will be smaller
		{
			rangesize=$scope.count()+1;
		}
		
		var numbtn=[];
		var start=$scope.currentPage;
		if(start>$scope.count()-rangesize)
		{
			start=$scope.count()-rangesize+1;  
		}
		for(i=start;i<start+rangesize;i++)
		{
			numbtn.push(i);  //get the number btn
		}
		return numbtn;
	};
	 
	$scope.setPage=function(n)     //set page
	{
		$scope.currentPage=n;
	};
	
	$scope.prev=function()         //prev page
	{
		if($scope.currentPage>0)    //can previous the page if current page is bigger than 0(first page)
		{
			$scope.currentPage--;
		}
	};
	
 	$scope.prevpagedisabled=function()   //disabled prev button if current page is 0
	{
		return $scope.currentPage===0 ? "disabled":"";
	};
	
	$scope.nextPage=function()  //if current page is not the max page allow to add the page
	{
		if($scope.currentPage!=$scope.count())
		{
			$scope.currentPage++;
		}
	};
	
	$scope.nextPageDisabled=function()  //disabled page if current page is equal page count
	{
		return $scope.currentPage===$scope.count()?"disabled":"";
	};
	
	
	$scope.calsort=function(name){
		if(name%2==0)
		{
			$scope.reverse='';
		}
		else
		{
			$scope.reverse='desc';
		}
	};
	
	 	  $scope.sortBy = function(propertyName) {
			$scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
			$scope.propertyName = propertyName;
		};
	
	
}]);

