<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='products';
		$this->tableSpecifications = 'product_specifications';
		$this->view_path='admin/products/';
		$this->file_name='file';
    	$this->number_of_images=10;
       // $this->output->enable_profiler(TRUE);
		
	}
   
	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Products';
		$this->load->view('admin/partials/header',$header);

	//	$conditions['tblName'] = $this->table_name;
	//	$where[]=array('is_draft'=>0);
		//$conditions['where'] = $where;
		//$conditions['is_visible'] = 1;
	//	$result = $this->select->select->getResult($conditions);
		
		if($this->auth_user->role=='admin'){
		//	$data['allitems']=$this->select->select->getResult($conditions);
			//$this->select->select_table($this->table_name,'id','asc');
			$data['allitems']=$this->select->custom_qry("select * from ".$this->table_name." where is_draft=0");
		}else{
			$data['allitems']=$this->select->custom_qry("select * from ".$this->table_name." where is_draft=0 and is_visible=1 and user_id=".$this->auth_user->id);
			//$conditions['where'] = array('user_id'=>$this->auth_user->id);
			//,'user_id',
			//$this->select->select->getResult($conditions);
			
		}
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Product';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['brands']=$this->select->get_brands();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$this->load->view($this->view_path.'basic_info',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function price_details()
	{
		//echo $this->input->post('product_id');
		if($this->uri->segment(4)=='' || $this->uri->segment(4)!=$this->input->post('product_id')){
			//echo $this->uri->segment(4);
		//	echo '<br>Session '.$this->input->post('product_id');die;
			redirect('admin/products/add-new');
		}
		$header['pagecss']="";
		$header['title']='Add New Product';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$this->load->view($this->view_path.'price_details',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function price_details_edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Product';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['subcategories']=$this->select->select_single_data('categories','parent_id',$productArray[0]->category_id);
		$data['item']=$productArray[0];
		$this->load->view($this->view_path.'price_details_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function inventory()
	{
		//echo $this->input->post('product_id');
		if($this->uri->segment(4)=='' || $this->uri->segment(4)!=$this->input->post('product_id')){
			//echo $this->uri->segment(4);
		//	echo '<br>Session '.$this->input->post('product_id');die;
			redirect('admin/products/add-new');
		}
		$header['pagecss']="";
		$header['title']='Add New Inventory';
		$this->load->view('admin/partials/header',$header);
		// $data['categories']=$this->select->get_parent_categories();
		// $data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$this->load->view($this->view_path.'inventory');
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function inventory_edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Product';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['subcategories']=$this->select->select_single_data('categories','parent_id',$productArray[0]->category_id);
		$data['item']=$productArray[0];
		$this->load->view($this->view_path.'inventory_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function variations()
	{
		if($this->uri->segment(4)=='' || $this->uri->segment(4)!=$this->input->post('product_id')){
			redirect('admin/products/add-new');
		}
		$header['pagecss']="uploadCss";
		$header['title']='Media Library';
		$this->load->view('admin/partials/header',$header);
		$data['product_variations'] = $this->variation_model->get_variation($this->uri->segment(4));
		$data['allmedia']=$this->select->select_table('media','media_id','desc');
		$this->load->view('admin/products/product_variations',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function variations_edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="uploadCss";
		$header['title']='Edit Product';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['subcategories']=$this->select->select_single_data('categories','parent_id',$productArray[0]->category_id);
		$data['item']=$productArray[0];

		$data['product_variations'] = $this->variation_model->get_variation($id);
		$data['allmedia']=$this->select->select_table('media','media_id','desc');
		$this->load->view('admin/products/product_variations_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function add_images()
	{
		if($this->uri->segment(4)=='' || $this->uri->segment(4)!=$this->input->post('product_id')){
			redirect('admin/products/add-new');
		}
		$header['pagecss']="uploadCss";
		$header['title']='Media Library';
		$this->load->view('admin/partials/header',$header);
		$data['product_variations'] = $this->variation_model->get_variation(1);
		$data['allmedia']=$this->select->select_table('media','media_id','desc');
		$data['product_images'] = $this->select->select_single_data('product_images','product_id',$this->uri->segment(4));
		$this->load->view('admin/products/addimages',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function add_images_edit()
	{
		$id=$this->uri->segment(4);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['subcategories']=$this->select->select_single_data('categories','parent_id',$productArray[0]->category_id);
		$data['item']=$productArray[0];
		$header['pagecss']="uploadCss";
		$header['title']='Edit Product';
		$this->load->view('admin/partials/header',$header);
		$data['product_images'] = $this->select->select_single_data('product_images','product_id',$id);
		$this->load->view('admin/products/addimages_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function process()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'user_id'=>$this->auth_user->id,
				'category_id'=>$this->input->post('cat_id', true),
				'subcategory_id'=>$this->input->post('subcat_id', true),
				'slug'=>$this->slug->create_unique_slug($this->input->post('name', true), $this->table_name ,'slug'),
				'short_desc'=>$this->input->post('short_desc', true),
         	    'description'=>$this->input->post('description', true),
           		'product_specification'=>$this->input->post('product_specification', true),
				'is_visible'=>$this->input->post('is_visible', true),
            	'is_featured'=>$this->input->post('is_featured', true),
				'title'=>$this->input->post('name', true),
				'is_draft '=> 0,
				'product_brand_id' => $this->input->post('product_brand_id', true),
				// 'sale_price'=>$this->input->post('sale_price', true),
				// 'offer_price'=>$this->input->post('offer_price', true),
				// 'currency_code'=>$this->input->post('currency_code', true),
				// 'created_at'=>$this->currentTime,
				// 'meta_title_tag'=>$this->input->post('meta_title_tag', true),
				// 'meta_keywords'=>$this->input->post('meta_keywords', true),
				// 'meta_description'=>$this->input->post('meta_description', true)

			);
			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['size_chart']=$this->mediaupload->doUpload('file');
			}else{
				$data['size_chart']=$this->input->post('media_id', true);
			}

			// echo $data['size_chart'];

			$product_id=$this->insert_model->insert_data($data,$this->table_name);
			if($product_id){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				$user_data = array(
                    'modesy_sess_product_id' => $product_id
                );
                $this->session->set_userdata($user_data);
				redirect('admin/products/price-details-edit/'.$product_id);
				//redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}


	////////////////////price post
	public function price_process()
	{
		$this->form_validation->set_rules('price', 'Price', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				// 'price'=>$this->input->post('price', true),
				 'discount_rate'=>$this->input->post('discount_rate', true),
				 'currency_code'=>$this->input->post('currency_code', true),
				 'no_discount'=>$this->input->post('no_discount', true),
				// 'commission_type'=>$this->input->post('commission_type', true)
			);
		   $sale_price=$this->input->post('price', true);
		   $saleCommission=($sale_price*$this->general_settings->commission_rate)/100;
		   if($this->input->post('commission_type', true)==1){
			$data['price']=$sale_price;
			$data['commission_amount']=$saleCommission;
			$data['commission_type']=1;
		   }else{
			$data['price']=$sale_price + $saleCommission;
			$data['commission_amount']=$saleCommission;
			$data['commission_type']=0;
		   }

			//$product_id=$this->insert_model->insert_data($data,$this->table_name);
			$update=$this->edit_model->edit($data,$this->input->post('product_id'),'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				$user_data = array(
                    'modesy_sess_product_id' => $this->input->post('product_id')
                );
                $this->session->set_userdata($user_data);
				// redirect('admin/products/inventory-edit/'.$this->input->post('product_id'));
				redirect('admin/products/add-images-edit/'.$this->uri->segment('product_id'));
				//redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function inventory_process()
	{
		$this->form_validation->set_rules('stockstatus', 'Stockstatus', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'is_stock_manage'=>$this->input->post('is_stock_manage', true),
				'sku'=>$this->input->post('sku', true),
				'stock'=>$this->input->post('qty', true),
				'actual_stock'=>$this->input->post('qty', true),
				'stock_status'=>$this->input->post('stockstatus', true)
			);

			//$product_id=$this->insert_model->insert_data($data,$this->table_name);
			$update=$this->edit_model->edit($data,$this->input->post('product_id'),'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				$user_data = array(
                    'modesy_sess_product_id' => $this->input->post('product_id')
                );
                $this->session->set_userdata($user_data);
				redirect('admin/products/variation/'.$this->input->post('product_id'));
				//redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}


	public function inventory_update_process()
	{
		$this->form_validation->set_rules('stockstatus', 'Stockstatus', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'is_stock_manage'=>$this->input->post('is_stock_manage', true),
				'sku'=>$this->input->post('sku', true),
				'stock'=>$this->input->post('qty', true),
				'actual_stock'=>$this->input->post('qty', true),
				'stock_status'=>$this->input->post('stockstatus', true)
			);

			//$product_id=$this->insert_model->insert_data($data,$this->table_name);
			$update=$this->edit_model->edit($data,$this->input->post('product_id'),'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				$user_data = array(
                    'modesy_sess_product_id' => $this->input->post('product_id')
                );
                $this->session->set_userdata($user_data);
				// redirect('admin/products/variations-edit/'.$this->input->post('product_id'));
				redirect('admin/products/add-images-edit/'.$this->input->post('product_id'));
				//redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}
////////////////////price post
public function price_update_process()
{
		$this->form_validation->set_rules('price', 'Price', 'required|xss_clean|max_length[200]');
	if ($this->form_validation->run() == false) {
		$this->session->set_flashdata('errors', validation_errors());
		//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
		redirect($this->agent->referrer());
	}else{
		$data=array(
			 'price'=>$this->input->post('price', true),
			 'discount_rate'=>$this->input->post('discount_rate', true),
			 'currency_code'=>$this->input->post('currency_code', true),
			 'no_discount'=>$this->input->post('no_discount', true),
			  'commission_type'=>$this->input->post('commission_type', true),
			  'discounted_price'=>$this->input->post('discounted_price', true),
			  'gst_rate'=>$this->input->post('gst_rate', true),
			  'gst_amount'=>$this->input->post('gst_amount', true),
			  'earned_amount'=>$this->input->post('earned_amount', true),
			  'commission_amount'=>$this->input->post('commission_amount', true),

			  'dis_price'=>$this->input->post('dis_price', true),
			  'dis_no_discount'=>$this->input->post('dis_no_discount', true),
			//   'dis_commission_type'=>$this->input->post('', true),
			  'dis_discount_rate'=>$this->input->post('dis_discount_rate', true),
			  'dis_discounted_price'=>$this->input->post('dis_discounted_price', true),
			  'dis_gst_rate'=>$this->input->post('dis_gst_rate', true),
			  'dis_gst_amount'=>$this->input->post('dis_gst_amount', true),
			  'dis_earend_amount'=>$this->input->post('dis_earned_amount', true),
			  'dis_commission_amount'=>$this->input->post('dis_commission_amount', true),
		
		   
		);
	//    $sale_price=$this->input->post('price', true);
	//    $saleCommission=($sale_price*$this->general_settings->commission_rate)/100;
	//    if($this->input->post('commission_type', true)==1){
	// 	// $data['price']=$sale_price;
	// 	// $data['commission_amount']=$saleCommission;
	// 	$data['commission_type']=1;
	//    }else{
	// 	// $data['price']=$sale_price + $saleCommission;
	// 	// $data['commission_amount']=$saleCommission;
	// 	$data['commission_type']=0;
	//    }
	  // echo $this->input->post('product_id');
	  // echo '<pre>';
	  // print_r($data);
	  // die;
		//$product_id=$this->insert_model->insert_data($data,$this->table_name);
		$update=$this->edit_model->edit($data,$this->input->post('product_id'),'id',$this->table_name);
		if($update){
			$this->session->set_flashdata('success', 'Data Updated successfully');
			
			redirect('admin/products/inventory-edit/'.$this->input->post('product_id'));
			// redirect('admin/products/add-images-edit/'.$this->input->post('product_id'));
		//	redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			 redirect($this->agent->referrer());
		}
	}

}

	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Product';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['brands']=$this->select->get_brands();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['subcategories']=$this->select->select_single_data('categories','parent_id',$productArray[0]->category_id);
		$data['item']=$productArray[0];
		$this->load->view($this->view_path.'basic_info_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function update_process()
	{
	//	$id=$this->uri->segment(4);
		$id=$this->input->post('hdn_id');
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'category_id'=>$this->input->post('cat_id', true),
				'subcategory_id'=>$this->input->post('subcat_id', true),
				'slug'=>$this->slug->create_unique_slug($this->input->post('name', true), $this->table_name ,'slug'),
                'short_desc'=>$this->input->post('short_desc', true),
				'description'=>$this->input->post('description', true),
           		'product_specification'=>$this->input->post('product_specification', true),
				'is_visible'=>$this->input->post('is_visible', true),
          	    'is_featured'=>$this->input->post('is_featured', true),
				'title'=>$this->input->post('name', true),
				// 'sku'=>$this->input->post('sku', true),
				// 'sale_price'=>$this->input->post('sale_price', true),
				// 'offer_price'=>$this->input->post('offer_price', true),
				//'currency_code'=>$this->input->post('currency_code', true),
				// 'meta_title_tag'=>$this->input->post('meta_title_tag', true),
				// 'meta_keywords'=>$this->input->post('meta_keywords', true),
				// 'meta_description'=>$this->input->post('meta_description', true)
			);
				if(is_uploaded_file($_FILES['file']['tmp_name'])) 
				{  
				$data['size_chart']=$this->mediaupload->doUpload('file');
				}else{
				if($this->input->post('media_id', true)!=''){
					$data['size_chart']=$this->input->post('media_id', true);
				}else{
					$data['size_chart']=$this->input->post('hdn_media_id', true);	
					}
		     }

			$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				// redirect($this->agent->referrer());
				redirect('admin/products/price-details-edit/'.$id);
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function get_subcategory(){
		//$consumer_type = $this->input->post('consumer_type');
		$conditions['tblName'] = 'categories';
		$conditions['where'] = array('parent_id'=>$this->input->post('catId'));
		$conditions['is_visible'] = 1;
		$result = $this->select->select->getResult($conditions);
		echo json_encode($result);
	}

	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}

	public function product_images_save(){
		$product_id=$this->input->post('product_id');
		$contents=$this->select->select_single_data('product_images','product_id',$product_id);

		foreach($contents as $content){
		// 	$data=array(
		// 		'file_name'=>$content->file_name,
		// 		'uploaded_on'=>$content->uploaded_on,
		// 		'file_path'=>$content->file_path,
		// 		'status'=>$content->status
		// 	);
		//  $mediaId=$this->insert_model->insert_data($data,'media');
		// $data=array(
		// 			'file_id'=>$content->file_id,
		// 			'user_id'=>$this->auth_user->id,
		// 			'product_id'=>$content->product_id,
		// 			'file_name'=>$content->file_name,
		// 			'uploaded_on'=>$content->uploaded_on,
		// 			'is_main'=>$content->is_main,
		// 			'file_path'=>$content->file_path,
		// 			'status'=>$content->status
		// 		);
		// $this->insert_model->insert_data($data,'product_images');

		// $this->delete_model->delete('product_images','product_id',$product_id);
		$this->edit_model->edit(array('is_draft'=>0),$product_id,'id',$this->table_name);
		 $this->session->unset_userdata('modesy_sess_product_id');
		}
		redirect('admin/products');
	}


	public function media_process(){	
		$product_id=$this->input->post('product_id');
		$product_images = $this->select->select_single_data('product_images','product_id',$product_id);
		if (!empty($product_images)) {
			if(count($product_images)<$this->number_of_images){
				$this->mediaupload->doUploadProductImages($this->file_name,$this->input->post('product_id'),$this->input->post('file_id'));
                $data=array('is_main'=>0);
                $this->edit_model->edit($data,$product_id,'product_id','product_images');
                $this->edit_model->edit(array('is_main'=>1),$this->input->post('file_id'),'file_id','product_images');	

			}
			else{
				echo 'Sorry You Can Upload Ony '.$this->number_of_images.' Images';
			}
		}else{
			$this->mediaupload->doUploadProductImages($this->file_name,$this->input->post('product_id'),$this->input->post('file_id'));
                $data=array('is_main'=>0);
                $this->edit_model->edit($data,$product_id,'product_id','product_images');
                $this->edit_model->edit(array('is_main'=>1),$this->input->post('file_id'),'file_id','product_images');	
		}

	}


	
    public function remove_tmpimages(){
        $name=$this->input->post('name');
      //  unlink('./uploads/media/tmp/'.$name);
        $this->delete_model->delete_multiple_clause('product_images','file_name',$name,'product_id',$this->input->post('product_id'));
    }

    public function delete_product_images(){
        $file_id=$this->input->post('file_id');
		$product_id=$this->input->post('product_id');
		$product_images = $this->select->select_single_data('product_images','file_id',$file_id);
		$imagePath=$product_images[0]->file_path.$product_images[0]->file_name;
        unlink('./'.$imagePath);
        $this->delete_model->delete_multiple_clause('product_images','file_id',$file_id,'product_id',$product_id);
		echo 'Deleted Successfully.';
    }

	

    public function get_product_temp_images()
	{
		$file_id = $this->input->post('file_id', true);
		$product_id = $this->input->post('product_id', true);
		$product_images = $this->select->select_single_data('product_images','product_id',$product_id);
		if (!empty($product_images)) {
			foreach ($product_images as $image) {
				if ($image->file_id == $file_id) {
					echo '<img src="' . base_url($image->file_path.$image->file_name) . '" alt="">' .
						'<a href="javascript:void(0)" class="btn-img-delete btn-delete-product-img" data-file-id="' . $image->file_id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item"><i class="ti-close"></i></a>' .
						'<a href="javascript:void(0)" class="float-start btn btn-secondary btn-sm waves-effect btn-set-image-main"  style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;" data-file-id="' . $image->file_id . '">Main</a>';
					break;
				}
			}
		}
	}


	public function set_main_product_image(){
		$file_id = $this->input->post('file_id', true);
		$product_id = $this->input->post('product_id', true);
		$data=array('is_main'=>0);
		$this->edit_model->edit($data,$product_id,'product_id','product_images');
		$this->edit_model->edit(array('is_main'=>1),$file_id,'file_id','product_images');
		$this->get_all_product_images($product_id);
	}

public function get_all_product_images($product_id){
	$product_images = $this->select->select_single_data('product_images','product_id',$product_id);
	if (!empty($product_images)) {
		foreach ($product_images as $image) {
			//if ($image->file_id == $file_id) {
				echo ' <li class="media" id="uploaderFile'. $image->file_id .'"><img src="' . base_url($image->file_path.$image->file_name) . '" alt="">' .
					'<a href="javascript:void(0)" class="btn-img-delete btn-delete-product-img" data-file-id="' . $image->file_id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item"><i class="ti-close"></i></a>';
					if ($image->is_main == 1):
					echo '<a href="javascript:void(0)" class="float-start btn btn-primary btn-sm waves-effect btn-set-image-main" data-file-id="' . $image->file_id . '"  style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;">Main</a>';
					else:
						echo '<a href="javascript:void(0)" class="float-start btn btn-secondary btn-sm waves-effect btn-set-image-main" data-file-id="'. $image->file_id .'" style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;">Main</a></li>';
					endif;
			//}
		}
	}

}



/*
*Specifications
*/
public function specifications()
	{
		$id=$this->uri->segment(4);
		if($id==''){
			redirect('admin/products/add-new');
		}
		$header['pagecss']="";
		$header['title']='Edit Product';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['subcategories']=$this->select->select_single_data('categories','parent_id',$productArray[0]->category_id);
		$data['item']=$productArray[0];
		$data['allspecifications']=$this->select->select_single_data($this->tableSpecifications,'product_id',$id);
		$this->load->view($this->view_path.'addSpecifications',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function specifications_process()
	{
		foreach($this->input->post('group-a[]') as $val){
			$data=array(
				'option_title'=>$val['option_title'],
				'option_value'=>$val['option_value'],
				'product_id'=>$this->input->post('product_id')
			);
			$insert=$this->insert_model->insert_data($data,$this->tableSpecifications);
		}
			if($insert){
				$this->session->set_flashdata('success', 'Data Updated successfully');
				redirect('admin/products/add-images-edit/'.$this->input->post('product_id'));
			}else{
				$this->session->set_flashdata('error', 'Query error');
				 redirect($this->agent->referrer());
			}
	}
	


}
