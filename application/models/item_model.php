<?php
class Item_model extends CI_Model {
    private $table = 'item';
    
    function create($itemRecord){
        $this->db->insert($this->table, $itemRecord);
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
    
    function update($newRecord, $itemID){
        $this->db->where('itemID', $itemID);
        $this->db->update($this->table,$newRecord);
    }
    
    function del($where_array){
        $this->db->delete($this->table,$where_array);
    }
    
    function addStocks($quantity, $itemID){
        $this->db->set('stocks','stocks+'.$quantity,FALSE);
        $this->db->where('itemID', $itemID);
        $this->db->update($this->table);
    }
    
    function subtractStocks($quantity, $itemID){ 
        $this->db->set('stocks','GREATEST((stocks-'.$quantity.'),0)',FALSE); //negative difference will be turned to 0
        $this->db->where('itemID', $itemID);
        $this->db->update($this->table);
    }
}
?>