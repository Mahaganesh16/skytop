<!DOCTYPE html>
<html>
<head>
	<title>Add Worker's | Admin</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/select2/css/select2.min.css');?>">
  	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
  	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/summernote/summernote-bs4.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style type="text/css">
		 .note-editing-area{
			height: 250px !important;
			overflow: auto !important;
		}
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<?php include APPPATH.'views/admin/includes/header.php';?>
	<?php include APPPATH.'views/admin/includes/sidebar.php';?>
  	<div class="content-wrapper">
  		<div class="content-header">
	      	<div class="container-fluid">
		        <div class="row mb-2">
			        <div class="col-sm-6">
			            <h1 class="m-0 text-dark">Add Workers</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Worker');?>">Worker's</a></li>
			              <li class="breadcrumb-item active">Add Workers</li>
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
							<div class="col-md-6 col-md-offset-3">
								<div class="alert alert-danger alert-dismissible">
				                  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                  		<h5><i class="icon fas fa-check"></i> Alert!</h5>
				                  	<?php echo $this->session->userdata('error_message');?>
				                </div>
							</div>
							<?php
						}
						?>    
						<?php
						if(!empty($this->session->userdata('success_message'))){
							?>
							<div class="col-md-6 col-md-offset-3">
								<div class="alert alert-success alert-dismissible">
				                  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                  		<h5><i class="icon fas fa-check"></i> Alert!</h5>
				                  	<?php echo $this->session->userdata('success_message');?>
				                </div>
							</div>
							<?php
						}
						?>
					</div>
					<div class="col-md-12">  
			            <div class="card card-primary">
				            <div class="card-header">
				                <h3 class="card-title">Add Workers</h3>
				            </div>
				            <form role="form" method="POST" action="<?= base_url('admin/Worker/addWorker');?>"  enctype="multipart/form-data">
				                <div class="card-body">
				                  	<div class="row">
				                  			<div class="form-group col-md-4">
				                  				<label>Name</label>
				                  				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
				                  				<?php echo form_error('name',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group col-md-4">
				                  				<label>Mobile Number</label>
				                  				<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Your Name">
				                  				<?php echo form_error('mobile',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group col-md-4">
				                  				<label>Email</label>
				                  				<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Name">
				                  				<?php echo form_error('email',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  		
				                  			<div class="form-group col-md-6">
				                  				<label>Password</label>
				                  				<input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Name">
				                  				<?php echo form_error('password',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group col-md-6">
				                  				<label>Confirm Password</label>
				                  				<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter Your Name">
				                  				<?php echo form_error('cpassword',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group col-md-4">
				                  				<label>Image</label>
				                  				<input type="file" name="image" id="image" class="form-control" onchange="return fileValidation()">
				                  				<script type="text/javascript">
				                  					function fileValidation(){
													    var fileInput = document.getElementById('image');
													    var filePath = fileInput.value;
													    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
													    if(!allowedExtensions.exec(filePath)){
													        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
													        fileInput.value = '';
													        return false;
													    }else{
													        return true;
													    }
													}
				                  				</script>
				                  			</div>
				                  			<div class="form-group col-md-4">
				                  				<label>Work Category</label>
				                  				<select class="form-control" name="work" id="work">
				                  					<option value="">Select</option>
				                  					<?php 
				                  						foreach ($categories as $Maincat) {
				                  						?>
															<option value="<?php echo $Maincat->category_name;?>"><?php echo $Maincat->category_name;?></option>
				                  						<?php
				                  						}
				                  					?>
				                  				</select>
				                  				<?php echo form_error('work',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group col-md-4">
				                  				<label>Status</label>
				                  				<select class="form-control" name="status" id="status">
				                  					<option value="">Select</option>
				                  					<option value="1">Active</option>
				                  					<option value="0">In Active</option>
				                  				</select>
				                  				<?php echo form_error('status',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group  col-md-6">
				                  				<label>Description</label>
				                  				<textarea class="form-control textarea" name="description" id="description" placeholder="Description" rows="6"></textarea>
				                  				<?php echo form_error('description',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group col-md-6">
				                  				<label>Address</label>
				                  				<textarea class="form-control textarea" name="address" id="address" placeholder="Description" rows="6"></textarea>
				                  				<?php echo form_error('address',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			
				                  			
				                  				
				                  	</div>
				                </div>
				                <div class="card-footer">
				                  	<button type="submit" class="btn btn-primary">Add Worker</button>
				                </div>
				            </form>
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
	<script src="<?= base_url('assets/panel_assets/plugins/select2/js/select2.full.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/demo.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/summernote/summernote-bs4.min.js');?>"></script>
	<script type="text/javascript">
		 $(function () {
		    $('#parent').select2({
		      theme: 'bootstrap4'
		    });
		    $('.textarea').summernote();
		  });
	</script>
</body>
</html>