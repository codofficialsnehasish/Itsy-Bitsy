<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php //$this->load->view('auth/buyer/_profileImage');?>
<div class="card mt-4 mb-4 ">

	 <div class="card-header">Profile</div>
		<div class="card-body">
		
			<ul class="nav flex-column bg-light h-100 dashboard-list" role="tablist">
				<li><a class="nav-link"  href="<?= base_url("my-dashboard"); ?>">Dashboard</a></li>
				<li><a class="nav-link <?= ($active_tab == 'active_orders') ? 'active' : ''; ?>"  href="<?= base_url("orders"); ?>">Active Orders</a></li>
				<li><a class="nav-link <?= ($active_tab == 'completed_orders') ? 'active' : ''; ?>"  href="<?= base_url("order/completed-orders"); ?>">Completed Orders</a></li>
				<li><a class="nav-link" href="<?= admin_url('dashboard/logout')?>">logout</a></li>
			</ul>

		</div>
</div>