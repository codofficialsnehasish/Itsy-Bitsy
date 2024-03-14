<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Dristributor</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('dristributor/')?>">Dristributor</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dristributor</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('dristributor/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/dristributor/update-process', 'class="custom-validation"');?>
            <input type="hidden" name="user_id" value="<?= $item->id?>" />
         <div class="row">
           
            <!-- end col -->
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">Dristributor Details</div>
                  <div class="card-body">
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">ID</label>
                     <div class="col-sm-9">
                     <?= $item->user_id;?>
                     </div>
                  </div> 
                  <div class="row mb-3">
                     <label for="example-text-input" class="col-sm-3 col-form-label">Status</label>
                     <div class="col-sm-9">
                        <?= check_status($item->status);?>
                     </div>
                  </div>
                  <!-- <div class="row mb-3">
                     <label for="example-text-input" class="col-sm-3 col-form-label">Membership Plan</label>
                     <div class="col-sm-9">
                        <button type="button" class="btn btn-info waves-effect waves-light"><?= select_value_by_id('membership_plan','id',$item->plan_id,'title');?></button>
                     </div>
                  </div> -->
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Registered By</label>
                     <div  class="col-sm-9">
                        <?php $registeredType=explode('_',$item->user_type);?>
                        <?= ucfirst($registeredType[0]);?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Full Name</label>
                     <div  class="col-sm-9">
                     <?= $item->appellation.' '.$item->full_name;?>
                     </div>
                  </div> 
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Address</label>
                     <div  class="col-sm-9">
                     <?= $item->address;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Contact No.</label>
                     <div  class="col-sm-9">
                     <?= $item->phone_number;?>
                     </div>
                  </div>
                     <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Alternative Contact No.</label>
                     <div  class="col-sm-9">
                     <?= $item->alt_phone_number;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">eMail</label>
                     <div  class="col-sm-9">
                     <?= $item->email;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Pin Code</label>
                     <div  class="col-sm-9">
                     <?= formatted_pin($item->zip_code); ?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Police Station</label>
                     <div  class="col-sm-9">
                     <?= $item->police_station;?>
                     </div>
                  </div>
                 
                  <div class="row row mb-3">
                        <label  for="example-text-input" for="excol-sm-3 col-form-labelch-input" class="col-sm-3 col-form-label">Created on</label>
                        <div class="col-sm-9">
                        <?= formatted_date($item->created_at);?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                  Business Details
                    
                  </div>
                  <div class="card-body">
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Business Name</label>
                     <div  class="col-sm-9">
                     <?= $item->shop_name;?>
                     </div>
                  </div> 
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Business Address</label>
                     <div  class="col-sm-9">
                     <?= $item->shop_address;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Business Pin Code</label>
                     <div  class="col-sm-9">
                     <?= formatted_pin($item->shop_pin_code); ?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Business Police Station</label>
                     <div  class="col-sm-9">
                     <?= $item->shop_police_station;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Trade Licence No.</label>
                     <div  class="col-sm-9">
                     <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= get_image($item->trade_licence_proof);?>', title: 'Login With Google Account', w: 500, h: 600});" >
                     <?= $item->trade_licence_no;?>
                      </a>
                     </div>
                  </div>
                     
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Pan No.</label>
                     <div  class="col-sm-9">
                     <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= get_image($item->pan_proof);?>', title: 'Login With Google Account', w: 500, h: 600});" >
                     <?= $item->pan_no;?>
                      </a>
                     </div>
                  </div>
                     
                   <!-- <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Aadhar No.</label>
                     <div  class="col-sm-9">
                        <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<= get_image($item->aadhar_proof);?>', title: 'Login With Google Account', w: 500, h: 600});" >
                           <= $item->aadhar_no;?>
                        </a>
                     </div>
                     </div>
                     <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Voter Id No.</label>
                     <div  class="col-sm-9">
                     <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<= get_image($item->voter_proof);?>', title: 'Login With Google Account', w: 500, h: 600});" >
                     <= $item->voter_no;?>
                      </a>
                     </div>
                  </div> -->
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Gst No.</label>
                     <div  class="col-sm-9">
                     <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= get_image($item->gst_proof);?>', title: 'Login With Google Account', w: 500, h: 600});" >
                     <?= $item->gst_no;?>
                     </a>
                     </div>
                  </div>
                  
                  <!-- <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">MOA & AOA Proof.</label>
                     <div  class="col-sm-9">
                     <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= get_image($item->moa_aoa_proof);?>', title: 'Login With Google Account', w: 500, h: 600});" >
                     View
                     </a>
                     </div>
                  </div> -->
                  </div>
               </div>

               <div class="card">
                  <div class="card-header bg-primary text-light">Work Details</div>
                  <div class="card-body">
                     <div class="row mb-3">
                        <label  for="example-text-input" class="col-sm-3 col-form-label">Preferable Pin Code</label>
                        <div  class="col-sm-9">
                           <?php 
                              $prepin = explode(',',$item->prefarable_zip_code);
                              foreach($prepin as $pin){
                                 echo formatted_pin($pin).'&nbsp;&nbsp;,&nbsp;&nbsp;';
                              }
                           ?>
                        </div>
                     </div> 
                  </div>
               </div>
                     
               <!-- <div class="card">
                  <div class="card-header bg-primary text-light">Bank Details</div>
                  <div class="card-body">
                     <div class="row mb-3">
                        <label  for="example-text-input" class="col-sm-3 col-form-label">Bank Name</label>
                        <div  class="col-sm-9">
                        <?= $item->bank_name;?>
                        </div>
                     </div> 
                     <div class="row mb-3">
                        <label  for="example-text-input" class="col-sm-3 col-form-label">Branch Name</label>
                        <div  class="col-sm-9">
                        <?= $item->branch_name;?>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label  for="example-text-input" class="col-sm-3 col-form-label">Account No.</label>
                        <div  class="col-sm-9">
                        <?= $item->account_number;?>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label  for="example-text-input" class="col-sm-3 col-form-label">Account Holder Name</label>
                        <div  class="col-sm-9">
                        <?= $item->account_holder_name;?>
                        </div>
                     </div>
                      <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">IFSC Code</label>
                     <div  class="col-sm-9">
                     <?= $item->ifsc_code;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Cancel Check</label>
                     <div  class="col-sm-9">
                     <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= get_image($item->cancel_check);?>', title: 'Login With Google Account', w: 500, h: 600});" >
                     View
                     </a>
                     </div>
                  </div>
                  </div>
               </div> -->
                     
                     
            </div>
            <!-- end col -->
            <div class="col-lg-3">
               <div class="card">
                  <div class="card-header bg-primary text-light">Profile Picture</div>
                  <div class="card-body">
                     <div class="mb-3">
                        <img class="img-thumbnail rounded me-2" width="200" src="<?= get_image($item->user_image);?>" alt="">
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header bg-primary text-light">Status</div>
                  <div class="card-body">
                     <!-- <div class="mb-3">
                        <label  for="example-text-input" class="col-sm-6 col-form-label">Set Commission Rate</label>
                        <div  class="col-sm-6">
                           <div class="input-group">
  							         <input type="text" class="form-control" id="validationCustomUsername" name="commission_rate" aria-describedby="inputGroupPrepend" value="<?= $item->commission_rate;?>">
                              <span class="input-group-text" id="inputGroupPrepend">%</span>
						         </div>
                        </div>
                     </div>  -->
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" <?= check_uncheck($item->status,1);?>>
                           <label class="form-check-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" <?= check_uncheck($item->status,0);?>>
                           <label class="form-check-label" for="customRadioInline2">Inactive</label>
                        </div>
                     </div>
                  
                 
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save Changes
                           </button>
                           <!-- <button type="reset" class="btn btn-secondary waves-effect">
                              Cancel
                              </button> -->
                        </div>
                     </div>
                  
                 
                  </div>
               </div>
            </div>

         </div>
         <!-- end row -->
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>


                                                   
                                            
<script>
	const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;
    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title, 
      `
      scrollbars=yes,
      width=${w / systemZoom}, 
      height=${h / systemZoom}, 
      top=${top}, 
      left=${left}
      `
    )
    if (window.focus) newWindow.focus();
}
</script>