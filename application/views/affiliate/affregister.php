<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">

    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;">สมัครสมาชิกไม่สำเร็จ! มีอีเมล์นี้ในระบบแล้ว</p></div>
    	<?php } ?>


    		<div class="panel panel-default">
			  	<div class="panel-heading"  style="background-color: #fff;">
			    <center>	<h3 class="panel-title">สมัครสมาชิก Affiliate</h3> </center>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="affsignup" method="post">
                    <fieldset>
                    <div class="form-group">
			    		    <input class="form-control" minlength="4" placeholder="ชื่อ" name="name" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>



 <div class="col-md-12">
<br />
</div>




 <div class="form-group">
			    		    <input class="form-control" minlength="10" placeholder="เบอร์โทร" name="tel" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>


                    	<div class="form-group">
			    		    <input class="form-control" placeholder="อีเมล์" name="email" type="email" style="height: 50px;font-size: 20px;" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" minlength="6" placeholder="รหัสผ่าน" name="password" style="height: 50px;font-size: 20px;" type="password" value="" required>
			    		</div>
			    		
			    		
			    		
			    		<input id="submit" class="btn btn-lg btn-default btn-block" type="submit" value="สมัครสมาชิก">
			    	</fieldset>
			      	</form>


			      	<hr />
			      	<center>
	<a href="<?php echo $base_url;?>/affiliate/afflogin">เข้าสู่ระบบ Affiliate ตัวแทนขาย</a>
</center>
			    </div>
			</div>
		</div>
	</div>
</div>

<script>

function Submit(){
$('#submit').prop('disabled',true);
};


var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {




});

	</script>