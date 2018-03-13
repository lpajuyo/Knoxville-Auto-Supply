
<div class="tab-content">
   <img src="<?php echo $photo?>" class="profilepic img-circle border" style="width: 200px ; height:200px; float:left;" alt="profilepic"
                            <div class="col-sm-12 text-left panel-default1" style="margin:20px; border-radius: 30px;">
                                
                                    <div style="margin-left: 220px;">
                                        <h4 class="heading ">User ID: <?php echo $userID?></h4>
                                        <h4 class="heading ">Name: <?php echo $name?></h4>
                                        <h4 class="heading ">Birthday: <?php echo $bday?></h4>
                                        <h4 class="heading ">Email: <?php echo $email?></h4>  
                                        <h4 class="heading ">Contact no.: <?php echo $cnum?></h4>  
                                        <a  href="<?php echo base_url('knoxville/changepass')?>" class="heading">Change Password</a>
                                        <a  href="<?php echo base_url('knoxville/updateSalesAgent/'.$userID).'?>" class="heading">Edit your profile</a>
                                    </div>
                            </div>
            </div>' ;
              
                        
                        
                        