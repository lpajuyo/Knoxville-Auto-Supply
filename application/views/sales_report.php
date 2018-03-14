    <br />
	<div class="card-body xx text-center" >
    <div class="">
	<div class="card-body" style="padding-top: 10px;">
    <p><?php echo $range; ?></p>
    <p><?php echo $date; ?></p>
   
    <p>Sales Report</p>
    
    <p>Total Revenue: <?php echo $totalRevenue;	?></p>
    <p>Total Items Sold: <?php echo $totalQuantity; ?></p>
	</div>
	</div>
	</div>	<br />	<br />
	<p class="text-center report x">Sales</p>
   	<div class="searchLeft1">
		Search sales: <input type="text" id="myInput" onkeyup="Items()" placeholder="Type any value" title="Type ANY value"class="sround"/>

	</div>
   	<div class="table-responsive tbls">
		
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>Sales Agent <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Total number of Orders <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Total Amount of Sales <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
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
