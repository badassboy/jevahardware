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


        .form-group input[type="password"]{
            width: 50%;
            margin-bottom: 2%;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>LEMONFIRM</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Settings</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Settings</a>
            </li>

            <li>
                <!-- <a href="#" id="event" data-target="two" class="test">All Transfers</a> -->
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

            <h2>Change Password</h2>

            <div class="container appointment show" id="one">

                <div id="response"></div>

                <div class="myForm">

                <form method="post" id="setting" action="admin_password_ajax.php">

                  <div class="form-group">
                    <label class="form-label">New password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label">Repeat new password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                  </div>

                  
                    <button type="submit"  class="btn btn-primary">Change Password</button>
                 
                  

                  
                </form>

            </div>
             
            
               
            </div>


    
            


               

                


            <!--  <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Amount</th>
                <th scope="col">Accnt Holder</th>
                <th scope="col">Accnt Number</th>
                <th scope="col">Status</th>

                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody></tbody>

            </table>
              
            </div>
                -->
             

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

        //change user password
        $(document).ready(function(){

            $("#setting").submit(function(e){
              e.preventDefault();
              $.ajax({
                type:"post",
                url:"admin_password_ajax.php",
                data:$("#setting").serialize()
              })

              .done(function(data){
                $("#response").html(data);
                // console.log("hello");
              })

              .fail(function(data){
                $("#response").html(data);
                // console.log("hi");
              });

             // $("#funding").find('input').val(" ");
                
            });

        });
        


       

              


        

           






        


    </script>
</body>

</html>