<?php
if(isset($_POST["one"])){
    include("conf.php");
    $result = mysqli_query($con, "SELECT quantity FROM carts WHERE id=$_POST[cart_id]");
    $quantity = mysqli_fetch_assoc($result)["quantity"];
    mysqli_query($con, "UPDATE carts SET quantity=$quantity-1 WHERE id=$_POST[cart_id]");
}elseif (isset($_POST["all"])) {
    include("conf.php");
    mysqli_query($con, "DELETE FROM carts WHERE id=$_POST[cart_id]");
}header("location:index.php");
?>