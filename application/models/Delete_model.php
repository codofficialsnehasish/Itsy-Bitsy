<?php

class Delete_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    /////////////////////////Delete//////////////////////////////   
    public function delete($table,$field_id,$id)
    {
        $this->db->where($field_id, $id);
        return $this->db->delete($table);
    }
    ///End 
    public function delete_multiple_clause($table,$field_id,$id,$field_id1,$id1)
    {
        $this->db->where($field_id, $id);
		$this->db->where($field_id1, $id1);
        return $this->db->delete($table);
    }


    public function delete_tmpuploads()
    {
        
        return $this->db->truncate('tmp_uploads');
    }	


    ///End 
    public function delete_answer_options($ques_id,$ans_id,$parent_opt_id,$opt_id)
    {
        $this->db->where('ques_id', $ques_id);
        $this->db->where('ans_id ', $ans_id);
        $this->db->where('parent_opt_id ', $parent_opt_id);
        $this->db->where('opt_id ', $opt_id);
        return $this->db->delete('answer_options');
    }

    public function delete_duplicate_cart_item(){//for buy now features
        $query = "DELETE FROM cart WHERE id NOT IN (SELECT MIN(id) FROM cart GROUP BY buyer_id, product_id, product_type, variations)";
        $this->db->query($query);
    }
}
?>