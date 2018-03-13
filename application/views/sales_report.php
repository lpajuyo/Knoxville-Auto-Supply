    <br />
    <p><?php echo $range; ?></p>
    <p><?php echo $date; ?></p>
    
    <p>Sales Report</p>
    
    <p>Total Revenue: <?php echo $totalRevenue; ?></p>
    <p>Total Items Sold: <?php echo $totalQuantity; ?></p>
	
	<p class="text-center report hdr">Sales</p>
   	<div class="searchLeft">
		Search sales: <input type="text" id="myInput" onkeyup="alapa()" placeholder="Type any value" title="Type ANY value"/>
	</div>
   	<div class="table-responsive tbls">
		
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>Sales Agent</th>
						<th>Total number of Orders</th>
						<th>Total Amount of Sales</th>
					</tr>
				</thead>
			<tbody>
				<?php
                if($sales != false){
					foreach($sales as $c){  
						echo "<tr><td>".$c['fullname']."</td><td>".$c['orders'].'</td><td>PHP'.$c['total'].'</td></tr>';
					}
                }
				
				?>
			</tbody>
			</table>
   		</div>
</body>
</html>