<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">

    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: green;border-style: dotted;border-width: 1px;">สมัครสมาชิกสำเร็จ!</p></div>
    	<?php } ?>

    	<?php if(isset($_GET['login'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;">ไม่สามารถเข้าสู่ระบบได้! อีเมล์หรือรหัสผ่านไม่ถูกต้อง</p></div>
    	<?php } ?>

    	<?php if(isset($_GET['email'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;">กรุณากรอกอีเมล์และรหัสผ่าน!</p></div>
    	<?php } ?>

		
		<center><h1 style="background-color: orange;color: #fff;">C2M พนักงาน</h1></center>
		
    		<div class="panel panel-default">
			  	<div class="panel-heading" style="background-color: #fff;">
			    	<center><h1 class="panel-title">เข้าสู่ระบบ</h1></center>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="login_submit" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="อีเมล์" name="email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="รหัสผ่าน" name="password" type="password" value="" style="height: 50px;font-size: 20px;">
			    		</div>
			    		
			    		<input id="submit"  class="btn btn-lg btn-warning btn-block" type="submit" value="เข้าสู่ระบบ" >
			    	</fieldset>
			      	</form>



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

$scope.Submit = function(){
$('#submit').prop('disabled',true);
};

});


	</script>