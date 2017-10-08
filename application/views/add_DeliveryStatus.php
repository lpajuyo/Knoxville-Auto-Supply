<div class="tab-content">

	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addDeliverySched/'.$orderID.'','id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	<div>&nbsp;</div>
	<h2 class="text-center">Deliver Items</h2>
	<div class="container ClientForm">
		<div>
			<label class="control-label col-sm-4" for="Personnel">Assigned Personnel &nbsp; </label>
		<div class="form-control col-sm-4" id="userID">
		<?php
		echo '<select name="deliverer" form="order">';
			echo '<option selected disabled hidden>Assigned Personnel</option>';
			foreach($deliverer as $c){
				echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
			}
		echo '</select>';
		?>
		</div>
	</div>
	
	<div>
		<label class="control-label col-sm-4" for="date">Date:</label>
 		<input class="form-control col-sm-4" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
	</div>
	<div>
 		<label class="control-label col-sm-4" for="date">Time: &nbsp;</label>		
		<input class="form-control col-sm-4" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
	</div>	
    
   </div>
	</form>
	<div class="col-sm-6">
	<button class="sub" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Schedule Delivery
	</button>
	</div>
	</div>
</body>
</html>
