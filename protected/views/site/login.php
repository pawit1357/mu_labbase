<div>

	<form class="login-form" method="post">
		<h3 class="form-title font-green">Sign In</h3>
                			<?php if (isset ( $_SESSION ['FAIL_MESSAGE'] )) {?>
				<div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span><?php echo $_SESSION ['FAIL_MESSAGE'];?></span>
		</div>
				<?php unset ( $_SESSION ['FAIL_MESSAGE'] );} else {?>
				<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span> Enter any username and password. </span>
		</div>
			<?php }?>
			
                <div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix"
				type="text" autocomplete="off" placeholder="Username"
				name="UsersLogin[username]" />
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix"
				type="password" autocomplete="off" placeholder="Password"
				name="UsersLogin[password]" />
		</div>
		<div class="form-actions">
			<button type="submit" class="btn green uppercase">Login</button>
			<!-- 			<label class="rememberme check mt-checkbox mt-checkbox-outline"> <input -->
			<!-- 				type="checkbox" name="remember" value="1" />Remember <span></span> -->
			<!-- 			</label>  -->
<?php echo CHtml::link('ลืมรหัสผ่าน',array('Site/ForgotPassword'),array('class'=>'forget-password'));?>

			
			<a href="javascript:;" id="forget-password" class="forget-password">

			</a>
		</div>
		<div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li><a class="social-icon-color facebook"
					data-original-title="facebook" href="javascript:;"></a></li>
				<li><a class="social-icon-color googleplus"
					data-original-title="Goole Plus" href="javascript:;"></a></li>
			</ul>
		</div>
		<div class="create-account">
			<p>
<?php echo CHtml::link('ลงทะเบียนห้องปฏิบัติการ',array('RegisterLab/'),array('class'=>'uppercase'));?> &nbsp;&nbsp;|&nbsp;&nbsp;
<?php echo CHtml::link('รายงานประจำปี',array('RegisterReport/'),array('class'=>'uppercase'));?>
			
<!-- 				<a href="javascript:;" id="register-btn" class="uppercase">ลงทะเบียนใช้งาน</a> -->
			</p>
		</div>




	</form>


</div>
