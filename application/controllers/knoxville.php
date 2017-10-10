<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knoxville extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('client_model','Client');
        $this->load->model('sales_agent_model','SalesAgent');
		$this->load->model('order_model','Order');
		$this->load->model('item_model','Item');
		$this->load->model('transaction_model','Transaction');
		$this->load->model('deliverer_model','Deliverer');
		$this->load->model('shipment_model','Shipment');
		$this->load->model('shipment_status_model','ShipStatus');
		
    }
	
	

	public function index()
	{
        if($this->session->userdata('userID')){
            //$session_data=$this->session->userdata('logged_in');
            $data['userID']=$this->session->userdata('userID');
            if($this->session->userdata('isAdmin')>0){
				$header_data['title'] = "Management Dashboard";
				$this->load->view('include/header',$header_data);
                $this->load->view('management_dashboard',$data);
            }
        }
	}
    
    public function viewSalesReport(){
        if($_POST['range']=='week'){
            $startDate = date('Y-m-d',strtotime('next sunday - 1 week'));
            $endDate = date('Y-m-d',strtotime('next sunday - 1 second'));
            $condition = "status='Purchased' AND date BETWEEN '$startDate' AND '$endDate'";
            $transData=$this->Transaction->read($condition);
            
            $totalQuantity = 0;
            $totalRevenue = 0;
            foreach($transData as $t){
                $totalQuantity += $t['quantity'];
                $totalRevenue += $t['quantity']*$t['unit_price'];
            }
            
            $data['totalQuantity'] = $totalQuantity;
            $data['totalRevenue'] = $totalRevenue;
            $data['range'] = 'This Week';
            $data['date'] = $startDate.' to '.$endDate;
            echo $this->load->view('sales_report',$data,TRUE);
        }
        else if($_POST['range']=='month'){
            $startDate = date('Y-m-d',strtotime('first day of this month'));
            $endDate = date('Y-m-d',strtotime('last day of this month'));
            $condition = "status='Purchased' AND date BETWEEN '$startDate' AND '$endDate'";
            $transData=$this->Transaction->read($condition);
            
            $totalQuantity = 0;
            $totalRevenue = 0;
            foreach($transData as $t){
                $totalQuantity += $t['quantity'];
                $totalRevenue += $t['quantity']*$t['unit_price'];
            }
            
            $data['totalQuantity'] = $totalQuantity;
            $data['totalRevenue'] = $totalRevenue;
            $data['range'] = 'This Month';
            $data['date'] = $startDate.' to '.$endDate;
            echo $this->load->view('sales_report',$data,TRUE);
        }
        else if($_POST['range']=='day'){
            $date = date('Y-m-d',strtotime('today'));
            $condition=array('date'=>$date, 'status'=>'Purchased');
            $transData=$this->Transaction->read($condition);
            
            $totalQuantity = 0;
            $totalRevenue = 0;
            if($transData!=false){
                foreach($transData as $t){
                    $totalQuantity += $t['quantity'];
                    $totalRevenue += $t['quantity']*$t['unit_price'];
                }
            }
            $data['totalQuantity'] = $totalQuantity;
            $data['totalRevenue'] = $totalRevenue;
            $data['range'] = 'Today';
            $data['date'] = $date;
            echo $this->load->view('sales_report',$data,TRUE);
           
        }
    }
    
    public function viewSalesAgents(){
        $result_array = $this->SalesAgent->read();
        
        $data['sales_agents'] = $result_array; 
		$header_data['title'] = "View Sales Agents";
			$this->load->view('include/header',$header_data);
        $this->load->view('sales_agent_view',$data);
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
                    array('field'=>'email', 'label'=>'Email', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                    //array('field'=>'isAdmin', 'label'=>'Admin?', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
			$header_data['title'] = "Add Sales Agent";
			$this->load->view('include/header',$header_data);
            $this->load->view('add_sales_agentForm');
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $salesAgentRecord=array('userID'=>$_POST['userID'],'password'=>$_POST['pass'],'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
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
                    array('field'=>'email', 'label'=>'Email', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required')
                    //array('field'=>'isAdmin', 'label'=>'Admin?', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
			$title['title']="Update Sales Agent";
            $this->load->view('include/header',$title);
            $this->load->view('update_sales_agentForm',$data);
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $newRecord=array('userID'=>$_POST['userID'],'password'=>$_POST['pass'],'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
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
		$header_data['title'] = "View Clients";
        $this->load->view('include/header',$header_data);
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
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        if($this->form_validation->run()==FALSE){
			$header_data['title'] = "Add Client";
            $this->load->view('include/header',$header_data);
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
			$header_data['title'] = "Update Clients";
            $this->load->view('include/header',$header_data);
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
	
	 $header_data['title'] = "Add Orders";
	 
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
			$this->load->view('include/header',$header_data);
			$this->load->view('add_orders',$data);
        }
        else{
            $count = 0; 
             if(!empty($_POST['itemList'])) {
                 foreach($_POST['itemList'] as $check) {
                    $count++;
                 }
                 $orderRecord=array('clientID'=>$_POST['clientid'],'date'=>$_POST['date'],'time'=>$_POST['time'],'due'=>$_POST['duedate'],'userID'=>$this->session->userdata('userID'));
                 $this->Order->create($orderRecord);
                 
                 $orderID=$this->Order->getLastRecordID();
                 $orderID = $orderID['orderID'];
                 $items=$_POST['itemList'];
                 $price=$_POST['price'];
                 $quantity=$_POST['quantity'];
                 for($x = 0; $x<=$count; $x++){
                     if($items[$x] != NULL){
                        $transRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$_POST['trans']);   
                        $this->Transaction->create($transRecord);
                        if($_POST['trans'] == 'Purchased'){
                            $this->Item->subtractStocks($quantity[$x], $items[$x]);
                        }
                     }
                 }
            }
             redirect('knoxville/viewOrders');
		}
	}
    
    public function delOrder($orderID){
        $where_array = array('orderID'=>$orderID);
        $this->Order->del($where_array);
        redirect('knoxville/viewOrders');
    }
	
	public function viewOrders(){
        $result_array = $this->Order->read();
        $data['orders'] = $result_array; 
		$result_array = $this->Client->read();
		$data['clients'] = $result_array;
		$header_data['title'] = "View Sales";
		$this->load->view('include/header',$header_data);
        $this->load->view('order_view',$data);
    }
	public function viewTransaction($orderID){
        $condition = array('orderID' => $orderID);
		$orderRec = $this->Order->read($condition);
		$data['orderID'] = $orderID;
		 foreach($orderRec as $o){
            $clientID = $o['clientID'];
        }
		$condition = array('clientID' => $clientID);
        $clientRec = $this->Client->read($condition);
		 foreach($clientRec as $o){
            $data['cname'] = $o['client_name'];
            $data['cadd'] = $o['address'];
			$data['cnum'] = $o['contact_no'];
        }
		$condition = array('orderID' => $orderID);
		$transRec = $this->Transaction->read($condition);
		$data['trans'] = $transRec;
		$result_array = $this->Item->read();
		$data['items'] = $result_array;
		
		$ShipRec = $this->Shipment->read($condition);
		 foreach($ShipRec as $s){
            $shipID = $s['shipID'];
        }
		$condition = array('shipID' => $shipID);
		$shipRec = $this->ShipStatus->read($condition);
		$data['ship'] = $shipRec;
		$header_data['title'] = "Order#$orderID: Order Details";
		$this->load->view('include/header',$header_data);
        $this->load->view('trans_view',$data);
    }
    
    public function updateTransaction($transID){
        $data['transID']=$transID;
        $condition = array('transID' => $transID);
        $oldRecord = $this->Transaction->read($condition);
        foreach($oldRecord as $o){
            $data['price'] = $o['unit_price'];
            $data['qty'] = $o['quantity'];
            $orderID = $o['orderID'];
            $itemID = $o['itemID'];
        }
        $condition = array('itemID'=>$itemID);
        $itemRec=$this->Item->read($condition);
        foreach($itemRec as $i){
            $data['item_desc'] = $i['item_desc'];
        }
        $rules = array(
                    array('field'=>'price', 'label'=>'Price', 'rules'=>'required'),
                    array('field'=>'qty', 'label'=>'Quantity', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
			$header_data['title'] = "Update Transaction";
            $this->load->view('include/header',$header_data);
            $this->load->view('update_transForm',$data);
        }
        else{
            $newRecord=array('unit_price'=>$_POST['price'],'quantity'=>$_POST['qty']);
            $this->Transaction->update($newRecord, $transID);
            redirect('knoxville/viewTransaction/'.$orderID);
        }
    }
    
    public function delTransaction($transID, $orderID){
        $where_array = array('transID'=>$transID);
        $this->Transaction->del($where_array);
        //$this->viewTransaction($orderID);
        redirect('knoxville/viewTransaction/'.$orderID);
    }
	
	public function addPurchase($orderID){
		$data['orderID']=$orderID;
		$header_data['title'] = "Purchase";
		$condition = array('orderID'=>$orderID);
		$TransRec = $this->Transaction->read($condition);
		$data['trans'] = $TransRec;
		$condition = '(orderID = "'.$orderID.'" and status = "Quoted")';
		$QRec = $this->Transaction->read($condition);
		$data['Qrec'] = $QRec;
		$itemsRec = $this->Item->read();
		$data['items'] = $itemsRec;
		 $this->load->view('include/header',$header_data);
		 $this->load->view('add_purchase',$data);
		$count = 0; 
		 if(!empty($_POST['itemList'])) {
             foreach($_POST['itemList'] as $check) {
                $count++;
             }
             $items=$_POST['itemList'];
             $price=$_POST['price'];
             $quantity=$_POST['quantity'];
             for($x = 0; $x<=$count; $x++){
                 if($items[$x] != NULL){
                     $transRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>"Purchased");   
                     $this->Transaction->create($transRecord);
                     $this->Item->subtractStocks($quantity[$x], $items[$x]);
                 }
             }
             redirect('knoxville/viewTransaction/'.$orderID.'');
		 }
		
		
	}
	
	public function addRefund($orderID){
		$data['orderID']=$orderID;
		$header_data['title'] = "Refund";
		$condition = array('orderID'=>$orderID);
		$TransRec = $this->Transaction->read($condition);
		$data['trans'] = $TransRec;
		$condition = '(orderID = "'.$orderID.'" and status = "Purchased")';
		$PRec = $this->Transaction->read($condition);
		$data['Prec'] = $PRec;
		$itemsRec = $this->Item->read();
		$data['items'] = $itemsRec;
		 $this->load->view('include/header',$header_data);
		 $this->load->view('add_refundForm',$data);
		$count = 0; 
		 if(!empty($_POST['itemList'])) {
             foreach($_POST['itemList'] as $check) {
                $count++;
             }
             $items=$_POST['itemList'];
             $price=$_POST['price'];
             $quantity=$_POST['quantity'];
             $trans=$_POST['trans'];
             for($x = 0; $x<=$count; $x++){
                 if($items[$x] != NULL){
                     $transRecord=array('orderID'=>$orderID,'itemID'=>$items[$x],'unit_price'=>$price[$x],'quantity'=>$quantity[$x],'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$trans[$x]);   
                     $this->Transaction->create($transRecord);
                     $this->Item->addStocks($quantity[$x], $items[$x]);
                 }
             }
             redirect('knoxville/viewOrders');
		 }
		
		
	}
	public function addSched($orderID){
		$data['orderID']=$orderID;
		$header_data['title'] = "Schedule For Delivery";
		$deliverer=$this->Deliverer->read();
		$data['deliverer'] = $deliverer;
		 $rules = array(
                    array('field'=>'deliverer', 'label'=>'Assigned Personnel', 'rules'=>'required'),
                );
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()==FALSE){
            $this->load->view('include/header',$header_data);
            $this->load->view('add_schedForm',$data);
		}
		else{
		$ShipRecord=array('delivererID'=>$_POST['deliverer'],'orderID'=>$orderID);
		$this->Shipment->create($ShipRecord);
		$shipID=$this->Shipment->getLastRecordID();
		$ShipStatus=array('shipID'=>$shipID,'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>'Scheduled');
		$this->ShipStatus->create($ShipStatus);
		redirect('knoxville/viewTransaction/'.$orderID.'');
		}
	}
    
	public function addDeliveryStatus($orderID,$shipID){
		$data['shipID']=$shipID;
		$header_data['title'] = "Schedule For Delivery";
		$condition = array('orderID'=>$orderID);
		$orderRec = $this->Order->read($condition);
		$data['orderID'] = $orderID;
		 foreach($orderRec as $o){
            $clientID = $o['clientID'];
        }
		$condition = array('clientID' => $clientID);
        $clientRec = $this->Client->read($condition);
		 foreach($clientRec as $o){
            $data['cname'] = $o['client_name'];
            $data['cadd'] = $o['address'];
			$data['cnum'] = $o['contact_no'];
        }
		 $rules = array(
                    array('field'=>'status', 'label'=>'Status', 'rules'=>'required'),
                    array('field'=>'location', 'label'=>'Location', 'rules'=>'required'),
                );
        $this->form_validation->set_rules($rules);
		if($this->form_validation->run()==FALSE){
            $this->load->view('include/header',$header_data);
            $this->load->view('add_DeliveryStatus',$data);
		}
		else{
            print_r($_POST);
            $ShipStatus=array('shipID'=>$shipID,'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$_POST['status'].' '.$_POST['location']);
            print_r($ShipStatus);
            $this->ShipStatus->create($ShipStatus);
            redirect('knoxville/viewTransaction/'.$orderID.'');
		}
            
	}
	
    public function delDeliveryStatus($transID, $orderID){
        $where_array = array('transID'=>$transID);
        $this->Transaction->del($where_array);
        //$this->viewTransaction($orderID);
        redirect('knoxville/viewTransaction/'.$orderID);
    }
	
    public function viewItems(){
        $result_array = $this->Item->read();
        
        $data['item'] = $result_array; 
		$header_data['title'] = "View Inventory";
		$this->load->view('include/header',$header_data);
        $this->load->view('item_view',$data);
    }
    
    public function addItem(){
        //load the view
        //get form data
        //add to db
        $rules = array(
                    array('field'=>'idesc', 'label'=>'Item Description', 'rules'=>'required'),
                    array('field'=>'stocks', 'label'=>'Stocks', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        if($this->form_validation->run()==FALSE){
			$header_data['title'] = "Add Item";
            $this->load->view('include/header',$header_data);
            $this->load->view('add_itemForm');
        }
        else{
            $itemRecord=array('item_desc'=>$_POST['idesc'],'stocks'=>$_POST['stocks']);
            $this->Item->create($itemRecord);
            redirect('knoxville/viewItems');
        }
    }
    
    public function delItem($itemID){
        $where_array = array('itemID'=>$itemID);
        $this->Item->del($where_array);
        redirect('knoxville/viewItems');
    }
    
    public function updateItem($itemID){
        $data['itemID']=$itemID;
        $condition = array('itemID' => $itemID);
        $oldRecord = $this->Item->read($condition);
        foreach($oldRecord as $o){
            $data['idesc'] = $o['item_desc'];
            $data['stocks'] = $o['stocks'];
        }
        $rules = array(
                    array('field'=>'idesc', 'label'=>'Item Description', 'rules'=>'required'),
                    array('field'=>'stocks', 'label'=>'Stocks', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
			$header_data['title'] = "Update Item";
            $this->load->view('include/header',$header_data);
            $this->load->view('update_itemForm',$data);
        }
        else{
            $newRecord=array('itemID'=>$itemID,'item_desc'=>$_POST['idesc'],'stocks'=>$_POST['stocks']);
            $this->Item->update($newRecord,$itemID);
            redirect('knoxville/viewItems');
        }
    }
    
    public function viewDeliverer(){
        $result_array = $this->Deliverer->read();
        
        $data['deliverer'] = $result_array; 
		$header_data['title'] = "View Deliverers";
		$this->load->view('include/header',$header_data);
        $this->load->view('deliverer_view',$data);
    }
    
    public function addDeliverer(){
        //load the view
        //get form data
        //add to db
        $rules = array(
                    array('field'=>'vehicle', 'label'=>'Vehicle', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required'),
                    array('field'=>'assigned', 'label'=>'Assigned Personnel', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
			$header_data['title'] = "Add Deliverer";
			$this->load->view('include/header',$header_data);
            $this->load->view('add_delivererForm');
        }
        else{
            $delivererRecord=array('vehicle'=>$_POST['vehicle'],'contact_no'=>$_POST['cnum'],'assigned'=>$_POST['assigned']);
            $this->Deliverer->create($delivererRecord);
            redirect('knoxville/viewDeliverer');
        }
    }
    
    public function updateDeliverer($delivererID){
        $data['delivererID']=$delivererID;
        $condition = array('delivererID' => $delivererID);
        $oldRecord = $this->Deliverer->read($condition);
        foreach($oldRecord as $o){
            $data['vehicle'] = $o['vehicle'];
            $data['cnum'] = $o['contact_no'];
            $data['assigned'] = $o['assigned'];
        }
        $rules = array(
                    array('field'=>'vehicle', 'label'=>'Vehicle', 'rules'=>'required'),
                    array('field'=>'cnum', 'label'=>'Contact No.', 'rules'=>'required'),
                    array('field'=>'assigned', 'label'=>'Assigned Personnel', 'rules'=>'required')
                );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==FALSE){
			$title['title']="Update Deliverer";
            $this->load->view('include/header',$title);
            $this->load->view('update_delivererForm',$data);
        }
        else{
            $newRecord=array('delivererID'=>$delivererID,'vehicle'=>$_POST['vehicle'],'contact_no'=>$_POST['cnum'],'assigned'=>$_POST['assigned']);
            $this->Deliverer->update($newRecord);
            redirect('knoxville/viewDeliverer');
        }
    }
    
    public function delDeliverer($delivererID){
        $where_array = array('delivererID'=>$delivererID);
        $this->Deliverer->del($where_array);
        redirect('knoxville/viewDeliverer');
    }
}
