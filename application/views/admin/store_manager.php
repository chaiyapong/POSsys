
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<button class="btn btn-primary" ng-click="Openmodal()">เพิ่มผู้จัดการ +</button>
<hr />
<input type="text" ng-model="search" name="" placeholder="ค้นหา" class="form-control" style="width: 200px;">
<br />
<table id="headerTable" class="table table-hover table-bordered">
	<thead  style="background-color: #eee;">
		<tr>
		<th style="width: 10px;text-align: center;">ลำดับ</th>
			<th style="text-align: center;">ชื่อผู้จัดการ</th>
			<th style="text-align: center;">เบอร์โทร</th>
			<th style="text-align: center;">ชื่อร้าน/บริษัท</th>
			<th style="text-align: center;">Email</th>
			<th style="text-align: center;">ใช้ระบบ</th>
			<th style="width: 10px;text-align: center;">แก้ไข</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list | filter:search">
		<td>{{$index+1}}</td>
			<td>{{x.store_name}}</td>
			<td align="right">{{x.store_tel}}</td>
			<td>{{x.store_storename}}</td>
			<td>{{x.store_email}}</td>

			<td>
<span ng-if="x.store_type == '0'" style="color: orange;">POS ขายหน้าร้าน</span>
<span ng-if="x.store_type == '1'" style="color: green;">Food ร้านอาหาร</span>
<span ng-if="x.store_type == '2'" style="color: red;">Apartment เช่าที่พัก</span>
</td>
			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
			</td>
		</tr>
		
	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> ดาวน์โหลดตาราง Excel </button>



</div>
</div>




<div class="modal fade" id="modalstore">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่ม ผู้จัดการ</h4>
			</div>
			<div class="modal-body">
				






<fieldset>
                    <div class="form-group">
			    		    <input class="form-control" placeholder="ชื่อ ผู้จัดการ" ng-model="store_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


<div class="form-group">
			    		    <input class="form-control" placeholder="เบอร์โทร" ng-model="store_tel" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


<div class="form-group">
			    		    <input class="form-control" placeholder="ชื่อร้าน/บริษัท" ng-model="store_storename" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


<div class="form-group">





<select ng-model="store_type" ng-hide="foredit" class="form-control"  style="height: 50px;font-size: 20px;">
		<option value="0">POS ขายหน้าร้าน </option>
		<option value="1">Food ร้านอาหาร </option>
		<option value="2">Apartment เช่าที่พัก </option>
	</select>
</div>

<div ng-if="foredit">

<center>
<h2>
<span ng-if="store_type == '0'" style="color: orange;">POS ขายหน้าร้าน</span>
<span ng-if="store_type == '1'" style="color: green;">Food ร้านอาหาร</span>
<span ng-if="store_type == '2'" style="color: green;">Apartment เช่าที่พัก</span>

</h2>
</center>

</div>



<div class="form-group">
			    		    <input ng-disabled="foredit" class="form-control" placeholder="email" ng-model="store_email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


			    		<div class="form-group">
			    		    <input class="form-control" placeholder="รหัสผ่าน" ng-model="store_password" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

	

			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Adduser()" value="เพิ่มผู้จัดการ" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Edituser()" value="ยืนยัน" ng-show="foredit">

			    	</fieldset>








			</div>
			<div class="modal-footer">
				
				
			</div>
		</div>
	</div>
</div>



</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
$scope.bankaccount = '';
$scope.cfwd = false;
$scope.foredit = false;



$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;

$scope.store_type = '0';
$scope.store_name = '';
$scope.store_tel = '';
$scope.store_storename = '';
$scope.store_email = '';
$scope.store_password = ''

};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.store_id = x.store_id;
$scope.store_type = x.store_type;
$scope.store_name = x.store_name;
$scope.store_tel = x.store_tel;
$scope.store_storename = x.store_storename;
$scope.store_email = x.store_email;
$scope.store_password = '';

};


$scope.get = function(){
   
$http.get('Store_manager/get')
       .then(function(response){
          $scope.list = response.data; 
                 
        });
   };
$scope.get();





$scope.Adduser = function(){





	if($scope.store_email != '' && $scope.store_name != '' && $scope.store_password != '' && $scope.store_tel != '' && $scope.store_storename != ''){
$http.post("Store_manager/Add",{
	store_type: $scope.store_type,
store_name: $scope.store_name,
store_tel: $scope.store_tel,
store_storename: $scope.store_storename,
store_email: $scope.store_email,
store_password: $scope.store_password
	
	}).success(function(data){


if(data=='dup'){
	toastr.warning('ไม่สามารถใช email นี้ได้');
}else{
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;




}



        });	


	}else{
	toastr.warning('กรุณากรอกข้อมูลให้ครบทุกช่อง');
}




};




$scope.Edituser = function(){

	if($scope.store_email != '' && $scope.store_name != '' && $scope.store_password != '' && $scope.store_tel != '' && $scope.store_storename != ''){
	

$http.post("Store_manager/Edit",{
	store_id: $scope.store_id,
    store_type: $scope.store_type,
store_name: $scope.store_name,
store_tel: $scope.store_tel,
store_storename: $scope.store_storename,
store_email: $scope.store_email,
store_password: $scope.store_password

	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$('#modalstore').modal('hide');




        });	

	}else{
	toastr.warning('กรุณากรอกข้อมูลให้ครบทุกช่อง');
}




};




   


});
	</script>