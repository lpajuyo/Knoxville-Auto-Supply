<html>
<body>
	<div class="cntr">
	<p class="boxhead"> Add Order </p> <br />
	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addOrder','id="order"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	 
	<div class="form-group">
		<label class="company-label" for="company">Company: &nbsp; </label>
	<?php
	echo '<select name="clientid" form="order">';
		echo '<option selected disabled hidden>Company Name</option>';
		foreach($clients as $c){
			echo '<option value="'.$c['clientID'].'">'.$c['client_name'].'</option>';
		}
	echo '</select>';
	?>
	</div>
	
	<div class="form-group">
		<label class="date-label" for="date">Date:&nbsp; </label>
		<input type="date" name="date" />
		<label class="date-label" for="date">Time: &nbsp;</label>
		<input type="time" name="time" />
    </div>
	
	<div class="form-group">
		<label class="duedate-label" for="duedate">Due Date: &nbsp; </label>
		<input type="date" name="duedate"/>
    </div>
	
	<div id="table_include">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
						<th class="info">Item Description</th>
						<th class="info">Stocks</th>
						<th class="info">Price</th>
						<th class="info">Quantity</th>
						<th class="info">ADD</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($items as $c){  
                    echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
                    .'</td><td>&nbsp;</td><td>&nbsp;</td><td><input type="checkbox" name="'.$c['itemID'].'" /></td>';
                }
            ?>
        </tbody>
    </table>
    </div>
	</div>
	
	<div class="form-group">
		<label class="items-label" for="items">Items: &nbsp; </label>
		<select name="items" form="order">
			<option value="items"> </option>
		</select>
    </div>
	
	<div class="form-group">
		<label class="quantity-label" for="quantity">Quantity: &nbsp; </label>
		<input type="dropdown" name="quantity"/>
    </div>
	
	<div class="form-group">
		<label class="price-label" for="price">Price: &nbsp; </label>
		<input type="text" name="price"/>
    </div>
	
	
	<button class="btn btn-primary btn-md" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Save
	</button>
	
	</form>
	</div>
</body>
</html>