<?php include('server.php');
include('include/logout.php');
 include('errors.php');
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
    <?php include('include/header.php')  ?>



    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>



        <!-- Showcase -->
        <section class="showcase">
            <div class="container grid">
                <div class="showcase-text">
                    <h1>Quality internet and hosting</h1>
                    <p>We have the best technology and services on internet<br> hosting and ddos protection.</p>
                    <a href="features.php" class="btn btn-outline">Read more</a>
                </div>


                <div class="showcase-form card">


                    <form method="post" action="index.php">
                       
<<<<<<< HEAD

                        <?php if($_SESSION['usertype'] == 'user')
=======
                        <?php if( isset($_SESSION['user']))
>>>>>>> parent of bc9ef64 (User panel/Admin panel INDEX.PHP added)
                        {
                        ?>

                        <h2>User panel</h2>


<<<<<<< HEAD
                        
                        <?php }


                        else if($_SESSION['usertype'] == 'admin'){?>
                            <h2>Admin panel</h2>
                            
=======
            
>>>>>>> parent of bc9ef64 (User panel/Admin panel INDEX.PHP added)

                        <?php }
                        
                        
                        else{ ?> 
                        <div class="form-control">
                        <h2>Register</h2><br>  

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
                            <h3 ><?php $count = mysqli_query($db, "SELECT * FROM users");
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
                            <p class="text-secondary ">Projects</p>
                        </div>
                        
                    </div>
                </div>
            </section>

            <!--CLI-->
            <section class="cli">
                <div class="container grid text-center">

                    <div class="card hover1">
                        <h3>TV Pack</h3>
                        <h1 class="test1">8€/Month</h1>
                        <ul>
                            <li>300 TV Channels</li>
                            <li class="underline"></li>
                            <li>4K Resiver</li>
                            <li class="underline"></li>
                            <li>Best Channels</li>
                            <li class="underline"></li>
                            <li>Sportive Channels</li>
                            <li class="underline"></li>
                            <li>Professional Support</li>
                        </ul>
                        <a href="javascript:void(0);">
                            <h1 class="order">Order now</h1>
                        </a>
                    </div>
                    <div class="card hover1">
                        <h3>TV+Internet Pack</h3>
                        <h1 class="test1">14€/Month</h1>
                        <ul>
                            <li>300 TV Channels</li>
                            <li class="underline"></li>
                            <li>4K Resiver</li>
                            <li class="underline"></li>
                            <li>100 Mbp/s DW</li>
                            <li class="underline"></li>
                            <li>40 Mbp/s DW</li>
                            <li class="underline"></li>
                            <li>Best Channels</li>
                            <li class="underline"></li>
                            <li>Sportive Channels</li>
                            <li class="underline"></li>
                            <li>Professional Support</li>
                        </ul>
                        <a href="javascript:void(0);">
                            <h1 class="order">Order now</h1>
                        </a>
                    </div>
                    
                    <div class="card hover1">
                        <h3>Cyber Power Pack</h3>
                        <h1 class="test1">22€/Month</h1>
                        <ul>


                            <li>TV Pack</li>
                            <li class="underline"></li>
                            <li>4K Resiver</li>
                            <li class="underline"></li>
                            <li>500 Mbp/s DW</li>
                            <li class="underline"></li>
                            <li>100 Mbp/s UP</li>
                            <li class="underline"></li>
                            <li>Low Latency</li>
                            <li class="underline"></li>
                            <li>Netflix</li>
                            <li class="underline"></li>
                            <li>Professional Support</li>
                        </ul>
                        <a href="javascript:void(0);">
                            <h1 class="order">Order now</h1>
                        </a>
                    </div>
                    <div class="card hover1">
                        <h3>Mega Power Pack</h3>
                        <h1 class="test1">30€/Month</h1>
                        <ul>
                            <li>TV Pack</li>
                            <li class="underline"></li>
                            <li>1 Gbp/s DW</li>
                            <li class="underline"></li>
                            <li>250 Mbp/s UP</li>
                            <li class="underline"></li>
                            <li>Low Latency</li>
                            <li class="underline"></li>
                            <li>Free Netflix+Hulu</li>
                            <li class="underline"></li>
                            <li>Professional Support</li>
                        </ul>
                        <a href="javascript:void(0);">
                            <h1 class="order">Order now</h1>
                        </a>
                    </div>
                </div>
        </div>
        </section>


        <!--Cloud-->

        <section class="cloud bg-primary mx-5">
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