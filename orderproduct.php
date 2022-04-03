<?php include('./include/server.php');
include('./include/logout.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utilities.css">
    <title>Order product</title>
</head>


<body style="background-image: url('./images/order.jfif');
            background-repeat: no-repeat;
            background-size: cover;">


    <?php include('./include/header.php')  ?>




    <div class="jobap py-5">
        <div class=" login showcase-form card ">
            <form action="orderlist.php" method="POST">
                <center>
                    <h1>Checkout:</h1>
                </center>
                
                <div class="form-controls">
                    <label> Username: </label>
                    <input  onkeydown="return false"  type="text" name="username2" value="<?php echo $_SESSION['username']; ?>" placeholder="<?php echo $_SESSION['username']; ?>" />
                </div>
                <div class="form-controls">
                    <label> Name: </label>
                    <input type="text" required name="name2" placeholder="Enter your name"/>
                </div>
                <div class="form-controls">
                    <label> Surename: </label>
                    <input type="text" required name="surename2" placeholder="Enter your surename" />
                </div>
                <div class="form-controls">
                    <label> Email: </label>
                    <input type="email" required name="email2" placeholder="Enter your email" />
                </div>
                <div class="form-controls">
                    <label> Phone: </label>
                    <input type="text"  required name="phone2" placeholder="Enter your phone number" />
                </div>
                <div class="form-controls">
                    <label> City: </label>
                    <input type="text" required name="city2" placeholder="Enter your city" />
                </div>
                <div class="form-controls">
                    <label> Address: </label>
                    <input type="text" required name="address2" placeholder="Enter your address" />
                </div>

                <div class="form-controls">
                    <label>Product:</label>
                    <select class="jobps" name="product2">
                        <option value="TV+Internet Pack">TV+Internet Pack</option>
                        <option value="Super Pack">Super Pack</option>
                        <option value="Mega Pack">Mega Pack</option>
                        <option value="Cyber Pack">Cyber Pack</option>
                    </select>
                </div>
                <input type="submit" name="ordernow" class="btn btn-primary" value="Order!" />

            </form>
        </div>
    </div>
    <div class="my-5 py-4">

    </div>


    <?php include('include/footer.php')  ?>
    <script src="js/script.js"></script>
</body>

</html>