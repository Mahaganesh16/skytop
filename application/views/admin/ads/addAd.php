<!DOCTYPE html>
<html>
<head>
	<title>Add Ad | Admin</title>
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
		.error{color:red;}
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
			            <h1 class="m-0 text-dark">Add Category</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Advertisements/adbySeller/'.$sellerDet->id);?>">Ads</a></li>
			              <li class="breadcrumb-item active">Add Ad</li>
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
				                <h3 class="card-title">Add Ad</h3>
				            </div>
				            <form role="form" method="POST" action="<?= base_url('admin/Advertisements/addAd/'.$sellerDet->id);?>"  enctype="multipart/form-data">
				                <div class="card-body">
				                  	<div class="row">
				                  		<div class="col-md-5">
				                  			<div class="form-group">
				                  				 <label>Main Category</label>
                                    			<select class="form-control selectbox" id="mainCategory" name="mainCategory">
		                                        <option value="">Select a category</option>
		                                        <?php
		                                        if(!empty($mainCategories)){
		                                            foreach ($mainCategories as $cat) {
		                                                ?>
		                                                <option value="<?php echo $cat->id;?>"><?php echo $cat->category_name;?></option>
		                                                <?php
		                                            }
		                                        }
		                                        ?>
			                                    </select>
			                                    <?php echo form_error('mainCategory', '<p class="error">', '</p>'); ?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Sub Category</label>
			                                    <div class="input-icon">
			                                        <select class="form-control selectbox" id="subCategory" name="subCategory">
			                                                <option value="">Select Category</option>
			                                            </select>
			                                        <?php echo form_error('subCategory', '<p class="error">', '</p>'); ?>
			                                    </div>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Ad Name</label>
				                  				<input type="text" name="ad_name" id="ad_name" class="form-control"placeholder="Enter Name">
				                  				<?php echo form_error('ad_name',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Ad Validity</label>
				                  				<select name="ad_validity" id="ad_validity" class="form-control selectbox">
				                  					<option value="">Select validity</option>
				                  					<?php
				                  					$CI = &get_instance();
				                  					$CI->load->model('AdminDashboard_Model');
				                  					$sellerDet = $this->AdminDashboard_Model->getSellerDet($CI->uri->segment(4));
				                  					$planDet = $this->AdminDashboard_Model->getPlanDet($sellerDet->plan);
				                  					if($planDet->id == '2'){
				                  					?>
				                  					<option value="permanent">Permanent Validity</option>
				                  					<?php
				                  					}
				                  					?>
				                  					<?php
				                  					for ($i=1; $i <= 31; $i++) { 
				                  						?>
				                  						<option value="<?php echo $i;?>"><?php echo $i." Day"?></option>
				                  						<?php
				                  					}
				                  					?>
				                  				</select>
				                  				<?php echo form_error('ad_validity',"<div style='color:red'>","</div>");?>
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
				                  			</div>
				                  		</div>
				                  		<div class="col-md-7">
				                  			<div class="form-group">
				                  				<label>Coupon Name</label>
				                  				<input type="text" name="coupon_name" id="coupon_name" class="form-control"placeholder="Coupon Name">
				                  				<?php echo form_error('coupon_name',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Coupon Code</label>
				                  				<?php
				                  				$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
												$res = "";
												for ($i = 0; $i < 8; $i++) {
												    $res .= $chars[mt_rand(0, strlen($chars)-1)];
												}
				                  				?>
				                  				<input type="text" name="coupon_code" id="coupon_code" class="form-control"placeholder="Enter Couponcode" readonly value="<?php echo $res;?>">
				                  				<?php echo form_error('coupon_code',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Percentage</label>
				                  				<input type="text" name="percentage" id="percentage" class="form-control"placeholder="Enter Percentage">
				                  				<?php echo form_error('percentage',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Validity in Days</label>
				                  				<input type="text" name="validity" id="validity" class="form-control"placeholder="Number of Days" readonly>
				                  				<?php echo form_error('validity',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Status</label>
				                  				<select class="form-control" name="status" id="status">
				                  					<option value="">Select</option>
				                  					<option value="1">Active</option>
				                  					<option value="0">In Active</option>
				                  				</select>
				                  				<?php echo form_error('status',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  		</div>
				                  		<div class="col-md-12">
				                  			<div class="form-group">
				                  				<label>Address</label>
				                  				<textarea class="form-control" name="address" id="address" placeholder="Address" rows="6"></textarea>
				                  				<?php echo form_error('address',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  		</div>
				                  		<div class="col-md-12">
				                  			<div class="form-group">
				                  				<label>Description</label>
				                  				<textarea class="form-control textarea" name="description" id="description" placeholder="Description" rows="6"></textarea>
				                  				<?php echo form_error('description',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  		</div>
				                  	</div>
				                </div>
				                <div class="card-footer">
				                  	<button type="submit" class="btn btn-primary">Add Ad</button>
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
	<script src="<?= base_url('assets/front_assets/js/custom.js');?>"></script>
	<script type="text/javascript">
		 $(function () {
		    $('.selectbox').select2({
		      theme: 'bootstrap4'
		    });
		    $('.textarea').summernote();
		  });
		 $('#ad_validity').change(function(){
				var ad_validity = $("#ad_validity option:selected").val();
				$("#validity").val(ad_validity);
			});

	</script>

</body>
</html>