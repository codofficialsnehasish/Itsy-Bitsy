<div class="page-content">
   	<div class="container-fluid">
      	<!-- start page title -->
      	<div class="page-title-box">
         	<div class="row align-items-center">
            	<div class="col-md-8">
               		<h6 class="page-title">Coupons</h6>
               		<ol class="breadcrumb m-0">
                  		<li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  		<li class="breadcrumb-item"><a href="<?= admin_url('coupons')?>">coupons</a></li>
                  		<li class="breadcrumb-item active" aria-current="page">Add new Coupons</li>
               		</ol>
            	</div>
            	<div class="col-md-4">
            	   	<div class="float-end d-none d-md-block">
            	      	<div class="dropdown">
            	         	<a href="<?= admin_url('coupons/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
            	         		<i class="fas fa-arrow-left me-2"></i> Back
            	         	</a>
            	      	</div>
            	   	</div>
            	</div>
         	</div>
      	</div>
      	<div class="row mb-5">
      		<?php $this->load->view('admin/partials/_messages');?>
      	</div>
      	<!-- end page title -->
      	<?= form_open_multipart('admin/coupons/process', 'class="custom-validation"');?>
         	<div class="row">
            	<div class="col-lg-9">
            		<div class="card">
               			<div class="card-body">
                   			<!-- Nav tabs -->
                   			<?php $this->load->view('admin/coupons/tabmenu');?>
                   			<!-- Tab panes -->
                   			<div class="tab-content">
                       			<div class="tab-pane active p-3" id="home" role="tabpanel">
                           			<div class="row">
                     					<div class="mb-3">
                     					   	<label class="form-label">Coupon Code</label>
                     					   	<div>
                     					      	<input data-parsley-type="text" id="cpcode" type="text" class="form-control" required placeholder="Coupon Code" name="cpcode">
                     					   	</div>
											<div class="pt-2">
												<button type="button" onclick="generate()" id="couponcode" class="btn btn-outline-success">Generate coupon code</button>
											</div>
                     					</div>
										<div class="mb-3">
											<label class="form-label">Description (optional)</label>
											<div>
												<textarea name="desc"  class="form-control editor" rows="1"></textarea>
											</div>
										</div>
										<!-- <div class="mb-3">
											<label class="form-label"> Description</label>
											<div>
												<textarea name="description"  class="form-control editor" rows="5"></textarea>
											</div>
										</div> -->
                                    </div> 
                                </div>
                            </div>
                        </div>
            		</div>
         		</div>
            	<!-- end col -->
				<div class="col-lg-3">
					<div class="card">
						<div class="card-header bg-primary text-light">
							Publish
						</div>
						<div class="card-body">
							<?php if($this->auth_user->role=='admin'){?>
							<div class="mb-3">
								<label class="form-label mb-3 d-flex">Visiblity</label>
								<div class="form-check form-check-inline">
									<input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
									<label class="form-check-label" for="customRadioInline1">Show</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
									<label class="form-check-label" for="customRadioInline2">Hide</label>
								</div>
							</div>
							<?php }else{?>
								<input type="hidden" name="is_visible" value="0" />
							<?php }?> 
							<div class="mb-0">
								<div>
									<button type="submit" class="btn btn-primary waves-effect waves-light me-1">
									Save & Next
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
            <!-- end col -->
         	</div>
         	<!-- end row -->
      	<?= form_close();?>
   	</div>
   	<!-- container-fluid -->
</div>

<script>
	function generate(){
		let pass = '';
		let str = 'A0B1C2D3E4F5G6H7I8J9KLMNOPQRSTUVWXYZ';
		for (let i = 1; i <= 8; i++) {
			let char = Math.floor(Math.random() * str.length + 1);
			pass += str.charAt(char)
		}

		$('#cpcode').val(pass);
		// return pass;
	}
</script>