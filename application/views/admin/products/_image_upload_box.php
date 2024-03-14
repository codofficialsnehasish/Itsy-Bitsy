<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/libs/file-uploader/css/jquery.dm-uploader.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/libs/file-uploader/css/styles.css"/>

<div class="dm-uploader-container">
    <div id="drag-and-drop-zone" class="dm-uploader text-center">
        <p class="dm-upload-icon">
            <i class="icon-upload"></i>
        </p>
        <p class="dm-upload-text">Drop files here or click to upload.&nbsp;<span style="text-decoration: underline">Browse</span></p>

        <a class='btn btn-md dm-btn-select-files'>
            <input type="file" name="file" size="40" multiple="multiple">
        </a>

        <ul class="dm-uploaded-files" id="files-image">
            <?php if (!empty($product_images)):
                foreach ($product_images as $image):?>
                    <li class="media" id="uploaderFile<?php echo $image->file_id; ?>">
                        <img src="<?= base_url($image->file_path.$image->file_name); ?>" alt="">
                        <a href="javascript:void(0)" class="btn-img-delete btn-delete-product-img" data-file-id="<?= $image->file_id; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item">
                            <i class="ti-close"></i>
                        </a>
                        <?php if ($image->is_main == 1): ?>
                            <a href="javascript:void(0)" class="float-start btn btn-primary btn-sm waves-effect btn-set-image-main" style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;">Main</a>
                        <?php else: ?>
                            <a href="javascript:void(0)" class="float-start btn btn-secondary btn-sm waves-effect btn-set-image-main" style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;" data-file-id="<?php echo $image->file_id; ?>">Main</a>
                        <?php endif; ?>
                    </li>
                <?php endforeach;
            endif; ?>
        </ul>

        <div class="error-message-img-upload"></div>

    </div>
</div>

<p class="images-exp"><i class="ti-info"></i>Products with good and clear images are sold faster! (Max 4 Images) - Image Size: (1200px X 1200px)</p>
            