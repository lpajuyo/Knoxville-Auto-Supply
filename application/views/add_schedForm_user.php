<div class="tab-content">	
		<div class="content1">
			<?php echo validation_errors(); ?>
			<?php echo form_open('SalesAgent/addSched/'.$orderID,'id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
											 //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
			?>
				<div>&nbsp;</div>
				<h2 class="text-center">ADD SCHEDULE</h2>
			<div class="container ClientForm">
			<div>
			<label class="control-label col-sm-4"></label>
				<?php
				echo '<select name="deliverer" class="text-center form-control">';
					echo '<option selected disabled hidden >Assigned Personnel</option>';
					foreach($deliverer as $c){
						echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
					}
				echo '</select>';
				?>
				</div>
				<div>
				<label class="control-label col-sm-4">Date:</label>
				<input class="form-control col-sm-4" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
				</div>
				<br />
				<div>
				<label class="control-label col-sm-4">Time: &nbsp;</label>		
				<input class="form-control col-sm-4" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
				</div>
				<br />
				<div>
				<input class="subUpdate" type="submit">
				</div>
			</form>
		</div>
	</div>
	</div>


</body>
</html>
