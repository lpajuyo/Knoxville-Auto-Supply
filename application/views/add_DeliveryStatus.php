	<?php echo validation_errors(); ?>
	<?php 
	echo form_open('knoxville/addDeliveryStatus/'.$orderID.'/'.$shipID,'id="delivery"'); 
	?>
	
		
		<select name="status" id="status" onChange="changetextbox();">
			<option selected disabled hidden>Status</option>
				<option value="Forwarded to">Forwarded</option>
				<option value="Arrived at">Arrived</option>
				<option value="Delivered">Successfully Delivered</option>
		</select>
		
		<label>to</label>
 		<input type="text" name="location" placeholder="location" id="location"/>
		
		<label>Date:</label>
 		<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
 		<label>Time: &nbsp;</label>		
		<input type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
        <input type="submit">
	</form>
</body>
</html>