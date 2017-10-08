<?php
class Shipment_model extends CI_Model {
    private $table = 'shipment';
    
    function create($delivererRecord){
        $this->db->insert($this->table, $delivererRecord);
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
	
	function getLastRecordID(){
        $this->db->select_max('shipID');
        $query = $this->db->get($this->table,1);
        $lastID = $query->row_array();
        $lastID = $lastID['shipID'];
        
        return $lastID;
    }
}
?>