<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

ลิ้งค์โปรโมท
<br />
<div class="col-md-6">
<input type="text" ng-show="tag == ''" name="" class="form-control" style="font-size: 15px;font-weight: bold;" value="<?php echo $base_url;?>/aff?i=<?php echo $_SESSION['aff_id'];?>" style="background-color: #fff;" readonly>

<input type="text" ng-show="tag != ''" name="" class="form-control" style="font-size: 15px;font-weight: bold;" value="<?php echo $base_url;?>/aff?i=<?php echo $_SESSION['aff_id'];?>&t={{tag}}" style="background-color: #fff;" readonly>
</div>

<div class="col-md-6">
<input type="text" class="form-control" name="" ng-model="tag" placeholder="ใส่ Tag ติดตาม">
</div>

<div class="col-md-12">
<hr />
ข้อความโปรโมท 
<br />
</div>

<div class="col-md-6">
<div class="col-md-12 panel panel-default panel-body">
แบบที่ 1
<br /><br />
ระบบการขายสินค้า ใช้งานออนไลน์<br />
ดูรายงาน สินค้าคงเหลือ สินค้าขายดี ปริ้นใบเสร็จ <br />
- บริหารคลังสินค้า <br />
- คลังสต๊อกสินค้า <br />
- ขายหน้าร้าน  <br />
- ดูรายงานขายได้ทันทีทุกที่<br />
ตรวจสอบสินค้าคงเหลือ สินค้าขายดี ใช้งานง่าย <br />
ทดลองใช้ฟรี <br />
<span ng-show="tag == ''">
	<?php echo $base_url;?>/aff?i=<?php echo $_SESSION['aff_id'];?>
</span>

<span ng-show="tag != ''">
	<?php echo $base_url;?>/aff?i=<?php echo $_SESSION['aff_id'];?>&t={{tag}}
</span>



</div>
</div>



<div class="col-md-6">
<div class="col-md-12 panel panel-default panel-body">
แบบที่ 2
<br /><br />
โปรแกรมคลังขายสินค้า ใช้งานออนไลน์<br />
ดูรายงาน สินค้าคงเหลือ สินค้าขายดี ปริ้นใบเสร็จ<br />
ขายสินค้าง่าย ได้ทุกที่<br />
- ใช้ได้กับ แท็บเล็ต โน๊ตบุค คอม pc<br />
- ตลาดเปิดท้าย ห้างสรรพสินค้า <br />
- ร้านเล็ก ร้านใหญ่<br />
- สินค้าน้อยชิ้น มากชิ้น รองรับไม่จำกัด<br />
ทดลองใช้ฟรี <br />
<span ng-show="tag == ''">
	<?php echo $base_url;?>/aff?i=<?php echo $_SESSION['aff_id'];?>
</span>

<span ng-show="tag != ''">
	<?php echo $base_url;?>/aff?i=<?php echo $_SESSION['aff_id'];?>&t={{tag}}
</span>



</div>
</div>



	</div>
	</div>
	</div>

	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

  $scope.tag = '';


});
	</script>