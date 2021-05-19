<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebuket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  </head>

</head>
<body>
    <link rel="stylesheet" href="‪D:\bootstrap-4.3.1-dist\bootstrap\js\bootstrap.min.js"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <div class="jumbotron">
  <div class="container">
  <div class="row">
  <div class="col-12">
  <h2 class="text-center p-3">Product Details</h2>
  <hr>
  </div>
  <div class="col-12">
  <a href='index.php'>Home</a>
  <center>
  <?php
  if(isset($_POST["addcart"]))
  {
      if(isset($_SESSION["cart"]))
      {
                   $pid_array=array_column($_SESSION["cart"],"pid");
                   if(!in_array($_GET["id"],$pid_array))
                   {
              $index=count($_SESSION["cart"]);
              $item=array(
                'pid'=>$_GET['id'],
                'pname'=>$_POST['pname'],
                'price'=>$_POST['price'],
                'qty'=>$_POST['qty']
   );
   $_SESSION["cart"][$index]=$item;
   echo"<script>alert('Product Added..')";
   header("location:viewcart.php");


                    
                   }
                   else{
						echo "<script>alert('Already Added..');</script>";
                        
                }
      }
      
      else{
          $item=array(
                       'pid'=>$_GET['id'],
                       'pname'=>$_POST['pname'],
                       'price'=>$_POST['price'],
                       'qty'=>$_POST['qty']
          );
          $_SESSION["cart"][0]=$item;
          echo"<script>alert('Product Added..')";
          header("location:viewcart.php");
      }
  }
 $sql="select * from products where pid='{$_GET["id"]}'";
 $res=$con->query($sql);
 if($res->num_rows>0)
 {
$row=$res->fetch_assoc();
echo"
<div class='container table-responsive'>
<center>
<form action='{$_SERVER["REQUEST_URI"]}' method='post'>
</center>
<table class='table table-bordered'>
<tr>
<td colspan='2' class='text-center'><img src='data:image/png;base64,".base64_encode($row['PIC'])."' alt='img' class='img-fluid'></td>
</tr>
</tr>
<td class='text-center'>Product Name</td><td class='text-center'><strong>{$row["PNAME"]}</strong></td>
</tr>
<tr>
<td class='text-center'>Brand Name</td><td class='text-center'><strong>{$row["BNAME"]}</strong></td>
</tr>
<tr>
<td class='text-center'>RAM</td><td class='text-center'><strong>{$row["RAM"]}GB</strong></td>
</tr>
<tr>
<td class='text-center'>Storage</td><td class='text-center'><strong>{$row["STORAGE"]}</strong></td>
</tr>
<tr>
<td class='text-center'>Display</td><td class='text-center'><strong>{$row["DISPLAY"]}</strong></td>
</tr>
<tr>
<td class='text-center'>Battery</td><td class='text-center'><strong>{$row["BATTERY"]}</strong></td>
</tr>
<tr>
<td class='text-center'>Price</td><td class='text-center'><strong>{$row["PRICE"]}</strong></td>
</tr>
<tr>
<td class='text-center'>Enter Qty</td>
<td class='text-center'><input type='text' name='qty' required>
<input type='hidden'value='{$row["PNAME"]}' name='pname'>
<input type='hidden' value='{$row["PRICE"]}' name='price'></td>
</tr>
<tr>
<td colspan='2' class='text-center'><input type='submit' name='addcart' value='addcart' class='btn btn-success'></td>
</tr>
</form>
</div>
</center>


";
 }  
  ?>
  </center>
  </div>
   </div>
  </div>
  </div>
</body>
</html>