<!DOCTYPE html>
<div class="tab-content">
Search: <input type="text" id="myInput" onkeyup="Item()" placeholder="Type any value" title="Type ANY value">
	<a href="<?php echo base_url('knoxville/addItem')?>" class="addLink"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Item</a>

    
        <div class="table-responsive table">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>Item Description</th>
						<th>Stocks</th>
						<th>ACTION</th>
					</tr>
				</thead>
			<tbody>
				<?php
                if($onStock != false){
					foreach($onStock as $c){  
						echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
						.'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'">Edit</a> | <a href="'.base_url('knoxville/delItem/'.$c['itemID']).'">Delete</a></td></tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
					}
                }
				?>
			</tbody>
		</table>
    </div>

</div>
</div>
</div>
</body>
</html>