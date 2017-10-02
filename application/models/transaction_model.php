<?php
class Transaction_model extends CI_Model {
    private $table = 'transaction';
    
    function create($transRecord){
        $this->db->insert($this->table, $transRecord);
    }
    
    function read($condition=null){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('date','desc');
        
        if(isset($condition))
            $this->db->where($condition);
        
        $query = $this->db->get();
        
        if($query->num_rows()>0)
            return $query->result_array();
        else
            return false;
        
    }
    
    function update($newRecord, $transID){
        $this->db->where('transID', $transID);
        $this->db->update($this->table,$newRecord);
    }
    
    function del($where_array){
        $this->db->delete($this->table,$where_array);
    }
}
?>