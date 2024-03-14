<div class="card">
                  <div class="card-header bg-primary text-light">
                     Meta Options
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Title (Meta Tag)</label>
                        <div>
                           <input data-parsley-type="alphanum" type="text"
                              class="form-control" 
                              placeholder="Title (Meta Tag)" name="meta_title_tag" value="<?= $item->meta_title_tag;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Keywords (Meta Tag)</label>
                        <div>
                           <input data-parsley-type="alphanum" type="text"
                              class="form-control" 
                              placeholder="Keywords (Meta Tag)" name="meta_keywords" value="<?= $item->meta_keywords;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Description (Meta Tag)</label>
                        <div>
                           <input data-parsley-type="alphanum" type="text"
                              class="form-control" 
                              placeholder="Description (Meta Tag)" name="meta_description" value="<?= $item->meta_description;?>">
                        </div>
                     </div>
                  </div>
               </div>