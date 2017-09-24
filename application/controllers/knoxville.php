<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knoxville extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('client_model','Client');
		$this->load->model('order_model','Order');
    }
	
	

	public function index()
	{
        if($this->session->userdata('logged_in')){
            $session_data=$this->session->userdata('logged_in');
            $data['userID']=$session_data['userID'];
            if($session_data['isAdmin']>0){
                $this->load->view('management_dashboard',$data);
            }
        }
	}
    
    public function viewClients(){
        $result_array = $this->Client->read();
        
        $data['clients'] = $result_array; //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
        $this->load->view('client_view',$data);
    }
    
    public function addClient(){
        //load the view
        //get form data
        //add to db
        $rules = array(
                    array('field'=>'cname', 'label'=>'Client Name', 'rules'=>'required'),
                    array('field'=>'caddress', 'label'=>'Client Address', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $this->load->view('add_clientForm');
        }
        else{
            $clientRecord=array('client_name'=>$_POST['cname'],'address'=>$_POST['caddress'],'contact_no'=>$_POST['cnum']);
            $this->Client->create($clientRecord);
            redirect('knoxville/viewClients');
        }
    }
    
    public function updateClient($clientID){
        $data['clientID']=$clientID;
        $condition = array('clientID' => $clientID);
        $oldRecord = $this->Client->read($condition);
        foreach($oldRecord as $o){
            $data['cname'] = $o['client_name'];
            $data['caddress'] = $o['address'];
            $data['cnum'] = $o['contact_no'];
        }
        $rules = array(
                    array('field'=>'cname', 'label'=>'Client Name', 'rules'=>'required'),
                    array('field'=>'caddress', 'label'=>'Client Address', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $this->load->view('update_clientForm',$data);
        }
        else{
            $newRecord=array('clientID'=>$clientID,'client_name'=>$_POST['cname'],'address'=>$_POST['caddress'],'contact_no'=>$_POST['cnum']);
            $this->Client->update($newRecord);
            redirect('knoxville/viewClients');
        }
    }
    
    public function delClient($clientID){
        $where_array = array('clientID'=>$clientID);
        $this->Client->del($where_array);
        redirect('knoxville/viewClients');
    }
	
	public function addOrder (){ 
	
	
	 $rules = array(
                    array('field'=>'clientid', 'label'=>'Client', 'rules'=>'required'),
                    array('field'=>'date', 'label'=>'date', 'rules'=>'required'),
                    array('field'=>'time', 'label'=>'time', 'rules'=>'required'),
					array('field'=>'duedate', 'label'=>'Due date', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
			$result_array = $this->Client->read();
			$data['clients'] = $result_array;
			$this->load->model('item_model','Item');
			$result_array = $this->Item->read();
			$data['items'] = $result_array;
			$this->load->view('add_orders',$data);
        }
        else{

	 $orderRecord=array('clientID'=>$_POST['clientid'],'date'=>$_POST['date'],'time'=>$_POST['time'],'due'=>$_POST['duedate']);
     $this->Order->create($orderRecord);
	 redirect('knoxville/viewOrders');
		}
	}
	
	 public function viewOrders(){
		
		
		$result_array = $this->Order->read();
		$data['orders']= $result_array;
		
			
         //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
        $this->load->view('order_view',$data);
    }
}
