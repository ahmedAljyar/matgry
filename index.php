<?php
    include("conf.php");
    $user_id = $_SESSION["user_id"];
    if(!isset($user_id)){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        $result = mysqli_query($con, "SELECT * FROM products");
        while($prod = mysqli_fetch_array($result)){
    ?>
    <div class="product">
        <h1><?php echo $prod['name'] ?></h1>
        <img src="<?php echo "images/".$prod["image"] ?>">
        <form action="">
            <button type='submit' class="buy">buy</button>
        </form>
    </div>
    <?php
        }
        $result = mysql_query($con, "SELECT ")
    ?>

    
</body>
</html>