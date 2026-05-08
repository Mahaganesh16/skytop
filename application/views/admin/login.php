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
		    <a href="<?= base_url('admin/Login');?>"><b>Shreetech</b> ADMIN</a>
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
				<?php } ?>
				<?php 
				if(!empty($this->session->userdata('success_message'))){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible show row" role="alert" >
                                <div class="col-md-11">
                                    <strong><?php echo $this->session->userdata('success_message'); ?></strong> 
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
		      	<p class="login-box-msg">Sign in to start your session</p>
		      	<form action="<?= base_url('admin/Login');?>" method="post">
			        <div class="input-group mb-2">
			          	<input type="email" name="email" id="email" class="form-control" placeholder="Email">
				        <div class="input-group-append">
				            <div class="input-group-text">
				              <span class="fas fa-envelope"></span>
				            </div>
				        </div>
			        </div>
			        <?php echo form_error('email', '<p class="error">', '</p>'); ?>
			        <div class="input-group mb-2">
			          	<input type="password" name="password" id="password" class="form-control" placeholder="Password">
		          		<div class="input-group-append">
				            <div class="input-group-text">
				              	<span class="fas fa-lock"></span>
				            </div>
			          	</div>
			        </div>
			        <?php echo form_error('password', '<p class="error">', '</p>'); ?>
			        <div class="row">
			          	<div class="col-12">
			            	<button type="submit" class="btn btn-primary btn-block">Sign In</button>
			          	</div>
			        </div>
			    </form>
			    <p class="mb-1 text-center" style="margin-top:10px;">
			        <a class=" float-right" data-toggle="modal" data-target="#forget" style="color:#007bff; cursor:pointer;">Forgot Password?</a>
			    </p>
		    </div>
		</div>
	</div>
	  <div id="forget" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content text-black">
                    <div class="modal-header">
                        <h5 class="modal-title text-black">Forget Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" class="login-form" action="<?= base_url('admin/Login/change');?>" method="post">
                                        <div class="form-group">
                                            <div class="input-icon">
                                               Enter Your Email
                                                <input type="email" id="admin_email" class="form-control" name="admin_email" placeholder="Enter Email">
                                            </div>
                                            <?php echo form_error('admin_email', '<p class="error">', '</p>'); ?>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-common log-btn btn btn-primary">Forget Password</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
	<script src="<?= base_url('assets/panel_assets/plugins/jquery/jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/adminlte.min.js');?>"></script>
</body>
</html>