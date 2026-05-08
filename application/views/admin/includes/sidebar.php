<aside class="main-sidebar sidebar-dark-primary elevation-4">
	
	<div class="sidebar">
      	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
	        <div class="image">
	        	<?php
	        	if(!empty($adminDetails->image)){
	        	?>
	          	<img src="<?= base_url('assets/front/images/admin/'.$adminDetails->image);?>" class="img-circle elevation-2" alt="User Image">
	            <?php }else{?>
	           	<img src="<?= base_url('assets/front_assets/images/profile/admins/admin.png');?>" class="img-circle elevation-2" alt="User Image">
	            <?php }?>
	        </div>
	        <div class="info">
	         	 <a href="<?= base_url('admin/Dashboard');?>" class="d-block text-uppercase"><?php echo $adminDetails->name;?></a>
	        </div>
      	</div>

      	<nav class="mt-2">
	        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	        	<li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Dashboard' && $this->uri->segment(3) == ''){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Dashboard');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-tachometer-alt"></i>
		              <p>
		                Dashboard
		              </p>
		            </a>
		        </li>
		        <?php
		        if($adminDetails->type == 'super-admin'){
		        ?>
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'SubAdmin' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addSubAdmin' || $this->uri->segment(3) == 'editSubAdmin'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/SubAdmin');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-users"></i>
		              <p>
		                Sub Admins
		              </p>
		            </a>
		        </li>
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Booking' && $this->uri->segment(3)== ''){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Booking');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-user-check"></i>
		              <p>
		                Bookings
		              </p> 
		            </a>
		        </li>
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Package_Booking' && $this->uri->segment(3)== ''){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Package_Booking');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-user-check"></i>
		              <p>
		                Package Booking
		              </p>
		            </a>
		        </li>	
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Package_Booking' && $this->uri->segment(3)== ''){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Tourist_Place');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-user-check"></i>
		              <p>
		                Tourist Place
		              </p>
		            </a>
		        </li>	
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Category' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addCategory' || $this->uri->segment(3) == 'editCategory'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Category');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-sitemap"></i>
		              <p>
		                Categories
		              </p>
		            </a>
		        </li>
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Cars' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addCars' || $this->uri->segment(3) == 'editCars'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Cars');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-car"></i>
		              <p>
		                Cars
		              </p>
		            </a>
		        </li>
		        <?php 
		    	}
		        ?>
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Worker' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addWorker' || $this->uri->segment(3) == 'editWorker'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Worker');?>" class="nav-link <?php echo $active;?>">
		            	
		              <i class="nav-icon fas fa-tools"></i>
		              <p>
		                Workers
		              </p>
		            </a>
		        </li>
		        <?php
		        if($adminDetails->type == 'super-admin'){
		        ?>
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Coupons' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addCoupon' || $this->uri->segment(3) == 'editCoupon'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Coupons');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-gift"></i>
		              <p>
		                Coupons
		              </p>
		            </a>
		        </li> 
		       <!--   
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Plan' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addPlan' || $this->uri->segment(3) == 'editPlan'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Plan');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-rupee-sign"></i>
		              <p>
		                Price Plans
		              </p>
		            </a>
		        </li> -->
		        
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Menus' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addMenu' || $this->uri->segment(3) == 'editMenu'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Menus');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-sitemap"></i>
		              <p>
		                Menus
		              </p>
		            </a>
		        </li>	
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Pages' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addPage' || $this->uri->segment(3) == 'editPage'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Pages');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-file-alt"></i>
		              <p>
		                Pages
		              </p>
		            </a>
		        </li>	
		        <li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'Slider' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addSlider' || $this->uri->segment(3) == 'editSlider'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/Slider');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-file-alt"></i>
		              <p>
		                Slider
		              </p>
		            </a>
		        </li>	
		        
		   		<?php
		   		}
		   		?>
		   		<li class="nav-item">
	        		<?php 
	        		if($this->uri->segment(2) == 'EmailTemplate' && $this->uri->segment(3)== '' || $this->uri->segment(3)== 'addTemplate' || $this->uri->segment(3) == 'editTemplate'){
	        			$active = "active";
	        		}else{
	        			$active = "";
	        		}
	        		?>
		            <a href="<?= base_url('admin/EmailTemplate');?>" class="nav-link <?php echo $active;?>">
		              <i class="nav-icon fas fa-sitemap"></i>
		              <p>
		                Email Template
		              </p>
		            </a>
		        </li>	
		        <li class="nav-item">
	        		<?php 
	        		 if($this->uri->segment(2) == 'Dashboard'&& $this->uri->segment(3) == 'sitesettings' || $this->uri->segment(3) == 'settings' || $this->uri->segment(3) == 'changePassword'){
	        			$tree = "has-treeview menu-open";
	        			$active = "active";
	        		}else{
	        			$tree = "";
	        			$active = "";
	        		}
	        		?>
	        		<li class="nav-item <?php echo $tree;?>">
			            <a href="#" class="nav-link <?php echo $tree." ".$active;?>">
			              	<i class="nav-icon fas fa-users"></i>
				            <p>
				                Settings
				                <i class="right fas fa-angle-left"></i>
				            </p>
			            </a>
			            <ul class="nav nav-treeview">
			            	<?php
					        if($adminDetails->type == 'super-admin'){
					        ?>
			              	<li class="nav-item">
			              		<?php
			              		if($this->uri->segment(2) == 'Dashboard' && $this->uri->segment(3) == 'sitesettings'){
			              			$active = 'active';
			              		}else{
			              			$active = '';
			              		}
			              		?>
				                <a href="<?= base_url('admin/Dashboard/sitesettings');?>" class="nav-link <?php echo $active;?>">
					              <i class="nav-icon fas fa-globe"></i>
					              <p>
					                Site Settings
					              </p>
					            </a>
			              	</li>
			              	<?php 
			              	}
			              	?>
			              	<li class="nav-item">
			              		<?php
			              		if($this->uri->segment(2) == 'Dashboard' && $this->uri->segment(3) == 'settings'){
			              			$active = 'active';
			              		}else{
			              			$active = '';
			              		}
			              		?>
				                <a href="<?= base_url('admin/Dashboard/settings');?>" class="nav-link <?php echo $active;?>">
					              <i class="nav-icon fas fa-user-cog"></i>
					              <p>
					                Profile Settings
					              </p>
					            </a>
			              	</li>
			              	<li class="nav-item">
			              		<?php
			              		if($this->uri->segment(2) == 'Dashboard' && $this->uri->segment(3) == 'changePassword'){
			              			$active = 'active';
			              		}else{
			              			$active = '';
			              		}
			              		?>
				                <a href="<?= base_url('admin/Dashboard/changePassword');?>" class="nav-link <?php echo $active;?>">
					              <i class="nav-icon fas fa-lock"></i>
					              <p>
					                Change Password
					              </p>
					            </a>
			              	</li>
			            </ul>
		          	</li>
		            
		        </li>		        
	        </ul>
      	</nav>
    </div>
</aside>