<?php
    if(isset($_POST["submit"])){
        include 'conf.php';

        // 1-  get data
        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $password = mysqli_real_escape_string($con, md5($_POST["password"]));
        $email = mysqli_real_escape_string($con, $_POST["email"]);

        // 2- check data
        $select = mysqli_query($con, "SELECT * FROM users WHERE name='$name' AND password='$password'");
        if($row = mysqli_fetch_assoc($select)){
            // 4- heading to index
            header("location:index.php");
        }else{
            $messages[] = 'incorrect name or password!';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    
    <div class="navbar navbar-expand-sm bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">MATGRY</a>
        </div>
    </div>

    <div class="container text-center">
        <h2>Sign Up</h2>
        <hr>
    </div>

    <form method="post" class="container mt-3">
        <?php
            if(isset($messages) and count($messages)){
        ?>
                <div class="alert alert-danger">
                    <ul class="m-0">
                        <?php
                            foreach($messages as $message){
                        ?>
                                <li><?php echo $message; ?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
        <?php
            }
        ?>
        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
        <button class="btn btn-primary" name="submit">submit</button>
        <a href="login.php">login</a>
        </div>
    </form>



    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.js"></script>
</body>
</html>