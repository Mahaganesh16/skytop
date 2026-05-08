<!DOCTYPE html>
<html>
<head>
	<title>Add Sub Admin | Admin</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<?php include APPPATH.'views/admin/includes/header.php';?>
	<?php include APPPATH.'views/admin/includes/sidebar.php';?>
  	<div class="content-wrapper">
  		<div class="content-header">
	      	<div class="container-fluid">
		        <div class="row mb-2">
			        <div class="col-sm-6">
			            <h1 class="m-0 text-dark">Add Sub Admin</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			               <li class="breadcrumb-item"><a href="<?= base_url('admin/SubAdmin');?>">Sub Admins</a></li>
			              <li class="breadcrumb-item active">Add Sub Admin</li>
			            </ol>
			        </div>
		        </div>
	      	</div>
	    </div>
	    <section class="content">
      		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">    				
						<?php
						if(!empty($this->session->userdata('error_message'))){
							?>
							<div class="alert alert-danger alert-dismissible">
			                  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                  		<h5><i class="icon fas fa-check"></i> Alert!</h5>
			                  	<?php echo $this->session->userdata('error_message');?>
			                </div>
							<?php
						}
						?>    
						<?php
						if(!empty($this->session->userdata('success_message'))){
							?>
							<div class="alert alert-success alert-dismissible">
			                  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                  		<h5><i class="icon fas fa-check"></i> Alert!</h5>
			                  	<?php echo $this->session->userdata('success_message');?>
			                </div>
							<?php
						}
						?>
					</div>
					<div class="col-md-12">  				
	          			<div class="col-md-12">
				            <div class="card card-primary">
					            <div class="card-header">
					                <h3 class="card-title">Add Sub Admin
						            </h3>
					            </div>
					            <form role="form" method="POST" action="<?= base_url('admin/SubAdmin/addSubAdmin');?>" enctype="multipart/form-data">
					                <div class="card-body">
				                  		<div class="row">
					                  		<div class="form-group col-md-6">
						                    	<label>Email</label>
						                    	<input type="text" class="form-control" id="email" name="email" placeholder="Email">
						                    	<?php echo form_error('email',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Admin Type</label>
						                    	<select class="form-control" id="type" name="type">
						                    		<option value="">Select Type</option>
						                    		<!-- <option value="super-admin">Super Admin</option> -->
						                    		<option value="sub-admin">Sub Admin</option>
						                    	</select>
						                    	<?php echo form_error('type',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Name</label>
						                    	<input type="text" class="form-control" id="name" name="name" placeholder="Name">
						                    	<?php echo form_error('name',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Admin Image</label>
						                    	<input type="file" class="form-control" id="image" name="image">
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Password</label>
						                    	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						                    	<?php echo form_error('password',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Confirm Password</label>
						                    	<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
						                    	<?php echo form_error('confirmpassword',"<div style='color:red'>","</div>");?>
						                    </div>
						                     <div class="form-group col-md-6">
						                    	<label>Status</label>
						                    	<select class="form-control" id="status" name="status">
						                    		<option value="">Select</option>
						                    		<option value="1">Active</option>
						                    		<option value="0">In Active</option>
						                    	</select>
						                    	<?php echo form_error('status',"<div style='color:red'>","</div>");?>
						                    </div>
						                </div>
					                </div>
					                <div class="card-footer">
					                  	<button type="submit" class="btn btn-primary">Add Sub Admin</button>
					                </div>
					            </form>
				            </div>
				        </div>
				    </div>
			    </div>
			</div>
		</section>

  	</div>
  	<?php include APPPATH.'views/admin/includes/footer.php';?>

	<script src="<?= base_url('assets/panel_assets/plugins/jquery/jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/adminlte.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/demo.js');?>"></script>
</body>
</html>