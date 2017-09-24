<form method="post">
	<p> Select no. of items:
	<input type="number" name="itemn" min="1" max="20" value="1">
	<input type="submit">
	</form>
	
	<?php 
	
	$s = 1;
	if(isset($_POST['itemn']))
    $s = $_POST['itemn'];
	for($x = 1; $x <= $s ; $x++){
	echo $x.'.<select name="Item'.$x.'">';
	echo '<option selected disabled hidden>Item Name</option>';
	
	foreach($items as $i){
	
	echo '<p><option value="'.$i['item_id'].'" id="itemID">'.$i['item_desc'].'</option>';
	}
	echo '</select>
		 &nbsp&nbsp Qty:
		<input type="number" name="qty'.$x.'" min="1" max="1000" value="1">
		
		&nbsp&nbsp Quoted Price (per piece):
		<input type="number" name="price'.$x.'" min="100" max="10000000" value="100">
		
		</p>';
	
	}
	?>