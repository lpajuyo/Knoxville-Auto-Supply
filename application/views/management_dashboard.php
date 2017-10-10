    <p>Sales Report</p>
    
    <div id="range-dropdown">
        <select name='range'>
            <option value="day" selected>Today</option>
            <option value="week">This week</option>
            <option value="month">This month</option>
        </select>
    </div>
 
    <div id="sales_report">
    </div>
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
	
	
Search stocks: <input type="text" id="myInput" onkeyup="Item2()" placeholder="Type any value" title="Type ANY value"/>

    
        <div class="table-responsive table">
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
						.'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'">Edit</a> | <a href="'.base_url('knoxville/delItem/'.$c['itemID']).'">Delete</a></td></tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
					}
                }
				?>
			</tbody>
		</table>
    </div>
	
	 <div class="table-responsive table">
            <table class="table table-striped" id="Table">
                <thead>
                    <tr id="trHead">
						<th>OrderID</th>
						<th>Status</th>
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
							echo '<tr><td><a href="'.base_url('knoxville/viewTransaction/'.$o['orderID']).'">Order#'.$o['orderID'].'</a></td><td>Delivery Unscheduled</td>
						<td><a href="'.base_url('knoxville/addDeliverySched/'.$o['orderID']).'">Add a schedule</a></td></tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
						}
					}
                }
				?>
			</tbody>
		</table>
    </div>

</body>
</html>