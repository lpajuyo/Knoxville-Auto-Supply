<!DOCTYPE html>
<div class="tab-content">
<?php echo validation_errors(); ?>
<div class="card-body" style="padding: 10px;">
<h3 style="text-align: center; text-decoration: bold;" >ITEM MANAGEMENT</h3>
	<div class="search1">
		Search: <input type="text" id="myInput" onkeyup="Item()" placeholder="Type any value" title="Type ANY value" class="sround">
		<a data-toggle="modal" data-target="#squarespaceModal" class="butt4"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Item</a>
	
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Item</h3>
		</div>
		<div class="modal-body">
 <div class="container">
 <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addItem'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div class="ClientForm">
		<label class="control-label col-sm-4" for="idesc">Item Desc.:</label>
		<input class="form-control col-sm-4" type="text" name="idesc" id="idesc" placeholder="Name of item" style="width:200px;"/>
    </div>
    
    <div class="ClientForm">
		<label class="control-label col-sm-4" for="stocks">Stocks:</label>
		<input class="form-control col-sm-4" type="number" name="stocks" id="stocks" placeholder="Number of stock" style="width:200px;"/>
    </div>
    
	<div class="col-sm-12" style="margin-left: 100px;">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
	
	</div>
    
        <div class="table-responsive table" id="myTable">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
						<th>Item Description <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Stocks <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>ACTION</th>
					</tr>
				</thead>
			<tbody>
				<?php
                if($item != false){
					foreach($item as $c){  
						echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']

						.'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'"><span class="glyphicon glyphicon-edit"></span></a> | <a onclick="confirmDelete('.$c['itemID'].')"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';

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
<script>
    function confirmDelete(itemID){
        var choice=confirm("Delete this item?");
        if(choice)
            window.location.assign("<?php echo base_url('knoxville/delItem'); ?>"+"/"+itemID);
    }
    </script>
</body>
</html>