<?php
ob_start();
session_start();
//echo isset($_SESSION['login']);
//if(!isset($_SESSION['login'])) {
//  header('LOCATION:loggedIn.php');
//die();
//}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8'/>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username === 'Connor' && $password === 'Cyberlife') {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header('Location: ./loggedIn.php');
            die();
        } elseif ($username === 'HarryHill' && $password === 'MrFunnyDoctor') {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header('Location: ./loggedIn.php');
            die();
        } else {
            echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        }
    }
    ?>
    <h3 class="text-center">Login</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Login</button>
    </form>
</div>
</body>
</html>