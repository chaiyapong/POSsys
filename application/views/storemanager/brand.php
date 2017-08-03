
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<button class="btn btn-primary" ng-click="Openmodal()">เพิ่มสาขา +</button>
<hr />
<input type="text" ng-model="search" name="" placeholder="ค้นหา" class="form-control" style="width: 200px;">
<br />
<table id="headerTable" class="table table-hover">
	<thead  style="background-color: #eee;">
		<tr>
			<th>ชื่อสาขา</th>
			<th>ที่อยู่</th>
			<th>เลขที่ผู้เสียภาษี</th>
			<th style="width: 10px;">แก้ไข</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list | filter:search">
			<td>{{x.owner_name}}</td>
			<td>
			{{x.owner_address}}
			


, โทร: {{x.tel}}
			</td>
			<td>{{x.owner_tax_number}}</td>
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
				<h4 class="modal-title">เพิ่มสาขา</h4>
			</div>
			<div class="modal-body">
				






<fieldset>
                    <div class="form-group">
			    		    <input class="form-control" placeholder="ชื่อสาขา" ng-model="owner_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

<div class="form-group">
			    		    <input class="form-control" minlength="4" placeholder="เลขที่ผู้เสียภาษี" ng-model="owner_tax_number" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


<div class="form-group">
	<textarea name="owner_address" class="form-control" placeholder="ที่อยู่" ng-model="owner_address" style="height: 70px;font-size: 20px;">
</textarea> 
</div>

	



 <div class="col-md-12">
			    		<br />
			    		</div>


 <div class="form-group">
			    		    <input class="form-control" placeholder="เบอร์โทร" ng-model="tel" type="text" style="height: 50px;font-size: 20px;">
			    		</div>
	

			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Addbrand()" value="เพิ่มสาขา" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Editbrand()" value="ยืนยัน" ng-show="foredit">

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

$scope.owner_name = '';
$scope.owner_tax_number  = '';
$scope.owner_address = '';
$scope.tel  = '';


$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;
};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.owner_id = x.owner_id;
$scope.owner_name = x.owner_name;
$scope.owner_tax_number = x.owner_tax_number;
$scope.owner_address = x.owner_address;
$scope.tel = x.tel;

};


$scope.get = function(){
   
$http.get('Brand/get')
       .then(function(response){
          $scope.list = response.data; 
                 
        });
   };
$scope.get();



$scope.Addbrand = function(){

if($scope.owner_name != '' && $scope.owner_address != '' && $scope.tel != ''){
$http.post("Brand/Add",{
	owner_name: $scope.owner_name,
	owner_tax_number: $scope.owner_tax_number,
	owner_address: $scope.owner_address,
	tel: $scope.tel
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;
        });	
}else{
	toastr.warning('กรุณากรอกข้อมูลให้ครบ');
}


};




$scope.Editbrand = function(){
	if($scope.owner_name != '' && $scope.owner_address != '' && $scope.tel != ''){
$http.post("Brand/Edit",{
	owner_id: $scope.owner_id,
	owner_name: $scope.owner_name,
	owner_tax_number: $scope.owner_tax_number,
	owner_address: $scope.owner_address,
	tel: $scope.tel
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$('#modalstore').modal('hide');
        });
	
        }else{
	toastr.warning('กรุณากรอกข้อมูลให้ครบ');
}	


};



$http.get('<?php echo $base_url;?>/Thailand/province')
       .then(function(response){
          $scope.provincelist = response.data.list; 
                 
        });


$scope.Getamphur = function(province){
$scope.amphur = '';
$scope.district = '';
$scope.districtlist = [];
$http.post("<?php echo $base_url;?>/Thailand/amphur",{
	'province_id': province
	}).success(function(data){
$scope.amphurlist = data.list;


        });	
};


$scope.Getdistrict = function(amphur){
$scope.district = '';
$http.post("<?php echo $base_url;?>/Thailand/district",{
	'amphur_id': amphur
	}).success(function(data){

$scope.districtlist = data.list;


        });	
};


   


});
	</script>