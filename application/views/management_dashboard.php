<body>
<div class="tab-content">
<div class="card-body" style="padding: 20px;">
    <div class="">
		<p class="text-center report x">Sales Report</p>
    
		<div id="range-dropdown" class="text-center">
			<select class="select" name='range'>
				<option value="day" selected>Today</option>
				<option value="week">This week</option>
				<option value="month">This month</option>
			</select>
		</div>
		<div id="sales_report"></div>

	 <script>
        $(document).ready(function(){
            $.ajax({
                url: "<?php echo base_url('knoxville/viewSalesReport'); ?>",
                type: "POST",
                data: "range=day",
                
                success: function(data){
                    $('#sales_report').html(data);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#range-dropdown select').change(function(event){
                var selRange = $(this).val();
                $.ajax({
                    url: "<?php echo base_url('knoxville/viewSalesReport'); ?>",
                    type: "POST",
                    data: "range="+selRange,
                    
                    success: function(data){
                        $('#sales_report').html(data);
                    }
                });
            });
        });
    </script>
	</div>
	
	<div class="tbl">
	<p class="text-center report x">Unscheduled Deliveries</p>
	<div class="searchLeft2">
	Search Orders <input type="text" id="Input" onkeyup="Und()" placeholder="Type any value" title="Type ANY value" class="sround"/>
	</div>
	<div class="table-responsive tbls">
            <table class="table table-striped" id="Table">
                <thead>
                    <tr id="trHead">
						<th>OrderID <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Status <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Assigned Sales Agent <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Schedule For Delivery <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>

					</tr>
				</thead>
			<tbody>
				<?php
				
                if($orders != false){
					foreach($orders as $o){  
						$sched=0;
						foreach($shipped as $s){
							if($s['orderID'] == $o['orderID'])
							$sched++;
						}
						if($sched==0){
							echo '<tr>
							<td><a href="'.base_url('knoxville/viewTransaction/'.$o['orderID']).'">Order#'.$o['orderID'].'</a></td>
							<td>Delivery Unscheduled</td>
							<td>'.$o['userID'].'</td>
							<td><a href="'.base_url('knoxville/addSched/'.$o['orderID']).'">Add a schedule</a></td>
							</tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
						}
					}
                }
				?>
			</tbody>
		</table>
    </div>
    </div>
	<p class="text-center report x">Items on Stock</p>
	<div class="searchLeft3">
		Search stocks: <input type="text" id="myInput" onkeyup="Item2()" placeholder="Type any value" title="Type ANY value" class="sround"/>
	</div>
        <div class="table-responsive tbls">
		
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>Items on Stock <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Stocks <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>ACTION</th>
					</tr>
				</thead>
			<tbody>
				<?php
                if($onStock != false){
					foreach($onStock as $c){  
						echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
						.'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'"><span class="glyphicon glyphicon-edit"></span></a> | <a onclick="confirmDelete('.$c['itemID'].')"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
					}
                }
				?>
			</tbody>
			</table>
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