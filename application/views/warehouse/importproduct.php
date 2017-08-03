
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="importproduct_header_refcode" placeholder="รหัสอ้างอิง" class="form-control" style="width: 200px;">
</div>
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="importproduct_header_remark" placeholder="หมายเหตุ">
</div>
</form>

<br />
<table width="100%">
	<tbody>
		<tr>
			<td>
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" id="product_code" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="รหัสสินค้า หรือ Scan Barcode">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg">Enter</button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					ไม่พบสินค้า
				</div>
	<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
				</form>

			</td>
			<td align="right">
				
<button type="submit" ng-click="Openfull()" class="btn btn-default btn-lg">
<span class="glyphicon glyphicon-resize-full" aria-hidden="true"> จอใหญ่
</button>
				
			</td>
			
		</tr>
	</tbody>
</table>


<hr />


<table class="table table-hover table-bordered">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;">ลำดับ</th>
		<th style="text-align: center;">สินค้า</th>
		<th style="text-align: center;">รหัสสินค้า</th>
		<th style="text-align: center;">ที่จัดเก็บ</th>
		<th style="text-align: center;">ราคาทุนต่อหน่วย/บาท</th>
		<th style="text-align: center;">จำนวนหน่วย</th>
		<th style="text-align: center;">รวมราคา/บาท</th>
		<th style="text-align: center;">ลบ</th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in productimportlist">
		<td align="center">{{$index+1}}</td>
			<td>
{{x.product_name_title}}
			
			<input type="hidden" ng-model="x.product_id">
			</td>

			<td align="center">
			{{x.product_code}}
			</td>


<td align="center">
			{{x.product_location}}
			</td>


			<td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_pricebase" class="form-control" placeholder="ราคาทุนต่อหน่วย/บาท">
			</td>
			<td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_num" class="form-control" placeholder="จำนวน">
			</td>
			<td>
				<input style="text-align: right;" type="text" value="{{x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}" class="form-control" readonly>
			</td>
			<td><button  class="btn btn-sm btn-danger" ng-click="Deletepush($index)">ลบ</button></td>
		</tr>

		<tr>
			<td colspan="4" align="right">รวม</td><td align="right" style="font-weight: bold;">{{Sumnum() | number}}</td>
			<td align="right" style="font-weight: bold;">{{Sumpricebasenum() | number:2}}</td>
			<td></td>
		</tr>
	</tbody>
</table>





<button id="Saveimportproduct" class="btn btn-success btn-lg" style="float: right;" ng-click="Saveimportproduct()">บันทึก</button>




</div>
</div>


<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> แสดงปุ่มลบ
</div>

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="รหัสอ้างอิง หรือ หมายเหตุ">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="ค้นหา"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<br />
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="text-align: center;width: 20px;">ลำดับ</th>
			<th style="text-align: center;">Run No.</th>
			<th style="text-align: center;">รหัสอ้างอิง</th>

			<th style="text-align: center;">จำนวนสินค้า</th>
			<th style="text-align: center;">รวมราคา/บาท</th>
			<th style="text-align: center;">หมายเหตุ</th>
			<th style="text-align: center;">วันที่</th>
			<th style="text-align: center;width: 20px;" ng-show="showdeletcbut" >ลบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td align="center"><button class="btn btn-default btn-sm" ng-click="Getimportone(x)">{{x.importproduct_header_code}}</button></td>
			<td align="center">{{x.importproduct_header_refcode}}</td>
			
			<td align="right">{{x.importproduct_header_num | number}}</td>
			<td align="right">{{x.importproduct_header_amount | number:2}}</td>
			<td align="center">{{x.importproduct_header_remark}}</td>
			<td align="center">{{x.importproduct_header_date2}}</td>
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deleteimportlist(x)" id="delbut{{x.importproduct_header_id}}">ลบ</button></td>
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





<div class="modal fade" id="Openfull" style="padding-right:0px;">
	<div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
		<div class="modal-content">
			<div class="modal-body">
				





<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="importproduct_header_refcode" placeholder="รหัสอ้างอิง" class="form-control" style="width: 200px;">
</div>
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="importproduct_header_remark" placeholder="หมายเหตุ">
</div>
</form>

<br />

<table width="100%">
	<tbody>
		<tr>
			
			<td>
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="รหัสสินค้า หรือ Scan Barcode">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg">Enter</button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					ไม่พบสินค้า
				</div>
				<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
				</form>

			</td>
			<td align="right">
				
<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">x</button>
				
			</td>
			
		</tr>
	</tbody>
</table>


<hr />

<div style="height: 400px;overflow: auto;" id="Openfulltable">
<table class="table table-hover table-bordered">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;">ลำดับ</th>
		<th style="text-align: center;">สินค้า</th>
		<th style="text-align: center;">รหัสสินค้า</th>
		<th style="text-align: center;">ราคาทุนต่อหน่วย/บาท</th>
		<th style="text-align: center;">จำนวนหน่วย</th>
		<th style="text-align: center;">รวมราคา/บาท</th>
		<th style="text-align: center;">ลบ</th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in productimportlist">
		<td align="center">{{$index+1}}</td>
			<td>
{{x.product_name_title}}
			
			<input type="hidden" ng-model="x.product_id">
			</td>

			<td align="center">
			{{x.product_code}}
			</td>

			<td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_pricebase" class="form-control" placeholder="ราคาทุนต่อหน่วย/บาท">
			</td>
			<td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_num" class="form-control" placeholder="จำนวน">
			</td>
			<td>
				<input style="text-align: right;" type="text" value="{{x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}" class="form-control" readonly>
			</td>
			<td><button  class="btn btn-sm btn-danger" ng-click="Deletepush($index)">ลบ</button></td>
		</tr>

		
	</tbody>
</table>


</div>

<table width="100%">
	<tr>
			<td align="center" style="font-size: 16px;">รวม จำนวน <span style="font-weight: bold;">{{Sumnum() | number}}</span>
			 ราคา <span style="font-weight: bold;">{{Sumpricebasenum() | number:2}}</span></td>
			
		</tr>
</table>


<table width="100%">
<tr><td align="right">
<button id="Saveimportproduct2" class="btn btn-success btn-lg" style="float: right;" ng-click="Saveimportproduct()">บันทึก</button>
</td></tr>
</table>




			</div>
			
		</div>
	</div>
</div>





<div class="modal fade" id="Getimportone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
				รายการสินค้านำเข้า </h4>
<table class="table table-responsive">
	<tr>
	<td align="right">Run No:</td><td>{{importproduct_header_code}}</td>
	<td align="right">วันที่:</td><td>{{importproduct_header_date2}}</td>
	</tr>
	<tr>
	<td align="right">รหัสอ้างอิง:</td><td>{{importproduct_header_refcode2}}</td>
	<td align="right">หมายเหตุ:</td><td>{{importproduct_header_remark2}}</td></tr>
</table>

			</div>
			<div class="modal-body">
				
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;">ลำดับ</th>
			<th style="text-align: center;">รหัสสินค้า</th>
			<th style="text-align: center;">สินค้า</th>
			<th style="text-align: center;">ราคาทุนต่อหน่วย/บาท</th>
			<th style="text-align: center;">จำนวนหน่วย</th>
			<th style="text-align: center;">รวมราคา/บาท</th>
		
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td align="right">{{ x.importproduct_detail_pricebase | number:2 }}</td>
			<td align="right">{{ x.importproduct_detail_num | number }}</td>
			<td align="right">{{ x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}</td>
			
		</tr>
		<tr>
			<td colspan="4" align="right">รวม</td>
			<td align="right" style="font-weight: bold;">{{ importone_sumnum | number }}</td>
			<td align="right" style="font-weight: bold;">{{ importone_sumprice | number:2 }}</td>
			
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการสินค้า</h4>
			</div>
			<div class="modal-body">
	<input type="text" ng-model="searchproduct" placeholder="ค้นหารหัสหรือชื่อสินค้า" style="width:300px;" class="form-control">
<br />	
<div style="overflow: auto;height: 400px;">		
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th>เลือก</th><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>ราคา</th><th>ต้นทุนต่อหน่วย/บาท</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in productlist | filter:searchproduct" >
			<td><button ng-click="Selectproduct(y,indexrow)" class="btn btn-success">เลือก</button></td>
			<td align="center">{{y.product_code}}</td><td>{{y.product_name}}</td>
			<td align="right">{{y.product_price | number:2}}</td>
			<td align="right">{{y.product_pricebase | number:2}}</td>
		</tr>
	</tbody>
</table>
</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

$scope.productimportlist = [];
$scope.importproduct_header_refcode = '';
$scope.importproduct_header_remark = '';
$scope.product_code = '';

$scope.getproductlist = function(){
   
$http.get('Productlist/get')
       .then(function(response){
          $scope.productlist = response.data.list; 
                 
        });
   };
$scope.getproductlist();

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

   $http.post("Importproduct/get",{
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





$scope.Openmodalimport = function(){
	$scope.productimportlist = [];
	$('#Saveimportproduct').prop('disabled',false);
$('#Openmodalimport').modal({backdrop: "static", keyboard: false});
};


$scope.Addpushproduct = function(){
$scope.productimportlist.push({
	product_id: '',
	product_code: '',
	product_name_title: 'เลือกสินค้า',
	importproduct_detail_pricebase: '0',
	importproduct_detail_num: '0'
});
};

$scope.Refresh = function(){
$scope.productimportlist = [];
$('#product_code').prop('disabled',false);
};

$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Addpushproductcode = function(product_code){
$http.post("Importproduct/Findproduct",{
	product_code: product_code
	}).success(function(data){
		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{
$scope.productimportlist.push({
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	product_location: data[0].product_location,
	product_name_title: data[0].product_name,
	importproduct_detail_pricebase: data[0].product_pricebase,
	importproduct_detail_num: '0'
});
$scope.cannotfindproduct = false;
}

		$scope.product_code = '';
$('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight,1000000);
        });	
};



$scope.Modalproduct = function(index){
$('#Modalproduct').modal({show:true});
$scope.indexrow = index;
};


$scope.Selectproduct = function(y,index){
$scope.productimportlist[index].product_id = y.product_id;
$scope.productimportlist[index].product_code = y.product_code;
$scope.productimportlist[index].importproduct_detail_pricebase = y.product_pricebase;
$scope.productimportlist[index].product_name_title = y.product_name;
$('#Modalproduct').modal('hide');

};


$scope.Deletepush = function(index){
  $scope.productimportlist.splice(index, 1);
};

$scope.Sumnum = function(){
var total = 0;
 
 angular.forEach($scope.productimportlist,function(item){
total += parseInt(item.importproduct_detail_num);
 });
    return total;
};

$scope.Sumpricebasenum = function(){
var total = 0;
 
 angular.forEach($scope.productimportlist,function(item){
total += ( item.importproduct_detail_pricebase * item.importproduct_detail_num );
 });
    return total;
};



$scope.Saveimportproduct = function(){
	if($scope.productimportlist!=''){

		if($scope.productimportlist[0].product_id!='' && $scope.productimportlist[0].importproduct_detail_num!='0'){

$('#Saveimportproduct').prop('disabled',true);
$('#Saveimportproduct2').prop('disabled',true);
$('#product_code').prop('disabled',true);
$http.post("Importproduct/add",{
	productimportlist: $scope.productimportlist,
	importproduct_header_refcode: $scope.importproduct_header_refcode,
	importproduct_header_remark: $scope.importproduct_header_remark,
	importproduct_header_num: $scope.Sumnum(),
	importproduct_header_amount: $scope.Sumpricebasenum()
}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$('#Saveimportproduct').prop('disabled',false);
$('#Saveimportproduct2').prop('disabled',false);
$('#product_code').prop('disabled',false);
$scope.productimportlist = [];
$scope.getlist();
$('#Openfull').modal('hide');
        });	

}else{
	toastr.warning('กรุณากรอกข้อมูลให้ครบ');
}

	}else{
		toastr.warning('กรุณาเพิ่มรายการสินค้า');
	}
	
};



$scope.Getimportone = function(x){
$('#Getimportone').modal('show');
$http.post("Importproduct/Getimportone",{
	importproduct_header_code: x.importproduct_header_code
}).success(function(response){
$scope.importone = response;
$scope.importproduct_header_code = x.importproduct_header_code;
$scope.importproduct_header_refcode2 = x.importproduct_header_refcode;
$scope.importproduct_header_remark2 = x.importproduct_header_remark;
$scope.importproduct_header_date2 = x.importproduct_header_date2;
$scope.importone_sumnum = x.importproduct_header_num;
$scope.importone_sumprice = x.importproduct_header_amount;
        });	

};


$scope.Deleteimportlist = function(x){
$('#delbut'+ x.importproduct_header_id).prop('disabled',true);	
$http.post("Importproduct/Deleteimportlist",{
	importproduct_header_code: x.importproduct_header_code
}).success(function(response){
$scope.getlist();
//$('#delbut'+ x.importproduct_header_id).prop('disabled',false);
        });	

};




});
	</script>
