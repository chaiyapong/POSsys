
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-12 col-sm-12">
	

	

<center>
	
<h2><?php echo $food_brand_name; ?></h2>
<h4>ที่อยู่ <?php echo $food_brand_address; ?> โทร: <?php echo $food_brand_tel; ?></h4>
<hr />
<span <?php if(!isset($_GET['catid'])){ echo 'style="color:#fff;background-color:orange;margin-right: 5px;padding-left: 5px;padding-right: 5px;"';} ?> ><a href="<?php echo $base_url; ?>/foodbrand?id=<?php echo $_GET['id'];?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ทั้งหมด </a></span> 



<?php 

foreach ($getcat as $row) {

echo '

<span ';

if(isset($_GET['catid']) && $row['food_category_id'] === $_GET['catid']){ echo 'style="color:#fff;background-color:orange;margin-right: 5px;padding-left: 5px;padding-right: 5px;"';}

echo '>
<a href="'.$base_url.'/foodbrand?id='.$_GET['id'].'&catid='.$row['food_category_id'].'" ><span class="glyphicon glyphicon-tag" aria-hidden="true"></span>	'.$row['food_category_name'].' </a>
	</span> 
	
';
}

?>
	

</center>


<p></p>
	</div>



