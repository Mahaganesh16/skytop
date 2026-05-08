<!DOCTYPE html>
<html>
<head>
	<title><?php echo $sellerDet->seller_name;?>'Detail | Admin</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/ekko-lightbox/ekko-lightbox.css');?>">
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
			            <h1 class="m-0 text-dark"><?php echo $sellerDet->seller_name;?>'Detail</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Seller');?>">Sellers</a></li>
			              <li class="breadcrumb-item active"><?php echo $sellerDet->seller_name;?>'Detail</li>
			            </ol>
			        </div>
		        </div>
	      	</div>
	    </div>
	    <section class="content">
      		<div class="container-fluid">
    			<div class="row">
          			<div class="col-md-3">
			            <div class="card card-primary card-outline">
				            <div class="card-body box-profile">
				                <div class="text-center">
				                  	<img class="profile-user-img img-fluid img-circle"	src="<?= base_url('assets/front_assets/images/storeImages/seller_icon.png');?>" alt="Seller profile picture">
				                </div>

				                <h3 class="profile-username text-center"><?php echo $sellerDet->seller_name;?></h3>

				                <p class="text-muted text-center"><?php echo $sellerDet->store_name;?></p>

				            </div>
			            </div>

			            <div class="card card-primary">
				            <div class="card-header">
				                <h3 class="card-title">About Seller</h3>
				            </div>
				            <div class="card-body">
				                <strong><i class="fas fa-phone-alt mr-1"></i> Seller Mobile Number</strong>

				                <p class="text-muted">
				                	<a href="tel:<?php echo $sellerDet->seller_mobile;?>"><?php echo $sellerDet->seller_mobile;?></a>
				                </p>

				                <hr>

				                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

				                <p class="text-muted">
				                	<a href="mailto:<?php echo $sellerDet->seller_email;?>"><?php echo $sellerDet->seller_email;?></a>
				                </p>
				            </div>
			            </div>
          			</div>
			        <div class="col-md-9">
			            <div class="card">
			              	<div class="card-header p-2">
			                	<ul class="nav nav-pills">
			                  		<li class="nav-item"><a class="nav-link active" href="#store" data-toggle="tab">Store Details</a></li>
			                  		<li class="nav-item"><a class="nav-link" href="#ads" data-toggle="tab">Advertisements</a></li>
			               		</ul>
			              	</div>
			              	<div class="card-body">
			                	<div class="tab-content">
			                  		<div class="active tab-pane" id="store">
			                    		<table class="table stripepd">
			                    			<tr>
			                    				<th>Store Name</th>
			                    				<td><?php echo $sellerDet->store_name;?></td>
			                    			</tr>
			                    			<tr>
			                    				<th>Store Mobile</th>
			                    				<td><a href="tel:<?php echo $sellerDet->store_mobile;?>"><?php echo $sellerDet->store_mobile;?></a></td>
			                    			</tr>
			                    			<tr>
			                    				<th>Store Email</th>
			                    				<td><a href="mailto:<?php echo $sellerDet->store_email;?>"><?php echo $sellerDet->store_email;?></a></td>
			                    			</tr>
			                    			<tr>
			                    				<th>Store Address</th>
			                    				<td>
			                    					<?php echo $sellerDet->store_address;?>
			                    				</td>
			                    			</tr>
			                    			<tr>
			                    				<th>Store Zipcode</th>
			                    				<td>
			                    					<?php echo $sellerDet->zipcode;?>
			                    				</td>
			                    			</tr>
			                    		</table>
			                    		<br>
			                    		<h4>Store Images</h4>
                    					<br>
                    					<div class="row">
                    						<?php
                    						if(!empty($sellerDet->storeImages)){
                    							$images = explode(',', $sellerDet->storeImages);
                    							for ($i=0; $i < count($images); $i++) { 
                    								?>
                    								 <div class="col-sm-4">
									                    <a href="<?= base_url('assets/front_assets/images/storeImages/'.$images[$i]);?>" data-toggle="lightbox" data-title="<?php echo $sellerDet->store_name;?>" data-gallery="gallery">
									                      <img src="<?= base_url('assets/front_assets/images/storeImages/'.$images[$i]);?>" class="img-fluid mb-2" alt="<?php echo $sellerDet->store_name;?>"/>
									                    </a>
									                </div>
                    								<?php
                    							}
                    						}
                    						?>
							               
							            </div>
			                  		</div>
			                  		<div class="tab-pane" id="ads">
			                  			<h4>Advertisements</h4>
			                  		</div>
		                		</div>
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
	<script src="<?= base_url('assets/panel_assets/plugins/ekko-lightbox/ekko-lightbox.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/adminlte.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/demo.js');?>"></script>
	<script>
	  $(function () {
	    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
	      event.preventDefault();
	      $(this).ekkoLightbox({
	        alwaysShowClose: true
	      });
	    });
	  })
	</script>
</body>
</html>