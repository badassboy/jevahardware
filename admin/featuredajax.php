<?php

include("../db.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM products");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$block = '<a href="block-account.php?trash='.$id.'">
				<i class="fa fa-lock" aria-hidden="true"></i>
			  </a>';
	$delete = '<a href="delete-account.php?del='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$prod_name = $result['name'];
	$price = $result['price'];
	$quantity = $result['quantity'];
	$short_desc = $result['short_desc'];
	

	$json[] = array(
		
		"prod_name" => $prod_name,
		"price" => $price,
		"quantity" => $quantity,
		"short_desc" => $short_desc,
		"edit" => $delete,
		"delete" => $block
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







