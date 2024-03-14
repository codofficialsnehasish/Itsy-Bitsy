<?php

class Insert_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    // function insert_data($data,$table){
    //       $this->db->insert($table, $data);  
    //    } 


    function insert_data($data,$table){
       $this->db->insert($table, $data);
	   return $this->db->insert_id();  
    } 
    
    /* Insert */
    function emp_insert_data($params = array()){
        if(array_key_exists("data",$params)){
            $data = $params['data'];
        }
    
        if(array_key_exists("tblName",$params)){
            $this->db->insert($params['tblName'],$data);
            return $this->db->insert_id();  
        }
    } 
}

?>
