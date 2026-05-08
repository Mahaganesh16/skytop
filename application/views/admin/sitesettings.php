<!DOCTYPE html>
<html>
<head>
	<title>Site Settings | Admin</title>
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
			            <h1 class="m-0 text-dark">Site Settings</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item active">Site Settings</li>
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
					                <h3 class="card-title">Site Settings
						            </h3>
					            </div>
					            <form role="form" method="POST" action="<?= base_url('admin/Dashboard/sitesettings/'.$websiteDet->id);?>" enctype="multipart/form-data">
					                <div class="card-body">
				                  		<div class="row">
					                  		<div class="form-group col-md-6">
						                    	<label>Title</label>
						                    	<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $websiteDet->title;?>">
						                    	<?php echo form_error('title',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Logo Image</label>
						                    	<input type="file" class="form-control" id="logo" name="logo"><br>
						                    	<?php
						                    	if(!empty($websiteDet->logo)){
						                    		?>
						                    		<img src="<?= base_url('assets/front_assets/images/'.$websiteDet->logo);?>" width="100px"> | 
						                    		<a href="<?= base_url('admin/Dashboard/deleteLogoImage/'.$websiteDet->id);?>"><i class="fa fa-trash"></i> Delete</a>
						                    		<?php
						                    	}
						                    	?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Contact Email</label>
						                    	<input type="email" class="form-control" id="email" name="email" placeholder="Contact Email" value="<?php echo $websiteDet->email;?>">
						                    	<?php echo form_error('email',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Contact Number</label>
						                    	<input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $websiteDet->contactno;?>">
						                    	<?php echo form_error('contactno',"<div style='color:red'>","</div>");?>
						                    </div>
						                   	<div class="form-group col-md-6">
						                    	<label>About us</label>
						                    	<textarea class="form-control" id="aboutus" name="aboutus" placeholder="About us" rows="4"><?php echo $websiteDet->aboutus;?></textarea>
						                    	<?php echo form_error('aboutus',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-6">
						                    	<label>Contact Number</label>
						                    	<textarea class="form-control" id="address" name="address" placeholder="Contact Address" rows="4"><?php echo $websiteDet->address;?></textarea>
						                    	<?php echo form_error('address',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-12">
						                    	<label>Copyrights Text</label>
						                    	<input type="text" class="form-control" id="copyrightstext" name="copyrightstext" placeholder="Contact Number" value="<?php echo $websiteDet->copyrightstext;?>">
						                    	<?php echo form_error('copyrightstext',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-4">
						                    	<label>Facebook Link</label>
						                    	<input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Facebook Link" value="<?php echo $websiteDet->fb_link;?>">
						                    	<?php echo form_error('fb_link',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-4">
						                    	<label>Twitter</label>
						                    	<input type="text" class="form-control" id="tw_link" name="tw_link" placeholder="Twitter Link" value="<?php echo $websiteDet->tw_link;?>">
						                    	<?php echo form_error('tw_link',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="form-group col-md-4">
						                    	<label>Youtube Link</label>
						                    	<input type="text" class="form-control" id="yt_link" name="yt_link" placeholder="Youtube Link" value="<?php echo $websiteDet->yt_link;?>">
						                    	<?php echo form_error('yt_link',"<div style='color:red'>","</div>");?>
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