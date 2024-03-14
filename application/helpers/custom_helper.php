<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
//admin url
if (!function_exists('admin_url')) {
    function admin_url($str="")
    {
        return base_url() . 'admin/'.$str;
    }
}
//get favicon
if (!function_exists('get_favicon')) {
    function get_favicon()
    {
        $ci =& get_instance();
        return get_image($ci->general_settings->favicon);
    }
}

//get logo
if (!function_exists('get_logo')) {
    function get_logo()
    {
        $ci =& get_instance();
        return get_image($ci->general_settings->logo);
    }
}

//get logo
if (!function_exists('get_email_logo')) {
    function get_email_logo()
    {
        $ci =& get_instance();
        return get_image($ci->general_settings->logo_email);
    }
}

//get user by id
if (!function_exists('get_user')) {
    function get_user($user_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->get_user($user_id);
    }
}

//get current user session
if (!function_exists('get_current_user_session')) {
    function get_current_user_session()
    {
        return @get_user_session();
    }
}


 function get_initial($string){
		if ($string == trim($string) && strpos($string, ' ') !== false) {
		$r=explode(' ',$string);
		$rr=array();	
		for($i=0;$i<count($r);$i++){
		$rr[]=substr($r[$i],0,1);
		}
		$abbr=implode('',$rr);
		}else{
		$abbr=substr($string,0,3);
		}
		return strtoupper($abbr);
	}

    //generate token
    if (!function_exists('generate_token')) {
        function generate_token()
        {
            $token = uniqid("", TRUE);
            $token = str_replace(".", "-", $token);
            return $token . "-" . rand(10000000, 99999999);
        }
    }

    //clean number
    if (!function_exists('clean_number')) {
        function clean_number($num)
        {
            $ci =& get_instance();
            $num = trim($num);
            $num = $ci->security->xss_clean($num);
            $num = intval($num);
            return $num;
        }
    }
    //get logged user
    if (!function_exists('user')) {
        function user()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            $user = $ci->auth_model->get_logged_user();
            if (empty($user)) {
                $ci->auth_model->logout();
            } else {
                return $user;
            }
        }
    }

    //check auth
    if (!function_exists('auth_check')) {
        function auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            return $ci->auth_model->is_logged_in();
        }
    }

    //if auth is dristributer
    if (!function_exists('auth_is_distributer')) {
        function auth_is_distributer()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            return $ci->auth_model->is_distributer();
        }
    }

    //current time
    if (!function_exists('current_time')) {
        function current_time()
        {
            return date('Y-m-d H:i:s');
        }
    }


    //get image by media id
    if (!function_exists('get_image')) {
    function get_image($media_id){
        if($media_id!='' and $media_id!='NULL' and $media_id!=0){
        $ci =& get_instance();
        $conditions['tblName']='media';
        $conditions['where']=array('media_id'=>$media_id,'status'=>1);
        $conditions['limit'] = 1;
        $result=$ci->select->getResult($conditions);
            if(!empty($result)){
                return base_url($result[0]->file_path.$result[0]->file_name);
            }else{
                return base_url('assets/admin/images/no-image.jpg');;
                }
        }else{
            return base_url('assets/admin/images/no-image.jpg');;
        }
    }
    }

    //get image by media id
    if (!function_exists('get_user_image')) {
        function get_user_image($media_id){
            if($media_id!='' and $media_id!='NULL' and $media_id!=0){
            $ci =& get_instance();
            $conditions['tblName']='media';
            $conditions['where']=array('media_id'=>$media_id,'status'=>1);
            $conditions['limit'] = 1;
            $result=$ci->select->getResult($conditions);
                if(!empty($result)){
                    return base_url($result[0]->file_path.$result[0]->file_name);
                }else{
                    return base_url('assets/admin/images/users/user.png');;
                    }
            }else{
                return base_url('assets/admin/images/users/user.png');;
            }
        }
        }
    

    //get file path by media id
    if (!function_exists('get_filepath')) {
    function get_filepath($media_id){
        if($media_id!='' and $media_id!='NULL' and $media_id!=0){
        $ci =& get_instance();
        $conditions['tblName']='media';
        $conditions['where']=array('media_id'=>$media_id,'status'=>1);
        $conditions['limit'] = 1;
        $result=$ci->select->getResult($conditions);
        return $result[0]->file_path.$result[0]->file_name;
        }else{
            return '';
        }
    }
    }
    



//Include javascript
if (!function_exists('PageSpecScript')) {
    function PageSpecScript($page=""){
	if($page!=''){
		$ci =& get_instance();
		return $ci->load->view('admin/pagescript/'.$page);
		}else{
			return null;
		}
    }
}
//Include css
if (!function_exists('PageSpecCss')) {
    function PageSpecCss($page=""){
	if($page!=''){
	$ci =& get_instance();
	return $ci->load->view('admin/pagecss/'.$page);
	}
	else{
		return null;
	}
    }
}

//generate slug
if (!function_exists('generate_slug')) {
    function generate_slug($str)
    {
        $str = trim($str);
        return url_title(convert_accented_characters($str), "-", true);
    }
}
//remove special characters
if (!function_exists('remove_special_characters')) {
    function remove_special_characters($str, $is_slug = false)
    {
        $str = trim($str);
        $str = str_replace('#', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('~', '', $str);
        if ($is_slug == true) {
            $str = str_replace(" ", '-', $str);
            $str = str_replace("'", '', $str);
        }
        return $str;
    }
}
//select value by field name
if (!function_exists('select_value_by_id')) {
function select_value_by_id($table,$field_id,$id,$value)
{
  if($id!='' and $id!='NULL' and $id!=0){
   $ci =& get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where($field_id,$id);  
   $query = $ci->db->get();
   $result= $query->result();
   if(!empty($result)){
    return $result[0]->$value; 
    }else{
        return '-';
    }
    }else{
        return '-';
    }
}
}

//check uncheck
if (!function_exists('check_uncheck')) {
    function check_uncheck($val1,$val2)
    {
        if($val1==$val2){
            $str='checked';
        }else{
            $str='';
        }
        return $str;
    }
}

//check visibility
if (!function_exists('check_visibility')) {
    function check_visibility($val)
    {
        if($val==1){
            $str='<span class="btn btn-success btn-sm"><i class="fas fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Visible"></i></span>';
        }else{
            $str='<span class="btn btn-danger btn-sm"><i class="fas fa-eye-slash" data-bs-toggle="tooltip" data-bs-placement="top" title="Not Visible"></i></span>';
        }
        return $str;
    }
}


//check visibility
if (!function_exists('check_status')) {
    function check_status($val)
    {
        if($val==1){
            $str='<span class="badge bg-success" style="font-size:15px;">Active</span>';
        }else{
            $str='<span class="badge bg-danger" style="font-size:15px;">Inactive</span>';
        }
        return $str;
    }
}


//check visibility
if (!function_exists('check_TrueFlase')) {
    function check_TrueFlase($val)
    {
        if($val==1){
            $str='<span class="btn btn-success btn-sm">True</span>';
        }else{
            $str='<span class="btn btn-warning btn-sm">False</span>';
        }
        return $str;
    }
}
//check visibility
if (!function_exists('check_popular')) {
    function check_popular($val)
    {
        if($val==1){
            $str='<span class="btn btn-success btn-sm"><i class="fas fa-check" data-bs-toggle="tooltip" data-bs-placement="top" title="Visible"></i></span>';
        }else{
            $str='<span class="btn btn-danger btn-sm"><i class="fas fa-times" data-bs-toggle="tooltip" data-bs-placement="top" title="Not Visible"></i></span>';
        }
        return $str;
    }
}

//check custom_radio_button
if (!function_exists('check_custom_radio_button')) {
    function check_custom_radio_button($val1,$val2)
    {
        if($val1==$val2){
            $str='checked';
        }else{
            $str='';
        }
        return $str;
    }
}

//check custom select box
if (!function_exists('check_custom_select_box')) {
    function check_custom_select_box($val1,$val2)
    {
        if($val1==$val2){
            $str='selected';
        }else{
            $str='';
        }
        return $str;
    }
}

//active menu
if (!function_exists('active_menu')) {
    function active_menu($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(2)==$val?'mm-active':'';
    }
}

//active link
if (!function_exists('active_link')) {
    function active_link($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(2)==$val?'active':'';
    }
}

//tab active link
if (!function_exists('tab_active')) {
    function tab_active($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(3)==$val?'active':'';
    }
}

//excerpt
if (!function_exists('excerpt')) {
    function excerpt($str,$limit=4)
    {
       $wordCount = str_word_count($str);
       if($wordCount>4){
       return word_limiter( $str, $limit );
       }else{
           return $str;
       }
    }
}

//print date
if (!function_exists('formatted_date')) {
    function formatted_date($datetime,$format='jS M, Y')
    {
		$d=date_create($datetime);
		$date= date_format($d,$format);
    	$formatedDate=	str_replace("th","<sup>th</sup>",$date);
		return $formatedDate;
    }
}

//print date
if (!function_exists('formatted_pin')) {
    function formatted_pin($pin)
    {
		if(strlen($pin) != 6) {
            return $pin;
        }
        $_pin = substr($pin, 0, 3) . ' ' . substr($pin, 3, 3);
        return $_pin;
    }
}

//get image by media id
if (!function_exists('get_custom_field_value')) {
    function get_custom_field_value($page_id,$field_name){
        if(($page_id!='' and $page_id!='NULL' and $page_id!=0)){
        $ci =& get_instance();
        $conditions['tblName']='custom_fields_value';
        $conditions['where']=array('page_id'=>$page_id,'field_name'=>$field_name);
        $conditions['limit'] = 1;
        $result=$ci->select->getResult($conditions);
            if(!empty($result)){
                return $result[0]->field_value;
            }else{
                return ''; 
            }
       // return base_url($result[0]->file_path.$result[0]->file_name);;
        }else{
            return '';
        }
      }
    }

    ///////send mail
    if (!function_exists('send_mail')) {
    function send_mail($subject,$to,$template,$userdata,$attachment=""){
        $ci =& get_instance();
        $ci->load->model("email_model");
        return $ci->email_model->send_email_data($subject,$to,$template,$userdata,$attachment);
      
   }
}

//print old form data
if (!function_exists('old')) {
    function old($field)
    {
        $ci =& get_instance();
        if (isset($ci->session->flashdata('form_data')[$field])) {
            return html_escape($ci->session->flashdata('form_data')[$field]);
        }
    }
}


//generate slug
if (!function_exists('str_slug')) {
    function str_slug($str)
    {
        $str = trim($str);
        return url_title(convert_accented_characters($str), "-", true);
    }
}

//select value by field name
if (!function_exists('get_id_by_name')) {
    function get_id_by_name($table,$field_name,$field_value,$val)
    {
       $ci =& get_instance();
       $result= $ci->select->custom_qry("select * from ".$table." where ".$field_name."='".$field_value."'");
       if(!empty($result)){
        return $result[0]->$val; 
        }else{
            return '-';
        }
       
    }
    }
//select value by field name
if (!function_exists('get_user_by_id')) {
    function get_user_by_id($id)
    {
       $ci =& get_instance();
       $user = $ci->auth_model->get_user_by_id($id);
        if(!empty($user)){
        return $user; 
        }else{
            return '-';
        }
       
    }
    }

    //select value by field name
if (!function_exists('get_user_by_token')) {
    function get_user_by_token($token)
    {
       $ci =& get_instance();
       $user = $ci->auth_model->get_user_by_token($token);
        if(!empty($user)){
        return $user; 
        }else{
            return '-';
        }
    }
}
    
//get company details
if (!function_exists('get_company_info')) {
    function get_company_info($id)
    {
       $ci =& get_instance();
       $user = $ci->select->custom_qry("SELECT cf.*,u.company_name,u.designation,u.email,u.full_name,u.phone_number from company_profile cf inner join users u on cf.user_id=u.id where cf.user_id=".$id);
     //  $user = $ci->select->select_single_data('company_profile','user_id',$id);
        if(!empty($user)){
        return $user[0]; 
        }else{
            return '-';
        }  
    }
}
  
  
  ///////et solution offered list by company id
if (!function_exists('get_solution_offered_by_company_id')) {
    function get_solution_offered_by_company_id($id)
    {
       $ci =& get_instance();
        return $ci->select->custom_qry("SELECT som.*,so.cat_name from solution_offered_map som inner join categories so on som.offered_id=so.cat_id where som.company_id=".$id);
    }
}

    
//get solution offered list
if (!function_exists('get_solution_offered')) {
    function get_solution_offered($id,$htm=true)
    {
        $html="";
       $ci =& get_instance();
       $result = $ci->select->custom_qry("SELECT som.*,so.cat_name from solution_offered_map som inner join categories so on som.offered_id=so.cat_id where som.company_id=".$id);
        if(!empty($result)){
            if($htm==true){
            foreach($result as $r){
                
                    $html.='<span class="badge bg-info mt-2" style="margin-right: 10px;">'.$r->cat_name.'</span>';
            }
            return $html; 
                }else{
                     foreach($result as $r){
                     $rr[]=$r->cat_name;
                }
                $last  = array_slice($rr, -1);
                $first = join(', ', array_slice($rr, 0, -1));
                $both  = array_filter(array_merge(array($first), $last), 'strlen');
               return join(' & ', $both);
                }
        }else{
            return '-';
        }  
    }
}


///////et industry list by company id
if (!function_exists('get_industry_by_company_id')) {
    function get_industry_by_company_id($id)
    {
       $ci =& get_instance();
        return $ci->select->custom_qry("SELECT im.*,i.industry_name from industry_map im inner join industry i on im.industry_id=i.industry_id
       where im.company_id=".$id);
    }
}

//get market industryu list
if (!function_exists('get_industry')) {
    function get_industry($id,$htm=true)
    {
       // echo "SELECT im.*,i.industry_name from industry_map im inner join industry i on im.industry_id=i.industry_id
       //where im.industry_id=".$id;
        $html="";
       $ci =& get_instance();
       $result = $ci->select->custom_qry("SELECT im.*,i.industry_name from industry_map im inner join industry i on im.industry_id=i.industry_id
       where im.company_id=".$id);
        if(!empty($result)){
             if($htm==true){
            foreach($result as $r){
               
                    $html.='<span class="badge bg-primary mt-2" style="margin-right: 10px;">'.$r->industry_name.'</span>';
            }
             return $html; 
                }else{
                    foreach($result as $r){
                     $rr[]=$r->industry_name;
                }
                $last  = array_slice($rr, -1);
                $first = join(', ', array_slice($rr, 0, -1));
                $both  = array_filter(array_merge(array($first), $last), 'strlen');
               return join(' & ', $both);
                }
            
           
        }else{
            return '-';
        }  
    }
}   


///////et business category list by company id
if (!function_exists('get_businesscategory_by_company_id')) {
    function get_businesscategory_by_company_id($id)
    {
       $ci =& get_instance();
        return $ci->select->custom_qry("SELECT bcm.*,bc.bcat_name from business_category_map bcm inner join business_category bc on bcm.category_id=bc.bcat_id
       where bcm.company_id=".$id);
    }
}

//get business category list
if (!function_exists('get_businesscategory')) {
    function get_businesscategory($id,$htm=true)
    {
       // echo "SELECT im.*,i.industry_name from industry_map im inner join industry i on im.industry_id=i.industry_id
       //where im.industry_id=".$id;
        $html="";
       $ci =& get_instance();
       $result = $ci->select->custom_qry("SELECT bcm.*,bc.bcat_name from business_category_map bcm inner join business_category bc on bcm.category_id=bc.bcat_id
       where bcm.company_id=".$id);
        if(!empty($result)){
             
              if($htm==true){
            foreach($result as $r){
                    $html.='<span class="badge bg-primary mt-2" style="margin-right: 10px;">'.$r->bcat_name.'</span>';
                }
                 return $html; 
            }
            else{
                foreach($result as $r){
                     $rr[]=$r->bcat_name;
                }
                $last  = array_slice($rr, -1);
                $first = join(', ', array_slice($rr, 0, -1));
                $both  = array_filter(array_merge(array($first), $last), 'strlen');
               return join(' & ', $both);
                }
           
        }else{
            return '-';
        }  
    }
}  


///////et business category list by company id
if (!function_exists('get_market_serviced_by_company_id')) {
    function get_market_serviced_by_company_id($id)
    {
       $ci =& get_instance();
        return $ci->select->custom_qry("SELECT msm.*,ms.market_name from market_serviced_map msm inner join market_serviced ms on msm.market_id=ms.market_id
       where msm.company_id=".$id);
    }
}

 //get market serviced list
if (!function_exists('get_market_serviced')) {
    function get_market_serviced($id,$htm=true)
    {
        $html="";
       $ci =& get_instance();
       $result = $ci->select->custom_qry("SELECT msm.*,ms.market_name from market_serviced_map msm inner join market_serviced ms on msm.market_id=ms.market_id
       where msm.company_id=".$id);
        if(!empty($result)){
            if($htm==true){
            foreach($result as $r){
                    $html.='<span class="badge bg-success mt-2" style="margin-right: 10px;">'.$r->market_name.'</span>';
                 }
                  return $html; 
            }else{
                 foreach($result as $r){
                     $rr[]=$r->market_name;
                }
                $last  = array_slice($rr, -1);
                $first = join(', ', array_slice($rr, 0, -1));
                $both  = array_filter(array_merge(array($first), $last), 'strlen');
               return join(' & ', $both);

                }
           
           
        }else{
            return '-';
        }  
    }
}   


if (!function_exists('check_favorite')) {
    function check_favorite($user_id,$id)
    {
       $ci =& get_instance();
       $result = $ci->select->custom_qry("select * from favorite_products where user_id=".$user_id." and product_id =".$id);
       if(!empty($result)){
        $ci->delete_model->delete_multiple_clause('favorite_products','product_id ',$id,'user_id',$user_id);
         return false;
       }else{
        $ci->insert_model->insert_data(array('user_id'=>$user_id,'product_id '=>$id),'favorite_products');
        return true;
       }
    }
} 


if (!function_exists('is_favorite')) {
    function is_favorite($user_id,$id)
    {
       $ci =& get_instance();
       $result = $ci->select->custom_qry("select * from favorite_products where user_id=".$user_id." and product_id =".$id);
       if(!empty($result)){
        //  return '<i class="fas fa-heart" id="icon'.$id.'"></i>';
        return true;
       }else{
        // return '<i class="far fa-heart"  id="icon'.$id.'"></i>';
        return false;
       }
    }
} 

if (!function_exists('searchForId')) {
function searchForId($id, $array) {
    if(!empty($array)){
    foreach ($array as $key => $val) {
        if ($val['facility_id'] === $id) {
            return true;
        }
    }
    }else{
        return false;
    }
    return false;
 }
}

 if (!function_exists('checkfacility')) {
 function checkfacility($id, $array) {
    if(!empty($array)){
    foreach ($array as $key => $val) {
        if ($val === $id) {
            return true;
        }
    }
    }else{
        return false;
    }
    return false;
 }
 }
 
 if (!function_exists('checksubfacility')) {
 function checksubfacility($id, $array) {
    if(!empty($array)){
    foreach ($array as $key => $val) {
        if ($val['cat_id'] === $id) {
            return true;
        }
    }
    }else{
        return false;
    }
    return false;
 }
 }
 
 //check uncheck
// if (!function_exists('check_projectStatus')) {
//     function check_projectStatus($val)
//     {
//         if($val1==1){
//             $str='checked';
//         }elseif($val==2){
//             $str='checked';
//         }
//         return $str;
//     }

if(!function_exists('check_annualConsumption')){
    function check_annualConsumption($val){
        if($val <=10000){
            $consumption='10000';
        }elseif($val >=10001 and $val <=15000){
            $consumption='10001-15000';
        }elseif($val >=15001 and $val <=25000){
            $consumption='15001-25000'; 
        }elseif($val >=25001 and $val <=55000){
            $consumption='25001-55000'; 
        }elseif($val >=55001 and $val <=90000){
            $consumption='55001-90000';
        }elseif($val >=90001 and $val <=200000){
            $consumption='90001-200000';
        }elseif($val >=200001 and $val <=350000){
            $consumption='200001-350000';
        }elseif($val >=350001 and $val <=500000){
            $consumption='350001-500000';
        }elseif($val >=500001 and $val <=900000){
            $consumption='500001-900000';
        }elseif($val >=900001 and $val <=2000000){
            $consumption='900001-2000000';
        }elseif($val >=2000001 and $val <=3500000){
            $consumption='2000001-3500000';
        }elseif($val >=3500001 and $val <=5000000){
            $consumption='3500001-5000000';
        }else{
            $consumption='5000001';
        }
        return $consumption;
    }
}

if(!function_exists('getBidding_Fees')){
    function getBidding_Fees($consumer_type,$cat_id,$utility_cost,$vpf=""){
      //  $facility_type,
        $ci =& get_instance();
       $annual_cost=check_annualConsumption($utility_cost);
        $result=$ci->select->get_biddingFees($consumer_type,$cat_id,$annual_cost);
        // echo '<pre>';
        // print_r($result);
      //  $facility_type,
      //  return $result[0]->fees;
     //  echo 'count='.count($result);die;
   // echo $vpf;
     
     
      if(!empty($result)){
           if($vpf==1){
                  $feeField='pvp_fees';
              }else{
                 $feeField='fees';  
              }
          if(count($result)>1){
            $max1=max_attribute_in_array($result,$feeField);
          //  echo $max1;
            $max2=get_second_max(json_decode(json_encode($result), true),$vpf);
           // echo $max2;
            $bidFees=$max1+$max2;
            return array('currency_code'=>$result[0]->currency_code,'fees'=>$bidFees);
          }else{
             if(max_attribute_in_array($result,$feeField)){
                // return select_value_by_id('currencies','id',$result[0]->currency_code,'code').' '.max_attribute_in_array($result,'fees');
                return array('currency_code'=>$result[0]->currency_code,'fees'=>max_attribute_in_array($result,$feeField));
                 }else{
                     return array('currency_code'=>4,'fees'=>0);
                 }
             }
      }else{
        return array('currency_code'=>4,'fees'=>0);
    }
    }
}

function get_second_max($array,$vpf) {
    $all = array();
    foreach($array as $key=>$value){
         if($vpf==1){
        $all[$key] = $value['pvp_fees'];
         }else{
        $all[$key] = $value['fees'];
         }
    }

   rsort($all);
   //  echo '<pre>';
  //  print_r($all);
       //  if($vpf==1){
         return $all[1];
       //  }else{
        //  return $all[0];    
        // }
}
if(!function_exists('max_attribute_in_array')){
function max_attribute_in_array($array, $prop) {
    return max(array_map(function($o) use($prop) {
                            return $o->$prop;
                         },
                         $array));
}
}




if(!function_exists('check_isAlreadyBid')){
    function check_isAlreadyBid($project_id){
        $ci =& get_instance();
       $result= $ci->select->check_isAlreadyBid($project_id);
       if(count($result)>0){
           return true;
       }else{
           return false;
       }
    }
}


if(!function_exists('bid_count')){
    function bid_count($id){
        $ci =& get_instance();
        return $ci->select->bid_count($id);
    }
}


if(!function_exists('bid_status')){
    function bid_status($val){
        if($val==0){
            $status ='Pending';
        }elseif($val==1){
            $status ='Accepted';
        }else{
            $status ='Rejected';
        }
        return $status;
    }
}

/////checkBookestatus

if(!function_exists('checkBookestatus')){
    function checkBookestatus($slot_id,$date){
        $ci =& get_instance();
        $conditions['tblName']='virtual_energy_audit';
        $conditions['where']=array('slot_id'=>$slot_id,'slot_date'=>$date);
        $conditions['returnType'] = 'count';
        $totalRec=$ci->select->getResult($conditions);
        if($totalRec>0){
            return 'booked';
        }else{
            return '';
        }
    }
}

///////////////05/05/2022

if(!function_exists('marketserviceSelected')){
    function marketserviceSelected($companyId,$marketId){
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * from market_serviced_map where company_id=".$companyId." and market_id=".$marketId);
        if(!empty($result)){
            return 'selected';
        }else{
            return '';
        }
    }
}


if(!function_exists('industySelected')){
    function industySelected($companyId,$industryId){
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * from industry_map where company_id=".$companyId." and industry_id=".$industryId);
        if(!empty($result)){
            return 'selected';
        }else{
            return '';
        }
    }
}


if(!function_exists('businesscategorySelected')){
    function businesscategorySelected($companyId,$categoryId){
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * from business_category_map where company_id=".$companyId." and category_id=".$categoryId);
        if(!empty($result)){
            return 'selected';
        }else{
            return '';
        }
    }
}

if(!function_exists('solutionofferedSelected')){
    function solutionofferedSelected($companyId,$offeredId){
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * from solution_offered_map where company_id=".$companyId." and offered_id=".$offeredId);
        if(!empty($result)){
            return 'selected';
        }else{
            return '';
        }
    }
}

if(!function_exists('checksolutionoffermap')){
    function checksolutionoffermap($companyId,$offeredID){
        $ci =& get_instance();
        $conditions['tblName']='solution_offered_map';
        $conditions['where']=array('company_id'=>$companyId,'offered_id'=>$offeredID);
        $conditions['returnType'] = 'count';
        $result=$ci->select->getResult($conditions);
        if($result>0){
            return false;
        }else{
            return true;
        }
    }
}

if(!function_exists('checkcard')){
    function checkcard($userid){
            $ci =& get_instance();
        	$conditions['tblName']='save_cards';
			$conditions['where']=array('user_id'=>$userid);
			$cardDetails=$ci->select->getResult($conditions);
        if(!empty($cardDetails)){
            return true;
        }else{
            return false;
        }
    }
}

if(!function_exists('getLocations')){
    function getLocations($cityId){
       $city= select_value_by_id('locations','city_id',$cityId,'city_name');
       $state=select_value_by_id('locations','city_id',$cityId,'state_name');
       return $city.', '.$state;
    }
}


if(!function_exists('getTotalProjects')){
    function getTotalProjects(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT count(*) c FROM `projects` where is_draft=0");
            return $result[0]->c;
    }
}

if(!function_exists('getTotalRevenue')){
    function getTotalRevenue(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT sum(paid_amount) amount FROM `payment_details` where payment_status='succeeded'");
            return $result[0]->amount;
    }
}

if(!function_exists('getTotalProvider')){
    function getTotalProvider(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT count(*) provider FROM `users` where role='provider'");
            return $result[0]->provider;
    }
}

if(!function_exists('getTotalConsumer')){
    function getTotalConsumer(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT count(*) consumer FROM `users` where role='consumer'");
            return $result[0]->consumer;
    }
}

if(!function_exists('getLastMonthRevenue')){
    function getLastMonthRevenue(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT MONTH(created) month,sum(paid_amount) amount from payment_details where MONTH(created)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)");
            return $result[0]->amount;
    }
}

if(!function_exists('getCurrentMonthRevenue')){
    function getCurrentMonthRevenue(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT MONTH(created) month,sum(paid_amount) amount from payment_details where MONTH(created)=MONTH(CURRENT_DATE)");
            return $result[0]->amount;
    }
}

if(!function_exists('ifOthers')){
    function ifOthers($id){
            $ci =& get_instance();
            $result = select_value_by_id('categories','cat_id',$id,'cat_name');
            
            if($result==='Others'){
                return true;
            }else{
            return false;;
            }
    }
}


//get market industryu list
if (!function_exists('get_availablein')) {
    function get_availablein($id,$htm=true)
    {
       // echo "SELECT im.*,i.industry_name from industry_map im inner join industry i on im.industry_id=i.industry_id
       //where im.industry_id=".$id;
        $html="";
       $ci =& get_instance();
       $result = $ci->select->custom_qry("SELECT avm.*,a.available_name from available_in_map avm inner join available_in a on avm.avail_id=a.available_id
       where avm.product_id =".$id);
        if(!empty($result)){
            foreach($result as $r){
                if($htm==true){
                    $html.='<span class="badge bg-primary mt-2" style="margin-right: 10px;">'.$r->available_name.'</span>';
                }else{
                    $html.=$r->available_name.', ';
                }
            }
            return $html; 
        }else{
            return '-';
        }  
    }
}  

//reset flash data
if (!function_exists('reset_flash_data')) {
    function reset_flash_data()
    {
        $ci =& get_instance();
        $ci->session->set_flashdata('errors', "");
        $ci->session->set_flashdata('error', "");
        $ci->session->set_flashdata('success', "");
    }
}

//generate unique id
if (!function_exists('generate_unique_id')) {
    function generate_unique_id()
    {
        $id = uniqid("", TRUE);
        $id = str_replace(".", "-", $id);
        return $id . "-" . rand(10000000, 99999999);
    }
}


//get shipping address
if (!function_exists('shipping_address')) {
    function shipping_address()
    {
        $ci =& get_instance();
        $html='<p class="m-4">';
        $html.=$ci->auth_user->shipping_first_name.' '.$ci->auth_user->shipping_last_name .'<br>';
        $html.=$ci->auth_user->shipping_email.'<br>';
        $html.=$ci->auth_user->shipping_phone_number.'<br>';
        $html.=$ci->auth_user->shipping_address_1.'<br>';
        if(!empty($ci->auth_user->shipping_address_2)){
            $html.=$ci->auth_user->shipping_address_2.'<br>';
        }
        if(!empty($ci->auth_user->shipping_landmark)){
            $html.=$ci->auth_user->shipping_landmark.'<br>';
        }
        $html.=$ci->auth_user->shipping_zip_code.'<br>';
        $html.=select_value_by_id('location_countries','id',$ci->auth_user->shipping_country,'name').', ';
        $html.=select_value_by_id('location_states','id',$ci->auth_user->shipping_state,'name').', ';
        $html.=select_value_by_id('location_cities','id',$ci->auth_user->shipping_city,'name');
        $html.='</p>';
        return $html;
    }
}

//get billing address
if (!function_exists('billing_address')) {
    function billing_address()
    {
        $ci =& get_instance();
        $con=array(
            'tblName' => 'address_book',
            'where' => array(
                'user_id' =>$ci->auth_user->id,
                'is_default' =>1
            )
        );
        $result=$ci->select->getResult($con);
        if(!empty($result)){
            $billing=$result[0];
            $html='<p class="m-4">';
            $html.=$billing->billing_first_name.' '.$billing->billing_last_name .'<br>';
            $html.=$billing->billing_email.'<br>';
            $html.=$billing->billing_phone_number.'<br>';
            $html.=$billing->billing_address_1.'<br>';
            if(!empty($billing->billing_address_2)){
                $html.=$billing->billing_address_2.'<br>';
            }
            if(!empty($billing->billing_landmark)){
                $html.=$billing->billing_landmark.'<br>';
            }
            $html.=$billing->billing_zip_code.'<br>';
            $html.=select_value_by_id('location_countries','id',$billing->billing_country,'name').', ';
            $html.=select_value_by_id('location_states','id',$billing->billing_state,'name').', ';
            $html.=select_value_by_id('location_cities','id',$billing->billing_city,'name');
            $html.='</p>';
            return $html;
        }else{
            return false;
        }
    }
}

//get address by id
//get billing address
if (!function_exists('get_address_by_id')) {
    function get_address_by_id($id)
    {
        $ci =& get_instance();
        $con=array(
            'tblName' => 'address_book',
            'where' => array(
                'id' =>$id
            )
        );
        $result=$ci->select->getResult($con);
        if(!empty($result)){
            $billing=$result[0];
            $html='';
            // $html.=$billing->billing_first_name.' '.$billing->billing_last_name .',';
            // $html.=$billing->billing_email.',';
            // $html.=$billing->billing_phone_number.',';
            $html.=$billing->billing_address_1.',';
            if(!empty($billing->billing_address_2)){
                $html.=$billing->billing_address_2.',';
            }
            if(!empty($billing->billing_landmark)){
                $html.=$billing->billing_landmark.',';
            }
            $html.=$billing->billing_zip_code.',';
            $html.=select_value_by_id('location_countries','id',$billing->billing_country,'name').', ';
            $html.=select_value_by_id('location_states','id',$billing->billing_state,'name').', ';
            // $html.=select_value_by_id('location_cities','id',$billing->billing_city,'name');
            $html.=is_numeric($billing->billing_city) ? select_value_by_id('location_cities','id',$billing->billing_city,'name') : $billing->billing_city;
           // $html.='</p>';
            return $html;
        }else{
            return false;
        }
    }
}

//get location
if (!function_exists('get_location')) {
    function get_location($object)
    {
        $ci =& get_instance();
        $location = "";
        if (!empty($object)) {
            if (!empty($object->address)) {
                $location = $object->address;
            }
            if (!empty($object->zip_code)) {
                $location .= " " . $object->zip_code;
            }
            if (!empty($object->city_id)) {
                $city = $ci->location_model->get_city($object->city_id);
                if (!empty($city)) {
                    if (!empty($object->address) || !empty($object->zip_code)) {
                        $location .= " ";
                    }
                    $location .= $city->name;
                }
            }
            if (!empty($object->state_id)) {
                $state = $ci->location_model->get_state($object->state_id);
                if (!empty($state)) {
                    if (!empty($object->address) || !empty($object->zip_code) || !empty($object->city_id)) {
                        $location .= ", ";
                    }
                    $location .= $state->name;
                }
            }
            if (!empty($object->country_id)) {
                $country = $ci->location_model->get_country($object->country_id);
                if (!empty($country)) {
                    if (!empty($object->state_id) || $object->city_id || !empty($object->address) || !empty($object->zip_code)) {
                        $location .= ", ";
                    }
                    $location .= $country->name;
                }
            }
        }
        return $location;
    }
}

//get location input
if (!function_exists('get_location_input')) {
    function get_location_input($country_id, $state_id, $city_id)
    {
        $ci =& get_instance();
        if (!empty($country_id) || !empty($state_id) || !empty($city_id)) {
            return $ci->location_model->get_location_input($country_id, $state_id, $city_id);
        }
        return "";
    }
}



//is marketplace active
if (!function_exists('is_marketplace_active')) {
    function is_marketplace_active()
    {
        $ci =& get_instance();
        if ($ci->general_settings->marketplace_system == 1) {
            return true;
        }
        return false;
    }
}
//is bidding system active
if (!function_exists('is_bidding_system_active')) {
    function is_bidding_system_active()
    {
        $ci =& get_instance();
        if ($ci->general_settings->bidding_system == 1) {
            return true;
        }
        return false;
    }
}

//show cart
if (!function_exists('is_sale_active')) {
    function is_sale_active()
    {
        $ci =& get_instance();
        if (is_marketplace_active() || is_bidding_system_active()) {
            return true;
        }
        return false;
    }
}


if (!function_exists('time_ago')) {
    function time_ago($timestamp)
    {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes = round($seconds / 60);           // value 60 is seconds
        $hours = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks = round($seconds / 604800);          // 7*24*60*60;
        $months = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if ($seconds <= 60) {
            return "Just Now";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "1 " . "minute ago";
            } else {
                return "$minutes " . 'minute ago';
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return "1 " . 'hour ago';
            } else {
                return "$hours " . 'hours ago';
            }
        } else if ($days <= 30) {
            if ($days == 1) {
                return "1 " . 'day ago';
            } else {
                return "$days " . 'days ago';
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return "1 " . 'month ago';
            } else {
                return "$months " . 'months ago';
            }
        } else {
            if ($years == 1) {
                return "1 " . 'year ago';
            } else {
                return "$years " . 'years ago';
            }
        }
    }
}

//get order shipping
if (!function_exists('get_order_shipping')) {
    function get_order_shipping($order_id)
    {
        $ci =& get_instance();
        return $ci->order_model->get_order_shipping($order_id);
    }
}

//get order status
if (!function_exists('get_order_status')) {
    function get_order_status($status)
    {
        switch($status){
            case "awaiting_payment" : $stat="Awaiting Payment"; break;
            case "payment_received" : $stat="Payment Received"; break;
            case "order_processing" : $stat="Processing"; break;
            case "shipped" : $stat="Shipped"; break;
            case "awaiting_payment" : $stat="Awaiting Payment"; break;
            case "completed" : $stat="Completed"; break;
            case "cancelled" : $stat="Cancelled"; break;
           
        }
         return $stat;
    }
}

//get javascript
if (!function_exists('get_custom_javascript')) {
    function get_custom_javascript()
    {
        $ci =& get_instance();
        return htmlspecialchars_decode($ci->general_settings->custom_javascript_codes);
    }
}


//get css
if (!function_exists('get_custom_css')) {
    function get_custom_css()
    {
        $ci =& get_instance();
        return '<style>'.$ci->general_settings->custom_css_codes.'</style>';
    }
}


/////get max no
if(!function_exists('get_nxt_orderNo')){
    function get_nxt_orderNo(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT max(cat_order_no) c FROM `category`");
            return $result[0]->c + 1;
    }
}


/////get max no
if(!function_exists('check_has_child')){
    function check_has_child($ques_id){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT has_child FROM `question_options` where ques_id=".$ques_id);
            if(!empty($result)){
                if($result[0]->has_child==1){
                    return true;
                }else{
                    return false;
                }
           }else{
               return false;
           }
    }
}



//check uncheck olption
if (!function_exists('check_uncheck_opt')) {
    function check_uncheck_opt($ques_id,$opt_id,$token)
    {
       //  echo 'Token='.$token;die;
        $ans_id = get_ans_id_by_token($token);
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `answer_options` where ques_id=".$ques_id." and opt_id=".$opt_id." and ans_id=".$ans_id);

        if(count($result)>0){
            $str='checked';
        }else{
            $str='';
        }
        return $str;
    }
}

//check uncheck parent option
if (!function_exists('check_uncheck_parent_opt')) {
    function check_uncheck_parent_opt($ques_id,$opt_id,$token)
    {
        $ans_id = get_ans_id_by_token($token);
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `answer_options` where ques_id=".$ques_id." and parent_opt_id=".$opt_id." and ans_id=".$ans_id);

        if(count($result)>0){
            $str='checked';
        }else{
            $str='';
        }
        return $str;
    }
}


if (!function_exists('get_ans_id_by_token')){
    function get_ans_id_by_token($token){
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `answers` where token='".$token."'");
      //  echo "SELECT * FROM `answers` where token='".$token."'";die;
        if(!empty($result)){
            return $result[0]->ans_id;
        }else{
            return false;
        }
    }
}


//check uncheck olption
if (!function_exists('check_opt_exists')) {
    function check_opt_exists($ques_id,$token)
    {
        $ans_id = get_ans_id_by_token($token);
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `answer_options` where ques_id=".$ques_id."  and ans_id=".$ans_id);
      // echo "SELECT * FROM `answer_options` where ques_id=".$ques_id." and opt_id=".$opt_id." and ans_id=".$ans_id;die;
        if(count($result)>0){
           return true;
        }else{
           return false;
        }
    }
}

//check uncheck olption
if (!function_exists('get_dob')) {
    function get_dob($token)
    {
       // $ans_id = get_dob($token);
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `answers` where token='".$token."'");
        if(count($result)>0){
           return formatted_date($result[0]->dob,'d/m/Y');
        }else{
            return "";
        }
        // return $str;
    }
}


//check uncheck olption
if (!function_exists('check_validate')) {
    function check_validate($ques_id,$token)
    {
       // echo $ans_id;die;
        $ans_id = get_ans_id_by_token($token);
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `answer_options` where ques_id=".$ques_id." and ans_id=".$ans_id);

        if(count($result)>0){
           return true;
        }else{
            return false;
        }
        // return $str;
    }
}

//check uncheck olption
if (!function_exists('get_age')) {
    function get_age($dob)
    {
       // echo $dob;
        $dateOfBirth = $dob;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
        //return $age;
    }
}


//get score
if (!function_exists('get_total_marks')) {
    function get_total_marks()
    {
        $ci =& get_instance();
        $ans_id = get_ans_id_by_token($ci->session->userdata('user_token'));
        $result = $ci->select->custom_qry("SELECT sum(opt_weightage) score FROM `question_options` WHERE opt_id IN (SELECT opt_id from answer_options where ans_id=".$ans_id.")");

        if(!empty($result)){
           return $result[0]->score;
        }else{
            return null;
        }
    }
}

//check uncheck olption
if (!function_exists('get_result')) {
    function get_result()
    {
        $result = null;
        $score = get_total_marks();
        $ci =& get_instance();
       // $score = 61;
      // echo $score .'<br>';
      // echo get_dob_weightage();
       $score = $score + get_dob_weightage();
   //    echo $score .'<br>';
        $result = $ci->select->custom_qry("SELECT * FROM `weightage`");

        if(!empty($result)){
            foreach($result as $r){
            if($score >= $r->min_val && $score <= $r->max_val){
            $result = $r->title;
            }else{
                if($r->max_val==0){
                 if($score >= $r->min_val){
                  $result = $r->title;
                   }
                 }
                }
         }

        }
        return $result;
    }
}


if(!function_exists('get_dob_weightage')){
    function get_dob_weightage(){
        $ci =& get_instance();
        $dob = get_dob($ci->session->userdata('user_token'));
        $score = get_age($dob);
        $result = $ci->select->custom_qry("SELECT * FROM `dob_weightage`");
    
        if(!empty($result)){
            foreach($result as $r){
            if($score >= $r->min_val && $score <= $r->max_val){
            $result = $r->weightage;
            }else{
                if($r->max_val==0){
                 if($score >= $r->min_val){
                  $result = $r->title;
                   }
                 }
                }
         }
    
        }
        return $result;
    }
}

/////get max no
if(!function_exists('nxt_questionNo')){
    function nxt_questionNo($ques_no){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT `ques_order_no` FROM `questions` WHERE `is_visible`=1 and `ques_order_no` > ".$ques_no." limit 1");
            if(!empty($result)){
                return $result[0]->ques_order_no;
            }else{
                return 0;
            }
    }
}


/////get max no
if(!function_exists('prev_questionNo')){
    function prev_questionNo($ques_no,$ans_id){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT `ques_order_no` FROM `questions` WHERE `is_visible`=1 and `ques_order_no` < ".$ques_no." AND ques_id in(SELECT ques_id FROM `answer_options` where `ans_id`=".$ans_id.") ORDER BY `ques_order_no` desc limit 1");
            if(!empty($result)){
                return $result[0]->ques_order_no;
            }else{
                return 0;
            }
    }
}

//check uncheck parent option
if (!function_exists('show_hide_parent_opt_div')) {
    function show_hide_parent_opt_div($ques_id,$opt_id,$token)
    {
        $ans_id = get_ans_id_by_token($token);
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `answer_options` where ques_id=".$ques_id." and parent_opt_id=".$opt_id." and ans_id=".$ans_id);

        if(count($result)>0){
            $str='show';
        }else{
            $str='';
        }
        return $str;
    }
}


//check uncheck olption
if (!function_exists('check_mlti_opt_exists')) {
    function check_mlti_opt_exists($ques_id,$parent_id,$opt_id,$ans_id)
    {
        //$ans_id = get_ans_id_by_token($token);
        $ci =& get_instance();
        if($parent_id!=''){
            $and = " and parent_opt_id=".$parent_id;
        }else{
            $and = "";
        }
        if($opt_id!=''){
            $orand = " and opt_id=".$opt_id;
        }else{
            $orand = "";
        }
        $result = $ci->select->custom_qry("SELECT * FROM `answer_options` where ques_id=".$ques_id.$and.$orand." and ans_id=".$ans_id);
      // echo "SELECT * FROM `answer_options` where ques_id=".$ques_id." and opt_id=".$opt_id." and ans_id=".$ans_id;die;
        if(!empty($result)){
           return true;
        }else{
           return false;
        }
    }
}

//check uncheck olption
if (!function_exists('check_eligible_user')) {
    function check_eligible_user($user_id)
    {
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT user_id,created_at FROM `saved_answers` where user_id = ".$user_id." order by created_at desc limit 1");
        if(!empty($result)){
            if(get_days_diff($result[0]->created_at) > 90){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
}

if (!function_exists('get_days_diff')) {
    function get_days_diff($startDay)
    {
        $today = date('Y-m-d');
        $date1=date_create($startDay);
        $date2=date_create($today);
        $diff=date_diff($date1,$date2);
        $days = $diff->format("%a");
        if($days >=0){
            return $days;
        }else{
            return 0;
        }
    }
}


///////////////////////////////////for admin
//get score
if (!function_exists('get_total_marks_admin')) {
    function get_total_marks_admin($ans_id)
    {
        $ci =& get_instance();
       // $ans_id = get_ans_id_by_token($ci->session->userdata('user_token'));
        $result = $ci->select->custom_qry("SELECT sum(opt_weightage) score FROM `question_options` WHERE opt_id IN (SELECT opt_id from saved_answer_options where ans_id=".$ans_id.")");

        if(!empty($result)){
           return $result[0]->score;
        }else{
            return null;
        }
    }
}

//check uncheck olption
if (!function_exists('get_result_admin')) {
    function get_result_admin($ans_id)
    {
        $result = null;
        $score = get_total_marks_admin($ans_id);
        $ci =& get_instance();
       // $score = 61;
      // echo $score .'<br>';
      // echo get_dob_weightage();
       $score = ($score) + ((float)get_dob_weightage());
   //    echo $score .'<br>';
        $result = $ci->select->custom_qry("SELECT * FROM `weightage`");

        if(!empty($result)){
            foreach($result as $r){
            if($score >= $r->min_val && $score <= $r->max_val){
            $result = $r->title;
            }else{
                if($r->max_val==0){
                 if($score >= $r->min_val){
                  $result = $r->title;
                   }
                 }
                }
         }

        }
        return $result;
    }
}


if (!function_exists('check_project_exists')){
    function check_project_exists($id){
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `proj_gallery` where portfolio_id='".$id."'");
        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }
}


if (!function_exists('get_proj_id_by_portfolio')){
    function get_proj_id_by_portfolio($id){
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM `proj_gallery` where portfolio_id='".$id."'");
        if(!empty($result)){
            return $result[0]->proj_id;
        }else{
            return 0;
        }
    }
}


function checkduplicate_technician($aadhar){
    $ci =& get_instance();
    $conditions['tblName']='users';
    $conditions['where']=array('aadhar'=>$aadhar);
    $conditions['returnType']="count";
      $result=$ci->select->getResult($conditions);
    return $result > 0 ? false : true;
}

function get_district_name($state_code,$dist_code)
	  {
		 $ci =& get_instance();
         $ci->db->select('*');
		 $ci->db->from('location_districts');
		 $ci->db->where('state_id',$state_code);
		 $ci->db->where('dist_code',$dist_code);  
		 $query = $ci->db->get();
		 $result= $query->result();
		 return $result[0]->name;
	  }
	  
	    function get_taluk_name($taluk_id)
	  {
		 $ci =& get_instance();
         $ci->db->select('*');
		 $ci->db->from('taluk_master');
		 $ci->db->where('taluk_id',$taluk_id);
		 $query = $ci->db->get();
		 $result= $query->result();
		 return $result[0]->taluk_name;
	  }


function get_region($state_code,$dist_code,$taluk_code,$show_state=false){
    $stateName=select_value_by_id('location_states','id',$state_code,'name');
    $distName=get_district_name($state_code,$dist_code);
    $talukName=get_taluk_name($taluk_code);
    if($show_state==true){
    return $stateName.'/'.$distName.'/'.$talukName;
}else{
    return $distName.'/'.$talukName;
}
}

function generate_technician_id($user_id){
    $user=get_user_by_id($user_id);
    $getregion=get_region($user->state_code,$user->dist_code,$user->taluk_code,true);
    $region=explode('/',$getregion);
    $stateabbr= get_initial($region[0]);
    $distabbr= get_initial($region[1]);
    $talukabbr= get_initial($region[2]);
    return  $stateabbr.'/'.$distabbr.'/'.$talukabbr.'/'.generate_id();
   }
   
   

   function generate_id(){
    $ci =& get_instance();
    $result = $ci->select->custom_qry("SELECT * FROM `tech_id_gen`");
    $number =$result[0]->reg_number+1;
    $ci->edit_model->edit(array('reg_number'=>$number),$result[0]->id,'id','tech_id_gen');
    return str_pad($number, 4 , "0", STR_PAD_LEFT);
   }



   
if (!function_exists('send_sms')){
    function send_sms($mobile,$msg){
          // Account and API details
          $apiKey = urlencode('G4rpUSLOeECABEVe6l12cQ');
          // text Message details
          $phone_numbers = urlencode('91'.$mobile);
          $sender = urlencode('ANDUTR');
          $msg = rawurlencode($msg);
          $data = 'APIKey='.$apiKey.'&senderid='.$sender.'&channel=2&DCS=0&flashsms=0&number='.$phone_numbers.'&text='.$msg.'&route=Balancer';
          // Send the GET request with cURL to send SMS
          $ch = curl_init('http://sms.innovativecreations.in/api/mt/SendSMS?'.$data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          curl_close($ch);
          
          // Get the response here
          return $response;
    
 }
}


//is admin
if (!function_exists('is_admin')) {
    function is_admin()
    {
        $ci =& get_instance();
        if ($ci->auth_check) {
            if ($ci->auth_user->role == "admin") {
                return true;
            }
        }
        return false;
    }
}
/////////////////////////////04/06/2023
function is_president(){
    $ci =& get_instance();
    if ($ci->auth_check) {
        if ($ci->auth_user->role == "pres") {
            return true;
        }
    }
    return false;
}
function is_treasurer(){
    $ci =& get_instance();
    if ($ci->auth_check) {
        if ($ci->auth_user->role == "trsr") {
            return true;
        }
    }
    return false;
}

function is_secretary(){
    $ci =& get_instance();
    if ($ci->auth_check) {
        if ($ci->auth_user->role == "secy") {
            return true;
        }
    }
    return false;
}

function is_technician(){
    $ci =& get_instance();
    if ($ci->auth_check) {
        if ($ci->auth_user->role == "technician") {
            return true;
        }
    }
    return false;
}

function is_customer(){
    $ci =& get_instance();
    if ($ci->auth_check) {
        if ($ci->auth_user->role == "customer") {
            return true;
        }
    }
    return false;
}



function is_districthead(){
    // $ci =& get_instance();
    // $user=$ci->select->currrent_userdetails();
    // if($user[0]->user_type=='dist_head'){
    // return true;
    // }else{ return false;}
}
function is_talukhead(){
    // $ci =& get_instance();
    // $user=$ci->select->currrent_userdetails();
    // if($user[0]->user_type=='taluk_head'){
    // return true;
    // }else{ return false;}
}

function get_service_area_pincode($user_id){
    $ci =& get_instance();
   $conditions['tblName']='serving_area_pincode';
   $conditions['where']=array('user_id'=>$user_id);
     $result=$ci->select->getResult($conditions);
   $arr=array();
   if(!empty($result)){
    foreach($result as $r): $arr[]=$r->pincode; endforeach;
    return implode(' , ',$arr);
    }else{
    return null;
   }
}

/////////////////15/06/2023

function get_expiryDate($date,$pacaage){
    $stop_date = new DateTime($date);
    $stop_date->modify('+'.$pacaage.' day');
    return $stop_date->format('Y-m-d');
    }
    



    if (!function_exists('check_review')) {
        function check_review($user_id,$id)
        {
           $ci =& get_instance();
        //    $result = $ci->select->custom_qry("select * from product_review ");
           $result = $ci->select->custom_qry("select * from product_review where user_id=".$user_id." and product_id=".$id);
           if(!empty($result)){
           // $ci->delete_model->delete_multiple_clause('favorite_products','product_id',$id,'user_id',$user_id);
             return true;
           }else{
          //  $ci->insert_model->insert_data(array('user_id'=>$user_id,'product_id'=>$id),'favorite_products');
            return false;
           }
        }
    } 


    //check uncheck
if (!function_exists('address_type')) {
    function address_type($val)
    {
        if($val==1){
            $str='Home';
        }else{
            $str='Office';
        }
        return $str;
    }
}

    

if (!function_exists('numberTowords')) {
    function numberTowords($number)
   {
       //$number = 190908100.25;
      $no = floor($number);
      $point = round($number - $no, 2) * 100;
      $hundred = null;
      $pp = null;
      $digits_1 = strlen($no);
      $i = 0;
      $str = array();
      $words = array('0' => '', '1' => 'One', '2' => 'Two',
       '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
       '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
       '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
       '13' => 'Thirteen', '14' => 'Fourteen',
       '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
       '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
       '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
       '60' => 'Sixty', '70' => 'Seventy',
       '80' => 'Eighty', '90' => 'Ninety');
      $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
      while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
           $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
           $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
           $str [] = ($number < 21) ? $words[$number] .
               " " . $digits[$counter] . $plural . " " . $hundred
               :
               $words[floor($number / 10) * 10]
               . " " . $words[$number % 10] . " "
               . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
     }
     $str = array_reverse($str);
     $result = implode('', $str);
     $points = ($point) ?
       "and Point " . $words[$point / 10] . " " . 
             $words[$point = $point % 10] : '';
             if($points!=''){
                 $pp=$points . " Paise";
             }
     return $result . "Dollar  " . $pp." Only";
   
   }
   }

    if (!function_exists('team_lead_request')) {
        function team_lead_request()
        {
            $ci =& get_instance();
            $res = $ci->select->select_teamlead_data('users');
            // $c = count($rse);
            return count($res);
        }
    }

    if (!function_exists('get_tl_name')) {
        function get_tl_name($id)
        {
            // $ci =& get_instance();
            // // $res = $ci->select->custom_qry("select full_name from users where id = '$id'");
            // $sql=$ci->db->query("select full_name from users where id = '$id'");
		    // $res =  $sql->row();
            // return $res->full_name;
            // $c = count($rse);
            // return $res;
            // return $res[0]->full_name;
            $ci =& get_instance();
            $ci->db->select('full_name');
            $ci->db->from('users');
            $ci->db->where('id',$id);
            $query = $ci->db->get();
            $result= $query->result();
            if(!empty($result)){
                return $result[0]->full_name;
            }else{
                return '';
            }
        }
    }
    if (!function_exists('get_desc')) {
        function get_desc($id){
            $ci =& get_instance();
            $conditions['tblName']='slider';
            $conditions['where']=array('id'=>$id,'is_visible'=>1);
            $conditions['limit'] = 1;
            $result=$ci->select->getResult($conditions);
            return $result[0]->desc;
        }
    }
    
    if (!function_exists('get_title')) {
        function get_title($id,$table){
            $ci =& get_instance();
            $conditions['tblName']=$table;
            $conditions['where']=array('id'=>$id,'is_visible'=>1);
            $conditions['limit'] = 1;
            $result=$ci->select->getResult($conditions);
            if(!empty($result)){
                return $result[0]->title;
            }else{
                return false;
            }
        }
    }

    if(!function_exists('get_visitor_count')){
        function get_visitor_count($date){
            $ci =& get_instance();
            $ci->db->select('COUNT(DISTINCT ip_address) AS unique_visitors');
            $ci->db->from('visitors');
            $ci->db->where("DATE_FORMAT(timestamp, '%Y-%m-%d') = ", $date);
            $query = $ci->db->get();
            $result = $query->row();
            return $result->unique_visitors;
        }
    }
    if (!function_exists('get_product_image_by_hovar')) {
        function get_product_image_by_hovar($product)
        {
            $ci =& get_instance();
            $conditions=array(
                    'tblName'=>'product_images',
                    'where'=>array(
                        'product_id'=>$product->id,
                        'status'=>1,
                        'is_main'=>0
                    )
            );
            $result=$ci->select->getResult($conditions);
    
            if (!empty($result)) {
                return base_url($result[0]->file_path.$result[0]->file_name);
            }else{
                $conditions=array(
                    'tblName'=>'product_images',
                    'where'=>array(
                        'product_id'=>$product->id,
                        'status'=>1,
                        'is_main'=>1
                    )
            );
                $result=$ci->select->getResult($conditions);
    
             if (!empty($result)) {
                return base_url($result[0]->file_path.$result[0]->file_name);
             }else{
                return base_url('assets/admin/images/no-image.jpg');
             }
            }
        }
    }

    if (!function_exists('get_coupon_data')) {
        function get_coupon_data($coupon_code){
            $ci =& get_instance();
            $res = $ci->select->select_single_data('coupons','coupons_code',$coupon_code);
            if(!empty($res)){
                return $res[0];
            }else{
                $data = new stdClass();
                $data->amount = 0;
                return $data;
            }
        }
    }

    if (!function_exists('instagram')) {
        function instagram( $AccessToken , $feed = null ){
            $timestamp = mktime(date('H'), date('i'), 0, date('n'), date('j') - 1, date('Y'));
            $AccessToken = 'IGQWROWUppUER3eW5YSXktU0tDQ0xhQjdoejV1M1BqWFdDemk2cXJ6dklaSWlPUlNVZA2dMa0FrOUFCeVc3eUpKWHd3R1AtQmhkSnp2N3lpZA0trTU5OZAUpRRHRGczlmdUp4V2w1YkQ2R2ZAKVzR5UEd5blRiUVdxS2sZD';
            $instagram_user_id = '1318845355472115';
            // $url = 'https://graph.instagram.com/'.$instagram_user_id.'/media?access_token=' . $AccessToken;
            $url = 'https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,thumbnail_url&access_token=' . $AccessToken;
            $counter = 0;
         
            $ch = curl_init();
         
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Instagram Gallery');
         
            $result = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
         
            $result = json_decode($result);
            // print_r($result);
            $resultArray = array();
            foreach ($result->data as $media_id){
                $id = $media_id->id;;
                 
                $counter++;
                if( $counter <= $feed ){
                 
                    if( $id ) {
                        $url = 'https://graph.instagram.com/'.$id.'?fields=id,media_type,media_url,username,timestamp,permalink&access_token=' . $AccessToken;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                        curl_setopt($ch, CURLOPT_USERAGENT, 'Instagram Gallery');
         
                        $result_image = curl_exec($ch);
                        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                        $result_image = json_decode($result_image);
                       // return $result_image;
                        $resultArray[] = $result_image;
                       // $resultArray['media_url'] = $result_image->media_url;
                        //echo '<span class="instagram-image"><a href="' .$result_image->permalink. '" target="_blank"><img src="' .$result_image->media_url. '"/></a></span>';
                    }
                }
            }
        
            return $resultArray;
        }
    }


    if (!function_exists('page_slug_to_name_convert')) {
        function page_slug_to_name_convert($string){
            // $string = "new-arrivals-best-selling-products";
            if($string =="new-arrivals-best-selling-products" )return "Latest Arrivals & Best Selling Products";
            if($string =="fish-aquatics" )return "Fish & Aquatics";
            $words = explode("-", $string);
            $capitalizedWords = array_map('ucfirst', $words);
            $result = implode(" ", $capitalizedWords);
            return $result;
        }
    }


    if (!function_exists('get_product_stock')) {
        function get_product_stock($product_id)
        {
            $ci =& get_instance();
            $conditions=array(
                'tblName'=>'products',
                'where'=>array(
                    'id'=>$product_id,
                )
            );
            $result=$ci->select->getResult($conditions);
    
            if (!empty($result)) {
                return $result[0]->stock;
            }else{
                return 0;
            }
        }
    }

    if (!function_exists('get_main_about')) {
        function get_main_about()
        {
           $ci =& get_instance();
           $ci->db->select('*');
           $ci->db->from('about');
           $ci->db->where('main_about =',1);
           $query = $ci->db->get(); 
           return $query->result();
        }
    }