<?php include('config.php')?>
<!DOCTYPE html>
<html>
<title>
    WELCOME TO BLUE ELECTRONICS
</title>

<head>
    <link rel="stylesheet" href="registration.css">
    <script type= "text/javascript">
function formValidation() {
    var username = document.getElementById('username');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var password = document.getElementById('password');
    var repassword = document.getElementById('repassword');
    if (firstname.value.length == 0) {
        document.getElementById('head').innerText = "* All fields are mandatory *";
        alert("Enter First name!");
        username.focus();
    return false;
    }
    if (email.value.length == 0) {
        document.getElementById('head').innerText = "* All fields are mandatory *";
        alert("Enter email name!");
        email.focus();
        return false;
    }
    if (phone.value.length == 0) {
        document.getElementById('head').innerText = "* All fields are mandatory *";
        alert("Enter Phone no.!");
        phone.focus();
        return false;
    }
    if (password.value.length == 0) {
        document.getElementById('head').innerText = "* All fields are mandatory *";
        alert("Password Must Be atleast 8 characters!");
        password.focus();
        return false;
    }
}
</script>
</head>
<body>
    <header>
    <div id="background">
    <div class="blur"></div>
    </div>
        <h1 id = "image-text">BLUE ELECTRONICS</h1>
    </div>   
    </header>
    <h3>Kindly Register Using Appropriate Details. Make sure to Check details before submitting</h3><br>
    <div id="container">
    <p id="head"></p>
    <form action="registration.php" method="POST"> 
    <?php include('errors.php') ?>
    <p>USERNAME </p>
        <input type="text" name="username" placeholder="User Name" size="15"  id="username" required>
        <p>AREA:</p>
        <select name="area" id ="area">
            <option value="Yelahanka" selected>Yelahanka</option>
            <option value="Hebbal">Hebbal</option>
            <option value="Vidyaranyapura">Vidyaranyapura</option>
            <option value="Electronic City">Electronic City</option>
            <option value="Bannerghatta Road">Bannerghatta Road</option>
            <option value="JP Nagar">JP Nagar</option>
            <option value="Jayanagar">Jayanagar</option>
        </select>
        <p>PHONE NUMBER:</p>
        <input type="text" id = "countrycode" name="country code" value="+91" size="2">
        <input type="text" name="phone" placeholder="Phone Number" size="10" id = "phoneno" required>
        <p>EMAIL:</p>
        <input type="email" name="email" placeholder="Email" id ="email" required>
        <p>PASSWORD:</p>
        <input type="Password" name="password" placeholder="Password" id="pwd" required>
        <p>CONFIRM PASSWORD:</p>
        <input type="Password" name="repassword" placeholder="Re-Enter Password" required>
        <input onclick = "formValidation()" type = "submit" value="Register" name="reg_user">
        <p class='link'>Already Registered? Login<a href='login.php'> Here</a></p>
    </form>
    </div>
</body>

</html>