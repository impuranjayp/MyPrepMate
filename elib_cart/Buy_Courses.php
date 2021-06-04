<?php
session_start();   
// Database Connectivity
$con = mysqli_connect("localhost","id15304932_myprepmate","Inp_Project_123","id15304932_logindemo");
$db = mysqli_select_db($con,"id15304932_logindemo");

if (isset($_GET["action"])){ // products removed from  cart
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Elibrary.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"content= "width=device-width,user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title>Buy Courses</title>
    <link rel="stylesheet" type="text/css" href="elib-style1.css" />

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
                <li ><a class="nav-link" href="../Videos/Videos.html">Videos</a></li>
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
    <script src="Buy_courses-script.js"></script>

    <div>
        <br><center><h1>Courses</h1></center>
        <br><center><a href="Cart.php" class="buttons">Go to Cart</a></center>

        <?php
            $query = "select * from courses order by id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div>
                        <!--Display of Products as card-->
                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="card">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h2><?php echo $row["name"]; ?></h2>
                                <h3>₹ <?php echo $row["price"]; ?></h3>
                                <input type="number" name="quantity" id="quantity" min="1" value="1"><br>
                                <input type="hidden" name="name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                                <input type="hidden" name="image" value="<?php echo $row["image"]; ?>">
                                <input type="submit" name="AddtoCart" style="margin-top: 5px;margin-bottom: 5px;background-color:#2073d4; color:White; border-radius:8px;padding:5px;" value="Add to Cart">
                            </div>         
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
    </div>

</body>
</html>