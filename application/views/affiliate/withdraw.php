
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="row">
<div class="col-md-12">

<div class="col-md-12 panel panel-body panel-default text-center">
<h3>
ยอดเงินที่ถอนได้
<span style="color: red;font-weight: bold;">  {{amount | number}} </span> บาท
<br /><br />

<button class="btn btn-primary btn-lg" ng-show="amount >= 500" ng-click="Openwithdraw()">ถอนเงิน</button>

  </h3>
  <span  ng-show="amount < 500" style="color: red;">* ยอดเงินที่สามารถถอนได้ขั้นต่ำ 500 บาท</span></span>
</div>




</div>
</div>



<div class="panel panel-default">
	<div class="panel-body">

<span style="font-size: 15px;font-weight: bold;">รายการเบิกถอนเงิน</span>
<table class="table table-hover">
	<thead style="background-color: #eee;">
		<tr>
		<th style="width: 5px;"></th>
			<th class="text-center">ยอดเบิก</th>
			<th class="text-center">วันที่เบิก</th>
			<th class="text-center">สถานะการโอน</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in datalist">
		<td  align="center"><span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: green;font-weight: bold;" ng-if="x.w_status=='1'"></span></td>
			<td align="center">{{x.w_amount | number}}</td>
			<td align="center">{{x.create_date}}</td>
			<td align="center">
			<span ng-if="x.w_status=='1'"  style="color: green;font-weight: bold;">โอนเงินเรียบร้อย</span>
			<span ng-if="x.w_status=='0'">รอโอนเงิน</span>
			</td>
		</tr>
	</tbody>
</table>


</div>
</div>



<div class="modal fade" id="Openwithdraw">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ถอนเงิน</h4>
			</div>
			<div class="modal-body">
	<center>
	<h3>	ยอดเงินที่ถอน		
<span style="color: red;font-weight: bold;"> 

{{amount | number}} บาท
 </h3>

 <textarea class="form-control" ng-model="bankaccount" placeholder="ข้อมูลสำหรับโอนเงิน ชื่อธนาคาร, ชื่อบัญชี, หมายเลขบัญชี"></textarea>
<br />
 <button type="button"  ng-disabled="bankaccount == '' || cfwd" class="btn btn-success btn-lg" ng-click="Confirmwithdraw()">ยืนยันการถอนเงิน</button>
 </center>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

$scope.Openwithdraw = function(){
$('#Openwithdraw').modal('show');
};



$scope.get = function(){
   
$http.get('Withdraw/get_list_withdraw')
       .then(function(response){
          $scope.datalist = response.data; 
                 
        });
 $http.get('Withdraw/amount')
       .then(function(response){
          $scope.amount = response.data; 
                 
        });
   };
$scope.get();


$scope.Confirmwithdraw = function(){
	$scope.cfwd = true;
$http.post("Withdraw/Update",{
	bankaccount: $scope.bankaccount
	}).success(function(data){
toastr.success('รับคำร้องถอนเงินเรียบร้อย');
$scope.get();
$('#Openwithdraw').modal('hide');
$scope.cfwd = false;
        });	
};



   


});
	</script>