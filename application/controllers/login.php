<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username','Username','required', array('required' => 'Invalid Username or Password.'));
        if($this->form_validation->run()==TRUE)
            $this->form_validation->set_rules('password','Password','callback_verifyLogin');
        if($this->form_validation->run()==FALSE){
            $this->load->view('login_view');
        }
        else {
            if($this->session->userdata('isAdmin')>0){
                 redirect(base_url('knoxville'));
            }
            else{
                redirect(base_url('SalesAgent'));
            }
        }
	}
    
    public function verifyLogin($password) {
        $username = $this->input->post('username');
        
        $condition = array('userID'=>$username, 'password'=>$password);
        $this->load->model('sales_agent_model','Sales_agent');
        $result_array = $this->Sales_agent->read($condition);
        
        if($result_array){
            foreach($result_array as $row){
                $this->session->set_userdata('userID', $row['userID']);
                $this->session->set_userdata('isAdmin', $row['isAdmin']);
                /*$sess_data=array(
                    'userID' => $row['userID'],
                    'isAdmin' => $row['isAdmin']
                );*/
                //$this->session->set_userdata('logged_in', $sess_data);
            }
            return true;
        }
        else{
            $this->form_validation->set_message('verifyLogin','Invalid Username or Password.');
            return false;
        }
    }
    
    public function logout(){
        session_destroy();
        redirect(base_url());
    }
}
