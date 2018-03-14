<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesAgent extends CI_Controller {
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
			$header_data['title'] = "Management Dashboard";
			$stock='stocks';
			$condition = "$stock>=1";
			$result_array = $this->Item->read($condition);
			$data['onStock'] = $result_array; 
			$shipped = $this->Shipment->read();
			$data['shipped'] = $shipped;
			$sales = $this->SalesAgent->read();
            $data['sales'] = $sales;
			if($userID=$this->session->userdata('userID')){
       			$data['userID']=$userID;
       			$condition = array('userID' => $userID);
				$orders = $this->Order->read($condition);
			}
			$data['orders'] = $orders;
			$this->load->view('include/SA_header',$header_data);
            $this->load->view('management_dashboard',$data);
			$this->load->view('include/footer');
        }
	}
    
    public function viewSalesReport(){
		$userID=$this->session->userdata('userID');
        if($_POST['range']=='week'){
            $startDate = date('Y-m-d',strtotime('next sunday - 1 week'));
            $endDate = date('Y-m-d',strtotime('next sunday - 1 second'));
			$start = date('jS F, Y',strtotime('next sunday - 1 week'));
            $end = date('jS F, Y',strtotime('next sunday - 1 second'));
			$cond = "userID='$userID'";
            $condition = "status='Purchased' AND date BETWEEN '$startDate' AND '$endDate'";
			$orders = $this->Order->read($cond);
			$total = 0;
				if($orders!=false){
						foreach($orders as $o){
							$tOrders = 0;
								$condition1 = "orderID='".$o['orderID']."'";
								if($transData!=false){
									$trans = $this->Transaction->read($condition1." AND ".$condition);
										if($trans!=false){
										 foreach($trans as $t){
											if($t['status']=='Purchased'){
												$total += $t['quantity']*$t['unit_price'];
											}
											else{
												$total -= $t['quantity']*$t['unit_price'];
											}
										}
									}
								}
								$tOrders++;
							}
							
				}	
				$data['totalRevenue']=$total;
				$data['totalOrders']=$tOrders;
            $data['range'] = 'This Week';
            $data['date'] = $start.' to '.$end;
            echo $this->load->view('sales_report',$data,TRUE);
		}
        else if($_POST['range']=='month'){
            $startDate = date('Y-m-d',strtotime('first day of this month'));
            $endDate = date('Y-m-d',strtotime('last day of this month'));
           $start = date('jS F, Y',strtotime('next sunday - 1 week'));
            $end = date('jS F, Y',strtotime('next sunday - 1 second'));
			$cond = "userID='$userID'";
            $condition = "status='Purchased' AND date BETWEEN '$startDate' AND '$endDate'";
			$orders = $this->Order->read($cond);
			$total = 0;
				if($orders!=false){
						foreach($orders as $o){
							$tOrders = 0;
								$condition1 = "orderID='".$o['orderID']."'";
								if($transData!=false){
									$trans = $this->Transaction->read($condition1." AND ".$condition);
										if($trans!=false){
										 foreach($trans as $t){
											if($t['status']=='Purchased'){
												$total += $t['quantity']*$t['unit_price'];
											}
											else{
												$total -= $t['quantity']*$t['unit_price'];
											}
										}
									}
								}
								$tOrders++;
							}
							
				}	
				$data['totalRevenue']=$total;
				$data['totalOrders']=$tOrders;
            $data['range'] = 'This Month';
            $data['date'] = $start.' to '.$end;
            echo $this->load->view('sales_report',$data,TRUE);
			$this->load->view('include/footer');
			
        }
        else if($_POST['range']=='day'){
            $date = date('Y-m-d',strtotime('today'));
            $condition=array('date'=>$date, 'status'=>'Purchased');
			$cond = "userID='$userID'";
            $condition = "status='Purchased' AND date BETWEEN '$startDate' AND '$endDate'";
			$orders = $this->Order->read($cond);
			$total = 0;
				if($orders!=false){
						foreach($orders as $o){
							$tOrders = 0;
								$condition1 = "orderID='".$o['orderID']."'";
								if($transData!=false){
									$trans = $this->Transaction->read($condition1." AND ".$condition);
										if($trans!=false){
										 foreach($trans as $t){
											if($t['status']=='Purchased'){
												$total += $t['quantity']*$t['unit_price'];
											}
											else{
												$total -= $t['quantity']*$t['unit_price'];
											}
										}
									}
								}
								$tOrders++;
							}
							
				}	
				$data['totalRevenue']=$total;
				$data['totalOrders']=$tOrders;
            $data['range'] = 'This Week';
            $data['date'] = $date;
            echo $this->load->view('sales_report',$data,TRUE);
			$this->load->view('include/footer');
           
        }
    }
    
   	 public function viewSalesAgent(){
        $userID =  $this->session->userdata('userID');
        $data['userID']=$userID;
        $condition = array('userID' => $userID);
        $result_array = $this->SalesAgent->read($condition);
         foreach($result_array as $o){
            $data['userID'] = $o['userID'];
            $data['pass'] = $o['password'];
            $data['name'] = $o['fullname'];
            $data['bday'] = $o['birthdate'];
            $data['email'] = $o['email'];
            $data['cnum'] = $o['contact_no'];
            $data['photo'] = $o['photo'];
        }
		$header_data['title'] = "View Sales Agents";
	    $this->load->view('include/SA_header',$header_data);
	    $this->load->view('sales_agent_profile',$data);
		$this->load->view('include/footer');
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
			$this->load->view('include/SA_header',$header_data);
            $this->load->view('add_sales_agentForm');
			$this->load->view('include/footer');
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $salesAgentRecord=array('userID'=>$_POST['userID'],'password'=>$_POST['pass'],'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
            $this->SalesAgent->create($salesAgentRecord);
            redirect('SalesAgent/viewSalesAgents');
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
            $this->load->view('include/SA_header',$title);
            $this->load->view('update_sales_agentForm',$data);
			$this->load->view('include/footer');
        }
        else{
            if(isset($_POST['isAdmin']))
                $isAdmin=1;
            else
                $isAdmin=0;
            $newRecord=array('userID'=>$_POST['userID'],'password'=>$_POST['pass'],'fullname'=>$_POST['name'],'birthdate'=>$_POST['bday'],'email'=>$_POST['email'],'contact_no'=>$_POST['cnum'],'isAdmin'=>$isAdmin);
            $this->SalesAgent->update($newRecord);
            redirect('SalesAgent/viewSalesAgents');
        }
    }
    
    public function delSalesAgent($userID){
        $where_array = array('userID'=>$userID);
        $this->SalesAgent->del($where_array);
        redirect('SalesAgent/viewSalesAgents');
    }
    
    public function viewClients(){
        $result_array = $this->Client->read();
        
        $data['clients'] = $result_array; //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 )
		$header_data['title'] = "View Clients";
        $this->load->view('include/SA_header',$header_data);
        $this->load->view('client_view_user',$data);
		$this->load->view('include/footer');
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
            $this->load->view('include/SA_header',$header_data);
            $this->load->view('add_clientForm_user');
			$this->load->view('include/footer');

        }
        else{
            $clientRecord=array('client_name'=>$_POST['cname'],'address'=>$_POST['caddress'],'contact_no'=>$_POST['cnum']);
            $this->Client->create($clientRecord);
            redirect('SalesAgent/viewClients');
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
            $this->load->view('include/SA_header',$header_data);
            $this->load->view('update_clientForm_user',$data);
			$this->load->view('include/footer');
        }
        else{
            $newRecord=array('clientID'=>$clientID,'client_name'=>$_POST['cname'],'address'=>$_POST['caddress'],'contact_no'=>$_POST['cnum']);
            $this->Client->update($newRecord);
            redirect('SalesAgent/viewClients');
        }
    }
    
    public function delClient($clientID){
        $where_array = array('clientID'=>$clientID);
        $this->Client->del($where_array);
        redirect('SalesAgent/viewClients');
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
			$this->load->view('include/SA_header',$header_data);
			$this->load->view('add_orders_user',$data);
			$this->load->view('include/footer');
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
             redirect('SalesAgent/viewOrders');
		}
	}
    
    public function delOrder($orderID){
        $where_array = array('orderID'=>$orderID);
        $this->Order->del($where_array);
        redirect('SalesAgent/viewOrders');
    }
	
	public function viewOrders(){
        if($userID=$this->session->userdata('userID')){
       			$data['userID']=$userID;
       			$condition = array('userID' => $userID);
				$orders = $this->Order->read($condition);
			}
		$data['orders'] = $orders;
		$result_array = $this->Client->read();
		$data['clients'] = $result_array;
		$header_data['title'] = "View Sales";
		$this->load->view('include/SA_header',$header_data);
        $this->load->view('order_view_user',$data);
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
        $shipRec = false;
        if($ShipRec != false){
             foreach($ShipRec as $s){
                $shipID = $s['shipID'];
            }
            $condition = array('shipID' => $shipID);
            $shipRec = $this->ShipStatus->read($condition);
        }
		
		
		$data['ship'] = $shipRec;
		$header_data['title'] = "Order#$orderID: Order Details";
		$this->load->view('include/SA_header',$header_data);
        $this->load->view('trans_view_user',$data);
		$this->load->view('include/footer');
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
            $this->load->view('include/SA_header',$header_data);
            $this->load->view('update_transForm',$data);
			$this->load->view('include/footer');
        }
        else{
            $newRecord=array('unit_price'=>$_POST['price'],'quantity'=>$_POST['qty']);
            $this->Transaction->update($newRecord, $transID);
            redirect('SalesAgent/viewTransaction/'.$orderID);
        }
    }
    
    public function delTransaction($transID, $orderID){
        $where_array = array('transID'=>$transID);
        $this->Transaction->del($where_array);
        //$this->viewTransaction($orderID);
        redirect('SalesAgent/viewTransaction/'.$orderID);
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
		 $this->load->view('include/SA_header',$header_data);
		 $this->load->view('add_purchase_user',$data);
		 $this->load->view('include/footer');
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
             redirect('SalesAgent/viewTransaction/'.$orderID.'');
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
		 $this->load->view('include/SA_header',$header_data);
		 $this->load->view('add_refundForm',$data);
		 $this->load->view('include/footer');
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
             redirect('SalesAgent/viewOrders');
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
            $this->load->view('include/SA_header',$header_data);
<<<<<<< HEAD
            $this->load->view('add_schedForm',$data);
			$this->load->view('include/footer');
=======
            $this->load->view('add_schedForm_user',$data);
>>>>>>> ca91011f14c47b13b057811fec6d059763ce9f17
		}
		else{
		$ShipRecord=array('delivererID'=>$_POST['deliverer'],'orderID'=>$orderID);
		$this->Shipment->create($ShipRecord);
		$shipID=$this->Shipment->getLastRecordID();
		$ShipStatus=array('shipID'=>$shipID,'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>'Scheduled');
		$this->ShipStatus->create($ShipStatus);
		redirect('SalesAgent/viewTransaction/'.$orderID.'');
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
            $this->load->view('include/SA_header',$header_data);
            $this->load->view('add_DeliveryStatus',$data);
			$this->load->view('include/footer');
		}
		else{
            print_r($_POST);
            $ShipStatus=array('shipID'=>$shipID,'date'=>$_POST['date'],'time'=>$_POST['time'],'status'=>$_POST['status'].' '.$_POST['location']);
            print_r($ShipStatus);
            $this->ShipStatus->create($ShipStatus);
            redirect('SalesAgent/viewTransaction/'.$orderID.'');
		}
            
	}
	
    public function delDeliveryStatus($transID, $orderID){
        $where_array = array('transID'=>$transID);
        $this->Transaction->del($where_array);
        //$this->viewTransaction($orderID);
        redirect('SalesAgent/viewTransaction/'.$orderID);
    }
	
    public function viewItems(){
        $result_array = $this->Item->read();
        
        $data['item'] = $result_array; 
		$header_data['title'] = "View Inventory";
		$this->load->view('include/SA_header',$header_data);
        $this->load->view('item_view_user',$data);
		$this->load->view('include/footer');
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
            $this->load->view('include/SA_header',$header_data);
            $this->load->view('add_itemForm_user');
			$this->load->view('include/footer');
        }
        else{
            $itemRecord=array('item_desc'=>$_POST['idesc'],'stocks'=>$_POST['stocks']);
            $this->Item->create($itemRecord);
            redirect('SalesAgent/viewItems');
        }
    }
    
    public function delItem($itemID){
        $where_array = array('itemID'=>$itemID);
        $this->Item->del($where_array);
        redirect('SalesAgent/viewItems');
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
            $this->load->view('include/SA_header',$header_data);
			$this->load->view('include/footer');
            $this->load->view('update_itemForm_user',$data);

        }
		
        else{
            $newRecord=array('itemID'=>$itemID,'item_desc'=>$_POST['idesc'],'stocks'=>$_POST['stocks']);
            $this->Item->update($newRecord,$itemID);
            redirect('SalesAgent/viewItems');
        }
    }
    
    public function viewDeliverer(){
        $result_array = $this->Deliverer->read();
        
        $data['deliverer'] = $result_array; 
		$header_data['title'] = "View Deliverers";
		$id =  $this->Deliverer->count();
        $data['id'] = (string) $id++;
		$this->load->view('include/SA_header',$header_data);
        $this->load->view('deliverer_view',$data);
		$this->load->view('include/footer');
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
			$this->load->view('include/SA_header',$header_data);
            $this->load->view('add_delivererForm');
			$this->load->view('include/footer');
        }
        else{
            $delivererRecord=array('vehicle'=>$_POST['vehicle'],'contact_no'=>$_POST['cnum'],'assigned'=>$_POST['assigned']);
            $this->Deliverer->create($delivererRecord);
            redirect('SalesAgent/viewDeliverer');
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
            $this->load->view('include/SA_header',$title);
            $this->load->view('update_delivererForm',$data);
			$this->load->view('include/footer');
        }
        else{
            $newRecord=array('delivererID'=>$delivererID,'vehicle'=>$_POST['vehicle'],'contact_no'=>$_POST['cnum'],'assigned'=>$_POST['assigned']);
            $this->Deliverer->update($newRecord);
            redirect('SalesAgent/viewDeliverer');
        }
    }
    
    public function delDeliverer($delivererID){
        $where_array = array('delivererID'=>$delivererID);
        $this->Deliverer->del($where_array);


        redirect('SalesAgent/viewDeliverer');
	$this->load->view('include/footer');
    }
}
