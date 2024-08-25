<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .content{
            display: flex;
            justify-content: center;
        }
        form{
            text-align: center;
            direction: rtl;
            width: 250px;
            display: flex;
            flex-direction: column;
        }
        .field{
            margin: 5px;
            flex: 1;
            display: flex;
            justify-content: space-between;
        }
        .field input{
            width: 100%;
            text-align: center;
            outline: none;
        }
        .btn{
            display: flex;
        }
        .btn *{
            flex: 1;
            margin: 5px 0px;
        }
        .btn label{
            background-color: #5af;
            border-radius: 0 10px 10px 0;
            padding: 5px;
            cursor: pointer;
            border-color: #555;
            border-style: solid;
            border-width: 1px;
            border-left-width: 0;
        }
        .btn label:hover{
            background-color: #5df;
        }
        .btn input{
            cursor: pointer;
            border-color: #555;
            border-style: solid;
            border-width: 1px;
            border-right-width: 0;
            border-radius: 10px 0 0 10px;

        }
    </style>
</head>
<body>

    <?php
        if(isset($_POST["add"])){
            include("../conf.php");
            $name = $_POST["name"];
            $price = (int) $_POST["price"];
            $amount = (int) $_POST["amount"];
            $category = $_POST["category"];
            $code = $_POST["code"];
            $image = $_FILES["image"];
            $image_location = $image["tmp_name"];
            if ($name and $price and $amount and $category and $code and $image_location and is_int($price) and is_int($amount)){
                $image_name = $image["name"];
                if(move_uploaded_file($image_location, $image_location)){
                    $insert = "INSERT INTO products (name, price, amount, category, code, image) VALUES ('$name', '$price', '$amount', '$category', '$code', '$image_name')";
                    mysqli_query($con, $insert);
                    echo "<script>alert('تم الرفع بنجاح')</script>";
                }else{
                    echo "<script>alert('فشلت عملية الرفع')</script>";
                }
                header("location: index.php");
            }
            else{
                echo "<script>alert('برجاء كتابة الحقول بطريقة صحيحة')</script>";
            }
        }
    ?>
    <div class="content">
        <form method="post" enctype="multipart/form-data">

            <div class="field">
                الاسم: <input type="text" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:''; ?>">
            </div>

            <div class="field">
                السعر: <input type="text" name="price" value="<?php echo isset($_POST['price'])?$_POST['price']:''; ?>">
            </div>

            <div class="field">
                الكمية: <input type="text" name="amount" value="<?php echo isset($_POST['amount'])?$_POST['amount']:''; ?>">
            </div>

            <div class="field">
                الصنف: <input type="text" name="category" value="<?php echo isset($_POST['category'])?$_POST['category']:''; ?>">
            </div>

            <div class="field">
                الكود: <input type="text" name="code" value="<?php echo isset($_POST['code'])?$_POST['code']:''; ?>">
            </div>

            <div class="btn">
                <input type="file" id="file" name="image" value="<?php echo isset($_FILES['image'])?$_FILES['image']:''; ?>" style="display:none">
                <label for="file">ارفع الصورة</label>
                <input type="submit" name="add" value="أضف">
            </div>

        </form>
    </div>
    <center>
        <a href="index.php">الرجوع للصفحة الرئيسية</a>
    </center>
</body>
</html>