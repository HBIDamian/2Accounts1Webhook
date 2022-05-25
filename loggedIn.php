<html>
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Logged in.</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
<?php
    ob_start();
    session_start();
        if(!isset($_SESSION['login'])) {
        header('LOCATION: ./');
        die();
    } else {
            $username = $_SESSION['username'];
        }
?>
    <body>
        <div class="container">
        <a href="./logOut.php" style="float:right; color: black;">Log Out?</a>
            <h3 class="text-center">Send message to Discord Webhook</h3>            
            
<form action="" method="POST">
    <p>Message:</p>
    <textarea rows="10" cols="100" name="msgPost" autocomplete="off"></textarea>
    <br>
    <input type="submit" name="submitAgain" class="btn btn-default" />
</form>
    <?php
      if(isset($_POST['submitAgain'])){
        $_SESSION['choMsg'] = $_POST['msgPost'];
        if (empty($_SESSION['choMsg'])){
            echo('<p style="color: red;">A error has occured because of you being a dickhead!</p>');
        } else {
            echo "<script> location.href='./embed.php'; </script>";
            echo('<p style="color: darkgreen;">Message sent. </p>');
            exit;
        }
        }
    ?>
        </div>
        </body>
</html>
