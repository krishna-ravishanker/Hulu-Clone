<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="reg.css">
    <title>Login</title>
</head>
<body>
<img src="img/logo.png" alt="hulu-logo" id="logo">
    <div class="container">
        <?php 

        if(isset($_POST['login'])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once 'database.php';
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
                if(password_verify($password, $user['password'])){
                    header("Location: dashboard.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email Does Not Exist</div>";
            }
        }

        ?>
    <form action="login.php" method="POST">
        <h1>Log in</h1>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email-ID">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </div>
        </form>
    </div>
</body>
</html>