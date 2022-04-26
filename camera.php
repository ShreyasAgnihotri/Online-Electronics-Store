<?php
    session_start();
    $database_name = "blueelectronics";
    $con = mysqli_connect("localhost","root","",$database_name);
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href="index1.css">
    <title>Camera</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        .product{
            float: left;
            width: 33.33%;
	        padding: 10px;
	        text-align: center;
	    }
        .product:hover {
	        background-color: #e5e5e5;
            box-shadow: 0 0 0 2px #e5e5e5;
	        cursor:pointer;
	    }
        input[type=submit]{
            font-size: 10px;
            background: blue border: 1px solid #e5a900;
            color: #fffefd;
            font-weight: bold;
            cursor: pointer;
            width: 50%;
            border-radius: 25px;
            padding: 10px 0;
            outline: none;
            height: auto;
            margin-bottom: 25px;
            margin-top: 20px;
            background-color: #4f65a5;
        }
        .quantity{
            text-align: center;
            border-radius: 25px;
            border: 2px solid #4f65a5;
            padding: 3px;
        }
    </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
            $("#logo").slideToggle("slow");
            });
        });
</script>       
</head>
<body>
<div id ="flip">Blue Electronics</div>
<nav> 
<div id = "logo">Home
        <ul>
            <li><a class ="active" href="index.php">Home</a></li>  
            <li><a href="cart.php">Cart</a></li>
            <li><a href="index.php?logout='1">Log Out</a></li> 
        </ul>
    </div>
</nav>
      <h2>Camera</h2>
        <?php
            $query = "SELECT * FROM camera ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    >
                    <div class="product">
                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">                                                     
                                <img src="<?php echo $row["image"]; ?>">
                                <h5><?php echo $row["pname"]; ?></h5>
                                <h5>Rs <?php echo number_format($row["price"], 2); ?></h5>
                                <input type="text" name="quantity" value="1" class="quantity">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"><br>
                                <input type="submit" name="add" style="margin-top: 5px;"  value="Add to Cart">
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
<hr>
<h2>Let's Shop!</h2>
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

</body>
</html>