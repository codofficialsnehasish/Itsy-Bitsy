<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
   class Select extends CI_Model  
   {  
      function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  
      //we will use the select function  

	public function record_count() {
		$this->db->where('status',1);
		$this->db->from('post');
		return $this->db->count_all_results();	
	}

	public function product_count() {
		$this->db->where('is_visible ',1);
		$this->db->from('products');
		return $this->db->count_all_results();	
	}

	public function active_distributer_count() {
		$this->db->where('role','dristributor');
		$this->db->where('is_approved',1);
		$this->db->where('status',1);
		$this->db->from('users');
		return $this->db->count_all_results();	
	}
	public function inactive_distributer_count() {
		$this->db->where('role','dristributor');
		$this->db->where('is_approved',1);
		$this->db->where('status',0);
		$this->db->from('users');
		return $this->db->count_all_results();	
	}

	public function active_team_leader_count() {
		$this->db->where('role','teamlead');
		$this->db->where('is_approved',1);
		$this->db->where('status',1);
		$this->db->from('users');
		return $this->db->count_all_results();	
	}

	public function inactive_team_leader_count() {
		$this->db->where('role','teamlead');
		$this->db->where('is_approved',1);
		$this->db->where('status',0);
		$this->db->from('users');
		return $this->db->count_all_results();	
	}

	public function record_count_category($id) {
		$this->db->where('status',1);
		$this->db->where('cat_id',$id);
		$this->db->from('post');
		return $this->db->count_all_results();	
		}
		
		public function record_count_archive($month,$year) {
		$this->db->where('status',1);
		$this->db->where('Monthname(`posted`)',$month);
		$this->db->where('year(`posted`)',$year);
		$this->db->from('post');
		return $this->db->count_all_results();	
		}
	  public function select_table1($table)  
      {  
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->order_by("id", 'desc');
		 $query = $this->db->get(); 
		 return $query->result();
      }  

	 public function select_table($table,$orderby="",$order="",$limit="", $offset="1000000")  
      {  
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->order_by($orderby, $order);
		 $query = $this->db->get(); 
		 return $query->result();
      }  
	   function select_single_data($table,$field_id,$id,$orderby="",$order="",$limit="", $offset="10000000")
	  {
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->where($field_id,$id);  
		 $query = $this->db->get();
		 return $query->result();
	  }
	  function select_teamlead_data($table,$limit="", $offset="10000000")
	  {
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->where("(role = 'teamlead' OR role = 'dristributor') AND is_approved = 0");   
		//  $this->db->where($field_id2,$id2);  
		 $query = $this->db->get();
		 return $query->result();
	  }

	  function select_teamlead($table,$t1,$t2,$t3,$t4,$limit="", $offset="10000000")
	  {
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->where($t1,$t2);   
		 $this->db->where($t3,$t4);  
		 $query = $this->db->get();
		 return $query->result();
	  }

	   function select_single_data_order($table,$field_id,$id,$orderby="",$order="",$limit="", $offset="10000000")
	  {
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->where($field_id,$id);  
		 $this->db->order_by($orderby, $order);
		 $query = $this->db->get();
		 return $query->result();
	  }
	  
	  
 	 function select_comment($table,$field_id,$id)
	  {
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->where($field_id,$id);  
		  $this->db->where("status",1);  
		 $query = $this->db->get();
		 return $query->result();
	  }
	 function previous_post($id)
	  {
         $this->db->select('*');
		 $this->db->from('post'); 
		 $this->db->limit(1, 0);
		 $this->db->where('post_id <',$id);
		 $this->db->order_by('post_id', 'desc'); 
		 $query = $this->db->get();
		 return $query->result();
	  }
	 function next_post($id)
	  {
         $this->db->select('*');
		 $this->db->from('post'); 
		  $this->db->limit(1, 0);
		 $this->db->where('post_id >',$id);
		 $this->db->order_by('post_id', 'asc'); 
		 $query = $this->db->get();
		 return $query->result();
	  }
	  
	   public function comment_count($post_id) {
			 $this->db->where('ItemId',$post_id);
				$this->db->where('status',1);
				$this->db->from('comments');
				return $this->db->count_all_results();
			}
	  
	   public function select_archivepost($month,$year,$limit="",$offset="")  
      {  
         $this->db->select('*');
		 $this->db->from('post');
		 $this->db->where('Monthname(`posted`)',$month);
		 $this->db->where('year(`posted`)',$year);
		 $this->db->limit($offset, $limit);
		 $this->db->order_by('post_id', 'desc');
		 $query = $this->db->get(); 
		 return $query->result();
      }
	  
	  	public function record_count_byuser($table,$id) {
		$this->db->where('user_id',$id);
		$this->db->from($table);
		return $this->db->count_all_results();	
		}
		
	public function select_distinct_data($field,$table,$orderby="",$order="",$limit="", $offset="")
	  {
         $this->db->distinct();
		 $this->db->select($field);
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->order_by($orderby, $order);
		 $query = $this->db->get(); 
		 return $query->result();
	  }
	  
	  public function custom_qry($qry)
	  {
		  $sql=$this->db->query($qry);
		  return $sql->result();
	  }
	//////////////////////////////////////////////////////////////
		function getResult($params = array()){
        $this->db->select('*');
		if(array_key_exists("tblName",$params)){
        $this->db->from($params['tblName']);
		}
		//fetch data by conditions
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
		
		if(array_key_exists("order_by",$params)){
			//$this->db->order_by($params['order_by']);
			$this->db->order_by($params['order_by'],$params['order']);
		}
		
        if(array_key_exists("single",$params)){
            $this->db->where($params['single']);
            $query = $this->db->get();
            $result = $query->result();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result():FALSE;
            }
        }

        //return fetched data
        return $result;
    }

	/////////////////////////////////////////////////////////////
	  function username_exists($email)
		{
		$this->db->where('user_name', $email);
		$query = $this->db->get('users');
		if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
		}
		
		function useremail_exists($email)
		{
		$this->db->where('user_email', $email);
		$query = $this->db->get('users');
		if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
		}
		
		//get user by email
		public function get_parent_categories()
		{
			$this->db->where('parent_id', 0);
			$this->db->where('is_visible', 1);
			$query = $this->db->get('categories');
			return $query->result();
		}

		public function get_sub_parent_categories_by_id($parent_id,$name)
		{
			$this->db->where('parent_id =', $parent_id);
			// $this->db->where('sub_parent_id', 0);
			$this->db->where($name, 1);
			$this->db->where('is_visible', 1);
			$query = $this->db->get('categories');
			return $query->result();
		}

		public function get_brands()
		{
			$this->db->where('is_visible', 1);
			$query = $this->db->get('brands');
			return $query->result();
		}

		//get user by email
		public function get_parent_category()
		{
			$this->db->where('parent_id', 0);
			$this->db->where('is_visible', 1);
			$query = $this->db->get('category');
			return $query->result();
		}

//////////////////////////////////////////////////////
		
       //get general settings
    public function get_site_settings()
    {
        $this->db->where('info_id', 1);
        $query = $this->db->get('site_info');
        return $query->row();
    }




	//////////////////////////////////////////////////////////////
	function getProducts($params = array()){
        $this->db->select('products.id, products.title, products.slug, products.product_type, products.listing_type, products.sku, products.category_id, products.subcategory_id, products.commission_type, products.commission_amount, products.price, products.currency_code, products.currency, products.discount_rate, products.no_discount,products.discounted_price, products.gst_rate, products.media_id, products.short_desc, products.description, products.product_specification, products.country_id, products.state_id, products.city_id, products.address, products.zip_code, products.user_id, products.status, products.is_promoted, products.promote_start_date, products.promote_end_date, products.promote_plan, products.promote_day, products.is_visible,products.dis_price,products.dis_discount_rate,products.dis_no_discount,products.dis_gst_rate,products.dis_discounted_price,products.dis_gst_amount,products.dis_earend_amount,products.rating, products.hit, products.demo_url, products.external_link, products.files_included, products.stock, products.stock_unlimited, products.shipping_time, products.shipping_cost_type, products.shipping_cost, products.shipping_cost_additional, products.is_deleted, products.is_draft, products.is_free_product, products.created_at');
		if(array_key_exists("tblName",$params)){
        $this->db->from($params['tblName']);
		}
		//
		//fetch data by conditions
        // if(array_key_exists("where",$params)){
        //     foreach ($params['where'] as $key => $value){
        //         $this->db->where($key,$value);
        //     }
        // }
		if(array_key_exists("filter", $params)){
			// Filter data by searched keywords
			if(!empty($params['filter']['category_id'])){
            $this->db->group_start();
				$this->db->where('category_id', $params['filter']['category_id']);
           	    $this->db->or_where('subcategory_id', $params['filter']['category_id']);
            $this->db->group_end();
			}

			if(!empty($params['filter']['productid'])){
				$this->db->where_in('id', $params['filter']['productid']);
			}
		}

		if(array_key_exists("filter", $params)){
			// Filter data by searched keywords
			if(!empty($params['filter']['product_brand_id'])){
            $this->db->group_start();
				$this->db->where('product_brand_id', $params['filter']['product_brand_id']);
           	    // $this->db->or_where('subcategory_id', $params['filter']['category_id']);
            $this->db->group_end();
			}

			if(!empty($params['filter']['productid'])){
				$this->db->where_in('id', $params['filter']['productid']);
			}
		}

		if(array_key_exists("filter", $params)){
			// Filter data by searched keywords
			if(!empty($params['filter']['keyword'])){
				$this->db->group_start();
				$this->db->like('title', $params['filter']['keyword']);
				$this->db->or_like('description',$params['filter']['keyword']);
				//category name
				$this->db->join('categories','categories.cat_id = products.category_id');
				$this->db->or_like('categories.cat_name', $params['filter']['keyword']);
				//company name
				$this->db->join('users','users.id = products.user_id');
				$this->db->or_like('users.shop_name', $params['filter']['keyword']);

				$this->db->group_end();
			}
		}
			if(!empty($params['filter']['is_featured'])){
				$this->db->where_in('is_featured', $params['filter']['is_featured']);
			}
		// 	////made in
		//
		// ////made in
		// if(array_key_exists("filter", $params)){
		// 	// Filter data by searched keywords
		// 	if(!empty($params['filter']['user_id'])){
		// 		$this->db->where('user_id', $params['filter']['user_id']);
		// 	}
        // }
		// ////Available in
		// if(array_key_exists("filter", $params)){
		// 	// Filter data by searched keywords
		// 	if(!empty($params['filter']['available'])){
		// 		$this->db->where_in('available_in', $params['filter']['available']);
		// 	}
		// }
		/////////
		if(array_key_exists("order_by",$params)){
			$this->db->order_by('products.'.$params['order_by'],$params['order']);
			//$this->db->order_by($params['order_by']);
		}
		// industry
		// if(array_key_exists("filter", $params)){
		// 	if(!empty($params['filter']['industry'])){
		// 		$this->db->join('company_profile','company_profile.user_id = products.user_id');
		// 		$this->db->where_in('company_profile.industry_id', $params['filter']['industry']);
		// 	}
        // }

		$this->db->where($params['tblName'].'.is_visible',1);
		$this->db->where($params['tblName'].'.is_draft',0);
        if(array_key_exists("single",$params)){
            $this->db->where($params['single']);
            $query = $this->db->get();
            $result = $query->result();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result():FALSE;
            }
        }

        //return fetched data
        return $result;
    }



 
public function convert_multi_array($array) {
  $out = implode(",",array_map(function($a) {return implode("~",$a);},$array));
  //print_r($out);
  return $out;
}


public function getAllcat($project_id){
    $parentCategory = $this->custom_qry("SELECT facility_id FROM projects_facilities where project_id=".$project_id);
    $parentCategoryArray = json_decode(json_encode($parentCategory), true);
    $parentCatId=$this->convert_multi_array($parentCategoryArray);
    $subCategory= $this->custom_qry("SELECT cat_id FROM `sub_category` where parent_id in (".$parentCatId.")");
    if(!empty($subCategory)){
    $subCategoryArray = json_decode(json_encode($subCategory), true);
    $subCatId=$this->convert_multi_array($subCategoryArray);
    $allCategories=$parentCatId.','.$subCatId;
  }else{
      $allCategories=$parentCatId;
  }
  return $allCategories;
}

public function getcatname($arr){
        $subCategory= $this->custom_qry("SELECT cat_name FROM `categories` where cat_id in (".$arr.")");
        foreach($subCategory as $cat){
            $rr[]=$cat->cat_name;
        }
        
        $last  = array_slice($rr, -1);
        $first = join(', ', array_slice($rr, 0, -1));
        $both  = array_filter(array_merge(array($first), $last), 'strlen');
        return join(' & ', $both);
        
      //  return implode(', ',$rr);

}

   
   
public function getAllcategories(){

	// $this->db->where('parent_id', 0);
	// $this->db->where('is_visible', 1);
	// $query = $this->db->get('categories');
	// return $query->result();
	//$categoriesMenu = $this->custom_qry("select cat_id,cat_name,cat_slug,cat_desc,media_id,is_home,is_popular from categories where is_visible=1 and parent_id=0 order by cat_name asc");

	$categoriesMenu = $this->get_parent_categories();
	//	$parentcat[]='';
	//	$subcat[]='';
	if(!empty($categoriesMenu)){
		$parentcat=array();
		foreach($categoriesMenu as $menuCat):
			$menuCat->imageUrl=get_image($menuCat->media_id);
			 $conditions['tblName']='categories';
			 $conditions['where']=array('parent_id'=>$menuCat->cat_id,'is_visible'=>1);

			//$categories = $this->custom_qry("select cat_id,parent_id,cat_name,cat_slug,cat_desc,media_id,is_home,is_popular from categories where is_visible=1 and parent_id=".$menuCat->cat_id." order by cat_name asc");
			$categories=$this->select->getResult($conditions);
			if(!empty($categories)):
				$subcat=array();
			foreach($categories as $cat):
				if($cat->parent_id===$menuCat->cat_id){
					$cat->imageUrl=get_image($cat->media_id);
					array_push($subcat,$cat);
				}else{
					false;
				}
			$this->my_array_unique($subcat,false);
			array_filter($subcat);
			endforeach;
			$menuCat->subcategory=$subcat ;
			array_push($parentcat,$menuCat);
			unset($subcat);
			endif;
		endforeach;
		array_push($parentcat,$menuCat);
		// Set the response and exit
		//OK (200) being the HTTP response code
		// echo '<pre>';
		// print_r(array_filter($this->my_array_unique($parentcat)));
		return array_filter($categoriesMenu);
	}
	
	}


	function my_array_unique($array, $keep_key_assoc = false){
		$duplicate_keys = array();
		$tmp = array();       
	
		foreach ($array as $key => $val){
			// convert objects to arrays, in_array() does not support objects
			if (is_object($val))
				$val = (array)$val;
	
			if (!in_array($val, $tmp))
				$tmp[] = $val;
			else
				$duplicate_keys[] = $key;
		}
	
		foreach ($duplicate_keys as $key)
			unset($array[$key]);
	
		return $keep_key_assoc ? $array : array_values($array);
	}   
   
   
	public function getVariations($product_id){
		$product_variations = $this->variation_model->get_full_width_product_variations($product_id);
		if(!empty($product_variations)){
			$productVariations=array();
			foreach($product_variations as $variation):
				$variation_options = get_product_variation_options($variation->id);
				if(!empty($variation_options)):
					$options=array();
				foreach($variation_options as $option):
					if ($option->is_default != 1):
                        $option_stock = $option->stock;
                    endif;
					
					array_push($options,$option);	
				$this->my_array_unique($options,false);
				array_filter($options);
				endforeach;
				$variation->variation_options=$options ;
				array_push($productVariations,$variation);
				unset($options);
				endif;
			endforeach;
			array_push($productVariations,$variation);
			return array_filter($product_variations);
		}	
   }
   
/////////////////////21/08/2022
    //get currencies
    public function get_currencies()
    {
        $query = $this->db->get('currencies');
        return $query->result();
    }


	public function get_parent_serviceCategories()
		{
			$this->db->where('parent_id', 0);
			$this->db->where('is_visible', 1);
			$query = $this->db->get('service_category');
			return $query->result();
		}


		//////////////////////////////////////////////////////////////
	/////////////////////////get services
	function getServices($params = array()){
		$this->db->select('services.id ,services.user_id, services.title, services.slug,services.cat_id, services.subcat_id, services.media_id, services.service_desc,services.created_at,services.meta_title_tag,services.meta_keywords,services.meta_description');
		if(array_key_exists("tblName",$params)){
		$this->db->from($params['tblName']);
		}
		
		if(array_key_exists("filter", $params)){
			// Filter data by searched keywords
			if(!empty($params['filter']['cat_id'])){
			$this->db->group_start();
				$this->db->where('cat_id', $params['filter']['cat_id']);
				$this->db->or_where('subcat_id', $params['filter']['cat_id']);
			$this->db->group_end();
			}
		}

		if(array_key_exists("filter", $params)){
			// Filter data by searched keywords
			if(!empty($params['filter']['keyword'])){
				$this->db->group_start();
				$this->db->like('title', $params['filter']['keyword']);
				$this->db->or_like('description',$params['filter']['keyword']);
				//category name
				$this->db->join('service_category','service_category.cat_id = services.cat_id');
				$this->db->or_like('service_category.cat_name', $params['filter']['keyword']);
				//company name
				$this->db->join('users','users.id = services.user_id');
				$this->db->or_like('users.shop_name', $params['filter']['keyword']);

				$this->db->group_end();
			}
		}
			if(!empty($params['filter']['is_featured'])){
				$this->db->where_in('is_featured', $params['filter']['is_featured']);
			}
	
		/////////
		if(array_key_exists("order_by",$params)){
			$this->db->order_by('services.'.$params['order_by'],$params['order']);
			//$this->db->order_by($params['order_by']);
		}
		

		$this->db->where($params['tblName'].'.is_visible',1);
		if(array_key_exists("single",$params)){
			$this->db->where($params['single']);
			$query = $this->db->get();
			$result = $query->result();
		}else{
			//set start and limit
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			
			if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
				$result = $this->db->count_all_results();
			}else{
				$query = $this->db->get();
				$result = ($query->num_rows() > 0)?$query->result():FALSE;
			}
		}

		//return fetched data
		return $result;
	}	
		

	public function get_question_options_by_ques_id($ques_id){
		$questioncon = array(
			'tblName' =>'question_options',
			'where' => array('is_visible'=>1,'ques_id '=>$ques_id,'parent_id'=>0)
		);
		return $this->getResult($questioncon);
	}

		public function get_question_sub_options_by_parent_id($parent_id){
		$questioncon = array(
			'tblName' =>'question_options',
			'where' => array('is_visible'=>1,'parent_id '=>$parent_id)
		);
		return $this->getResult($questioncon);
	}
	public function get_about_images()
	{
		// $this->db->where('parent_id', 0);
		// $this->db->where('visibility', 1);
		$query = $this->db->get('about_images');
		return $query->result();
	}
	public function get_about_images_w(){
		// $this->db->where('parent_id', 0);
		$this->db->where('visibility', 1);
		$query = $this->db->get('about_images');
		return $query->result();
	}
	public function get_sub_categories_by_id($p_id,$name)
	{
		$this->db->where('parent_id =', $p_id);
		$this->db->where($name, 1);
		$this->db->where('is_visible', 1);
		$query = $this->db->get('categories');
		return $query->result();
	}

	public function get_distributer_by_pin($pin){
		$this->db->where('role', 'dristributor');
		$this->db->where('status', 1);
		$this->db->where('is_approved', 1);
		$this->db->where("FIND_IN_SET($pin, prefarable_zip_code)");
		$query = $this->db->get('users');
		return $query->result();
	}
}  
?>