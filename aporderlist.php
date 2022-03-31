<?php

include('./include/server.php');
if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] == 'user') {
    header('location: index.php');
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
    <title>Admin Panel</title>
</head>

<body style="background-image: url('./images/apanel.png');">
    <?php include('./include/header.php')  ?>



    <div class="jobap py-5 my-5">


        <div class="card panel m-1 text-center ">
            <center class="my-1">
                <h2>All Orders </h2>
            </center>
            <table class="m-2 customers">
                <thead>
                    <th>id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Surename</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Product</th>
                    <th colspan="2">action</th>

                </thead>
                <tbody>
                    <?php $reg_cv = mysqli_query($db, "SELECT * FROM `orderlist`") or die('query failed');
                    if (mysqli_num_rows($reg_cv) > 0) {
                        while ($fetch_cv = mysqli_fetch_assoc($reg_cv)) { ?>
                            <tr>
                                <td><?php echo $fetch_cv['id']; ?></td>
                                <td><?php echo $fetch_cv['username2']; ?></td>
                                <td><?php echo $fetch_cv['name2']; ?></td>
                                <td><?php echo $fetch_cv['surename2']; ?></td>
                                <td><?php echo $fetch_cv['email2']; ?></td>
                                <td><?php echo $fetch_cv['phone2']; ?></td>
                                <td><?php echo $fetch_cv['city2']; ?></td>
                                <td><?php echo $fetch_cv['address2']; ?></td>
                                <td><?php echo $fetch_cv['product2']; ?></td>



                                <td><a href="aporderlist.php?removeorder=<?php echo $fetch_cv['id']; ?>" class="btn-delete" onclick="return confirm('remove order?');">Delete</a></td>

                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
  

    <div class="py-5"></div>

    <?php include('include/footer.php')  ?>

    <script src="js/script.js"></script>
</body>

</html>