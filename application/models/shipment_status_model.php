<?php
class Shipment_status_model extends CI_Model {
    private $table = 'shipment_status';
    
    function create($shipmentStatusRecord){
        $this->db->insert($this->table, $shipmentStatusRecord);
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
    
    function update($newRecord, $statusID){
        $this->db->where('statusID', $statusID);
        $this->db->update($this->table,$newRecord);
    }
    
    function del($where_array){
        $this->db->delete($this->table,$where_array);
    }
    
    function getLatestRecord($shipID){
        $this->db->select_max('statusID');
        $this->db->where('shipID', $shipID);
        $query = $this->db->get($this->table,1);
        
        $record = $query->row_array();
        $record = $record['statusID'];
        $condition = array('statusID'=>$record);
        $record = $this->read($condition);
        
        return $record[0];
    }
}
?>
