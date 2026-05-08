<!DOCTYPE html>
<html>
<head>
	<title>Add Plan | Admin</title>
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
			            <h1 class="m-0 text-dark">Add Plan</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Plan');?>">Plans</a></li>
			              <li class="breadcrumb-item active">Add Plan</li>
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
	          			<div class="col-md-6">
				            <div class="card card-primary">
					            <div class="card-header">
					                <h3 class="card-title">Add Plan</h3>
					            </div>
					            <form role="form" method="POST" action="<?= base_url('admin/Plan/addPlan');?>">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label>Plan Name</label>
					                    	<input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="Plan Name">
					                    	<?php echo form_error('plan_name',"<div style='color:red'>","</div>");?>
						                </div>
						                <div class="form-group row">
						                	<div class="col-md-6">
						                    	<label>Number of</label>
						                    	<input type="number" class="form-control" id="validity" name="validity" placeholder="Number of Days/Week/Months/Year">
						                    	<?php echo form_error('validity',"<div style='color:red'>","</div>");?>
						                    </div>
						                    <div class="col-md-6">
						                    	<label>validitiy</label>
						                    	<select class="form-control" required name="validity1" id="validity1">
						                    		<option value="">Select</option>
						                    		<option value="Day">Day</option>
						                    		<option value="Weekly">Weekly</option>
						                    		<option value="Monthly">Monthly</option>
						                    		<option value="Yearly">Yearly</option>
						                    	</select>
						                    </div>
					                  	</div>
					                  	<div class="form-group">
					                    	<label>Amount</label>
					                    	<input type="text" class="form-control" id="amount" name="amount" placeholder="Plan Amount">
					                    	<?php echo form_error('amount',"<div style='color:red'>","</div>");?>
						                </div>
					                  	<div class="form-group">
					                    	<label>Description</label>
					                    	<textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
					                    	<?php echo form_error('description',"<div style='color:red'>","</div>");?>
					                  	</div>
					                  	<div class="form-group">
					                    	<label>Status</label>
					                    	<select class="form-control" id="status" name="status">
					                    		<option value="">Select</option>
					                    		<option value="1">Active</option>
					                    		<option value="0">In Active</option>
					                    	</select> 
					                    	<?php echo form_error('status',"<div style='color:red'>","</div>");?>
					                  	</div>
					                </div>
					                <div class="card-footer">
					                  	<button type="submit" class="btn btn-primary">Add Plan</button>
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