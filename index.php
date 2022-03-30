<?php include('./include/server.php');
include('./include/logout.php');
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
    <title>BuzzHosting | Internet Hosting</title>
</head>

<body>
    <?php include('./include/header.php')  ?>







    <!-- Showcase -->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">
                <h1>Quality internet and hosting</h1>
                <p>We have the best technology and services on internet<br> hosting and ddos protection.</p>
                <a href="features.php" class="btn btn-outline">Read more</a>
            </div>


            <div class="showcase-form card">

                <?php include('./include/errors.php'); ?>
                <form method="post" action="index.php">



                    <?php if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'user') {

                    ?>

                        <h2>User panel</h2>

                        <div class="form-controls">
                            <p>Welcome, <strong><?php echo $username = $_SESSION['username']; ?></strong></p>
                            <a>We are currently looking for people to work with us!</a>

                        </div>
                        <div class="blockers2">
                            <a href="job.php" class="btn btn-primary">Apply for a job!</a>
                            <a href="job.php" class="btn btn-primary">Order list!</a>
                        </div>

                    <?php  } else if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin') { ?>





                        <h2>Admin panel</h2>
                        <p>Welcome, <strong><?php echo $username = $_SESSION['username']; ?></strong></p>

                        <div class="blockers">
                            <a href="adminpanel.php" class="btn text-light ">User list</a>
                            <a href="adminpanelproducts.php" class="btn text-light ">Product List</a>
                            <a href="apcvlist.php" class="btn text-light ">CV list</a>
                            <a href="adminpanel.php" class="btn text-light ">Order list</a>
                        </div>




                    <?php } else if (!(isset($_SESSION['usertype']))) { ?>
                        <h2>Register</h2>
                        <div class="form-control">
                            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                        </div>
                        <div class="form-control">
                            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email">
                        </div>
                        <div class="form-control">
                            <input type="password" name="password_1" placeholder="Password">
                        </div>
                        <div class="form-control">
                            <input type="password" name="password_2" placeholder="Confirm Password">
                        </div>
                        <input type="submit" name="register" value="Register" class="btn btn-primary">
                    <?php } ?>
                </form>
            </div>
        </div>
    </section>



    <div style="background-image: url('./images/test6.jpg');">
        <!-- Stats -->
        <div class="between">
            <section class="stats">
                <div class="container">
                    <h3 class="stats-heading text-center my-1">
                        This is our most recent work,<br>with modern architecture and
                        scaling
                    </h3>
                    <div class="grid grid-3 text-center my-4">
                        <div>
                            <i class="fas fa-user fa-3x"></i>
                            <h3><?php $count = mysqli_query($db, "SELECT * FROM users");
                                $data = mysqli_num_rows($count);
                                echo $data ?></h3>
                            <p class="text-secondary ">Clients</p>
                        </div>
                        <div>
                            <i class="fas fa-city fa-3x"></i>
                            <h3>92</h3>
                            <p class="text-secondary ">Cities</p>
                        </div>
                        <div>
                            <i class="fas fa-project-diagram fa-3x"></i>
                            <h3>2,349,555</h3>
                            <p class="text-secondary">Projects</p>
                        </div>

                    </div>
                </div>
            </section>



            <!--CLI-->
            <section class="cli">
                <div class="container grid text-center ">
                    <?php $select_product = mysqli_query($db, "SELECT * FROM produktet") or die('query failed'); ?>
                    <?php if (mysqli_num_rows($select_product) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                    ?>
                            <div class="card hover1">

                                <h3><?php echo $fetch_product['oferta']; ?></h3>
                                <h1 class="test1"><?php echo $fetch_product['qmimi']; ?>€/Month</h1>
                                <ul>
                                    <li><?php echo $fetch_product['kanalet']; ?></li>
                                    <li class="underline"></li>
                                    <li><?php echo $fetch_product['reseiver']; ?></li>
                                    <li class="underline"></li>
                                    <li><?php echo $fetch_product['download']; ?></li>
                                    <li class="underline"></li>
                                    <li><?php echo $fetch_product['upload']; ?></li>
                                    <li class="underline"></li>
                                    <li><?php echo $fetch_product['support']; ?></li>
                                </ul>
                                <a href="javascript:void(0);">
                                    <h1 class="order">Order now</h1>
                                </a>
                            </div>
                    <?php }
                    } ?>
                    <div class="py-3"></div>
                </div>
        </div>
        </section>
    </div>


    <!--Cloud-->
    <section class="cloud bg-primary ">
        <div class="container grid">
            <div class="text-center">
                <h2 class="lg">Extreme Hosting Servers</h2>
                <p class="lead my-1"> Hosting servers like you've never seen. Fast efficient scalable</p>
                <a href="features.php" class="btn btn-outline"> Read more</a>
            </div>
            <img src="images/cloud.png" alt="">
        </div>
    </section>



    <?php include('include/footer.php')  ?>
    <script src="js/script.js"></script>
</body>

</html>