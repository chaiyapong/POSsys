
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<select class="form-control" ng-model="owner_id" ng-change="Selectbrand()">
<option value="0">กรุณาเลือก สาขา</option>
	<option ng-repeat="x in listbrand" value="{{x.owner_id}}">
		{{x.owner_name}}
	</option>
</select>
</div>

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="ค้นหาจากชื่อสินค้า หรือ Scan Barcode" style="width: 300px;">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1','',owner_id)" class="btn btn-success" placeholder="" title="ค้นหา"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>
<br />
<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;">ลำดับ</th>
		<th style="text-align: center;">รหัสสินค้า</th>
		
			<th style="text-align: center;">ชื่อสินค้า</th>
			<th style="text-align: center;">สาขา</th>
			<th style="text-align: center;">หมวดหมู่</th>

			<th style="text-align: center;">ราคาขาย/บาท</th>
			<th style="text-align: center;">ส่วนลด/บาท</th>
			<th style="text-align: center;">จำนวนคงเหลือ</th>
			<th style="text-align: center;">รายรับประมาณการ/บาท</th>
		</tr>
	</thead>
	<tbody>
	

		<tr ng-repeat="x in list">
			<td class="text-center">{{($index+1)}}</td>
			
			<td align="center">{{x.product_code}}</td>


			<td>{{x.product_name}}</td>
			<td>{{x.owner_name}}</td>
			<td>{{x.product_category_name}}</td>
	
			<td align="right">{{ x.product_price | number:2 }}</td>
			<td align="right">{{ x.product_price_discount | number:2 }}</td>
		
			<td align="right">{{x.product_stock_num | number}}</td>
			<td align="right">{{ (x.product_price - x.product_price_discount) * x.product_stock_num | number:2}}</td>

			

			
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
$scope.product_category_id = '0';

$scope.owner_id = '0';



$scope.getbrand = function(){

$http.get('Report_brand/getbrand')
       .then(function(response){
          $scope.listbrand = response.data; 
                 
        });
   };
$scope.getbrand();


$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage,owner_id){
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
owner_id: owner_id,
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
$scope.getlist('','1');



$scope.Selectbrand = function(){
$scope.getlist('','1','10',$scope.owner_id);

};










});
	</script>
