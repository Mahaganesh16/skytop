<!DOCTYPE html>
<html>
<head>
	<title>Add Slider | Admin</title>
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
			height: 220px !important;
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
			            <h1 class="m-0 text-dark">Add Slider</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item active">Add Slider</li>
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
				    	if(!empty($error)){
				    	?>
				    	<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  	<?php echo $error['error'];?>
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
				                <h3 class="card-title">Add Slider</h3>
				            </div>
				            <form role="form" method="POST" action="<?= base_url('admin/Slider/addSlider');?>" enctype="multipart/form-data">
				                <div class="card-body">
				                	<div class="row">
				                		<div class="col-md-6">
						                  	<div class="form-group">
						                    	<label>Title</label>
						                    	<input type="text" class="form-control" id="title" name="title" placeholder="Slider Name">
						                    	<?php echo form_error('title',"<div style='color:red'>","</div>");?>
						                  	</div>
						                  	<div class="form-group">
						                    	<label>Slug</label>
						                    	<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" readonly>
						                    	<?php echo form_error('slug',"<div style='color:red'>","</div>");?>
						                  	</div>
						                  	<div class="form-group">
						                    	<label>Banner Image</label>
						                    	<input type="file" class="form-control" id="image" name="image" onchange="return fileValidation()">
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
						                <div class="col-md-6">

						                	<div class="form-group">
						                    	<label>Button Text</label>
						                    	<input type="text" class="form-control" id="btn_txt" name="btn_txt" placeholder="Slider Name">
						                    	<?php echo form_error('btn_txt',"<div style='color:red'>","</div>");?>
						                  	</div>

						                  	<div class="form-group">
						                    	<label>Button Link</label>
						                    	<input type="text" class="form-control" id="btn_link" name="btn_link" placeholder="Slider Name">
						                    	<?php echo form_error('btn_link',"<div style='color:red'>","</div>");?>
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
						                <div class="col-md-12">
						                	<div class="form-group">
						                		<label>Page Content</label>
						                		<textarea class="textarea form-control" name="description" id="description" placeholder="Page Content"></textarea>
						                		<?php echo form_error('description',"<div style='color:red'>","</div>");?>
						                	</div>
						                </div>
					                </div>
				                </div>
				                <div class="card-footer">
				                  	<button type="submit" class="btn btn-primary">Add Page</button>
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
		    $("#title").keyup(function(){
			    var Text = $(this).val();
			    Text = Text.toLowerCase();
			    Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
			    $("#slug").val(Text);        
			});
		  });
	</script>
</body>
</html>