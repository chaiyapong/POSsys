
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">




<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="ค้นหาจากชื่อ หรือ รหัสสมาชิก" style="width: 300px;">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="ค้นหา"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>


<br />


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> แสดงปุ่มลบ
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;">ลำดับ</th>
			<th style="text-align: center;width: 100px;">รหัสสมาชิก</th>
			<th style="text-align: center;width: 50px;">ชื่อ</th>
			<th style="text-align: center;width: 50px;">เลขบัตร/เลขเสียภาษี</th>
			<th style="text-align: center;width: 150px;">รูป</th>
			<th style="text-align: center;width: 100px;">ที่อยู่</th>
			<th style="text-align: center;width: 100px;">โทร</th>
			<th style="text-align: center;width: 100px;">วันเกิด</th>
			
			<th style="width: 120px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
	<td><form id="uploadImg"  enctype="multipart/form-data" method="POST">

	<input type="text" class="form-control" placeholder="" ng-model="product_code" name="supplier_code"></td>
	<td><input type="text" class="form-control" placeholder="" ng-model="supplier_name" name="supplier_name"></td>

	<td><input type="text" class="form-control" placeholder="" ng-model="supplier_card_tax" name="supplier_card_tax"></td>

	<td><input type="file" class="form-control" accept="image/*" ng-model="supplier_image" name="supplier_image"></td>
			

			
			<td><textarea class="form-control" placeholder="" ng-model="supplier_address" name="supplier_address" style="text-align: right;"></textarea></td>

			<td><input type="text" class="form-control" placeholder="" ng-model="supplier_tel" name="supplier_tel" style="text-align: right;"></td>

			<td><input type="text"  class="form-control" placeholder="" ng-model="supplier_bd" name="supplier_bd" style="text-align: right;"></td>

			
			
			<td>
			<button class="btn btn-success" type="submit">บันทึก</button> </form>
			</td>
	</tr>

		<tr ng-repeat="x in list">
		<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
		

			
<td  align="center">
{{x.supplier_code}}
</td>

<td>{{x.supplier_name}}

			</td>

			<td>{{x.supplier_card_tax}}

			</td>


<td align="center">
<img ng-if="x.supplier_image!=''" ng-src="<?php echo $base_url;?>/{{x.supplier_image}}" width="70px" height="70px;">

			</td>

			
			
			
			<td align="right">{{x.supplier_address}}</td>
			<td align="right">{{x.supplier_tel}}</td>
			
<td align="right">{{x.supplier_bd}}</td>

			<td>

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)">แก้ไข</button>
				<button ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deleteproduct(x.supplier_id)">ลบ</button>
			</td>

		

		</tr>
	</tbody>
</table>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> ดาวน์โหลดตาราง Excel </button>

<div class="modal fade" id="Openedit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แก้ไข</h4>
			</div>
			<div class="modal-body">
				<form id="Updatedata"  enctype="multipart/form-data" method="POST">

<input type="hidden" name="supplier_id" id="supplier_id">
รหัสสมาชิก
<input type="text" name="supplier_code" id="supplier_code" placeholder="รหัสสมาชิก" class="form-control">
<br />
<input type="hidden" name="supplier_image2" id="supplier_image2">
<center>
<img ng-if="supplier_image!=''" ng-src="<?php echo $base_url;?>/{{supplier_image}}" width="70px" height="70px;">
</center>
รูป
<input type="file" name="supplier_image" accept="image/*" class="form-control" value="">
<br />
ชื่อ
<input type="text" name="supplier_name" id="supplier_name" placeholder="ชื่อ" class="form-control">

<br />
เลขบัตร/เลขภาษี
<input type="text" name="supplier_card_tax" id="supplier_card_tax" placeholder="เลขบัตร/เลขภาษี" class="form-control">

<br />
ที่อยู่
<textarea name="supplier_address" id="supplier_address" placeholder="ที่อยู่" class="form-control"></textarea>
<br />
โทร
<input type="text" name="supplier_tel" id="supplier_tel" placeholder="โทร" class="form-control">
<br />
วันเกิด
<input type="text" name="supplier_bd" id="supplier_bd" placeholder="วันเกิด" class="form-control">


	<br />
<button class="btn btn-success" type="submit">บันทึก</button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>




<form class="form-inline">
<div class="form-group">
แสดง
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
</select>

หน้า
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>









<div class="modal fade" id="Modalexcel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการสินค้าจาก Excel .CSV</h4>
			</div>
			<div class="modal-body text-center">

<form enctype="multipart/form-data" id="formexcel">
<input type="file" accept=".csv" id="excel" name="excel" class="btn btn-default">   
<br />
<button class="btn btn-success" id="submitexcel" type="submit">อัฟโหลด</button>
</form>

<hr />
<font color="red">ตัวอย่างไฟล์ .CSV  UTF-8</font>
<br />
<img src="<?php echo $base_url;?>/pic/imcsv.png">
			</div>
			
		</div>
	</div>
</div>







	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.product_category_id = '0';
$scope.productlist = [];

$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};





$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
    if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

 $http.post("Supplier/get",{
searchtext:searchtext,
page: page,
perpage: perpage
}).success(function(data){
          $scope.list = data.list; 
                 $scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;
        });
   };
$scope.getlist('','1');







$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Supplier/Add',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 
$( "#uploadImg" )[0].reset();

$scope.getlist();


            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

 
});



$scope.Editinputproduct = function(x){
	$('#Openedit').modal('show');
$("#supplier_id").val(x.supplier_id);
$("#supplier_code").val(x.supplier_code);
$("#supplier_name").val(x.supplier_name);
$("#supplier_image").val(x.supplier_image);
$("#supplier_image2").val(x.supplier_image);
$("#supplier_card_tax").val(x.supplier_card_tax);
$("#supplier_address").val(x.supplier_address);
$("#supplier_tel").val(x.supplier_tel);
$("#supplier_bd").val(x.supplier_bd);

$scope.supplier_image = x.supplier_image;

};

$scope.Cancelproduct = function(supplier_id){
$scope.supplier_id = '';
$scope.getlist();
};



$(document).ready(function (e) {
    $('#Updatedata').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Supplier/Update',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 
$( "#Updatedata" )[0].reset();
$scope.getlist('',$scope.selectthispage,$scope.perpage);
$('#Openedit').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

});





$scope.Deleteproduct = function(supplier_id){
$http.post("Supplier/Delete",{
	supplier_id: supplier_id
	}).success(function(data){
toastr.success('ลบเรียบร้อย');
$scope.getlist();
        });	
};

   


   
	






});
	</script>
