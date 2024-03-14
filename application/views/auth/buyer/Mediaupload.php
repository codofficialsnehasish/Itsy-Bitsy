<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mediaupload {

private $_CI; // make a private class variable here. 

public function __construct()
{
    $this->_CI =& get_instance();
   // $this->_CI->load->library("OtherClass");
}

public function doUpload($file){
    if(!empty($_FILES)){
        // File upload configuration
        $basefolder='./uploads/media/';
        $year = date("Y");   
        $month = date("m");   
        $filename = $basefolder.$year;   
        $filename2 = $filename."/".$month;
        if(!file_exists($filename)){
                mkdir($filename,0777);
                fopen($filename."/index.html", "w");
            }
        
        if(!file_exists($filename2)){
                mkdir($filename2,0777);
                fopen($filename2."/index.html", "w");
            }
        
        $uploadPath = $filename2.'/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';;
        
        // Load and initialize upload library
        $this->_CI->load->library('upload', $config);
        $this->_CI->upload->initialize($config);
        
        // Upload file to the server
        if($this->_CI->upload->do_upload($file)){
            $fileData = $this->_CI->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            $uploadData['file_path'] = substr($uploadPath, 2);
            // Insert files info into the database
            return $this->_CI->insert_model->insert_data($uploadData,'media');
            // return $insert;
             
        }
    }else{
        return 0;
    }

}


public function doUploadProductImages($file,$product_id,$file_id){
    if(!empty($_FILES)){
        // File upload configuration
        $basefolder='./uploads/media/';
        $year = date("Y");   
        $month = date("m");   
        $filename = $basefolder.$year;   
        $filename2 = $filename."/".$month;
        if(!file_exists($filename)){
                mkdir($filename,0777);
                fopen($filename."/index.html", "w");
            }
        
        if(!file_exists($filename2)){
                mkdir($filename2,0777);
                fopen($filename2."/index.html", "w");
            }
        
        $uploadPath = $filename2.'/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';;
        
        // Load and initialize upload library
        $this->_CI->load->library('upload', $config);
        $this->_CI->upload->initialize($config);
        
        // Upload file to the server
        if($this->_CI->upload->do_upload($file)){
            $fileData = $this->_CI->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            $uploadData['file_path'] = substr($uploadPath, 2);
            $uploadData['product_id'] = $product_id;
            $uploadData['file_id'] = $file_id;
            
            // Insert files info into the database

          
          //  $this->_CI->insert_model->insert_data($uploadData,'');
            return $this->_CI->insert_model->insert_data($uploadData,'product_images');
            // return $insert;
             
        }
    }else{
        return 0;
    }

}


public function doUploadFile($file){
    if(!empty($_FILES)){
        // File upload configuration
        $basefolder='./uploads/media/files/';
        $year = date("Y");   
        $month = date("m");   
        $filename = $basefolder.$year;   
        $filename2 = $filename."/".$month;
        if(!file_exists($filename)){
                mkdir($filename,0777);
                fopen($filename."/index.html", "w");
            }
        
        if(!file_exists($filename2)){
                mkdir($filename2,0777);
                fopen($filename2."/index.html", "w");
            }
        
        $uploadPath = $filename2.'/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'xls|pdf|doc|docx|xlsx';;
        
        // Load and initialize upload library
        $this->_CI->load->library('upload', $config);
        $this->_CI->upload->initialize($config);
        
        // Upload file to the server
        if($this->_CI->upload->do_upload($file)){
            $fileData = $this->_CI->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            $uploadData['file_path'] = substr($uploadPath, 2);
            // Insert files info into the database
            return $this->_CI->insert_model->insert_data($uploadData,'media');
            // return $insert;
             
        }
    }else{
        return 0;
    }

}

public function doUploadAny($file){
    if(!empty($_FILES)){
        // File upload configuration
        $basefolder='./uploads/media/files/';
        $year = date("Y");   
        $month = date("m");   
        $filename = $basefolder.$year;   
        $filename2 = $filename."/".$month;
        if(!file_exists($filename)){
                mkdir($filename,0777);
                fopen($filename."/index.html", "w");
            }
        
        if(!file_exists($filename2)){
                mkdir($filename2,0777);
                fopen($filename2."/index.html", "w");
            }
        
        $uploadPath = $filename2.'/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|xls|pdf|doc|docx|xlsx';;
        
        // Load and initialize upload library
        $this->_CI->load->library('upload', $config);
        $this->_CI->upload->initialize($config);
        
        // Upload file to the server
        if($this->_CI->upload->do_upload($file)){
            $fileData = $this->_CI->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            $uploadData['file_path'] = substr($uploadPath, 2);
            // Insert files info into the database
            return $this->_CI->insert_model->insert_data($uploadData,'media');
            // return $insert;
             
        }
    }else{
        return 0;
    }

}

}