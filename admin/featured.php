<?php

include("../library.php");
$ch = new Jeva();

if(isset($_POST['add'])){
  $msg = "";
  $prod_name = trim($_POST['prod_name']);
  $price = trim($_POST['price']);
  $category = $_POST['category'];
  $quantity = trim($_POST['quantity']);
  $short_desc = trim($_POST['short_desc']);
  $prod_image = $_FILES['photo']['name'];
  $full_desc = trim($_POST['full_desc']);

  $productUpload = $ch->productUpload($prod_image,$prod_name,$price,$category,$quantity,$short_desc,$full_desc);
  if ($productUpload) {
      $msg = "Product uploaded";
  }else{
    $msg = "upload failed";
  }




  

}
// end of laliga news



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .appointment{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .show {
          display: block;
        }

        button[type="submit"]{
            margin: 2%;
            width: 50%;
            margin-left: 40%;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ADMINISTRATION</h3>
            </div>

            <ul class="list-unstyled components">
                <p>PRODUCTS</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Upload Product</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Products</a>
            </li>

         
           
           


            </ul>

           

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                    
                </div>
            </nav>

            <h3>PRODUCT SECTION</h3>

            <div class="container appointment show" id="one">

                            <div class="myForm">
                                <?php 

                                if (isset($msg)) {
                                    echo $msg;
                                }

                                ?>

           <form method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col">
          <div class="form-group">
            <label>Product Name</label>
    <input type="text" class="form-control" name="prod_name" placeholder="Product Name" required>
           
          </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price" required>
                  </div>
  
                </div>
                <div class="col">
                    <div class="form-group">
                     <label for="exampleInputPassword1">Category</label>
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
            </div>

            <!-- end of first row -->

            <!-- second row -->

            <div class="row">

                <div class="col">
                     <div class="form-group">
                      <label for="exampleInputPassword1">Quantity</label>
                      <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                    </div>
                </div>

                <div class="col">
                     <div class="form-group">
                      <label for="exampleInputPassword1">Short Description</label>
      <input type="text" class="form-control" name="short_desc" placeholder="Short Description" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
         <label>Product Image</label>
            <input type="file" class="form-control-file" name="photo" required>
                   </div> 
                </div>
                
            </div>
            <!-- end of second row -->
            <div class="form-group">

        <textarea class="form-control" name="full_desc" rows="3"placeholder="Full Description"></textarea> 
            </div>

         

<button type="submit" class="btn btn-primary" name="add">Submit</button>
        </form>


</div>
             
            
               
            </div>


    <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Name</th>
                <th scope="col">price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Short Desc</th>

                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
                <?php

            $products = $ch->getAllProducts();
            foreach ($products as $row) {
            

                 ?>
                <tr id="delete<?php echo $row['id']; ?>">
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['short_desc']; ?></td>
            <td>
                <button onclick="deleteAjax(<?php echo $row['id']; ?>)" class="btn btn-danger">delete</button>
                <span>
                   <a href="edit_product.php?edit_id=<?php echo $row['id']; ?>"><button>edit</button></a> 
                </span>
            </td>
                   
                </tr>

            <?php } ?>
                
            </tbody>

            </table>
              
            </div>
               
             

            <!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

                


       
   
          

    <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // creating an array-like based of child nodes on a specified class name
        var links = document.getElementsByClassName("test");

     //attach click handler to each
        for (var i = 0; i < links.length; i++) {
            links[i].onclick = toggleVisible;
        }

        function toggleVisible(){
                //hide currently shown item
               document.getElementsByClassName('show')[0].classList.remove('show');
               // getting info from custom data-target  set on the element
               var id = this.dataset.target;
               // showing div
               document.getElementById(id).classList.add('show');
        }


        // The below code is a JavaScript function that uses jQuery's AJAX method to send a POST request to the server to delete a product with the specified ID. The function takes one parameter, which is the ID of the product to be deleted.

        // The function first displays a confirmation dialog box asking the user if they are sure they want to delete the product. If the user clicks "OK", the AJAX request is sent to the server 
         function deleteAjax(id){
                    if (confirm("are u sure?")) {
                        $.ajax({
                            type:"post",
                            url: "delete_product.php",
                            data:{delete_id:id},
                            success:function(data){
                                $('#delete'+id).hide();
                            }
                        })
                    }
                }



        

        // display all featured news
//         $(document).ready(function(){

// $.ajax({
//  url:"featuredajax.php",
//  type:"get",
//  dataType:"JSON",
//  success:function(response){
//    console.log(response);
//      var len = response.length;
//      for (var i = 0; i < len; i++) {

//            var edit = response[i]['edit'];
//          var my_delete  = response[i]["delete"];

//          var action = edit.concat(" ", my_delete);

//          var prod_name = response[i]["prod_name"];

//          var price = response[i]["price"];
       
//          var quantity = response[i]["quantity"];
//          var short_desc = response[i]["short_desc"];

//          var table_str = "<tr>" +
                      
                      
//                       "<td>" + prod_name + "</td>" +
//                       "<td>" + address + "</td>" +
                    
//                       "<td>" + price + "</td>" +
//                       "<td>" + quantity + "</td>" +
//                       "<td>" + short_desc + "</td>" +
//                       "<td>" + action + "</td>" +
//                       "</tr>";


//               $(".table tbody").append(table_str);

//             }
             
//           },
//           error:function(response){
//             console.log("Error: "+ response);
//           }
      
//           });  

//       });



        
              


        

           






        


    </script>
</body>

</html>