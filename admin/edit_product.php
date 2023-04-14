<?php

require("../library.php");
$bank = new Jeva();
$db = DB();
$id = "";

$msg = "";
	
	$id = $_GET['edit_id'];

	if (isset($id)) {


		$stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $invoice_id = $row['id'];
            $prod_name = $row['name'];
            $price = $row['price'];
            $category = $row['category'];
            $quantity = $row['quantity'];
           


			
		}
	}else {
		echo  "no";
	}


    if(isset($_POST['update'])){

        $prod_name = $_POST['prod_name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
      
        $id = $_POST['id'];

      
		$customer = $bank->editProduct($prod_name,$price,$category,$quantity,$id);
		if ($customer) {
			$msg = '<div class="alert alert-success" role="alert">Info Updated</div>';
		}else {
			$msg =  '<div class="alert alert-danger" role="alert">Failed to update customer info</div>';
		}


    }


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
   <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   <style type="text/css">
   	
   	*{
   		margin: 0;
   		padding: 0;
   		box-sizing: border-box;
   		font-family: 'Raleway', sans-serif;
   	}

   	

   	.edit-page{

   		background-color:#f2f2f2;
   		height: 820px;
   		display: flex;
   	   flex-direction: row;
   	   flex-wrap: wrap;
   	   justify-content: center;
   	   align-items: center;
   	   position: relative;

   	}

   	.navigations{
   		position: absolute;
   		top: 8px;
   		left: 16px;
   		font-size: 18px;
   	}


   	.edit-form {
   		background-color: hsl(0, 0%, 100%);
   		height: 650px;
   		width: 50%;
   		padding-top: 3%;

   	}

   	.edit-form h3 {
   		padding-top: 1%;
   		padding-left: 30%;
   		padding-bottom: 1%;
   		font-weight: bolder;
   	}

   	 input[type=text] {
   		width: 100%;
   		/*margin-left: 30%;*/
   		font-size: 20px;
   	}

   	form label {
   		padding-left: 30%;
   		font-weight: bolder;
   	}


   	.btn-primary {
   		width: 100%;
   		height: 40px;
   		/*margin-left: 30%;*/
   		border: 2px solid ##e6e600;
   		font-weight: bolder;
   	}

   </style>

</head>
<body>

	<div class="container-fluid edit-page">

		<div class="navigations">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
			    <li class="breadcrumb-item"><a href="featured.php">Products</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
			  </ol>
			</nav>
		</div>



			

		<div class="container edit-form">

			
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<h3>Edit Product</h3>
			<form method="post" action="">

				<div class="row">

					<div class="col">
						<div class="form-group">
			    <label for="exampleInputEmail1">Product Name</label>
			    <input type="text" name="prod_name" class="form-control" value="<?php echo $prod_name; ?>">

			  </div>
					</div>

					<div class="col">
						 <div class="form-group">
			    <label for="exampleInputEmail1">Price</label>
			    <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
			  </div>
					</div>

					
				</div>
				<!-- end of first row -->


				<div class="row">

					<div class="col">
					 <div class="form-group">
				    <label>Category</label>
				    <select class="form-control" name="category">
	                  <option>Select</option>
	                  <option value="cement">Cement</option>
	          		<option value="iron rods">Iron rods</option>
	                  <option value="blocs">Blocks</option>
	                  <option value="sand">Sand</option>
	                  <option value="gravel">Gravel</option>
	                  <option value="wood">Wood</option>
	                </select>
				  </div>
					</div>

					<div class="col">
						 <div class="form-group">
			    <label for="exampleInputEmail1">Quantity</label>
			    <input type="text" name="quantity" class="form-control" value="<?php echo $quantity; ?>">
			  </div>
					</div>
					
				</div>

			  
			    

			


			  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $invoice_id; ?>">
			  </div>


			  <button type="submit" name="update" class="btn btn-primary">Update</button>
			</form>
		</div>
		
	</div>

	




	 <!-- jQuery CDN  -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	
	 <!-- Bootstrap JS -->
	<!-- <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script> -->
	<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script> -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>