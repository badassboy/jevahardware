<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("db.php");


class Jeva {

	public function registerAdmin($email,$password)
	{
			$dbh = DB();
		$hashed = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $dbh->prepare("INSERT INTO admin(email, password) VALUES(?,?)");
		$stmt->execute([$email,$hashed]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else{
			return false;
		}


	}


	public function loginAdmin($email,$password)
		{

		$dbh = DB();
		
		$stmt = $dbh->prepare("SELECT * FROM admin WHERE email = ?");
		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
		if($stmt->rowCount()>0){
			if (password_verify($password, $data['password'])) {
			

			return true;


			}else {
				return false;
			}
			
		}else {
			return false;
		}


	} 


	public function productUpload($file_name,$name,$price,$category,$quantity,$short_desc,$full_desc)
	{
		
	try{

		$errors = array();
		$dbh = DB();

		$dir = "assets/images/";
		$file_name = $_FILES['photo']['name'];
		$file_size = $_FILES['photo']['size'];
		$file_type = $_FILES['photo']['type'];
		$file_tmp = $_FILES['photo']['tmp_name'];

		$test_file = $dir.basename($_FILES["photo"]["name"]);
		$file_ext = pathinfo($test_file, PATHINFO_EXTENSION);

		$extensions= array("jpeg","jpg","png","gif");

		if(in_array($file_ext,$extensions) === false){
		   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}

		if($file_size > 4097152) {
		   $errors[]='File size must be exactly 2MB';
		}

		if (empty($errors)==true) {

		    move_uploaded_file($file_tmp, "assets/images/".$file_name);
		       
		}

    // Get today's date
    $today_date = date("Y/m/d");

    $stmt = $dbh->prepare("INSERT INTO products(name,price,category,quantity,picture,short_desc,full_desc,today_date) VALUES(?,?,?,?,?,?,?,?)");
    $stmt->execute([$name,$price,$category,$quantity,$dir.$file_name,$short_desc,$full_desc,$today_date]);
    $data = $stmt->rowCount();
    if ($data>0) {
    	return true;
    }else{
    	return false;
     
    
	}
	}catch(PDOException $ex){
		echo $ex->getMessage();
	}
}



	public function getAllProducts()
	{

		try{

			$dbh  = DB();
			$stmt = $dbh->prepare("SELECT * FROM products");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;

		}catch(PDOException $ex){
			echo $ex->getMessage();
		}



	}


	public function displayProductDetails($id)
	{

		try{

			$dbh  = DB();
			$stmt = $dbh->prepare("SELECT * FROM products WHERE id = ?");
			$stmt->execute([$id]);
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;

		}catch(PDOException $ex){
			echo $ex->getMessage();
		}

	}


	public function deleteProduct($id){
		$dbh = DB();
		$stmt = $dbh->prepare("DELETE FROM products WHERE id = ?");
		$stmt->execute([$id]);
		$deleted = $stmt->rowCount();
		if ($deleted>0) {
			return true;
		}else{
			return false;
		}

	}

	public function editProduct($product_name,$price,$category,$quantity,$id){
		try{

			$dbh = DB();
			$stmt = $dbh->prepare("UPDATE products SET name = ?, price  = ?, category = ?, quantity = ?  WHERE id = ?");
			$stmt->execute([$product_name,$price,$category,$quantity,$id]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else{
				return false;
			}

			

		}catch(PDOException $ex){
			echo $ex->getMessage();
		}

	}




	public function submitCustomerRequest($cust_name,$cust_email,$telephone,$location,$comment)
	{

		try{

			$dbh = DB();
			$today_date = date("Y/m/d");
		$stmt = $dbh->prepare("INSERT INTO customer_request(cust_name,cust_email,telephone,location, comment,today) VALUES(?,?,?,?,?,?)");
		$stmt->execute([$cust_name,$cust_email,$telephone,$location,$comment,$today_date]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else{
			return false;
		}

		}catch(PDOException $ex){
			echo $ex->getMessage();
		}


	}

	public function displayCustomerRequest()
	{
		try {
			$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM customer_request");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}


	}
    
}


?>