
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">
	
<div class="col-md-12 col-sm-12">

<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> แสดงปุ่มลบ
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
<th>ชื่อห้อง/หมายเลขห้อง</th><th>จำนวนที่นอน</th><th>ราคา</th><th style="width: 120px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
	
			<td>
			<input type="text" class="form-control" placeholder="ชื่อห้อง/หมายเลขห้อง" ng-model="apartment_room_name">
			</td>

			<td>
				<input type="text" class="form-control" placeholder="จำนวนที่นอน" ng-model="apartment_room_num">
			</td>

			
			<td>
				<input type="text" class="form-control" placeholder="ราคา" ng-model="apartment_room_price">
			</td>



			<td><button class="btn btn-success" ng-click="Savecategory(apartment_room_name,apartment_room_num,apartment_room_price)">บันทึก</button></td>
	</tr>

	</tbody>
</table>

</div>


		
	

<!-- 
<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> ดาวน์โหลดตาราง Excel </button> -->






	<div class="col-md-2" ng-repeat="x in categorylist">
<div  class="col-md-12 btn btn-default">
		

			<span ng-show="apartment_room_id==x.apartment_room_id">
			<input type="text" placeholder="หมายเลขโต๊ะ" ng-model="x.apartment_room_name" class="form-control">
			<input type="text" placeholder="จำนวนที่นอน" ng-model="x.apartment_room_num" class="form-control">

			<input type="text" placeholder="ราคา" ng-model="x.apartment_room_price" class="form-control">
			
			</span>
<center>
			<span ng-show="apartment_room_id!=x.apartment_room_id">
			<h1 style="font-weight: bold;">{{x.apartment_room_name}}</h1></span>

			<span ng-show="apartment_room_id!=x.apartment_room_id">
			<h4>{{x.apartment_room_num}} ที่นอน</h4></span>


			<span ng-show="apartment_room_id!=x.apartment_room_id">
			<h4>ราคา {{x.apartment_room_price | number}} </h4></span>


</center>
<br />
			<span ng-show="apartment_room_id!=x.apartment_room_id" style="float: right;">

				<button class="btn btn-xs btn-default" ng-click="Editinputcategory(x.apartment_room_id)">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.apartment_room_id)">ลบ</button>
			</span>

			<span ng-show="apartment_room_id==x.apartment_room_id" style="float: right;">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x)">บันทึก</button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.apartment_room_id)">ยกเลิก</button>
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

$scope.apartment_room_name = '';
$scope.apartment_room_num = '';
$scope.apartment_room_price = '';


$scope.get = function(){
   
$http.get('Apartment_room/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecategory = function(name,num,price){
	if(name != '' && num != '' && price != ''){
$http.post("Apartment_room/Add",{
	apartment_room_name: name,
	apartment_room_num: num,
	apartment_room_price: price
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$scope.apartment_room_name = '';
$scope.apartment_room_num = '';
$scope.apartment_room_price = '';
        });	
}else{
toastr.warning('กรอกให้มูลให้ครบ');
}

};

$scope.Editinputcategory = function(id){
$scope.apartment_room_id = id;
};

$scope.Cancelcategory = function(apartment_room_id){
$scope.apartment_room_id = '';
$scope.get();
};

$scope.Editsavecategory = function(x){
$http.post("Apartment_room/Update",{
	apartment_room_id: x.apartment_room_id,
	apartment_room_name: x.apartment_room_name,
	apartment_room_num: x.apartment_room_num,
	apartment_room_price: x.apartment_room_price
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.apartment_room_id = '';
$scope.get();

        });	
};


$scope.Deletecategory = function(apartment_room_id){
$http.post("Apartment_room/Delete",{
	apartment_room_id: apartment_room_id
	}).success(function(data){
toastr.success('ลบเรียบร้อย');
$scope.get();
        });	
};




});
	</script>
