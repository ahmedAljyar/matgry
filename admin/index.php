<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="nav">
            <a href="add prod.php">أضف منتج</a>
        </div>
        <h1>صفحة المدير</h1>
    </div>
    <div class="products">
        <?php
            include("../conf.php");
            $result = mysqli_query($con, "SELECT * FROM products");

            while($prod = mysqli_fetch_array($result)){
        ?>
                <div class='product'>
                    <img src=<?php echo "../images/".$prod['image']; ?>>
                    <h1 class='prod-name'><?php echo $prod['name']; ?></h1>
                    <span class='prod-price'><?php echo $prod['price']; ?></span>
                    <div class='op'>
                        <form action='edit prod.php' method='post'>
                            <input type='hidden' value="<?php echo $prod['name']; ?>" name='name'>
                            <input type='hidden' value="<?php echo $prod['price']; ?>" name='price'>
                            <input type='hidden' value="<?php echo $prod['amount']; ?>" name='amount'>
                            <input type='hidden' value="<?php echo $prod['category']; ?>" name='category'>
                            <input type='hidden' value="<?php echo $prod['code']; ?>" name='prev_code'>
                            <input type='hidden' value='hello' name='pass'>
                            <input type='submit' class='edit' value='تعديل المنتج'>
                        </form>
                        <form action='delete prod.php' method='post'>
                            <input type='hidden' value="<?php echo $prod['code']; ?>" name='code'>
                            <input type='hidden' value='hello' name='pass'>
                            <input type='submit' class='delete' value='حذف المنتج'>
                        </form>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
</body>
</html>