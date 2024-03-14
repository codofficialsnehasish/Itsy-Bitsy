<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Target</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('sales-target')?>">Target</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Target</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('sales-target/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/sales-target/update-process/'.$item->id, 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Edit Target
                  </div>
                  <div class="card-body">
                  <div class="row mb-3">
                        <label for="example-month-input" class="col-sm-2 col-form-label">Month</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="month" name="month" value="<?= $item->month; ?>" id="example-month-input">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Date Range</label>
                        <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                           <input type="text" class="form-control" name="start_date" value="<?= $item->start_date; ?>" placeholder="Start Date" />
                           <input type="text" class="form-control" name="end_date" value="<?= $item->end_date; ?>" placeholder="End Date" />
                        </div>
                     </div>
                     <div  class="mb-3">
                        <label class="form-label">Choose Salesman</label>
                        <select class="form-control select2" name="salesman">
                            <optgroup label="Distributer">
                              <?php foreach($dristributer as $d){ ?>
                                <option value="<?= $d->id ?>" <?= $item->salesman_id==$d->id?'selected':'';?>><?= $d->full_name ?></option>
                              <?php } ?>
                            </optgroup>
                            <optgroup label="Teamleader">
                            <?php foreach($teamleader as $t){ ?>
                                <option value="<?= $t->id ?>" <?= $item->salesman_id==$d->id?'selected':'';?>><?= $t->full_name ?></option>
                              <?php } ?>
                            </optgroup>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label class="form-label" id="tamo">Target Amount</label>
                        <div>
                           <input data-parsley-type="number" type="number" value="<?= $item->terget_amount; ?>" class="form-control" required placeholder="Enter Amount" name="terget_amount" id="tamo">
                        </div>
                     </div>
                     <?php
                        $ppduct = explode(",",$item->perticilar_product);
                     ?>
                     <div  class="mb-3">
                        <label class="form-label">Perticular Product</label>
                        <select class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ..." name="perticilar_product">
                           <?php foreach($products as $p){ ?>
                              <option value="<?= $p->id ?>" <?= in_array($p->id,$ppduct)?'selected':'';?>><?= $p->title ?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div  class="mb-3">
                        <label class="form-label">Gift</label>
                        <select class="form-control select2" name="gift">
                           <option value="" desabled selected>Choose .....</option>
                           <?php foreach($gift as $g){ ?>
                              <option value="<?= $g->id ?>" <?= $item->gift==$g->id?'selected':'';?>><?= $g->title ?></option>
                           <?php } ?>
                        </select>
                     </div>  
                     <div class="mb-3">
                        <label class="form-label">Remarks</label>
                        <div>
                           <textarea name="massage" class="form-control editor" rows="5"><?= $item->massage; ?></textarea>
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
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" <?= check_uncheck($item->is_visible,1);?>>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0" <?= check_uncheck($item->is_visible,0);?>>
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div>
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save Changes
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