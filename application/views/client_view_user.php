<!DOCTYPE html>
<div class="tab-content">
<div class="card-body" style="padding: 10px;">
<h3 style="text-align: center; text-decoration: bold;" >CLIENT MANAGEMENT</h3>
	
	
    
		
    
	
		<div class="search1">Search: <input type="text" id="myInput" onkeyup="Client()" placeholder="Type any value" title="Type ANY value">
		<a data-toggle="modal" data-target="#squarespaceModal" class="butt2"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Client</a>
		</div>
	<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Client</h3>
		</div>
		<div class="modal-body">
  <div class="container">
	<?php echo validation_errors(); ?>
  

  <?php echo form_open('SalesAgent/addClient'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div class="Client">
		<label class="control-label col-sm-4" for="cname">Client Name:</label>
		<?php echo form_error('cname', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control col-sm-4" type="text" name="cname" value="<?php echo set_value('cname'); ?>" id="cname" placeholder="First name, Last name" />
    </div>
    
    <div class="Client">
		<label class="control-label col-sm-4" for="cnum">Contact Number:</label>
		<?php echo form_error('cnum', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control col-sm-4" type="text" name="cnum" value="<?php echo set_value('cnum'); ?>" id="cnum" placeholder="09-XXX-XXX-XXX"/>
    </div>
	
     <div class="Client">
		<label class="control-label col-sm-4" for="cnum">Address:</label>
		<?php echo form_error('caddress', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control col-sm-6" type="text" name="caddress" value="<?php echo set_value('caddress'); ?>" id="caddress" />
     </div>

	 <div class="Client" style="margin-left: 150px;">
	 
		<div class="col-sm-6">
			<input class="subUpdate" type="submit" value="SUBMIT"/>
		</div>
	
	</div>
	
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
   
        <div class="table-responsive table" id="myTable">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
                 
                        <th>Client Name</th>
                        <th>Address </th>
                        <th>Contact No.</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
            <?php
                if($clients != false){
                    foreach($clients as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                        echo "<tr></td><td>".$c['client_name']."</td><td>".$c['address']."</td><td>".$c['contact_no']

                        .'</td><td><a href="'.base_url('SalesAgent/updateClient/'.$c['clientID']).'"><span class="glyphicon glyphicon-edit"></span></a> | <a onclick="confirmDelete('.$c['clientID'].')"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';

                        //echo base_url('knoxville/delClient/'.c['clientID'])
                    }
                }
            ?>
        </tbody>
    </table>
    </div>
</div>
</div>
    <script>
    function confirmDelete(clientID){
        var choice=confirm("Delete this client?");
        if(choice)
            window.location.assign("<?php echo base_url('knoxville/delClient'); ?>"+"/"+clientID);
    }
    </script>
</body>
</html>
