
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
		
		<ul class="nav nav-pills">	
<li style="width: 100%;" <?php if($tab == 'mycustomer'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/mycustomer">
<span class="glyphicon glyphicon-user" aria-hidden="true"></span>	รายชื่อลูกค้า </a></li>
<li style="width: 100%;" <?php if($tab === 'contactlist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/contactlist"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>	รายการติดต่อ </a></li>
	
</ul>


	
		
		<ul class="nav nav-pills nav-sidebar">	
<li style="width: 100%;" <?php if($tab === 'analyticall'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/analyticall"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>	สถิติโดยรวม </a></li>

		<ul class="nav nav-pills nav-sidebar">	
<li style="width: 100%;" <?php if($tab === 'analycusdayly'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/analycusdayly"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>	สถิติลูกค้า </a></li>

		<ul class="nav nav-pills nav-sidebar">	
<li style="width: 100%;" <?php if($tab === 'analycontactdayly'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/analycontactdayly"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>	สถิติการติดต่อ </a></li>



<!-- <li style="width: 100%;" <?php if($tab === 'reportcustomer'){ echo 'class="active"';} ?> ><a href="/crm/reportcustomer"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>	รายงานลูกค้า </a></li>

<li style="width: 100%;" <?php if($tab === 'reportcontact'){ echo 'class="active"';} ?> ><a href="/crm/reportcontact"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>	รายงานการติดต่อ </a></li> -->


	
</ul>


		</div>
	</div>



<table> <tr><td class="visible-sm visible-md visible-lg">
	<div class="setting-tab panel panel-default">
		<div class="panel-body">
			 
	
<ul class="nav nav-pills nav-sidebar">	

	<li style="width: 100%;" <?php if($tab === 'productservice'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/productservice"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	สินค้า/บริการ </a></li>
</ul>


<ul class="nav nav-pills nav-sidebar">
	<li style="width: 100%;" <?php if($tab === 'customergroup'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/customergroup"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	กลุ่มลูกค้า </a></li>
	<li style="width: 100%;" <?php if($tab === 'customerlevel'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/customerlevel"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	ระดับลูกค้า </a></li>


<li style="width: 100%;" <?php if($tab === 'customersex'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/customersex"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	เพศลูกค้า </a></li>

</ul>


<ul class="nav nav-pills nav-sidebar">

	<li style="width: 100%;" <?php if($tab === 'contactfrom'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/contactfrom"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	ช่องทางการติดต่อ </a></li>
	<li style="width: 100%;" <?php if($tab === 'contactgrade'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/contactgrade"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	เกรด/คะแนนการติดต่อ </a></li>

</ul>


<ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'customerreasonbuy'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/customerreasonbuy"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	เหตุผลที่ต้องการซื้อ </a></li>


<li style="width: 100%;" <?php if($tab === 'customerreasonnotbuy'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/customerreasonnotbuy"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	เหตุผลที่ไม่สามารถซื้อ </a></li>

</ul>



		</div>
	</div>
	</td>
	</tr>
</table>


</div>