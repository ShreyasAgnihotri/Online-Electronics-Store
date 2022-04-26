<?php include('config.php')?>
<!DOCTYPE html>
<html>
<title>
    LOGIN TO CONTINUE
</title>

<head>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <header>
    <div id="background">
    <div class="blur"></div>
    </div>
        <h1 id = "image-text">BLUE ELECTRONICS</h1>
    </div>   
    </header>    
    <h3>Welcome E-Electronic Store. Your One stop for many Electronic goods and Gadgets. Please Login to Continue</h3><br>
    <div id="container">
            <form action="login.php" method="post" id = "form_id">
                <?php include('errors.php'); ?>
                <p>USERNAME :</p>
                <p><input type="text" name="username" placeholder="User Name"></p>
                <p>PASSWORD :</p>
                <p><input type="password" name="password" placeholder="Enter Password"></p>
                <input type="submit" name = "login_user" value = "LOGIN" id="submit">
                <p class='link'>Not Registered? Click here for <a href='registration.php'>Registration</a></p>
            </form>
        </div>
</body>
</html>