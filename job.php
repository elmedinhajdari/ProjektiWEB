<?php include('server.php');
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
  <title>Job Application</title>
</head>


<body style="background-image: url('test.jpg');">


<?php include('include/header.php')  ?>
 



<div class="jobap py-5">
    <div class=" login showcase-form card ">
      <form action="" method="POST">
      <center>
    <h1>Job applcation</h1>
   </center>

   <div class="form-controls">
        <label> Name: </label>
        <input type="text" name="name" placeholder="Enter your name" />
   </div>
   <div class="form-controls">
        <label> Surename: </label>
        <input type="text" name="surename" placeholder="Enter your surename" />
   </div>
   <div class="form-controls">
        <label> Email: </label>
        <input type="email" name="email" placeholder="Enter your Email" />
        </div>
        <div class="form-controls">
        <label> Phone: </label>
        <input type="text" name="phone" placeholder="Enter your phone number" />
        </div>
        <div class="form-controls">
        <label> City: </label>
        <input type="text" name="city" placeholder="Enter your city" />
        </div>


        <input type="submit" name="insert" class="btn btn-primary" value="Apply!" />

      </form>
      </div>
    </div>



  <?php include('include/footer.php')  ?>
</body>

</html>