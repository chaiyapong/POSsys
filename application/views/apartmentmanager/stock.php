
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<select class="form-control" ng-model="apartment_brand_id" ng-change="Selectbrand()">
<option value="0">กรุณาเลือก สาขา</option>
	<option ng-repeat="x in listbrand" value="{{x.apartment_brand_id}}">
		{{x.apartment_brand_name}}
	</option>
</select>
</div>

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="ค้นหาจากชื่อห้องพัก" style="width: 300px;">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1','',apartment_brand_id)" class="btn btn-success" placeholder="" title="ค้นหา"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>
<br />


<center ng-if="list==''">
<h1 style="font-weight: bold;">ไม่พบข้อมูล</h1>
</center>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;">ลำดับ</th>
			<th style="text-align: center;">ชื่อห้อง</th>
			<th style="text-align: center;">สาขา</th>
			<th style="text-align: center;">ราคาเช่า/บาท</th>
			<th style="text-align: center;">สถานะ</th>
		</tr>
	</thead>
	<tbody>
	

		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>

			<td>{{x.apartment_room_name}}</td>
			<td>{{x.apartment_brand_name}}</td>
	
			<td align="right">{{ x.apartment_room_price | number:2 }}</td>
			
		
			<td align="right">
			<span ng-if="x.apartment_room_status == '0'" style="color: #000;">ห้องว่าง</span>
			<span ng-if="x.apartment_room_status == '1'" style="color: orange;">จองแล้ว</span>
			<span ng-if="x.apartment_room_status == '2'" style="color: green;">เช็คอินแล้ว</span>
			</td>
			

			
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

$scope.searchtext = '';

$scope.apartment_brand_id = '0';



$scope.getbrand = function(){

$http.get('Report_brand/getbrand')
       .then(function(response){
          $scope.listbrand = response.data; 
                 
        });
   };
$scope.getbrand();


$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage,apartment_brand_id){
    if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

 $http.post("Stock/Getstock",{
apartment_brand_id: apartment_brand_id,
searchtext:searchtext,
page: page,
perpage: perpage
}).success(function(data){
          $scope.list = data.list; 
                 $scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;
        });
   };
$scope.getlist('','1','','');



$scope.Selectbrand = function(){
$scope.getlist('','1','10',$scope.apartment_brand_id);

};










});
	</script>
