<?php
session_start();
// Database Connectivity
$con = mysqli_connect("localhost","id15304932_myprepmate","Inp_Project_123","id15304932_logindemo");
$db = mysqli_select_db($con,"id15304932_logindemo");
  if (isset($_POST["AddtoCart"]))//Isset is used to check whether a variable is set or not.Excecuted when add to cart button is clicked
    {
        if (isset($_SESSION["cart"]))//Cart Session created (session array is created with name Cart)
        {   
            $item_array_id = array_column($_SESSION["cart"],"id");//array column returns value of id from session cart to item_array_id 
                if (!in_array($_GET["id"],$item_array_id))// in_array is used to check whether product is present in item_array_id. products new item to cart. 
                    { 
                      $count = count($_SESSION["cart"]); //Count returns number of elements in array 
                      $item_array = array(     
                      // array products in cart
                      'id' => $_GET["id"],
                      'name' => $_POST["name"],
                      'price' => $_POST["price"],
                      'quantity' => $_POST["quantity"],
                      'image' => $_POST["image"],
                      );
                      $_SESSION["cart"][$count] = $item_array;
                      echo '<script>window.location="Cart.php"</script>';
                    }
           
        }
        else// product in cart
        { 
           $item_array = array(
                    'id' => $_GET["id"],
                    'name' => $_POST["name"],
                    'price' => $_POST["price"],
                    'quantity' => $_POST["quantity"],
                    'image' => $_POST["image"],
                     );
            $_SESSION["cart"][0] = $item_array;
        }
    }
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 " >
    <link rel="stylesheet" type="text/css" href="Cart-style.css" />
    <title>Cart</title>
</head>
<body>
<header>
        <div class="logo-container">
            <a href="../intro_login/intro.php" class="logo">MyPrepMate</a>
        </div>
        <nav>
            <ul class="nav-links">
                <li ><a class="nav-link" href="../stud_dash/stud-dash.html">Home</a></li>
                <li ><a class="nav-link" href="../Courses/Courses.html">Courses</a></li>
                <li ><a class="nav-link" href="../VideosVideos.html">Videos</a></li>
                <li ><a class="nav-link" href="Quiz.html">Quiz</a></li>
                <li ><a class="nav-link" href="../elib_cart/Elibrary.php">E-library</a></li>
                <li ><a href="../About/about.html" class="head-button">About</a></li>
                <li ><a href="../intro_login/intro.php" class="head-button">LogOut!</a></li>
            </ul>
        </nav>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </header>
    <script src="Cart-script.js"></script>
        <div style="clear: both"></div>
        <br>
        <center><h3>Shopping Cart Details</h3></center>
        <br>
        <div>
            <table>
            <tr>
                <th width="25%">Product Name</th>
                <th width="20%">Quantity</th>
                <th width="25%">Price Details</th>
                <th width="22%">Total Price</th>
                <th width="22%">Remove Item</th>
           
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) 
                    {
                        ?>
                        <tr>
                            <td><?php echo $value["name"]; ?></td>
                            <td><?php echo $value["quantity"]; ?></td>
                            <td>Rs. <?php echo $value["price"]; ?></td>
                            <td>
                                Rs. <?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
                            <td><a href="Elibrary.php?action=delete&id=<?php echo $value["id"]; ?>"><span>Remove Item</span></a></td>


                        </tr>
                        <?php
                        $total = $total + ($value["quantity"] * $value["price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="1" align="right">Total</td>
                            <th align="right" width="15%">Rs. <?php echo number_format($total, 2); ?></th> 
                            <td></td>
                        </tr>
                        <?php
                    } 
                ?>
            </table>
              <br>
              <center>
              <a href="Elibrary.php" class="buttons">Add Books</a></th>
              <a href="Buy_Courses.php" class="buttons">Add Courses</a></th>
              </center>
        </div>

</body>
</html>