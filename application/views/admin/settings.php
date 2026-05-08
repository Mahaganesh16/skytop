<!DOCTYPE html>
<html>
<head>
	<title>Settings | Admin</title>
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
			            <h1 class="m-0 text-dark">Settings</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item active">Settings</li>
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
					                <h3 class="card-title"><?php echo $adminDetails->name;?> 
					                	<?php
				                    	if($adminDetails->status == '1'){
				                    	?>
				                    	<span class="badge badge-success">Active</span>
				                    	<?php
				                    	}else{
				                    	?>
				                    	<span class="badge badge-danger">In Active</span>
				                    	<?php
				                    	}
				                    	?>
						            </h3>
					            </div>
					            <form role="form" method="POST" action="<?= base_url('admin/Dashboard/settings');?>" enctype="multipart/form-data">
					                <div class="card-body">
				                  		<div class="row">
					                  		<div class="form-group col-md-6">
						                    	<label>Email</label>
						                    	<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $adminDetails->email;?>" disabled readonly>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Admin Type</label>
						                    	<input type="text" class="form-control" id="type" name="type" placeholder="Admin Type" value="<?php echo $adminDetails->type;?>" disabled readonly>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Name</label>
						                    	<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $adminDetails->name;?>">
						                    	<?php echo form_error('name',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Admin Image</label>
						                    	<input type="file" class="form-control" id="image" name="image"><br>
						                    	<?php
						                    	if(!empty($adminDetails->image)){
						                    		?>
						                    		<img src="<?= base_url('assets/front/images/admin/'.$adminDetails->image);?>" width="100px"> | 
						                    		<a href="<?= base_url('admin/Dashboard/deleteAdminImage/'.$adminDetails->id);?>"><i class="fa fa-trash"></i> Delete</a>
						                    		<?php
						                    	}
						                    	?>
						                    </div>
						                </div>
					                </div>
					                <div class="card-footer">
					                  	<button type="submit" class="btn btn-primary">Update Settings</button>
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