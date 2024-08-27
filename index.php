<?php
    include("conf.php");
    session_start();
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
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

    <h1 class="text-center">products</h1>

    <div class="row justify-content-center m-0">

    <?php
        $result = mysqli_query($con, "SELECT * FROM products");
        while($prod = mysqli_fetch_array($result)){
    ?>
    <div class="card col-lg-2 col-md-3 col-4 text-center p-0 m-2">
        <img src="<?php echo "images/".$prod["image"] ?>" class="card-img-top" alt="product image">
        <div class="card-body">
            <h4 class="card-title"><?php echo $prod['name'] ?></h4>
            <p class="card-text"><?php echo $prod['price']." eg" ?></p>
            <form action="" method="post">
                <button class="btn btn-primary" name="buy">buy product</button>
            </form>
        </div>
    </div>
    <?php
        }
        $result = mysqli_query($con, "SELECT ")
    ?>

    </div>
    


    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.js"></script>
</body>
</html>