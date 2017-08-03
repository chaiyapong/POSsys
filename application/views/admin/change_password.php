
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">



<input type="text" class="form-control" style="width: 200px;" value="admin" readonly="">
<br />
<input type="text" ng-model="admin_password" class="form-control" style="width: 200px;" placeholder="รหัสผ่านใหม่">
<br />
<button class="btn btn-success" ng-click="Changepass()">บันทึก</button>


	</div>
</div>



</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.admin_password = '';



$scope.Changepass = function(){

	if($scope.admin_password != ''){
	

$http.post("Change_password/Edit",{
admin_password: $scope.admin_password

	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');

        });	

	}else{
	toastr.warning('กรุณากรอกรหัสผ่าน');
}




};




   


});
	</script>