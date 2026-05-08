<!DOCTYPE html>
<html>
<head>
	<title>Edit Coupon | Admin</title>
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
			            <h1 class="m-0 text-dark">Edit Coupon</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Coupons');?>">Coupons</a></li>
			              <li class="breadcrumb-item active">Edit Coupon</li>
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
				                <h3 class="card-title">Edit Coupon</h3>
				            </div>
				            <form role="form" method="POST" action="<?= base_url('admin/Coupons/editCoupon/'.$couponDet->id);?>"  enctype="multipart/form-data">
				                <div class="card-body">
				                  	<div class="row">
				                  		<div class="col-md-5">
				                  			
				                  			<div class="form-group">
				                  				<label>Coupon Name</label>
				                  				<input type="text" name="coupon_name" id="coupon_name" class="form-control"placeholder="Coupon Name" value="<?php echo $couponDet->coupon_name;?>">
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
				                  				<input type="text" name="coupon_code" id="coupon_code" class="form-control"placeholder="Enter Couponcode" readonly value="<?php if(!empty($couponDet->coupon_code)){ echo $couponDet->coupon_code; }else{ echo $res; }?>">
				                  				<?php echo form_error('coupon_code',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Percentage</label>
				                  				<input type="text" name="percentage" id="percentage" class="form-control"placeholder="Enter Percentage" value="<?php echo $couponDet->percentage;?>">
				                  				<?php echo form_error('percentage',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Validity</label>
				                  				<input type="text" name="validity" id="validity" class="form-control"placeholder="Number of Days" value="<?php echo $couponDet->validity;?>">
				                  				<?php echo form_error('validity',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  			<div class="form-group">
				                  				<label>Status</label>
				                  				<select class="form-control" name="status" id="status">
				                  					<option value="">Select</option>
				                  					<option value="1" <?php if($couponDet->status == '1') echo "selected";?>>Active</option>
				                  					<option value="0" <?php if($couponDet->status == '0') echo "selected";?>>In Active</option>
				                  				</select>
				                  				<?php echo form_error('status',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  		</div>
				                  		<div class="col-md-7">
				                  			<div class="form-group">
				                  				<label>Description</label>
				                  				<textarea class="form-control textarea" name="description" id="description" placeholder="Description" rows="6"><?php echo htmlspecialchars_decode($couponDet->description);?></textarea>
				                  				<?php echo form_error('description',"<div style='color:red'>","</div>");?>
				                  			</div>
				                  		</div>
				                  	</div>
				                </div>
				                <div class="card-footer">
				                  	<button type="submit" class="btn btn-primary">Update Coupon</button>
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