<!DOCTYPE html>

	<a href="<?php echo base_url('knoxville/addItem')?>"><button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Add Item</button></a>
	
	<div id="table">
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
						<th class="info">ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($item as $c){  
                    echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
                    .'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'">Edit</a> | <a href="'.base_url('knoxville/delItem/'.$c['itemID']).'">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
            ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>