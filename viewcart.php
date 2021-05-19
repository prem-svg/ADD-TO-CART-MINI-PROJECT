<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  </head>
    <link rel="stylesheet" href="‪D:\bootstrap-4.3.1-dist\bootstrap\js\bootstrap.min.js"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
    <div class="jumbotron">
    <div class="container">
        <a href='index.php'>Home</a>
        <div class="container">
       <table class='table table-border table-responsive'>
                  <tr>
                  <th>Item Name</th>
                  <th>qty</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Remove</th>
                  </tr>
        <?php
        if(isset($_GET["del"]))
        {
            foreach ($_SESSION["cart"] as $key => $values) {
            if($values["pid"]==$_GET["del"])
            unset($_SESSION["cart"][$key]);
            }
        }
        if(!empty($_SESSION["cart"]))
        {  $total=0;
            foreach ($_SESSION["cart"] as $key => $values) {
                $amt=$values["qty"] * $values["price"];
                $total+=$amt;
                echo"
                <tr>
                    <td>{$values["pname"]}</td>
                    <td>{$values["qty"]}</td>
                    <td>{$values["price"]}</td>
                    <td>{$amt}</td>
                    <td><a href='viewcart.php?del={$values["pid"]}'>Remove</a></td>
                </tr>
                ";
            }
            echo"
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>{$total}</td> </tr>
            ";
        }
        else{
            echo"<script>alert('Plese Select product..')";
          header("location:index.php");
        }
        
        ?>
        </table>
        </div>
        </div>
        </div>
       
</body>
</html>

