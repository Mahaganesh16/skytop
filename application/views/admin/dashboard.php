<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | Admin</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
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
			            <h1 class="m-0 text-dark">Dashboard</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="#">Home</a></li>
			              <li class="breadcrumb-item active">Dashboard v1</li>
			            </ol>
			        </div>
		        </div>
	      	</div>
	    </div>
	    <section class="content">
      		<div class="container-fluid">
    			<div class="row">
          		<!--	<div class="col-lg-3 col-6">
            			<div class="small-box bg-info">
              				<div class="inner">
                				<h3>150</h3>
                				<p>New Orders</p>
              				</div>
				            <div class="icon">
				                <i class="ion ion-bag"></i>
				            </div>
              				<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            			</div>
          			</div>
			        <div class="col-lg-3 col-6">
			            <div class="small-box bg-success">
				            <div class="inner">
				                <h3>53<sup style="font-size: 20px">%</sup></h3>

				                <p>Bounce Rate</p>
				            </div>
				            <div class="icon">
				                <i class="ion ion-stats-bars"></i>
				            </div>
				           	<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			            </div>
			        </div>
		          	<div class="col-lg-3 col-6">
			            <div class="small-box bg-warning">
			              	<div class="inner">
				                <h3>44</h3>

				                <p>User Registrations</p>
			              	</div>
			              	<div class="icon">
			                	<i class="ion ion-person-add"></i>
			              	</div>
			              	<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			            </div>
		          	</div>
			        <div class="col-lg-3 col-6">
			            <div class="small-box bg-danger">
			              	<div class="inner">
			                	<h3>65</h3>

			                	<p>Unique Visitors</p>
			              	</div>
			              	<div class="icon">
			                	<i class="ion ion-pie-graph"></i>
			              	</div>
			              	<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			            </div>
			        </div>-->
			    </div>
			</div>
		</section>
		<section class="content">
      		<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        	<div class="row">
          
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $workers;?><sup style="font-size: 20px"></sup></h3>

                <p>Worker's</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $user;?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $subadmin;?></h3>

                <p>Sub Admin's</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
       		 </div>
        
     	 </div>
    </section>

    <section class="content">
      		<div class="container-fluid">
      			<div class="col-sm-6">
		<h1 class="m-0 text-dark">Booking's</h1>
	</div>
        <!-- Small boxes (Stat box) -->
        	<div class="row">
          
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $cancelBooking;?><sup style="font-size: 20px"></sup></h3>

                <p>Cancel Booking</p>
              </div>
              <div class="icon">
               <i class="fas fa-phone-slash"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $pending;?></h3>

                <p>Booking's Pending</p>
              </div>
              <div class="icon">
               <i class="fas fa-stopwatch"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $completeBooking;?></h3>

                <p>Booking Complete</p>
              </div>
              <div class="icon">
                <i class="far fa-check-circle"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
       		 </div>
        
     	 </div>
    </section>
    <section class="content">
        <div class="container-fluid">
          <div class="col-sm-6">

            <h1 class="m-0 text-dark">Top Rater's</h1>
          </div>
        <div class="card-body">                  
          <table id="menus" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>Rating</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($Allworkers)){
                  $count = 1;
                  foreach ($Allworkers as $Topraters) 
                  {
                  ?>
                  <tr>
                    <td><?php echo $count;?></td>
                    <td>
                     <?php echo $Topraters->name;?>
                    </td>
                    <td><?php echo $Topraters->mobile;?>
                    </td>
                    <td><?php echo $Topraters->email;?>
                    </td>
                    <td>
                      <?php
                      $CI =& get_instance();
                        $CI->load->model('work/WorkerDashboard_Model');
                      $ratings= $CI->WorkerDashboard_Model->GetRatings($Topraters->id);  
                      if(!empty($ratings))
                      {
                        echo $ratings->stars;
                      }else{
                        echo "0";
                      }
                      ?>           
                    </td>
                   
                  </tr>
              <?php 
              $count++;
              }
            }else{
              ?>
              <tr>
                <td>No Top Rater Found</td>
              </tr>
              <?php
            }?>
              </tbody>
          </table>                      
      </div>
    </div>
  </section>

  



  	</div>
  	<?php include APPPATH.'views/admin/includes/footer.php';?>

	<script src="<?= base_url('assets/panel_assets/plugins/jquery/jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?= base_url('assets/panel_assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?= base_url('assets/panel_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
  <script src="<?= base_url('assets/panel_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
  <script src="<?= base_url('assets/panel_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/adminlte.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/demo.js');?>"></script>
  <script type="text/javascript">
    $(function () {
        $("#menus").DataTable();
    });
  </script>

</body>
</html>