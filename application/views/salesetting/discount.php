
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<input type="text" ng-model="searchtext" placeholder="ค้นหารายชื่อสินค้า" style="width:300px;" class="form-control">
<br />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;text-align: center;">ลำดับ</th>
			<th style="text-align: center;">รหัสสินค้า</th>
			<th style="text-align: center;">ชื่อสินค้า</th>
			<th style="text-align: center;">หมวดหมู่</th>
			<th style="text-align: center;">ราคาขายสินค้าต่อหน่วย/บาท</th>
			<th style="text-align: center;">ส่วนลดต่อหน่วย/บาท</th>
			<th style="width: 120px;text-align: center;">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	

		<tr ng-repeat="x in productlist | filter:searchtext">
		<td align="center">{{$index+1}}</td>
		<td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td>{{x.product_category_name}}</td>
			
			<td align="right">{{x.product_price | number:2}}</td>

			<td ng-show="product_id==x.product_id"><input type="text" ng-model="x.product_price_discount" class="form-control"></td>

			<td ng-show="product_id!=x.product_id" align="right">{{x.product_price_discount | number:2}}</td>

			<td ng-show="product_id!=x.product_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x.product_id)">แก้ไข</button>
				
			</td>

			<td ng-show="product_id==x.product_id">

				<button class="btn btn-xs btn-success" ng-click="Editsaveproduct(x.product_id,x.product_name,x.product_price,x.product_price_discount,x.product_category_id)">บันทึก</button>
				<button class="btn btn-xs btn-default" ng-click="Cancelproduct(x.product_id)">ยกเลิก</button>
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



$scope.get = function(){
   
$http.get('Discount/get')
       .then(function(response){
          $scope.productlist = response.data.list; 
                 
        });
   };
$scope.get();



$scope.Editinputproduct = function(product_id){
$scope.product_id = product_id;
};

$scope.Cancelproduct = function(product_id){
$scope.product_id = '';
$scope.get();
};

$scope.Editsaveproduct = function(product_id,product_name,product_price,product_price_discount,product_category_id){
$http.post("Discount/Update",{
	product_id: product_id,
	product_name: product_name,
	product_price: product_price,
	product_price_discount:product_price_discount,
	product_category_id: product_category_id
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.product_id = '';
$scope.get();

        });	
};




   


});
	</script>
