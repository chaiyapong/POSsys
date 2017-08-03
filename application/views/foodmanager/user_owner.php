
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<button class="btn btn-primary" ng-click="Openmodal()">เพิ่มพนักงาน +</button>
<hr />
<input type="text" ng-model="search" name="" placeholder="ค้นหา" class="form-control" style="width: 200px;">
<br />
<table id="headerTable" class="table table-hover">
	<thead  style="background-color: #eee;">
		<tr>
		<th style="width: 10px;">ลำดับ</th>
			<th>ชื่อพนักงาน</th>
			<th>Email</th>
			<th>รหัสผ่าน</th>
			<th>สาขา</th>
			<th style="width: 10px;">แก้ไข</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list | filter:search">
		<td>{{$index+1}}</td>
			<td>{{x.name}}</td>
			<td>{{x.user_email}}</td>
			<td>{{x.user_password}}</td>
			<td>
			{{x.food_brand_name}}
			
			</td>
			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)">แก้ไข</button>
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
				<h4 class="modal-title">เพิ่มพนักงาน</h4>
			</div>
			<div class="modal-body">
				






<fieldset>
                    <div class="form-group">
			    		    <input class="form-control" placeholder="ชื่อพนักงาน" ng-model="user_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>



<div class="form-group">
	<select id="" class="form-control" ng-model="food_brand_id" style="height: 50px;font-size: 20px;">
		<option value="0">เลือกสาขา</option>
		<option ng-repeat="a in listbrand" value="{{a.food_brand_id}}">{{a.food_brand_name}}</option>
	</select>
</div>


<div class="form-group">
			    		    <input ng-disabled="foredit" class="form-control" placeholder="email" ng-model="user_email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


			    		<div class="form-group">
			    		    <input class="form-control" placeholder="รหัสผ่าน" ng-model="user_password" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

	

			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Adduser()" value="เพิ่มพนักงาน" ng-hide="foredit">

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

$scope.food_brand_id = '0';
$scope.user_email = '';
$scope.user_name = '';
$scope.user_password = '';

};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.user_id = x.user_id;
$scope.food_brand_id = x.food_brand_id;
$scope.user_name = x.name;
$scope.user_email = x.user_email;
$scope.user_password = x.user_password;

};


$scope.get = function(){
   
$http.get('User_owner/get')
       .then(function(response){
          $scope.list = response.data; 
                 
        });
   };
$scope.get();


$scope.getbrand = function(){
   
$http.get('<?php echo $base_url;?>/foodmanager/Brand/get')
       .then(function(response){
          $scope.listbrand = response.data; 
                 
        });
   };
$scope.getbrand();



$scope.Adduser = function(){


	if($scope.user_email != '' && $scope.food_brand_id != '0' && $scope.user_name != '' && $scope.user_password != ''){
$http.post("User_owner/Add",{
	food_brand_id: $scope.food_brand_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password
	
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

	if($scope.user_email != '' && $scope.food_brand_id != '0' && $scope.user_name != '' && $scope.user_password != ''){
	

$http.post("User_owner/Edit",{
	
    user_id: $scope.user_id,
    food_brand_id: $scope.food_brand_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password

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