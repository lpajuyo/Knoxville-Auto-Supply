<!DOCTYPE html>
<div class="tab-content">
   <?php echo validation_errors(); ?>
   <div class="card-body" style="padding: 10px;">
    <button data-toggle="modal" data-target="#squarespaceModal"style="margin-left: 85%;" ><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Sales Agent</button>
    <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Add Sales Agent </h3>
        </div>
        <div class="modal-body">
     <div>&nbsp;</div>
    <div class="container ">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addSalesAgent'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div class="ClientForm">
        <label class="control-label col-sm-4" for="userID">UserID:</label>
        <input class="form-control col-sm-4" type="text" name="userID" id="userID" value="<?php echo date("y").'-002-'.str_pad($id, 3, '0', STR_PAD_LEFT) ?>" disabled />
    </div>
    
    <div class="ClientForm">
        <label class="control-label col-sm-4" for="pass">Password:</label>
        <input class="form-control col-sm-4" type="password" name="pass" id="pass" />
    </div>
    
    <div class="ClientForm">
        <label class="control-label col-sm-4" for="name">Name:</label>
        <input class="form-control col-sm-4" type="text" name="name" id="name" />
    </div>
    
    <div class="ClientForm">
        <label class="control-label col-sm-4" for="bday">Birthdate:</label>
        <input class="form-control col-sm-4" type="date" name="bday" id="bday" />
    </div>
    
    <div class="ClientForm">
        <label class="control-label col-sm-4" for="email">Email:</label>
        <input class="form-control col-sm-4" type="email" name="email" id="email" />
    </div>
    
    <div class="ClientForm">
        <label class="control-label col-sm-4" for="cnum">Contact Number:</label>
        <input class="form-control col-sm-4" type="text" name="cnum" id="cnum" />
    </div>
   <div class="ClientForm">
    <div class="col-sm-4" style="; padding: 20px;">
        <label for="isAdmin">Admin?</label>
        <input class="check" type="checkbox" name="isAdmin" id="isAdmin" />
    </div>
    
    <div class="col-sm-4" style="padding: 30px;">
        <input class="subUpdate" type="submit" value="SUBMIT"/>
    </div>
    </div>
    
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>

   
    <div class="search">
        Search: <input type="text" id="myInput" onkeyup="Sales()" placeholder="Type any value" title="Type ANY value">
    </div>
        <div class="table-responsive table" id="myTable">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
                        <th>User ID</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Birthdate</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                    foreach($sales_agents as $c){  
                        $time = strtotime($c['birthdate']);

                        echo "<tr><td>".$c['userID']."</td><td>".$c['password']."</td><td>".$c['fullname']."</td><td>".date('m/d/y',$time)."</td><td>".$c['email']."</td><td>".$c['contact_no'].'</td><td><a href="'.base_url('knoxville/updateSalesAgent/'.$c['userID']).'">Edit</a> | <a onclick="confirmDelete('.$c['userID'].')">Delete</a></td></tr>';
                        //echo base_url('knoxville/delClient/'.c['clientID'])
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
<script>
    function confirmDelete(userID){
        var choice=confirm("Delete this user?");
        if(choice)
            window.location.assign("<?php echo base_url('knoxville/delSalesAgent'); ?>"+"/"+userID);
    }
    </script>

</body>
</html>                
                        
                        
                        