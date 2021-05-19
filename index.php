<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-buket</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  </head>
    <link rel="stylesheet" href="‪D:\bootstrap-4.3.1-dist\bootstrap\js\bootstrap.min.js"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="jumbotron">
    <div class="container">
    <div class="row">
        <div class="col-12">
        <h1 class="text-center p-3">Smart Phones</h1><hr>
        </div>
            <!--index-->
            <?php
            $sql="select * from products";
            $res=$con->query($sql);
         if($res->num_rows>0)
         {
             while($row=$res->fetch_assoc())
             {
                 echo'
                 <div class="col-sm-4 col-lg-3 col-md-3 mt-5">
                 <div style="background-color:white;border-radius:20px;" class="p-3">
                 <center>
                 <img src="data:image/png;base64,'.base64_encode($row['PIC']).'" alt="img" class="img-fluid">
                 <p class="text-center"><a href="#" >'.$row['PNAME'].'</a></p>
                 <h4 class="text-center">Rs.'.$row['PRICE'].'</h4>
                 <p class="text-center p-2"><a href="view.php?id='.$row['PID'].'" class="btn btn-success">view</a>
                 </center>
                 </div>
                 </div> 
                 ';
             }
         }
            
            
            ?>
       
        </div>   
    </div>
        </div>
        
</body>
</html>