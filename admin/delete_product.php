<?php 

include("../library.php");

$ch = new Jeva();

$id = $_POST['delete_id'];

$product_delete = $ch->deleteProduct($id);
if ($product_delete) {
	echo "true";
}else {
	echo "false";
}




?>