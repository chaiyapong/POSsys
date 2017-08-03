
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">
	
<div class="col-md-12 col-sm-12">

<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> แสดงปุ่มลบ
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
<th>ชื่อโต๊ะ/หมายเลขโต๊ะ</th><th>จำนวนที่นั่ง/จำนวนเก้าอี้</th><th style="width: 120px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
	
			<td>
			<input type="text" class="form-control" placeholder="ชื่อโต๊ะ/หมายเลขโต๊ะ" ng-model="food_table_name">
			</td>

			<td>
				<input type="text" class="form-control" placeholder="จำนวนที่นั่ง/จำนวนเก้าอี้" ng-model="food_table_seat">
			</td>

			


			<td><button class="btn btn-success" ng-click="Savecategory(food_table_name,food_table_seat)">บันทึก</button></td>
	</tr>

	</tbody>
</table>

</div>


		
	

<!-- 
<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> ดาวน์โหลดตาราง Excel </button> -->






	<div class="col-md-2" ng-repeat="x in categorylist">
<div  class="col-md-12 btn btn-default">
		

			<span ng-show="food_table_id==x.food_table_id">
			<input type="text" placeholder="หมายเลขโต๊ะ" ng-model="x.food_table_name" class="form-control">
			<input type="text" placeholder="จำนวนที่นั่ง" ng-model="x.food_table_seat" class="form-control">
			
			</span>
<center>
			<span ng-show="food_table_id!=x.food_table_id">
			<h1 style="font-weight: bold;">{{x.food_table_name}}</h1></span>

			<span ng-show="food_table_id!=x.food_table_id">
			<h4>{{x.food_table_seat}} ที่นั่ง</h4></span>

</center>
<br />
			<span ng-show="food_table_id!=x.food_table_id" style="float: right;">

				<button class="btn btn-xs btn-default" ng-click="Editinputcategory(x.food_table_id)">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.food_table_id)">ลบ</button>
			</span>

			<span ng-show="food_table_id==x.food_table_id" style="float: right;">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x)">บันทึก</button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.food_table_id)">ยกเลิก</button>
			</span>



</div>
<div class="col-md-12">
<BR />
</div>
		</div>





	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.food_table_name = '';
$scope.food_table_seat = '';


$scope.get = function(){
   
$http.get('Food_table/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecategory = function(food_table_name,food_table_seat){
	if(food_table_name != '' && food_table_seat != ''){
$http.post("Food_table/Add",{
	food_table_name: food_table_name,
	food_table_seat: food_table_seat
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$scope.food_table_name = '';
$scope.food_table_seat = '';
        });	
}else{
toastr.warning('กรอกให้มูลให้ครบ');
}

};

$scope.Editinputcategory = function(food_table_id){
$scope.food_table_id = food_table_id;
};

$scope.Cancelcategory = function(food_table_id){
$scope.food_table_id = '';
$scope.get();
};

$scope.Editsavecategory = function(x){
$http.post("Food_table/Update",{
	food_table_id: x.food_table_id,
	food_table_name: x.food_table_name,
	food_table_seat: x.food_table_seat
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.food_table_id = '';
$scope.get();

        });	
};


$scope.Deletecategory = function(food_category_id){
$http.post("Food_category/Delete",{
	food_table_id: food_table_id
	}).success(function(data){
toastr.success('ลบเรียบร้อย');
$scope.get();
        });	
};




});
	</script>
