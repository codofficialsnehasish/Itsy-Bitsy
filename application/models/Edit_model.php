<?php
class Edit_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    //////////////////////////Edit/////////////////////   
    function edit($data,$id,$field_id,$table){
        $this->db->where($field_id, $id);
        $this->db->update($table, $data);  
        return true;
    } 
    /////////End


    function edit_multi($data,$id,$field_id,$id1,$field_id1,$table){
        $this->db->where($field_id, $id);
        $this->db->where($field_id1, $id1);
        $this->db->update($table, $data);  
    } 

    function emp_edit($params = array()){
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        if(array_key_exists("data",$params)){
            $data = $params['data'];
        }
        
        if(array_key_exists("tblName",$params)){
            return $this->db->update($params['tblName'],$data);
        }
        return true;
    } 

}

?>
