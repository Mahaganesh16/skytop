<!DOCTYPE html>
<html>
<head>
	<title>Edit Testimonial | Admin</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/select2/css/select2.min.css');?>">
  	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
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
			            <h1 class="m-0 text-dark">Edit Testimonial</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Testimonials');?>">Testimonials</a></li>
			              <li class="breadcrumb-item active">Edit Testimonial</li>
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
							<div class="col-md-12">
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
							<div class="col-md-12">
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
				                <h3 class="card-title">Edit Testmonial</h3>
				            </div>
				            <form role="form" method="POST" action="<?= base_url('admin/Testimonials/editTestimonial/'.$testimonialDet->id);?>" enctype="multipart/form-data">
				                <div class="card-body">
				                  	<div class="row">
				                  		<div class="col-md-6">
				                  			<div class="form-group">
				                  				<label>Name</label>
				                  				<input type="text" name="name" id="name" class="form-control"placeholder="Enter Name" value="<?php echo $testimonialDet->name;?>">
				                  				<?php echo form_error('name',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Designation</label>
				                  				<input type="text" name="designation" id="designation" class="form-control"placeholder="Enter Designation" value="<?php echo $testimonialDet->designation;?>">
				                  				<?php echo form_error('designation',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Company Name</label>
				                  				<input type="text" name="company" id="company" class="form-control" placeholder="Enter Company Name" value="<?php echo $testimonialDet->company;?>">
				                  				<?php echo form_error('company',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
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
				                  				<?php
				                  				if(!empty($testimonialDet->image)){
				                  				?>
				                  				<br>
				                  				<img src="<?= base_url('assets/front_assets/images/testimonials/'.$testimonialDet->image);?>" width="100px">
				                  				|
				                  				<a href="<?= base_url('admin/Testimonials/deleteTestimonialImage/'.$testimonialDet->id);?>">
				                  					<i class="fa fa-trash"></i>
				                  					Delete
				                  				</a>
				                  				<?php
				                  				}
				                  				?>
				                  			</div>
				                  		</div>
				                  		<div class="col-md-6">
				                  			<div class="form-group">
				                  				<label>Rating</label>
				                  				<select class="form-control" id="rating" name="rating">
				                  					<option value="">Select</option>
				                  					<?php
				                  					for ($i=1; $i<=5 ; $i++) { 
				                  					?>
				                  					<option value="<?php echo $i;?>" <?php if($i == $testimonialDet->rating) echo "selected";?>><?php echo $i;?></option>
				                  					<?php
				                  					}
				                  					?>
				                  				</select>
				                  				<?php echo form_error('rating',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Review</label>
				                  				<textarea class="form-control" name="review" id="review" placeholder="Review" rows="6"><?php echo $testimonialDet->review;?></textarea>
				                  				<?php echo form_error('review',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Status</label>
				                  				<select class="form-control" name="status" id="status">
				                  					<option value="">Select</option>
				                  					<option value="1" <?php if($testimonialDet->status == '1') echo "selected";?>>Active</option>
				                  					<option value="0" <?php if($testimonialDet->status == '0') echo "selected";?>>In Active</option>
				                  				</select>
				                  				<?php echo form_error('status',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  		</div>
				                  	</div>
				                </div>
				                <div class="card-footer">
				                  	<button type="submit" class="btn btn-primary">Update Testimonial</button>
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
	<script type="text/javascript">
		 $(function () {
		 	$('.select2').select2({
		      theme: 'bootstrap4'
		    });

		    $("#menu").keyup(function(){
			    var Text = $(this).val();
			    Text = Text.toLowerCase();
			    Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
			    $("#slug").val(Text);        
			});
		  });
	</script>
</body>
</html>