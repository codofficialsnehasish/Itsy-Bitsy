<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Core_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
		$this->load->library('ajax_pagination');
		//$this->output->enable_profiler(TRUE);
		
	}

//select variation option
public function select_product_variation_option()
{
	$variation_id = $this->input->post('variation_id', true);
	$selected_option_id = $this->input->post('selected_option_id', true);
	$variation = $this->variation_model->get_variation($variation_id);
	$option = $this->variation_model->get_variation_option($selected_option_id);

	$data = array(
		'status' => 0,
		'html_content_slider' => "",
		'html_content_price' => "",
		'html_content_stock' => "",
		'stock_status' => 1,
	);
	if (!empty($variation) && !empty($option)) {
		$product = $this->product_model->get_product_by_id($variation->product_id);

		//slider content response
		if ($variation->show_images_on_slider) {
			$product_images = $this->variation_model->get_variation_option_images($selected_option_id);
			if (empty($product_images)) {
				$product_images = $this->file_model->get_product_images($variation->product_id);
			}
			$vars = array(
				"product" => $product,
				"product_images" => $product_images
			);
			$data["html_content_slider"] = $this->load->view('product/details/_preview', $vars, true);
		}

		//price content response
		if ($variation->use_different_price == 1) {
			$price = $product->price;
			$discount_rate = $product->discount_rate;
			if (isset($option->price)) {
				$price = $option->price;
			}
			if (isset($option->discount_rate)) {
				$discount_rate = $option->discount_rate;
			}
			if (empty($price)) {
				$price = $product->price;
				$discount_rate = $product->discount_rate;
			}
			$vars = array(
				"product" => $product,
				"price" => $price,
				"discount_rate" => $discount_rate
			);
			$data["html_content_price"] = $this->load->view('products/details/_price', $vars, true);
		}

		//stock content response
		$stock = $product->stock;
		if ($option->is_default != 1) {
			$stock = $option->stock;
		}
		if ($stock == 0) {
			$data["html_content_stock"] = '<span class="text-danger">Out of Stock</span>';
			$data["stock_status"] = 0;
		} else {
			$data["html_content_stock"] = '<div class="input-group" ><button type="button" class="qty-left-minus minusbtn" data-type="minus" data-field=""><i class="fa fa-minus" aria-hidden="true"></i>
			</button><input class="form-control input-number qty-input qtytxt" name="product_quantity" value="1"><button type="button" class="qty-right-plus plusbtn" data-type="plus" data-field=""><i class="fa fa-plus" aria-hidden="true"></i>
			</button></div>';
		}
		$data["status"] = 1;

	}
	echo json_encode($data);
}
	////favorite
	public function set_favorite(){
		$id=$this->input->post('product_id');
		$product = $this->product_model->get_product_by_id($id);
		if(check_favorite($this->auth_user->id,$id)==true){
			$icon= '<i class="zmdi zmdi-favorite"></i>';
			$msg= $product->title.' Successfully Added to Your favorite List.';
			$status=1;
		}else{
			$icon= '<i class="zmdi zmdi-favorite-outline"></i>';
			$msg= $product->title.' Successfully Removed from Your favorite List.';
			$status=0;
		}
		echo json_encode(array('icon'=>$icon,'msg'=>$msg,'status'=>$status));
	}


	/////save Review
	public function saveReview(){
		$product_id=$this->input->post('product_id');
		$rating=$this->input->post('rating_count');
		$review=$this->input->post('comment');
		$review_title=$this->input->post('review_title');
		// echo $rating;
		//$id=$this->input->post('product_id');
		$product = $this->product_model->get_product_by_id($product_id);
		if(check_review($this->auth_user->id,$product_id)==true){
			$msg= 'You Have Already Posted Your Comment on '.$product->title;
			$status=0;
			// echo $msg;
			json_encode(array('msg'=>$msg,'status'=>$status));
		}else{
			$data = array(
				'product_id' => $product_id,
				'rating' => $rating,
				'title' => $review_title,
				'comment' => $review,
				'user_id ' => $this->auth_user->id,
				'status' => 1,
				'created_at' => $this->currentTime,
				'ip_address' => $this->input->ip_address()
			);
			$insert = $this->insert_model->insert_data($data,'product_review');
			if($insert){
				$msg= 'Review Has Been Posted Successfully on '.$product->title;
				$status=1;
			///update product rating
			$ratingCount = $product->rating + 1;
			$this->edit_model->edit(array('rating'=>$ratingCount),$product_id,'id','products');
			
			}else{
			$msg= $product->title.'Error!.';
			$status=0;
			}	
		}
		echo json_encode(array('msg'=>$msg,'status'=>$status));
	}


	public function getReviewForm(){
		echo '<div class="rating-star"><input type="hidden" name="rating" class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-primary" /></div> <div class="_2sxtk-"><input type="text"  placeholder="Review Title...(optional)" id="review_title" class="form-control _3kRe7w mt-3 mb-3" /> </div> <div class="_2sxtk-"><textarea placeholder="Comments...(optional)" id="review" class="form-control _3kRe7w"></textarea></div>';
	}

	public function saveProfilePicture(){

			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['user_image']=$this->mediaupload->doUpload('file');
			}else{
				$data['user_image']=0;	
			}
			$update = $this->edit_model->edit($data,$this->auth_user->id,'id','users');
			if($update){
				$status = 1;
				$img_url = get_image($data['user_image']);
			}else{
				$status = 0;
				$img_url = '';
			}
			echo json_encode(array('status'=>$status,'img_url'=>$img_url));
	}


	public function productQuickView()
    {
        $product_id = $this->input->post('product_id', true);
        $this->product_html_content($product_id, "singleProductPreview");
    }
/*
*/
 //product variation options html content
 private function product_html_content($product_id, $view)
 {
	$conditions=array(
		'tblName' => 'products',
		'where'   => array(
			'id' => $product_id,
			'is_visible' => 1,
			'is_draft' => 0
		)
		);
	$allproducts = $this->select->getResult($conditions);
	$data['product']= $allproducts[0];
	$data['product_images']=$this->select->select_single_data('product_images','product_id',$product_id);
	$data["half_width_product_variations"] = $this->variation_model->get_half_width_product_variations($allproducts[0]->id);
	$data["full_width_product_variations"] = $this->variation_model->get_full_width_product_variations($allproducts[0]->id);

	 $html_content = $this->load->view('products/details/' . $view, $data, true);
	 $data = array(
		 'result' => 1,
		 'html_content' => $html_content,
	 );
	 echo json_encode($data);
	 reset_flash_data();
 }


 	public function ajax_search(){
		$search=$this->input->post('search');
		$res = $this->product_model->search_products($search);
		echo json_encode(array('response'=>$res,'status'=>1));
	}
}