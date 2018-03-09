<!DOCTYPE html>
<div class="tab-content">
<?php echo validation_errors(); ?>
<div class="card-body" style="padding: 10px;">
	<button data-toggle="modal" data-target="#squarespaceModal" style="margin-left: 88%;"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Item</button>
	

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Item</h3>
		</div>
		<div class="modal-body">
 <div class="container">
 
    <div class="ClientForm">
		<label class="control-label col-sm-4" for="idesc">Item Desc.:</label>
		<input class="form-control col-sm-4" type="text" name="idesc" id="idesc" />
    </div>
    
    <div class="ClientForm">
		<label class="control-label col-sm-4" for="stocks">Stocks:</label>
		<input class="form-control col-sm-4" type="text" name="stocks" id="stocks" />
    </div>
    
	<div class="col-sm-6" style="margin-left: 150px;">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
	<div class="search1">
		Search: <input type="text" id="myInput" onkeyup="Item()" placeholder="Type any value" title="Type ANY value">
	</div>
    
        <div class="table-responsive table" id="myTable">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
						<th>Item Description</th>
						<th>Stocks</th>
						<th>ACTION</th>
					</tr>
				</thead>
			<tbody>
				<?php
                if($item != false){
					foreach($item as $c){  
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