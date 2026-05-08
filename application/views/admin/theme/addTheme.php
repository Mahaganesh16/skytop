<!DOCTYPE html>
<html>
<head>
	<title>Add Theme | Pattar</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/summernote/summernote-bs4.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style type="text/css">
		 .note-editing-area{
			height: 180px !important;
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
			            <h1 class="m-0 text-dark">Add Theme</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              	<li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			               	<li class="breadcrumb-item"><a href="<?= base_url('admin/Themes');?>">Themes</a></li>
			              	<li class="breadcrumb-item active">Add Theme</li>
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
				    	if(!empty($error)){
				    	?>
				    	<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  	<?php echo $error;?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php }?>    
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
				                <h3 class="card-title">Add Theme</h3>
				            </div>
				            <form role="form" method="POST" action="<?= base_url('admin/Themes/addTheme');?>" enctype="multipart/form-data" id="addThemeForm">
				                <div class="card-body">
				                	<div class="row">
				                		<div class="col-md-6">
						                  	<div class="form-group">
					                  			<label>Theme Name</label>
						                    	<input type="text" class="form-control" id="theme_name" name="theme_name" placeholder="Theme Name">
						                    	<?php echo form_error('theme_name',"<div style='color:red'>","</div>");?>	
						                  	</div>		
						                  	<div class="form-group">
						                		<label>About Theme</label>
						                		<textarea class="textarea form-control" name="description" id="description" placeholder="About Theme"></textarea>
						                		<?php echo form_error('description',"<div style='color:red'>","</div>");?>
						                	</div>
						                </div>
						                <div class="col-md-6">
						                	<div class="form-group">
					                  			<label>Theme Slug</label>
						                    	<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" readonly>
						                    	<?php echo form_error('slug',"<div style='color:red'>","</div>");?>	
						                  	</div>		
						                	<div class="form-group">
						                  		<label>Theme Image</label>
							                    <input type="file" class="form-control" id="image" name="image">
							                    <?php echo form_error('image',"<div style='color:red'>","</div>");?>
						                  	</div>				                	
						                	<div class="form-group">
						                    	<label>Theme Files</label> (Upload All Theme Files Zip File)
						                    	<input type="file" class="form-control" id="zip" name="zip" multiple required>
							                    <?php echo form_error('zip',"<div style='color:red'>","</div>");?>
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
					                </div>
				                </div>
				                <div class="card-footer">
				                  	<button type="submit" class="btn btn-primary">Add Theme</button>
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
	<script src="<?= base_url('assets/panel_assets/dist/js/demo.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/summernote/summernote-bs4.min.js');?>"></script>
	<script type="text/javascript">
		 $(function () {
		    // Summernote
		    $('.textarea').summernote();
		    $("#theme_name").keyup(function(){
			    var Text = $(this).val();
			    Text = Text.toLowerCase();
			    Text = Text.replace(/[^a-zA-Z0-9]+/g,'_');
			    $("#slug").val(Text);        
			});
		  });
	</script>
</body>
</html>