<?php

class Sales_agent_model extends CI_Model {
    private $table = 'sales_agent';
    
    function create($clientRecord){
        $this->db->insert($this->table, $clientRecord);
    }
    
    function read($condition=null){
        $this->db->select('*');
        $this->db->from($this->table);
        
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

    function count(){
    $query = $this->db->query('SELECT * FROM sales_agent');
    return $query->num_rows();
    }
}
?>