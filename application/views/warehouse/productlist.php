
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">



<div style="float: right;">
	<button class="btn btn-info" ng-click="Modalexcel()"> นำเข้ารายชื่อสินค้าจาก Excel</button>
</div>


<form class="form-inline">
<div class="form-group">
<button class="btn btn-primary" ng-click="Modaladd()">+ เพิ่มสินค้า</button>
</div>
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="ค้นหาจากชื่อสินค้า หรือ Scan Barcode" style="width: 300px;">
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
			<th style="text-align: center;width: 100px;">รหัสสินค้า</th>
			<th style="text-align: center;width: 50px;">Barcode</th>
			<th style="text-align: center;width: 150px;">รูปสินค้า</th>
			<th style="text-align: center;width: 100px;">ชื่อสินค้า</th>
			<th style="text-align: center;width: 100px;">หมวดหมู่</th>
			<th style="text-align: center;width: 100px;">Supplier</th>
			<th style="text-align: center;width: 100px;">ราคาต้นทุนต่อหน่วย/บาท</th>
			<th style="text-align: center;width: 100px;">ราคาขายสินค้าต่อหน่วย/บาท</th>
			<th style="text-align: center;width: 100px;">คะแนน</th>
			<th style="text-align: center;width: 100px;">ที่จัดเก็บ</th>
			<th style="width: 80px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	


	<!-- <tr>
	<td></td>
	<td><form id="uploadImg"  enctype="multipart/form-data" method="POST">

	<input type="text" class="form-control" placeholder="รหัสสินค้า" ng-model="product_code" name="product_code"></td>
	<td></td>
	<td><input type="file" class="form-control" accept="image/*" ng-model="product_image" name="product_image"></td>
			<td><input type="text" class="form-control" placeholder="ชื่อสินค้า" ng-model="product_name" name="product_name"></td>

			<td>
				<select class="form-control" ng-model="product_category_id" name="product_category_id">
				<option value="0">เลือก</option>
					<option ng-repeat="x in categorylist" value="{{x.product_category_id}}">
						{{x.product_category_name}}
					</option>
				</select>
			</td>

			<td>
				<select class="form-control" ng-model="supplier_id" name="supplier_id">
				<option value="0">เลือก</option>
					<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
				</select>
			</td>


			<td><input type="text" class="form-control" placeholder="ราคาต้นทุน" ng-model="product_pricebase" name="product_pricebase" style="text-align: right;"></td>
			<td><input type="text" class="form-control" placeholder="ราคาขาย" ng-model="product_price" name="product_price" style="text-align: right;"></td>

			<td><input type="text" class="form-control" placeholder="คะแนน" ng-model="product_score" name="product_score" style="text-align: right;"></td>

			<td><input type="text" class="form-control" placeholder="ที่จัดเก็บ" ng-model="product_location" name="product_location" style="text-align: right;"></td>
			
			<td>
			<button class="btn btn-success" type="submit">บันทึก</button> </form>
			</td>
	</tr> -->

		<tr ng-repeat="x in list">
		<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
		

			
<td  align="center">
{{x.product_code}}
</td>
<td align="center">
<a href="<?php echo $base_url; ?>/warehouse/barcode?product_code={{x.product_code}}&product_name={{x.product_name}}&product_price={{x.product_price | number:2}}" class="btn btn-xs btn-default" target="_blank"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> Barcode</a></td>

<td align="center">
<img ng-if="x.product_image!=''" ng-src="<?php echo $base_url;?>/{{x.product_image}}" width="70px" height="70px;">

			</td>

			<td>{{x.product_name}}

			</td>
			
			<td>{{x.product_category_name}}</td>


<td>
{{x.supplier_name}}
</td>

			<td align="right">{{x.product_pricebase | number:2}}</td>
			<td align="right">{{x.product_price | number:2}}</td>
			
			<td align="right">{{x.product_score | number}}</td>

			<td align="right">{{x.product_location}}</td>

			<td>

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)">แก้ไข</button>
				<button ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deleteproduct(x.product_id)">ลบ</button>
			</td>

		

		</tr>
	</tbody>
</table>







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




<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> ดาวน์โหลดตาราง Excel </button>





<div class="modal fade" id="Openadd">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่มสินค้า</h4>
			</div>
			<div class="modal-body">
				<form id="uploadImg"  enctype="multipart/form-data" method="POST">

รหัสสินค้า
<input type="text" name="product_code"  placeholder="รหัสสินค้า" class="form-control">
<p></p>
รูปสินค้า
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
ชื่อสินค้า
<input type="text" name="product_name"  placeholder="ชื่อสินค้า" class="form-control">
<p></p>
หมวดหมู่
<select class="form-control" name="product_category_id" >
<option value="0">เลือกหมวดหมู่</option>
					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>
<p></p>

Supplier
<select class="form-control" name="supplier_id" >
				<option value="0">เลือก</option>
					<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
				</select>



				<p></p>
ราคาต้นทุน
	<input type="text" name="product_pricebase"  placeholder="ราคาต้นทุน" class="form-control text-right">
	<p></p>
	ราคาขาย
	<input type="text" name="product_price"  placeholder="ราคาขาย" class="form-control text-right">

<p></p>
	คะแนน
	<input type="text" name="product_score"  placeholder="คะแนน" class="form-control text-right">

	<p></p>
	ที่จัดเก็บ
	<input type="text" name="product_location"  placeholder="ที่จัดเก็บ" class="form-control text-right">

	<p></p>



<button class="btn btn-success" type="submit">บันทึก</button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openedit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แก้ไข</h4>
			</div>
			<div class="modal-body">
				<form id="Updatedata"  enctype="multipart/form-data" method="POST">

<input type="hidden" name="product_id" id="product_id">
รหัสสินค้า
<input type="text" name="product_code" id="product_code" placeholder="รหัสสินค้า" class="form-control">
<p></p>
<input type="hidden" name="product_image2" id="product_image2">
<center>
<img ng-if="product_image!=''" ng-src="<?php echo $base_url;?>/{{product_image}}" width="70px" height="70px;">
</center>
รูปสินค้า
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
ชื่อสินค้า
<input type="text" name="product_name" id="product_name" placeholder="ชื่อสินค้า" class="form-control">
<p></p>
หมวดหมู่
<select class="form-control" name="product_category_id" id="product_category_id">

					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>
<p></p>

Supplier
<select class="form-control" name="supplier_id" id="supplier_id">
				<option value="0">เลือก</option>
					<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
				</select>



				<p></p>
ราคาต้นทุน
	<input type="text" name="product_pricebase" id="product_pricebase" placeholder="ราคาต้นทุน" class="form-control text-right">
	<p></p>
	ราคาขาย
	<input type="text" name="product_price" id="product_price" placeholder="ราคาขาย" class="form-control text-right">

<p></p>
	คะแนน
	<input type="text" name="product_score" id="product_score" placeholder="คะแนน" class="form-control text-right">

	<p></p>
	ที่จัดเก็บ
	<input type="text" name="product_location" id="product_location" placeholder="ที่จัดเก็บ" class="form-control text-right">

	<p></p>



<button class="btn btn-success" type="submit">บันทึก</button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>




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
$scope.supplier_id = '0';
$scope.productlist = [];

$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};

$scope.Modaladd = function(){
$('#Openadd').modal('show');
};



$scope.getcategory = function(){
   
$http.get('Productcategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.getcategory();


$scope.getsupplier = function(){
   
$http.get('Supplier/getlist')
       .then(function(response){
          $scope.supplierlist = response.data.list; 
                 
        });
   };
$scope.getsupplier();



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

 $http.post("Productlist/get",{
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





$scope.Saveproduct = function(product_code,product_name,product_price,product_pricebase,product_category_id,supplier_id,product_score){
$http.post("Productlist/Add",{
	product_code: product_code,
	product_name: product_name,
	product_price: product_price,
	product_pricebase: product_pricebase,
	product_category_id: product_category_id,
	product_score: product_score,
	supplier_id: supplier_id
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.product_code = '';
$scope.product_name = '';
$scope.product_pricebase = '';
$scope.product_price = '';
$scope.product_score = '';
$scope.getlist();
        });	
};



$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productlist/Add',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 
$( "#uploadImg" )[0].reset();
$('#Openadd').modal('hide');
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
$("#product_id").val(x.product_id);
$("#product_code").val(x.product_code);
$("#product_name").val(x.product_name);
$("#product_image2").val(x.product_image);
$("#product_price").val(x.product_price);
$("#product_pricebase").val(x.product_pricebase);
$("#product_category_id").val(x.product_category_id);
$("#product_score").val(x.product_score);
$("#product_location").val(x.product_location);
$("#supplier_id").val(x.supplier_id);

$scope.product_image = x.product_image;

};

$scope.Cancelproduct = function(product_id){
$scope.product_id = '';
$scope.getlist();
};

/*$scope.Editsaveproduct = function(product_id,product_code,product_name,product_price,product_pricebase,product_category_id,supplier_id){
$http.post("Productlist/Update",{
	product_id: product_id,
	product_code: product_code,
	product_name: product_name,
	product_pricebase: product_pricebase,
	product_price: product_price,
	product_category_id: product_category_id,
	supplier_id: supplier_id
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.product_id = '';
$scope.getlist();

        });	
};*/



$(document).ready(function (e) {
    $('#Updatedata').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productlist/Update',
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





$scope.Deleteproduct = function(product_id){
$http.post("Productlist/Delete",{
	product_id: product_id
	}).success(function(data){
toastr.success('ลบเรียบร้อย');
$scope.getlist();
        });	
};

   


   
	
    $("form#formexcel").submit(function () {
var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "Productlist/uploadexcel",
            data:formData,
            processData: false,
   		 	contentType: false,
            success: function () {
               toastr.success('เรียบร้อย');
               $('#Modalexcel').modal('hide');
               $scope.getlist('','1');
            }
        });
    });






});
	</script>
