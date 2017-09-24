<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knoxville extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('client_model','Client');
        $this->load->model('sales_agent_model','SalesAgent');
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
    
    public function viewSalesAgents(){
        $result_array = $this->SalesAgent->read();
        
        $data['sales_agents'] = $result_array; 
        $this->load->view('sales_agent_view',$data);
        $this->load->library('encryption');
    }
    
    public function addSalesAgent(){
        //load the view
        //get form data
        //add to db
        $rules = array(
                    array('field'=>'userID', 'label'=>'User ID', 'rules'=>'required'),
                    array('field'=>'pass', 'label'=>'Password', 'rules'=>'required'),
                    array('field'=>'name', 'label'=>'Full Name', 'rules'=>'required'),
                    array('field'=>'bday', 'label'=>'Birthdate', 'rules'=>'required'),
                    array('field'=>'age', 'label'=>'Age', 'rules'=>'required'),
                    array('field'=>'email', 'label'=>'Email', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                    //array('field'=>'isAdmin', 'label'=>'Admin?', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $this->load->view('add_sales_agentForm');
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $salesAgentRecord=array('userID'=>$_POST['userID'],'password'=>$_POST['pass'],'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'age'=>$_POST['age'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
            $this->SalesAgent->create($salesAgentRecord);
            redirect('knoxville/viewSalesAgents');
        }
    }
    
    public function updateSalesAgent($userID){
        $data['userID']=$userID;
        $condition = array('userID' => $userID);
        $oldRecord = $this->SalesAgent->read($condition);
        foreach($oldRecord as $o){
            $data['userID'] = $o['userID'];
            $data['pass'] = $o['password'];
            $data['name'] = $o['fullname'];
            $data['bday'] = $o['birthdate'];
            $data['age'] = $o['age'];
            $data['email'] = $o['email'];
            $data['cnum'] = $o['contact_no'];
            if($o['isAdmin']>0)
                $isAdmin='checked';
            else
                $isAdmin='';
            $data['isAdmin'] = $isAdmin;
        }
        $rules = array(
                    array('field'=>'userID', 'label'=>'User ID', 'rules'=>'required'),
                    array('field'=>'pass', 'label'=>'Password', 'rules'=>'required'),
                    array('field'=>'name', 'label'=>'Full Name', 'rules'=>'required'),
                    array('field'=>'bday', 'label'=>'Birthdate', 'rules'=>'required'),
                    array('field'=>'age', 'label'=>'Age', 'rules'=>'required'),
                    array('field'=>'email', 'label'=>'Email', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                    //array('field'=>'isAdmin', 'label'=>'Admin?', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
            $this->load->view('update_sales_agentForm',$data);
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $newRecord=array('userID'=>$_POST['userID'],'password'=>$_POST['pass'],'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'age'=>$_POST['age'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
            $this->SalesAgent->update($newRecord);
            redirect('knoxville/viewSalesAgents');
        }
    }
    
    public function delSalesAgent($userID){
        $where_array = array('userID'=>$userID);
        $this->SalesAgent->del($where_array);
        redirect('knoxville/viewSalesAgents');
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
}
