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
    <title>About us</title>
</head>

<body>

    <?php include('include/header.php')  ?>


    <!--Head-->
    <section class="aboutus-head bg-primary py-3">
        <div class="container grid">
            <div>
                <h1 class="xl">About us</h1>
                <p class="lead">This is how we started.</p>
            </div>
            <img src="images/docs.png" alt="">
        </div>
    </section>

    <!--About us-->
    <section class="aboutus-main my-4">
        <div class="container grid">
            <div class="card bg-light p-3">
                <h3 class="my-2">Buzz it!</h3>
                <nav>
                    <ul>
                        <li><a href="#">Introduction</a></li>
                        <li><a href="#">How to use hosting services</a></li>
                        <li><a href="#">How we work</a></li>
                    </ul>
                </nav>

                <h3 class="my-2">Apply for a job</h3>
                <nav>
                    <ul>
                        <li><a href="#">Apply as a software engineer</a></li>
                        <li><a href="#">Apply as a manager</a></li>
                        <li><a href="#">Apply as a data analyst</a></li>
                    </ul>
                </nav>
            </div>
            <div class="card">


                <h2>How we started.</h2>
                <p>Company was started with only 2 people: <strong>Elmedin Hajdari and Albion Berisha</strong></p>

                <div class="alert alert-success">

                </div>


                <p>We started as a small company in Kosovo then we expanded all over the world from year 2009 up to 2021.</p>
                <a href="#" class="btn btn-primary">Apply for Buzz Crypto wallet [Beta]</a>
                <ul>
                    <li>Kosovo</li>
                    <li>2021&copy;</li>
                </ul>

            </div>
        </div>
    </section>


    <?php include('include/footer.php')  ?>

    <script src="js/script.js"></script>

</body>

</html>