<div class="tab-content">	
<div class="content">
<div class="content1">
	<?php echo validation_errors(); ?>
	<?php 
	echo form_open('knoxville/updateDeliveryStatus/'.$statusID.'/'.$orderID,'id="delivery"'); 
	?>
	
		<select name="status" id='status' form="delivery">
			<option disabled hidden>Status</option>
				<option value="Forwarded to" <?php if($status=='Forwarded to') {echo 'selected';}?> >Forwarded</option>
				<option value="Arrived at" <?php if($status=='Arrived at') {echo 'selected';}?>>Arrived</option>
				<option value="Delivered" >Successfully Delivered</option>
		</select>
		
		<label>to</label>
 		<input type="text" name="location" placeholder="location" id="location" value="<?php echo $location; ?>"/>
		<br />
		<br />
		<label>Date:</label>
 		<input type="date" name="date" value="<?php echo $date; ?>" />
 		<label>Time: &nbsp;</label>
		
		<input type="time" name="time" value="<?php echo date("H:i", strtotime($time)); ?>"/>
		<br />
		<br />
        <input class="subUpdate" type="submit">
	</form>
</div>
</div>
</body>
</html>