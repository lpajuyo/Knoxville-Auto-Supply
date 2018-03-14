<body>
<div class="tab-content">
    <div class="">
		<p class="text-center report">Sales Report</p>
    
		<div id="range-dropdown">
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
	<p class="text-center report hdr">Unscheduled Deliveries</p>
	<div class="searchLeft">
	Search Orders <input type="text" id="Input" onkeyup="Und()" placeholder="Type any value" title="Type ANY value"/>
	</div>
	<div class="table-responsive tbls">
            <table class="table table-striped" id="Table">
                <thead>
                    <tr id="trHead">
						<th>OrderID</th>
						<th>Status</th>
						<th>Assigned Sales Agent</th>
						<th>Schedule For Delivery</th>

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
	<p class="text-center report hdr">Items on Stock</p>
	<div class="searchLeft">
		Search stocks: <input type="text" id="myInput" onkeyup="Item2()" placeholder="Type any value" title="Type ANY value"/>
	</div>
        <div class="table-responsive tbls">
		
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>Items on Stock</th>
						<th>Stocks</th>
						<th>ACTION</th>
					</tr>
				</thead>
			<tbody>
				<?php
                if($onStock != false){
					foreach($onStock as $c){  
						echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
						.'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'">Edit</a> | <a onclick="confirmDelete('.$c['itemID'].')">Delete</a></td></tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
					}
                }
				?>
			</tbody>
			</table>
   		</div>
   	<p class="text-center report hdr">Sales</p>
   	<div class="searchLeft">
		Search sales: <input type="text" id="myInput" onkeyup="alapa()" placeholder="Type any value" title="Type ANY value"/>
	</div>
   	<div class="table-responsive tbls">
		
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>User ID</th>
						<th>Name</th>
						<th>Total Sales</th>
					</tr>
				</thead>
			<tbody>
				<?php
                if($sales != false){
					foreach($sales as $c){  
						echo "<tr><td>".$c['userID']."</td><td>".$c['fullname']
						.'</td></tr>';
					}
                }
				?>
			</tbody>
			</table>
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