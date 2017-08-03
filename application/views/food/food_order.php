
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">
	

<center>

<button style="color:#000;background-color: #fff;width: ;height: ;">
โต๊ะว่าง
</button>
  <button style="color:#fff;background-color: orange;width:;height: ;"> รอสั่งอาหาร </button>   
  <button style="color:#fff;background-color: blue;width: ;height: ;"> สั่งอาหารเรียบร้อย</button> 
  <button style="color:#fff;background-color: green;width: ;height: ;"> ได้รับอาหารครบแล้ว</button>

<hr />
	<div class="btn btn-default" style="width: 200px;" ng-repeat="x in categorylist"   ng-click="Openorder(x)">

<div ng-if="x.food_table_status=='0'" style="color:#000;background-color: #fff;width: 100%;height: 100%;">
<h1 style="font-weight: bold;">{{x.food_table_name}}</h1>

			<h4>{{x.food_table_seat}} ที่นั่ง</h4>
</div>

<div ng-if="x.food_table_status=='1'" style="color:#fff;background-color: orange;width: 100%;height: 100%;">

			<h1 style="font-weight: bold;">{{x.food_table_name}}</h1>

			<h4>{{x.food_table_seat}} ที่นั่ง</h4>
</div>


<div ng-if="x.food_table_status=='2'" style="color:#fff;background-color: blue;width: 100%;height: 100%;">

			<h1 style="font-weight: bold;">{{x.food_table_name}}</h1>

			<h4>{{x.food_table_seat}} ที่นั่ง</h4>
</div>



<div ng-if="x.food_table_status=='3'" style="color:#fff;background-color: green;width: 100%;height: 100%;">

			<h1 style="font-weight: bold;">{{x.food_table_name}}</h1>

			<h4>{{x.food_table_seat}} ที่นั่ง</h4>
</div>





<BR />

		</div>
</center>











<div class="modal fade" id="Openorder">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
			<center>
				<h2 style="font-weight: bold;">โต๊ะ {{food_table_name}}</h2>
</center>


<center>
<button ng-click="Waitorder()" ng-if="food_table_status=='0'" class="btn btn-default btn-lg" style="font-size: 20px;">ลูกค้านั่งที่โต๊ะแล้ว กำลังอ่านเมนูอาหาร</button>

</center>


<button ng-click="Modalfood()" ng-if="food_table_status!='0'" class="btn btn-default">เลือกอาหาร</button>



<button ng-click="Successorder()" ng-if="food_table_status=='1'" class="btn btn-warning" style="float: right">สั่งอาหารเรียบร้อย</button>


<button ng-click="Getorderyet()" ng-if="food_table_status=='2'" class="btn btn-primary" style="float: right">ได้รับอาหารครบแล้ว</button>



<button class="btn btn-success" ng-if="food_table_status=='3'" ng-click="Lastorder()" style="float: right">รับเงิน</button>



</center>

<br /><br />
<span ng-if="food_table_status!='0'">รายการอาหารที่สั่ง</span>
<table ng-if="food_table_status!='0'"  class="table table-hover table-bordered" id="section-to-print">
	<thead>
		<tr style="background-color: #eee;">
			<th >ชื่ออาหาร</th>
			<th style="text-align: center;width: 50px;">ราคา</th>
			<th style="text-align: center;width: 50px;">จำนวน</th>
			<th style="text-align: center;width: 50px;">ราคารวม</th>
			<th style="text-align: center;width: 30px;">ลบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in foodtablelist">
			<td>{{x.food_name}}</td> 
			 <td align="right">{{x.food_price}}</td>
			<td align="center">{{x.food_num | number}}</td>
			 <td align="right">{{x.food_num * x.food_price | number:2}}</td> 
			 <td>
				<button class="btn btn-danger btn-xs" ng-click="Deletefoodtablelist(x)">x</button>
			</td>
		</tr>
		<tr style="font-weight: bold;">
		<td colspan="2" align="right">รวม</td>
		<td align="center">{{Sumfoodtablenumall() | number}}</td>
			<td align="right">{{Sumfoodtablepriceall() | number:2}}</td>
			
			<td>
				
			</td>
		</tr>
	</tbody>
</table>







				

				
			</div>
			<div class="modal-footer">
			<button class="btn btn-default" style="float: left;" ng-click="Blanktable()">โต๊ะว่าง</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
			</div>
		</div>
	</div>
</div>














<div class="modal fade" id="Modalfood">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เลือกรายการอาหาร</h4>
			</div>
			<div class="modal-body">


<select ng-model="Searchtext"  class="form-control">
<option value="">รายการอาหารทั้งหมด</option>
<option  ng-repeat="x in catfoodlist" value="{{x.food_category_name}}" >
	{{x.food_category_name}}
</option>	
</select>
<br />
<input type="text" ng-model="Searchtext" class="form-control" placeholder="ค้นหา">
<br />

<div style="height: 310px;overflow: scroll;">
<div class="col-md-4 col-sm-4 col-xs-6 btn btn-default" ng-repeat="x in foodlist | filter:Searchtext" ng-click="Selectfood(x)">
	<center>
	<img ng-src="<?php echo $base_url;?>/{{x.food_image}}" style="width: 70px;height: 70px;">
	<br />
		<b>{{x.food_name}}</b>
		<br />
		<span style="color: red;">{{x.food_price}}</span>
		<br />
		{{x.food_category_name}}
	</center>


</div>
</div>


</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Modalfoodnum">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">จำนวน</h4>
			</div>
			<div class="modal-body">
				<center>
				<h3 style="font-weight: bold;">{{food_name}} </h3>
					<input type="number" ng-model="food_num" class="form-control" style="text-align: right;">
					<br />
					<button ng-click="Selectfoodnum()" type="button" class="btn btn-primary">ยืนยัน</button>
				</center>

				


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
			</div>
		</div>
	</div>
</div>





	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.food_num = 1;
$scope.howmanypeople = '1';

$scope.get_table = function(){
   
$http.get('Food_order/get_table')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get_table();


$scope.get_food = function(){
   
$http.get('Food_order/get_food')
       .then(function(response){
          $scope.foodlist = response.data; 
                 
        });
   };
$scope.get_food();


$scope.get_catfood = function(){
   
$http.get('Food_order/get_catfood')
       .then(function(response){
          $scope.catfoodlist = response.data; 
                 
        });
   };
$scope.get_catfood();


$scope.Selectcatfood = function(categoryid){
$http.post("Food_order/get_food_from_cat",{
food_category_id: categoryid
	}).success(function(response){
$scope.foodlist = response; 
        });	
};



$scope.Modalfood = function(){
$('#Modalfood').modal('show');
};


$scope.Selectfood = function(x){
$('#Modalfoodnum').modal('show');
$scope.food_id = x.food_id;
$scope.food_name = x.food_name;
$scope.food_price = x.food_price;
};





$scope.Get_order = function(){
$http.post("Food_order/get_order",{
food_table_id: $scope.food_table_id
	}).success(function(response){
$scope.foodtablelist = response; 
        });	
};



$scope.Selectfoodnum = function(){

$http.post("Food_order/savefoodtablelist",{
food_id: $scope.food_id,
food_name: $scope.food_name,
food_price: $scope.food_price,
food_num: $scope.food_num,
food_table_id: $scope.food_table_id
	}).success(function(response){
$('#Modalfoodnum').modal('hide');

$scope.Get_order(); 
toastr.success('ลูกค้าสั่ง '+ $scope.food_name + ' จำนวน ' +$scope.food_num);
$scope.food_num = 1;
        });	

};


$scope.Deletefoodtablelist = function(x){
$http.post("Food_order/deletefoodtablelist",{
food_order_id: x.food_order_id,
food_table_id: $scope.food_table_id
	}).success(function(response){
$scope.Get_order(); 
        });	
};




$scope.Openorder = function(x){
$scope.foodtablelist = [];
$scope.food_table_id = x.food_table_id;
$scope.food_table_name = x.food_table_name;
$scope.food_table_status = x.food_table_status;

$('#Openorder').modal('show');

$scope.Get_order();
	

};


$scope.Blanktable = function(){
	
$http.post("Food_order/Blanktable",{
food_table_id: $scope.food_table_id
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_table();
$('#Openorder').modal('hide');
        });	

};



$scope.Waitorder = function(){
	
$http.post("Food_order/Waitorder",{
food_table_id: $scope.food_table_id
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_table();
$('#Openorder').modal('hide');
        });	

};



$scope.Successorder = function(){
	
$http.post("Food_order/Successorder",{
food_table_id: $scope.food_table_id
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_table();
$('#Openorder').modal('hide');
        });	

};


$scope.Getorderyet = function(){
	
$http.post("Food_order/Getorderyet",{
food_table_id: $scope.food_table_id
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_table();
$('#Openorder').modal('hide');
        });	

};



$scope.Lastorder = function(){
window.print();	
$http.post("Food_order/Lastorder",{
food_table_id: $scope.food_table_id
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_table();
$('#Openorder').modal('hide');
        });	

};



$scope.Sumfoodtablenumall = function(){
var total = 0;

 angular.forEach($scope.foodtablelist,function(item){
total += parseInt(item.food_num);
 });
    return total;
};


$scope.Sumfoodtablepriceall = function(){
var total = 0;

 angular.forEach($scope.foodtablelist,function(item){
total += parseInt(item.food_price) * parseInt(item.food_num);
 });
    return total;
};








});
	</script>
