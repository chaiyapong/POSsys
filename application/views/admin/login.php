<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">


    	<?php if(isset($_GET['login'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;">ไม่สามารถเข้าสู่ระบบได้! User Name หรือรหัสผ่านไม่ถูกต้อง</p></div>
    	<?php } ?>

    	<?php if(isset($_GET['user'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;">กรุณากรอก User Nameและรหัสผ่าน!</p></div>
    	<?php } ?>

		
		<center>
		<h1 style="background-color: orange;color: #fff;">C2M ผู้บริหาร</h1></center>
		
    		<div class="panel panel-default">
			  	<div class="panel-heading" style="background-color: #fff;">
			    	<center><h1 class="panel-title">เข้าสู่ระบบ</h1></center>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="login_submit" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="User Name" name="admin_user" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="รหัสผ่าน" name="admin_password" type="password" value="" style="height: 50px;font-size: 20px;" required>
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