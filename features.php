<?php include('./include/server.php');
include('./include/logout.php');
include('./include/errors.php');
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


    <!--Head-->
    <section class="features-head bg-primary py-3">
        <div class="container grid">
            <div>
                <h1 class="xl">Hosting Servers</h1>
                <p class="lead">We have the best hosting service in the world.</p>
            </div>
            <img src="images/server.png" alt="">
        </div>
    </section>

    <!-- Sub head -->
    <section class="features-sub-head bg-light py-3">
        <div class="container grid">
            <div>
                <h1 class="md">Buzz Hosting</h1>
                <p>
                    Our servers are the best in the world, top quality and efficient.
                </p>
            </div>
            <img src="images/server2.png" alt="">
        </div>
    </section>

    <!--Bottom-->

    <section class="features-main my-2">
        <div class="container grid grid-3">
            <div class="card flex">
                <i class="fas fa-server fa-3x"></i>
                <p>Our servers are located all around the world: Australia, Germany, France, Luxembourg, Russia, Kosovo, Albania, Serbia, Montenegro, South Africa, China, India.</p>
            </div>
            <div class="card flex">
                <i class="fas fa-network-wired fa-3x"></i>
                <p>
                    You can connect everything to our servers
                </p>
            </div>
            <div class="card flex">
                <i class="fas fa-laptop-code fa-3x"></i>
                <p>
                    Fast, efficient, powerful server connection
                </p>
            </div>
            <div class="card flex">
                <i class="fas fa-database fa-3x"></i>
                <p>
                    Unlimited data
                </p>
            </div>
            <div class="card flex">
                <i class="fas fa-power-off fa-3x"></i>
                <p>
                    24/7 Online full DDos protection
                </p>
            </div>
            <div class="card flex">
                <i class="fas fa-upload fa-3x"></i>
                <p>
                    No bandwidth limit DW/UP speed
                </p>
            </div>
        </div>
    </section>

    <!--Languages-->
    <section class="languages">

        <h2 class="md text-center my-2">
            Supported languages
        </h2>

        <div onclick="plusSlides(1)" class="container flex">

            <div class="card hover2 mySlides">
                <h4>Node.js</h4>
                <img src="images/logos/node.png" alt="">
            </div>
            <div class="card hover2 mySlides">
                <h4>Python</h4>
                <img src="images/logos/python.png" alt="">
            </div>
            <div class="card hover2 mySlides">
                <h4>C#</h4>
                <img src="images/logos/csharp.png" alt="">
            </div>
            <div class="card hover2 mySlides">
                <h4>Ruby</h4>
                <img src="images/logos/ruby.png" alt="">
            </div>
            <div class="card hover2 mySlides">
                <h4>PHP</h4>
                <img src="images/logos/php.png" alt="">
            </div>
            <div class="card hover2 mySlides ">
                <h4>Scala</h4>
                <img src="images/logos/scala.png " alt="">
            </div>
            <div class="card hover2  mySlides ">
                <h4>Clojure</h4>
                <img src="images/logos/clojure.png" alt="">

            </div>

        </div>


    </section>
    <?php include('include/footer.php')  ?>
    <script src="js/script.js"></script>




</body>

</html>