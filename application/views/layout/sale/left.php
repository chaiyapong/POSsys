
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3">
	

	<div class="panel panel-default">
		<div class="panel-body">
		
	
		<ul class="nav nav-pills nav-sidebar">	

<li style="width: 100%;" <?php if($tab === 'salelist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salelist"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> รายการขายทั้งหมด </a></li>




<li style="width: 100%;" <?php if($tab === 'salereport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> รายงานการขาย </a></li>


<li style="width: 100%;" <?php if($tab === 'salecustomerreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salecustomerreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> สถิติลูกค้า/การซื้อ </a></li>


<li style="width: 100%;" <?php if($tab === 'returnreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/returnreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> รายงานคืนสินค้า  </a></li> 



<li style="width: 100%;" <?php if($tab === 'supplierreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/supplierreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> รายงานการขาย สินค้าของ Supplier </a></li>



<li style="width: 100%;" <?php if($tab === 'salesumaryreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salesumaryreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> รายงานยอดขายสุทธิ </a></li>

</ul>




</div>

</div>




<div class="panel panel-default">
		<div class="panel-body">
		
	
		<ul class="nav nav-pills nav-sidebar">	

<li style="width: 100%;" <?php if($tab === 'customerscore'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/customerscore"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> คะแนนลูกค้าสมาชิก </a></li>


</ul>

</div>
</div>







</div>