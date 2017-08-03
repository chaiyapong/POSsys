<style>
	.ui-datepicker-year{
		display: none;
	}
</style>

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>รายชื่อลูกค้า ({{allmycustomer | number:0}} คน) <a class="btn btn-primary"  style="float: right" ng-click="Openaddnewcus()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></a></font>

<hr />

<div style="float: right">

<input type="checkbox" ng-model="Showdelbut"> แสดงปุ่มลบ
</div>


<form class="form-inline">
<div class="form-group">
<select class="form-control" ng-model="searchtype">
<option value="0">รหัสบัตร</option>
	<option value="1">ชื่อ-นามสกุล</option>
	<option value="2">เบอร์โทร</option>
	<option value="3">อีเมล์</option>
	<option value="4">วันเกิด</option>
</select>
</div>
<div class="form-group">
<input ng-show="searchtype != '4'" type="text" name="search" ng-model="searchtext" class="form-control" placeholder="พิมพ์คำค้นหา">
<input ng-show="searchtype == '4'" type="text" name="search" ng-model="searchtext" class="form-control"  placeholder="วัน-เดือน 03-01">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchsubmit()" class="btn btn-success" placeholder="" title="ค้นหา"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลดรายชื่อลูกค้า" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button> 
</div>
<div class="form-group">
<button type="submit" ng-click="Refreshsubmit(searchtype,searchtext,'1')" class="btn btn-default" placeholder="" title="รีเฟรสข้อมูล"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>


<br />
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee">
			
			<th width="5px" class="visible-sm visible-md visible-lg">ลำดับ</th>
			<th width="5px">การติดต่อ</th>
			<th>ชื่อ</th>
			
			<th>เบอร์โทร</th>
			<th class="visible-sm visible-md visible-lg">อีเมล์</th>
			<th class="visible-sm visible-md visible-lg">วัน-เดือน-ปี เกิด</th>
			<th>บัตรสมาชิก</th>
			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in mycustomer">
			<td ng-show="selectpage=='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)+(perpage*(selectpage-1))}}</td>
<td> <button class="btn btn-success btn-xs" ng-click="Contactmodal(x)">รายการติดต่อ</button> </td>


			<td><button class="btn btn-default btn-xs" ng-click="Detail(x)">{{x.cus_name}}</button></td>
			
			<td>{{x.cus_tel}}</td>
			<td class="visible-sm visible-md visible-lg">{{x.cus_email}}</td>
			<td class="visible-sm visible-md visible-lg">{{x.cus_birthday}}</td>


<td width="70px">

<a class="btn btn-default btn-xs" target="_blank" href="<?php echo $base_url;?>/card?code={{x.cus_add_time}}&cus_name={{x.cus_name}}"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> บัตรสมาชิก {{x.cus_add_time}}</a>


			</td>


			<td width="70px">
<button class="btn btn-warning btn-xs" ng-click="Editrow(x)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="deletecustomer" ng-click="Delete(x.cus_id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</td>
			
		</tr>

	</tbody>
</table>

<form class="form-inline">
<div class="form-group">
แสดง
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getmycustomer(searchtype,searchtext,'',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
</select>

หน้า
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getmycustomer(searchtype,searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>

<!-- <div class="form-group">
<nav>
 <ul class="pagination">
 <li>
 <a href="" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>

 <li ng-repeat="i in pagealladd" >
 <a  ng-show="selectpage == i.a" href="#" ng-click="getmycustomer(searchtype,searchtext,i.a,perpage)" style="background-color: #eee;">{{i.a}}</a>
  <a  ng-show="selectpage != i.a" href="#" ng-click="getmycustomer(searchtype,searchtext,i.a,perpage)">{{i.a}}</a>
 </li>


 <li>
 <a href="" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
 </div> -->

</form>

	</div>
</div>






<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่มรายชื่อลูกค้าใหม่</h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="ชื่อ-นามสกุล" name="" class="form-control" ng-model="cusname" required>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="ที่อยู่" ng-model="cusaddress">
</textarea> 
</div>

<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="province" ng-change="Getamphur(province)">
		<option value="">เลือกจังหวัด</option>
		<option ng-repeat="p in provincelist" value="{{p.province_id}}">{{p.province_name}}</option>
	</select>
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="amphur" ng-change="Getdistrict(amphur)">
		<option value="">เลือกอำเภอ</option>
		<option ng-repeat="a in amphurlist" value="{{a.amphur_id}}">{{a.amphur_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="district">
		<option value="">เลือกตำบล</option>
		<option ng-repeat="d in districtlist" value="{{d.district_id}}">{{d.district_name}}</option>
	</select>
</div>



<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="รหัสไปรษณีย์" name="" class="form-control" ng-model="cusaddresspostcode">

</div>


<div class="col-md-4">
	<input type="text" placeholder="เบอร์โทร 0123456789"  name="" class="form-control" ng-model="custel">
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="วัน-เดือน-ปี เกิด"  id="datetime" name="datetime" class="form-control" ng-model="cusbirthday">

</div>
	
	<div class="col-md-12">
	<br />
</div>			

<div class="col-md-12">
	<input type="text" placeholder="อีเมล์" name="" class="form-control" ng-model="cusemail" >
</div>


<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex">
		<option value="">เลือกเพศ</option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group">
		<option value="">เลือกกลุ่ม</option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level">
		<option value="">เลือกระดับ</option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>



	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="หมายเหตุ" ng-model="cusremark">
</textarea> 
</div>

				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
<button type="submit" class="btn btn-success" id="savenewcustomer" ng-click="SaveSubmit(cusname,cusaddress,custel,cusemail,cusremark)">บันทึก</button>
			</div>
		</div>



	</div>
</div>






<div class="modal fade" id="modaldetail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายละเอียดลูกค้า</h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="ชื่อ-นามสกุล" name="" class="form-control" ng-model="cusname"  disabled>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="ที่อยู่" ng-model="cusaddress" disabled>
</textarea> 
</div>

<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="province" ng-change="Getamphur(province)" disabled>
		<option value="">เลือกจังหวัด</option>
		<option ng-repeat="p in provincelist" value="{{p.province_id}}">{{p.province_name}}</option>
	</select>
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="amphur" ng-change="Getdistrict(amphur)" disabled>
		<option value="">เลือกอำเภอ</option>
		<option ng-repeat="a in amphurlist" value="{{a.amphur_id}}">{{a.amphur_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="district" disabled>
		<option value="">เลือกตำบล</option>
		<option ng-repeat="d in districtlist" value="{{d.district_id}}">{{d.district_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="รหัสไปรษณีย์" name="" class="form-control" ng-model="cusaddresspostcode" disabled>

</div>

<div class="col-md-4">
	<input type="text" placeholder="เบอร์โทร 0123456789"  name="" class="form-control" ng-model="custel" disabled>
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="วัน-เดือน-ปี เกิด"  id="datetime2" name="datetime2" class="form-control" ng-model="cusbirthday" disabled>

</div>

	
	<div class="col-md-12">
	<br />
</div>			

<div class="col-md-12">
	<input type="text" placeholder="อีเมล์" name="" class="form-control" ng-model="cusemail" disabled>
</div>


<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex" disabled>
		<option value="">เลือกเพศ</option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group" disabled>
		<option value="">เลือกกลุ่ม</option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level" disabled>
		<option value="">เลือกระดับ</option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="หมายเหตุ" ng-model="cusremark" disabled>
</textarea> 
</div>

				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaledit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แก้ไขรายชื่อลูกค้า</h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="ชื่อ-นามสกุล" name="" class="form-control" ng-model="cusname" required>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="ที่อยู่" ng-model="cusaddress">
</textarea> 
</div>

<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="province" ng-change="Getamphur(province)">
		<option value="">เลือกจังหวัด</option>
		<option ng-repeat="p in provincelist" value="{{p.province_id}}">{{p.province_name}}</option>
	</select>
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="amphur" ng-change="Getdistrict(amphur)">
		<option value="">เลือกอำเภอ</option>
		<option ng-repeat="a in amphurlist" value="{{a.amphur_id}}">{{a.amphur_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="district">
		<option value="">เลือกตำบล</option>
		<option ng-repeat="d in districtlist" value="{{d.district_id}}">{{d.district_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="รหัสไปรษณีย์" name="" class="form-control" ng-model="cusaddresspostcode">

</div>

<div class="col-md-4">
	<input type="text" placeholder="เบอร์โทร 0123456789"  name="" class="form-control" ng-model="custel">
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="วัน-เดือน-ปี เกิด"  id="datetime3" name="datetime3" class="form-control" ng-model="cusbirthday">

</div>

	
	<div class="col-md-12">
	<br />
</div>			

<div class="col-md-12">
	<input type="text" placeholder="อีเมล์" name="" class="form-control" ng-model="cusemail">
</div>


<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex">
		<option value="">เลือกเพศ</option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>	

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group">
		<option value="">เลือกกลุ่ม</option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level">
		<option value="">เลือกระดับ</option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="หมายเหตุ" ng-model="cusremark">
</textarea> 
</div>

				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="EditSubmit(cusid,cusname,cusaddress,custel,cusemail,cusremark)">บันทึก</button>
			</div>
		</div>



	</div>
</div>


<div class="modal fade" id="modalecontact">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
<button class="btn btn-primary" ng-click="Newcontactmodal(cusid)"><span class="glyphicon glyphicon-plus" aria-hidden="true"></button>
				รายการติดต่อ / {{cusname}}</h4>
				
			</div>
			<div class="modal-body">

<div class="row">

<div class="col-md-12">
<div class="text-right"><input type="checkbox" ng-model="showdel">แสดงปุ่มลบ</div>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th>รายละเอียด</th>
			<th>ช่องทางติดต่อ</th>
			<th>เกรด/คะแนน</th>
			<th>สินค้า/บริการ</th>
			<th>เหตุผลที่ซื้อ</th>
			<th>เหตุผลที่ไม่ซื้อ</th>
			<th>วันที่</th>
			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="c in contactlistone">
			<td>{{c.contact_list_detail}}</td>
			<td>{{c.contact_from_name}}</td>
			<td>{{c.contact_grade_name}}</td>
			<td>{{c.product_service_name}}</td>
			<td>{{c.customer_reasonbuy_name}}</td>
			<td>{{c.customer_reasonnotbuy_name}}</td>
			<td>{{c.addtime}}</td>
			<td width="70px"><button class="btn btn-warning btn-xs" ng-click="Contactedit(c)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <button class="btn btn-danger btn-xs" ng-show="showdel" ng-click="Contactdelete(c)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
		</tr>
	</tbody>
</table>
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaleaddcontact">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่มรายการติดต่อใหม่ / {{cusname}}</h4>
			</div>
			<div class="modal-body">

<div class="row">
<div class="col-md-12">
	<textarea class="form-control" ng-model="contact_list_detail" placeholder="รายละเอียดการติดต่อ"></textarea>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_from_id">
		<option value="">-เลือกช่องทางการติดต่อ-</option>
			<option ng-repeat="s in contactfrom" value="{{s.contact_from_id}}">{{s.contact_from_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_grade_id">
		<option value="">-เลือกเกรด/คะแนนการติดต่อ-</option>
			<option ng-repeat="s in contactgrade" value="{{s.contact_grade_id}}">{{s.contact_grade_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="product_service_id">
		<option value="">-เลือกสินค้าบริการที่สนใจ-</option>
			<option ng-repeat="s in productservice" value="{{s.product_service_id}}">{{s.product_service_name}}</option>
	</select>
</div>


<div class="col-md-12">
	<br />
</div>


<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonbuy_id">
		<option value="">-เลือกเหตุผลที่ต้องการซื้อ-</option>
			<option ng-repeat="s in customerreasonbuy" value="{{s.customer_reasonbuy_id}}">{{s.customer_reasonbuy_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonnotbuy_id">
		<option value="">-เลือกเหตุผลที่ไม่ซื้อ-</option>
			<option ng-repeat="s in customerreasonnotbuy" value="{{s.customer_reasonnotbuy_id}}">{{s.customer_reasonnotbuy_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="SaveContact()">บันทึก</button>
			</div>
		</div>



	</div>
</div>















<div class="modal fade" id="modaleditcontact">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แก้ไขรายการติดต่อ / {{cusname}}</h4>
			</div>
			<div class="modal-body">

<div class="row">
<div class="col-md-12">
	<textarea class="form-control" ng-model="contact_list_detail" placeholder="รายละเอียดการติดต่อ"></textarea>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_from_id">
		<option value="">ช่องทางการติดต่อ</option>
			<option ng-repeat="s in contactfrom" value="{{s.contact_from_id}}">{{s.contact_from_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_grade_id">
		<option value="">เกรด/คะแนนการติดต่อ</option>
			<option ng-repeat="s in contactgrade" value="{{s.contact_grade_id}}">{{s.contact_grade_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="product_service_id">
		<option value="">สินค้าบริการที่สนใจ</option>
			<option ng-repeat="s in productservice" value="{{s.product_service_id}}">{{s.product_service_name}}</option>
	</select>
</div>


<div class="col-md-12">
	<br />
</div>


<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonbuy_id">
		<option value="">เหตุผลที่ต้องการซื้อ</option>
			<option ng-repeat="s in customerreasonbuy" value="{{s.customer_reasonbuy_id}}">{{s.customer_reasonbuy_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonnotbuy_id">
		<option value="">เหตุผลที่ไม่ซื้อ</option>
			<option ng-repeat="s in customerreasonnotbuy" value="{{s.customer_reasonnotbuy_id}}">{{s.customer_reasonnotbuy_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="SaveContactedit()">บันทึก</button>
			</div>
		</div>



	</div>
</div>














</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.searchtype = '0';
$scope.searchtext = '';
$scope.selectthispage = '1';

$("#datetime").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย  
    yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 
$("#datetime2").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย  
    yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 
$("#datetime3").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย  
    yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 

$scope.pagealladd = [];



$scope.Defaultdata = function(){

$http.get('Customergroup/get')
       .then(function(response){
          $scope.customergroup = response.data.list; 
                 
        });

$http.get('Customerlevel/get')
       .then(function(response){
          $scope.customerlevel = response.data.list; 
                 
        });

$http.get('Customersex/get')
       .then(function(response){
          $scope.customersex = response.data.list; 
                 
        });


$http.get('Thailand/province')
       .then(function(response){
          $scope.provincelist = response.data.list; 
                 
        });
};

$scope.perpage = '10';
$scope.getmycustomer = function(searchtype,searchtext,page,perpage){
   if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

$http.post('Mycustomer/get',{
'searchtype': searchtype || '',
'searchtext': searchtext || '',
'page': page,
'perpage': perpage
})
       .success(function(data){
          $scope.mycustomer = data.list; 
          $scope.pageall = data.pageall; 
           $scope.allmycustomer = data.all; 
$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });
$('.lodingbefor').css('display','block');

   };
$scope.getmycustomer();


$scope.Refreshsubmit = function(){
$scope.getmycustomer('','');
$scope.searchtype = '0';
$scope.searchtext = '';
$scope.perpage = '10';
};


$scope.Getamphur = function(province){
$scope.amphur = '';
$scope.district = '';
$scope.districtlist = [];
$http.post("Thailand/amphur",{
	'province_id': province
	}).success(function(data){
$scope.amphurlist = data.list;


        });	
};


$scope.Getdistrict = function(amphur){
$scope.district = '';
$http.post("Thailand/district",{
	'amphur_id': amphur
	}).success(function(data){

$scope.districtlist = data.list;


        });	
};


$scope.Openaddnewcus = function(){
	$('#modal-id').modal({backdrop: "static", keyboard: false});
	$scope.cusname = '';
$scope.cusaddress ='';
$scope.custel ='';
$scope.cusemail = '';
$scope.cusremark = '';
$scope.cusbirthday = '';
$scope.customer_group = '';
$scope.customer_level = '';
$scope.customer_sex = '';
$scope.province = '';
$scope.amphur = '';
$scope.district = '';
$scope.cusaddresspostcode = '';


$scope.Defaultdata();
$scope.districtlist = [];
$scope.amphurlist = [];

};






$scope.SaveSubmit = function(cusname,cusaddress,custel,cusemail,cusremark){
	
	if(cusname != ''){

$("#savenewcustomer").prop("disabled",true);
$http.post("Mycustomer/save",{
	'cusname': cusname,
	'cusaddress': cusaddress,
	'custel': custel,
	'cusemail': cusemail,
	'cusbirthday': $scope.cusbirthday,
	'customer_group': $scope.customer_group,
	'customer_level': $scope.customer_level,
	'customer_sex': $scope.customer_sex,
	'province': $scope.province,
	'amphur': $scope.amphur,
	'district': $scope.district,
	'cusaddresspostcode': $scope.cusaddresspostcode,
	'cusremark': cusremark
	}).success(function(data){

$("#savenewcustomer").prop("disabled",false);
toastr.success('บันทึกเรียบร้อย');
$scope.cusname = '';
$scope.cusaddress ='';
$scope.custel ='';
$scope.cusemail = '';
$scope.cusremark = '';
$scope.cusbirthday = '';
$scope.customer_group = '';
$scope.customer_level = '';
$scope.customer_sex = '';
$scope.province = '';
$scope.amphur = '';
$scope.district = '';
$scope.cusaddresspostcode = '';
$scope.districtlist = [];
$scope.amphurlist = [];

$('#modal-id').modal('hide');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });	
}else{
	toastr.warning('กรุณาพิมพิมพ์ชื่อลูกค้า');
}
	
	
};





$scope.Delete = function(cusid){
	

$http.post("Mycustomer/delete",{
	'cus_id': cusid
	}).success(function(data){

toastr.success('ลบเรียบร้อย');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });	
	
	
};


$scope.Detail = function(x){
$('#modaldetail').modal('show');

$scope.Defaultdata();
$scope.Getamphur(x.province_id);
$scope.Getdistrict(x.amphur_id);

$scope.cusid = x.cus_id;
$scope.cusname = x.cus_name;
$scope.cusaddress = x.cus_address;
$scope.custel = x.cus_tel;
$scope.cusemail = x.cus_email;

$scope.cusbirthday = x.cus_birthday;
$scope.customer_group = x.customer_group_id;
$scope.customer_level = x.customer_level_id;
$scope.customer_sex = x.customer_sex_id;
$scope.province = x.province_id;
$scope.amphur = x.amphur_id;
$scope.district = x.district_id;
$scope.cusaddresspostcode = x.cus_address_postcode;

$scope.cusremark = x.cus_remark;

};




$scope.Editrow = function(x){
$('#modaledit').modal('show');

$scope.Defaultdata();
$scope.Getamphur(x.province_id);
$scope.Getdistrict(x.amphur_id);

$scope.cusid = x.cus_id;
$scope.cusname = x.cus_name;
$scope.cusaddress = x.cus_address;
$scope.custel = x.cus_tel;
$scope.cusemail = x.cus_email;

$scope.cusbirthday = x.cus_birthday;
$scope.customer_group = x.customer_group_id;
$scope.customer_level = x.customer_level_id;
$scope.customer_sex = x.customer_sex_id;
$scope.province = x.province_id;
$scope.amphur = x.amphur_id;
$scope.district = x.district_id;
$scope.cusaddresspostcode = x.cus_address_postcode;

$scope.cusremark = x.cus_remark;

};



$scope.EditSubmit = function(cusid,cusname,cusaddress,custel,cusemail,cusremark){
	

$http.post("Mycustomer/update",{
	'cus_id': cusid,
	'cus_name': cusname,
	'cus_address': cusaddress,
	'cus_tel': custel,
	'cus_email': cusemail,
	'cusbirthday': $scope.cusbirthday,
	'customer_group': $scope.customer_group,
	'customer_level': $scope.customer_level,
	'customer_sex': $scope.customer_sex,
	'province': $scope.province,
	'amphur': $scope.amphur,
	'district': $scope.district,
	'cusaddresspostcode': $scope.cusaddresspostcode,
	'cus_remark': cusremark
	}).success(function(data){

toastr.success('บันทึกเรียบร้อย');
$('#modaledit').modal('hide');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });	
	
	
};




$scope.Getforcontact = function(){

$http.get('contactfrom/get')
       .then(function(response){
          $scope.contactfrom = response.data.list; 
                 
        });

$http.get('contactgrade/get')
       .then(function(response){
          $scope.contactgrade = response.data.list; 
                 
        });

$http.get('Productservice/get')
       .then(function(response){
          $scope.productservice = response.data.list; 
                 
        });


$http.get('Customerreasonbuy/get')
       .then(function(response){
          $scope.customerreasonbuy = response.data.list; 
                 
        });

$http.get('Customerreasonnotbuy/get')
       .then(function(response){
          $scope.customerreasonnotbuy = response.data.list; 
                 
        });
};


$scope.Contactlistonefunc = function(cus_id){
$http.post("Contactlist/getone",{
	'cus_id': cus_id
	}).success(function(data){
$scope.contactlistone = data.list;
        });	
};

$scope.Contactmodal = function(x){
$('#modalecontact').modal('show');
$scope.cusname = x.cus_name;
$scope.cusid = x.cus_id;

$scope.Contactlistonefunc(x.cus_id);

};

$scope.Newcontactmodal = function(cusid){
$('#modaleaddcontact').modal({backdrop: "static", keyboard: false});

$scope.Getforcontact();
$scope.contact_list_id = '';
$scope.contact_list_detail = '';
$scope.contact_grade_id = '';
$scope.contact_from_id = '';
$scope.customer_reasonbuy_id = '';
$scope.customer_reasonnotbuy_id = '';
$scope.product_service_id = '';
$scope.cusid = cusid;

};

$scope.SaveContact = function(){
$http.post("Contactlist/add",{
	'contact_list_detail': $scope.contact_list_detail,
	'cus_id': $scope.cusid,
	'contact_from_id': $scope.contact_from_id,
	'contact_grade_id': $scope.contact_grade_id,
	'product_service_id': $scope.product_service_id,
	'customer_reasonbuy_id': $scope.customer_reasonbuy_id,
	'customer_reasonnotbuy_id': $scope.customer_reasonnotbuy_id

	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.Contactlistonefunc($scope.cusid);
$('#modaleaddcontact').modal('hide');


        });	
};


$scope.Contactedit = function(c){
	$('#modaleditcontact').modal('show');
	$scope.Getforcontact();
	$scope.contact_list_id = c.contact_list_id;
$scope.contact_list_detail = c.contact_list_detail;
$scope.contact_grade_id = c.contact_grade_id;
$scope.contact_from_id = c.contact_from_id;
$scope.customer_reasonbuy_id = c.customer_reasonbuy_id;
$scope.customer_reasonnotbuy_id = c.customer_reasonnotbuy_id;
$scope.product_service_id = c.product_service_id;
$scope.cusid = c.cus_id;
};



$scope.SaveContactedit = function(){

$http.post("Contactlist/update",{
	'contact_list_id': $scope.contact_list_id,
	'contact_list_detail': $scope.contact_list_detail,
	'cus_id': $scope.cusid,
	'contact_from_id': $scope.contact_from_id,
	'contact_grade_id': $scope.contact_grade_id,
	'product_service_id': $scope.product_service_id,
	'customer_reasonbuy_id': $scope.customer_reasonbuy_id,
	'customer_reasonnotbuy_id': $scope.customer_reasonnotbuy_id

	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.Contactlistonefunc($scope.cusid);
$('#modaleditcontact').modal('hide');


        });	
};


$scope.Contactdelete = function(c){

$http.post("Contactlist/delete",{
	'contact_list_id': c.contact_list_id,
	'cus_id': c.cus_id,
	}).success(function(data){
toastr.success('ลบเรียบร้อย');
$scope.Contactlistonefunc(c.cus_id);

        });	
};




$scope.DownloadExcel = function(){

$http.post("Mycustomer/excel",{
	'excel': '1',
	'searchtype': $scope.searchtype || '',
	'searchtext': $scope.searchtext || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.Searchsubmit = function(){
$scope.getmycustomer($scope.searchtype,$scope.searchtext,'1',$scope.perpage);
};



});
	</script>