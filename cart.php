<?php
    session_start();
    $database_name = "blueelectronics";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
            box-sizing: border-box;
        }
        .title2{
            text-align: center;
            background-color: #efefef;
            padding: 2%;
            width: 100%;
        }
        table, th, tr{
            text-align: center;
           margin-bottom: 40px;
            
        }
        table th{
            background-color: #0e2565;
            color: white;
        }
        .table_design{
            text-align: center;
            margin-left: 250px;
            margin-top: 30px;

        }
        .text-danger{
            color: red;
        }
        button[type = submit]{
            padding: 15px;
            margin-top: 100px;
            margin-bottom: 200px;
            margin-left: 500px;
            background-color: #0e2565;
            color: azure;
            font-weight: bold;
            width: 500px;
            font-size: 25px;
            border-radius: 40px;
        }
        input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
        }

        label {
        margin-bottom: 10px;
        display: block;
        }

        .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
        }
        .col-75 {
        flex: 75%;
        padding: 0 16px;
        }
        .row{
        flex-wrap: wrap;
        margin: 0 -16px;
        display: flex;
        padding: 8px;
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
        }
        .col-50{
            flex: 50%;
        }
        hr {
        border: 1px solid lightgrey;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel = "stylesheet" href="index1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
            $("#logo").slideToggle("slow");
            });
        });
        $(document).ready(function () {
            $("tr:even").css("background-color", " #efefef")
            $("tr:odd").css("background-color", " white");                 
        });
</script>    
</head>
<body>
        <div id ="flip">Blue Electronics</div>
        <nav> 
        <div id = "logo">Cart
                <ul>
                    <li><a class ="active" href="#">Cart</a></li>  
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?logout='1">Log Out</a></li> 
                </ul>
            </div>
        </nav>
        <div style="clear: both"></div>
        <h1 class="title2">Shopping Cart Details</h1>
        <div class="table-responsive">
            <table class="table_design">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>Rs <?php echo $value["product_price"]; ?></td>
                            <td>
                                Rs <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">Rs <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
            <div class="row">
            <div class = "col-75">
            <div class="col-50">
            <h3 align= "center">Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Name on card">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="Card Number">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Expiry Month">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="Expiry Year">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="CVV">
              </div>
            </div>
            </div>
            </div>
                </div>
            <button onclick = "payment()" type = "submit" value = "Book Order">Book Order</button>
       
        </div>
       
<hr>
<h2>Continue Shopping?</h2>
<br>
<h2>Select your Item of Interest</h2>
<div class="content">
        <a href="mobile.php"><img src="mobiles.jpg" style= " width: 200px;
    height: auto;">
         <a href="tv.php"><img src="tv.jpg"  style= " width: 200px;
    height: auto;">
         <a href="laptop.php"><img src="laptops.jpg"  style= " width: 200px;
    height: auto;">
         <a href="camera.php"><img src="camera.png"  style= " width: 200px;
    height: auto;" >
</div>
<div class="footer">
  <div class="contain">
  <div class="col">
    <h1>Blue Electronics</h1>
    <h1>It is a project developed only for Educational Purposes</h1>
  </div>
  <div class="col">
    <h1>Menu</h1>
    <ul>
      <li><a href="index.php"></a>Home</li>
      <li><a href="cart.php"></a>Cart</li>
    </ul>
  </div>
  <div class="col">
    <h1>Products</h1>
    <ul>
      <li><a href="mobile.php"></a>Mobile</li>
      <li><a href="laptop.php"></a>Laptop</li>
      <li><a href="tv.php"></a>TV</li>
      <li><a href="camera.php"></a>Camera</li>
    </ul>
  </div>
  <div class="col social">
    <h1>Cards Accepted</h1>
    <i class="fa fa-cc-visa" style="color:navy;"></i>
    <i class="fa fa-cc-mastercard" style="color:red;"></i>
    </div>
  <div class="clearfix"></div>
</div>
</div>
<script>
    function payment(){
    var cardname = document.getElementById('cname');
    var cardnumber = document.getElementById('ccnum');
    var expirymonth = document.getElementById('expmonth');
    var expiryyear = document.getElementById('expyear');
    var cvv = document.getElementById('cvv');
    if (cardnumber.value.length == 0) {
        alert("Enter Card Number!");
        ccnum.focus();
        return false;
    }
    else if (expirymonth.value.length == 0) {
        alert("Enter Expiry Month!");
        expmonth.focus();
        return false;
    }
    else if (expiryyear.value.length == 0) {
        alert("Enter Expiry Year!");
        expyear.focus();
        return false;
    }
    else if (cvv.value.length == 0) {
        alert("Enter CVV!");
        cvv.focus();
        return false;
    }
    else{
        alert ("Your Order has Been Booked. Thank you For Your Time.");
        window.location.href = "index.php";
    }
    }
</script>
    </body>
</html>