<div class="tab-content">	
<div class="content1">
	<?php echo validation_errors(); ?>
	<?php 
	echo form_open('knoxville/updateDeliveryStatus/'.$statusID.'/'.$orderID,'id="delivery"'); 
	?>
	<div>&nbsp;</div>
		<h2 class="text-center">UPDATE DELIVERY STATUS</h2>
			<div class="container ClientForm">
			<div class="text-center">
				<label class="control-label col-sm-4"></label>
			<select  class="form-control" name="status" id='status' form="delivery">
				<option disabled hidden>Status</option>
					<option value="Forwarded to" <?php if($status=='Forwarded to') {echo 'selected';}?> >Forwarded</option>
					<option value="Arrived at" <?php if($status=='Arrived at') {echo 'selected';}?>>Arrived</option>
					<option value="Delivered" >Successfully Delivered</option>
			</select>
			<label>to</label>
				<label class="control-label lefty"></label>
			<input  class="form-control" type="text" name="location" placeholder="location" id="location" value="<?php echo $location; ?>"/>
			</div>
			<br />
		
			<div>
				<label class="control-label col-sm-4">Date:</label>
				<input  class="form-control col-sm-4" type="date" name="date" value="<?php echo $date; ?>" />
			</div>
			
			<div>
				<label class="control-label col-sm-4">Time: &nbsp;</label>
				<input  class="form-control col-sm-4"  type="time" name="time" value="<?php echo date("H:i", strtotime($time)); ?>"/>
			</div>
			<br />
		
			<div class="col-sm-6">
				<input class="subUpdate sround" type="submit">
			</div>
	</form>
</div>
</div>
</div>

</body>
</html>