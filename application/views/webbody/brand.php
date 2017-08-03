
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="row">
<div class="col-md-12">

<center>
<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="ค้นหา..." style="min-width: 300px;height: 50px;font-size: 20px;">
</div>
<div class="form-group">
<button ng-click="Searchmodal(searchtext)" class="btn btn-success" style="height: 50px;font-size: 20px;">ค้นหา</button>
</div>
</form>
</center>
<br />

<?php 
if(!isset($_GET['productid'])){
foreach ($getdata as $row) {
echo '
<div class="col-md-3">
<div class="col-md-12 panel panel-body panel-default text-center">

<center>
<a title="'.$row['product_name'].'" href="'.$base_url.'/brand?id='.$_GET['id'].'&catid='.$row['product_category_id'].'&productid='.$row['product_id'].'" style="color:#000;">	<img src="'.$row['product_image'].'"  style="width:100%;height:250px;"> </a>
<br />
<a href="'.$base_url.'/brand?id='.$_GET['id'].'&catid='.$row['product_category_id'].'&productid='.$row['product_id'].'" style="color:#000;font-weight:bold;">	'.$row['product_name'].' </a>
	<br />
ราคา: 
<span style="font-weight:bold;" ng-if="'.$row['product_price_discount'].' !=0.00">
<strike>'.number_format($row['product_price'],2).'</strike>
</span>

<span style="color:red;font-weight:bold;">'.number_format($row['product_price']-$row['product_price_discount'],2).'</span>

	<br />
คะแนน: '.number_format($row['product_score'],2).'
</center>

</div>
	</div>
';
}
}



if(isset($_GET['productid'])){
foreach ($getdata as $row) {
echo '

<div class="col-md-7 panel panel-body panel-default text-center">


	<img src="'.$row['product_image'].'"  style="width:100%;height:500px;"> 

	</div>


	<div class="col-md-5 panel panel-body panel-default text-center" style="height:530px;">


<h1>

<span style="font-weight:bold;">'.$row['product_name'].'</span> 
	
<hr />
ราคา: <span style="font-weight:bold;" ng-if="'.$row['product_price_discount'].' !=0.00">
<strike>'.number_format($row['product_price'],2).'</strike>
</span>

<span style="color:red;font-weight:bold;">'.number_format($row['product_price']-$row['product_price_discount'],2).'</span>

<hr />
คะแนน: '.number_format($row['product_score'],2).'
<hr />
</h1>

	</div>


';
}
}

?>





</div>
</div>




<div class="modal fade" id="search-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการค้นหา</h4>
			</div>
			<div class="modal-body" style="height: 400px;">
				
				<center>
<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="ค้นหา..." style="min-width: 300px;height: 50px;font-size: 20px;">
</div>
<div class="form-group">
<button ng-click="Searchmodal(searchtext)" class="btn btn-success" style="height: 50px;font-size: 20px;">ค้นหา</button>
</div>
</form>

</center>
<br />
ผลการค้นหา
<br />

<div class="col-md-4" ng-repeat="x in searchlist">
<center>
<a href="<?php echo $base_url.'/brand?id='.$_GET['id'].'&catid={{x.product_category_id}}&productid={{x.product_id}}'; ?> " style="color:#000;">
<img src="<?php echo $base_url;?>/{{x.product_image}}" style="width: 100%;height: 200px;">
</a>
<br />
<span style="font-weight: bold;">{{x.product_name}}</span>
<br />
ราคา: <span ng-if="x.product_price_discount != 0.00" style="color: #000;font-weight: bold;"><strike>{{x.product_price | number:2}}</strike></span>

<span style="color:red;font-weight:bold;">
{{x.product_price - x.product_price_discount | number:2}}</span>


<br />	
คะแนน: {{x.product_score}}
</center>
</div>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
				
			</div>
		</div>
	</div>
</div>






</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.Searchmodal = function(searchtext){ 
$('#search-modal').modal('show');

$http.post("Brand/Searchbox",{
id: <?php echo $_GET['id'];?>,
searchtext: searchtext
}).success(function(data){
          $scope.searchlist = data; 
                 
});



   };


});
	</script>