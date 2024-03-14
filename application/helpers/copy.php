<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
//admin url
if (!function_exists('admin_url')) {
    function admin_url($str="")
    {
        return base_url() . 'admin/'.$str;
    }
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
    return base_url($result[0]->file_path.$result[0]->file_name);;
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
		return date_format($d,$format);
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
    
//get solution offered list
if (!function_exists('get_solution_offered')) {
    function get_solution_offered($id,$htm=true)
    {
        $html="";
       $ci =& get_instance();
       $result = $ci->select->custom_qry("SELECT som.*,so.cat_name from solution_offered_map som inner join categories so on som.offered_id=so.cat_id where som.company_id=".$id);
        if(!empty($result)){
            foreach($result as $r){
                if($htm==true){
                    $html.='<span class="badge bg-info mt-2" style="margin-right: 10px;">'.$r->cat_name.'</span>';
                }else{
                    $html.=$r->cat_name.' ,';
                }

            }
            return $html; 
        }else{
            return '-';
        }  
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
            foreach($result as $r){
                if($htm==true){
                    $html.='<span class="badge bg-success mt-2" style="margin-right: 10px;">'.$r->market_name.'</span>';
                }else{
                    $html.=$r->market_name.' ,';
                }
            }
            return $html; 
        }else{
            return '-';
        }  
    }
}   


if (!function_exists('check_favorite')) {
    function check_favorite($user_id,$id)
    {
       $ci =& get_instance();
       $result = $ci->select->custom_qry("select * from favorite_solutions where user_id=".$user_id." and solution_id=".$id);
       if(!empty($result)){
        $ci->delete_model->delete_multiple_clause('favorite_solutions','solution_id',$id,'user_id',$user_id);
         return false;
       }else{
        $ci->insert_model->insert_data(array('user_id'=>$user_id,'solution_id'=>$id),'favorite_solutions');
        return true;
       }
    }
} 


if (!function_exists('is_favorite')) {
    function is_favorite($user_id,$id)
    {
       $ci =& get_instance();
       $result = $ci->select->custom_qry("select * from favorite_solutions where user_id=".$user_id." and solution_id=".$id);
       if(!empty($result)){
         return '<i class="fas fa-heart" id="icon'.$id.'"></i>';
       }else{
        return '<i class="far fa-heart"  id="icon'.$id.'"></i>';
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
    function getBidding_Fees($consumer_type,$facility_type,$cat_id,$utility_cost,$vpf=""){
        $ci =& get_instance();
       $annual_cost=check_annualConsumption($utility_cost);
        $result=$ci->select->get_biddingFees($consumer_type,$facility_type,$cat_id,$annual_cost);
      //  return $result[0]->fees;
    //    echo 'count='.count($result);
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
    // echo '<pre>';
       // print_r($all);
         if($vpf==1){
         return $all[1];
         }else{
          return $all[0];    
         }
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
?>