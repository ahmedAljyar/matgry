<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <center>
        <div>
            <?php
                if(isset($_POST["omak"])){
                    echo $_POST["omak"];
                }
            ?>
        </div>
        <form action="" method="post">
            <input type="hidden" value="hello world" name="omak">
            <br>
            <input type="submit" value="shit on me">
        </form>
    </center>
</body>
</html>