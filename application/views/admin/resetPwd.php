<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login | Ads</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style type="text/css">
		.error{
			margin-bottom:5px;
			font-weight: 600;
			color:red;
		}
	</style>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		    <a href="<?= base_url('admin/Login');?>"><b>Ads</b> ADMIN</a>
		</div>
		<div class="card">
		    <div class="card-body login-card-body">
		    	<?php
		    	if(!empty($this->session->userdata('error_message'))){
		    	?>
		    	<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<?php echo $this->session->userdata('error_message');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php }?>
		      	<p class="login-box-msg">Forget Password</p>
		      	<form action="<?= base_url('admin/Login/resetPassword/'.$updateResult->email);?>" method="post">
			      <div class="form-group">
					<div class="input-icon">
						<i class="lni-envelope"></i>
						<input type="password" id="newpwd" class="form-control" name="newpwd" placeholder="Enter Your New Password">
					</div>
					<?php echo form_error('newpwd', '<p class="error">', '</p>'); ?>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="lni-lock"></i>
						<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Enter your Confirm Password">
					</div>
					<?php echo form_error('confirmpassword', '<p class="error">', '</p>'); ?>
				</div>
			        <div class="row">
			          	<div class="col-12">
			            	<button type="submit" class="btn btn-primary btn-block">Reset Here</button>
			          	</div>
			        </div>
			    </form>
			   
		    </div>
		</div>
	</div>
	
	<script src="<?= base_url('assets/panel_assets/plugins/jquery/jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/adminlte.min.js');?>"></script>
</body>
</html>