<?php
    include("../conf.php");
    if($_POST["pass"] == "hello"){
        $code = $_POST["code"];
        mysqli_query($con, "DELETE FROM products WHERE code=$code");
        echo "<script>alert('تم الحذف بنجاح')</script>";
        header("location: index.php");
    }
?>