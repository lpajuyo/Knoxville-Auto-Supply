
	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addSched/'.$orderID.'','id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	
		<?php
		echo '<select name="deliverer" form="order">';
			echo '<option selected disabled hidden>Assigned Personnel</option>';
			foreach($deliverer as $c){
				echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
			}
		echo '</select>';
		?>
		
		<label>Date:</label>
 		<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
 		<label>Time: &nbsp;</label>		
		<input type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
	</form>
	<input type="submit">
</body>
</html>
