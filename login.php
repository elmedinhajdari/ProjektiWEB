<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utilities.css">
    <title>BuzzHosting | Internet Hosting</title>
</head>

<body>

<?php include('include/header.php')  ?>

    <!-- Showcase -->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">
                <h1>Login</h1>
                <p>Attention, do not try to bruteforce because you are gonna get banned by IP</p>
            </div>
        </div>
    </section>

    
<div class="login py-5">
    <div class="showcase-form card">
        <h2>Login</h2>
        <form onsubmit="return login(this)">
            <div class="form-control">
                <input id="e" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-control">
                <input id="p" type="password" name="password" placeholder="Password" required>
            </div>
            <input  type="submit" value="Login" class="btn btn-primary">
        </form>
    </div>
</div>


<?php include('include/footer.php')  ?>


    <script src="js/script.js"></script>
</body>
</html>