<?php

include("../library.php");
$ch = new Jeva();






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
                <p>REQUESTS</p>


            <li>
                <!-- <a href="#" id="appointment" data-target="one" class="test">Generate Code</a> -->
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Request</a>
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

            <h4>Customer Request</h4>

            <div class="container appointment show" id="one">

                           <!--  <div class="myForm">




                                

                                <ul class="list-group">
                                  <li class="list-group-item">
                                  
                            <button type="button" id="cot" name="cote" class="btn btn-primary">Cot Code</button>:
                            <input type="" name="" id="cotInput"> 
                            
                                 
                                  
                                    
                                  </li>

                                  <li class="list-group-item">
                                    <button type="button" id="tax" name="tax" class="btn btn-primary">Tax Code:</button>
                                    <input type="" name="" id="taxInput">
                                  </li>

                                  <li class="list-group-item">
                                    
                                    <button type="button" id="imf" name="imf" class="btn btn-primary">IMF Code:</button>
                                    <input type="" name="" id="imfInput">
                                  </li>

                                  <li class="list-group-item">
                                    <button type="button" id="otp" name="otp" class="btn btn-primary">Otp Code:</button>
                                    <input type="" name="" id="otpInput">
                                  </li>

                                
                                </ul>
                                

                                

                                


                                

                        
                            </div> -->
             
            
               
            </div>


    
            


               

                


             <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Cust Name</th>
                <th scope="col">Cust Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Location</th>
                <th scope="col">Comment</th>
              
             <th scope="col">Date</th>
              </tr>
            </thead>

            <tbody>
                <?php

                $requests = $ch->displayCustomerRequest();
                foreach ($requests as $row) {
                    
                
                    ?>
                <tr>
                    <td><?php echo $row['cust_name']; ?></td>
                    <td><?php echo $row['cust_email']; ?></td>
                    <td><?php echo $row['telephone']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['comment']; ?></td>
                    <td><?php echo $row['today']; ?></td>
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

        // display all featured news
        $(document).ready(function(){

$.ajax({
 url:"loansajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

         var first_name = response[i]["first"];

         var last_name = response[i]["last"];
         var email = response[i]["email"];
         var amount = response[i]["amount"];
         var loan_type = response[i]["type"];
       
     

         var table_str = "<tr>" +
                      
                      
                      "<td>" + first_name + "</td>" +
                      "<td>" + last_name + "</td>" +
                      "<td>" + email + "</td>" +
                      "<td>" + amount + "</td>" +
                      "<td>" + loan_type+ "</td>" +
                    "<td>" + action + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          });  

      });



        </script>
</body>

</html>