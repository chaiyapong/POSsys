
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> แสดงปุ่มลบ
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;">ลำดับ</th><th>ชื่อประเภท</th><th style="width: 120px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="ชื่อประเภท" ng-model="food_category_name"></td>
			<td><button class="btn btn-success" ng-click="Savecategory(food_category_name)">บันทึก</button></td>
	</tr>

		<tr ng-repeat="x in categorylist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="food_category_id==x.food_category_id"><input type="text" ng-model="x.food_category_name" class="form-control"></td>

			<td ng-show="food_category_id!=x.food_category_id">{{x.food_category_name}}</td>

			<td ng-show="food_category_id!=x.food_category_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.food_category_id)">แก้ไข</button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.food_category_id)">ลบ</button>
			</td>

			<td ng-show="food_category_id==x.food_category_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.food_category_id,x.food_category_name)">บันทึก</button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.food_category_id)">ยกเลิก</button>
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
   
$http.get('Food_category/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecategory = function(food_category_name){
$http.post("Food_category/Add",{
	food_category_name: food_category_name
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$scope.food_category_name = '';
        });	
};

$scope.Editinputcategory = function(food_category_id){
$scope.food_category_id = food_category_id;
};

$scope.Cancelcategory = function(food_category_id){
$scope.food_category_id = '';
$scope.get();
};

$scope.Editsavecategory = function(food_category_id,food_category_name){
$http.post("Food_category/Update",{
	food_category_id: food_category_id,
	food_category_name: food_category_name
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.food_category_id = '';
$scope.get();

        });	
};


$scope.Deletecategory = function(food_category_id){
$http.post("Food_category/Delete",{
	food_category_id: food_category_id
	}).success(function(data){
toastr.success('ลบเรียบร้อย');
$scope.get();
        });	
};




});
	</script>
