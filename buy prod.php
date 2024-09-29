<?php
    include("conf.php");
    if(isset($_POST["buy"])){
        $user_id = $_POST["user_id"];
        $prod_code = $_POST["prod_code"];
        $result = mysqli_query($con, "SELECT * FROM carts WHERE prod_code=$prod_code");
        if ($row=mysqli_fetch_assoc($result)){
            mysqli_query($con, "UPDATE carts SET quantity=$row[quantity]+$_POST[quantity] WHERE prod_code=$prod_code");
        }else{
            $result = mysqli_query($con, "SELECT * FROM products WHERE code=$prod_code");
            $prod = mysqli_fetch_assoc($result);
            mysqli_query($con, "INSERT INTO carts (user_id, prod_code, name, price, image, quantity) VALUES ('$user_id', '$prod_code', '$prod[name]', '$prod[price]', '$prod[image]', $_POST[quantity])");
        }
        header("location:index.php");
    }
?>