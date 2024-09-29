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
    <title>matgry</title>
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
                <form action="buy prod.php" method="post">
                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                    <input type="hidden" value="<?php echo $prod['code'] ?>" name="prod_code">
                    <input type="number" class="mb-1 w-50" min="1" name="quantity" value="1" onkeydown="return false;">
                    <button class="btn btn-primary" name="buy">buy product</button>
                </form>
            </div>
        </div>
    <?php
        }
    ?>
    </div>



    <h1 class="text-center">cart</h1>

    <div class="row justify-content-center ">
    <?php
        $result = mysqli_query($con, "SELECT * FROM carts");
        while($prod=mysqli_fetch_array($result)){
    ?>
    <div class="card col-lg-1 col-md-2 col-3 text-center p-0 m-2">
            <img src="<?php echo "images/".$prod["image"] ?>" class="card-img-top" alt="product image">
            <div class="card-body">
                <h6 class="card-title"><?php echo $prod['name'] ?></h4>
                <p class="card-text">
                <?php echo $prod['price']." eg" ?>
                <br>
                x<?php echo $prod["quantity"] ?>
                <br>
                <?php echo $prod["price"]*$prod["quantity"]." eg" ?>
                </p>
                <form action="return.php" method="post">
                    <input type="hidden" name="cart_id" value="<?php echo $prod['id'] ?>">
                    <?php if($prod["quantity"]>1){ ?>
                    <button style="font-size:12px;" class="mb-1 btn btn-danger" name="one">return one</button>
                    <button style="font-size:12px;" class="btn btn-danger" name="all">return all</button>
                    <?php }else{ ?>
                    <button style="font-size:12px;" class="btn btn-danger" name="all">return</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
    </div>
    


    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.js"></script>
</body>
</html>