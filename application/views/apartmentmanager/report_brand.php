
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<select class="form-control" ng-model="apartment_brand_id" ng-change="Selectbrand()">
<option value="0">เลือก สาขา</option>
	<option ng-repeat="x in listbrand" value="{{x.apartment_brand_id}}">
		{{x.apartment_brand_name}}
	</option>
</select>
</div>
<div class="form-group">
<input type="text" name="" placeholder="ค้นหาชื่อห้อง" ng-model="searchproduct" class="form-control">
</div>
<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="จากวันที่"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="ถึงวันที่">
</div>
<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="ค้นหา"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button> 
</div> -->

</form>

<br />
<center ng-if="apartment_brand_id=='0'">
	<h1 style="font-weight: bold;">
		กรุณาเลือก สาขา
	</h1>

</center>


<hr />



	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;">ชื่อห้อง</th>
			<th style="text-align: center;">จำนวนเช่า</th>
			<th style="text-align: center;">รายรับ/บาท</th>
			
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist | filter:searchproduct">
			<td>{{x.apartment_room_name}}</td>
			<td align="right">{{x.apartment_numsaleall | number}}</td>
			<td align="right">{{x.apartment_pricesaleall | number:2}}</td>
			
			</tr>

		

		<tr>
			<td colspan="1" align="right">รวม</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumnumall() | number }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricesaleall() | number:2 }}</td>
			
		</tr>



	</tbody>
</table>
<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> ดาวน์โหลดตาราง Excel </button>



	</div>

	</div>

	</div>




			<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$("#dayfrom").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย  
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 

$("#dayto").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย  
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 

$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';

$scope.apartment_brand_id = '0';

$scope.getbrand = function(){

$http.get('Report_brand/getbrand')
       .then(function(response){
          $scope.listbrand = response.data; 
                 
        });
   };
$scope.getbrand();



$scope.reportdaylist = function(){
$http.post("Report_brand/daylist",{
	apartment_brand_id: $scope.apartment_brand_id,
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.daylist = data;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push({count: item.apartment_pricesaleall,name: item.apartment_room_name});
});

$scope.Chart($scope.datac);


        });
};
//$scope.reportdaylist();


$scope.Selectbrand = function(){
$scope.reportdaylist();
};


 $scope.Sumnumall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.apartment_numsaleall != null){
	 apartment_numsaleall = item.apartment_numsaleall;
	 }else{
     apartment_numsaleall = 0;
	 }
total += parseInt(apartment_numsaleall);
 });
    return total;
};

 $scope.Sumpricesaleall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.apartment_pricesaleall != null){
	 apartment_pricesaleall = item.apartment_pricesaleall;
	 }else{
     apartment_pricesaleall = 0;
	 }
total += parseInt(apartment_pricesaleall);
 });
    return total;
};






$scope.DownloadExcel = function(){

$http.post("Report_user/excel",{
	'excel': '1',
	'dayfrom': $scope.dayfrom || '',
	'dayto': $scope.dayto || '',
	'apartment_brand_id': $scope.apartment_brand_id 
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.datac = [];


$scope.Chart = function(datac){
$('#bar').empty();
Morris.Bar({
  element: 'bar',
  data: datac,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['รายรับ'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
     var letters = '0123456789ABCDEF';
    var color = '#f0ad4e';
    return color;
    }
  }

});
};

$scope.Openchart = function(){
$scope.showchart = true;
};

$scope.Opentable = function(){
$scope.showchart = false;
};


});

</script>