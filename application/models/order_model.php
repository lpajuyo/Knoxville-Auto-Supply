<?php

class Order_model extends CI_Model {
    private $table = 'client_order';
    
    function create($orderRecord){
        $this->db->insert($this->table, $orderRecord);
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
    
    function update($newRecord){
        $this->db->replace($this->table,$newRecord);
    }
    
    function del($where_array){
        $this->db->delete($this->table,$where_array);
    }
    
    function getLastRecordID(){
        $this->db->select_max('orderID');
        $query = $this->db->get($this->table,1);
        
        return $query->row_array();
    }

    function count(){
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
?>