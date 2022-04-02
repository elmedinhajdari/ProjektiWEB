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
                <h2>Produktet </h2>
                <?php include('./include/adminnav.php')  ?>
            </center>
            <table class="m-2 customers">
                <thead>
                    <th>Product ID</th>
                    <th>Paketa</th>
                    <th>Qmimi</th>
                    <th>Oferta 1</th>
                    <th>Oferta 2</th>
                    <th>Oferta 3</th>
                    <th>Oferta 4</th>
                    <th>Oferta 5</th>
                    <th>action</th>

                </thead>
                <tbody>
                    <?php $reg_products = mysqli_query($db, "SELECT * FROM `produktet`") or die('query failed');
                    if (mysqli_num_rows($reg_products) > 0) {
                        while ($fetch_products = mysqli_fetch_assoc($reg_products)) { ?>
                            <tr>
                                <td><?php echo $fetch_products['id']; ?></td>
                                <td><?php echo $fetch_products['oferta']; ?></td>
                                <td><?php echo $fetch_products['qmimi']; ?></td>
                                <td><?php echo $fetch_products['kanalet']; ?></td>
                                <td><?php echo $fetch_products['reseiver']; ?></td>
                                <td><?php echo $fetch_products['download']; ?></td>
                                <td><?php echo $fetch_products['upload']; ?></td>
                                <td><?php echo $fetch_products['support']; ?></td>
                                <td>
                                    <form method="post" action="adminpanelproducts.php">
                                        <input type="hidden" name="productid" value="<?php echo $fetch_products['id']; ?>">
                                        <input type="hidden" name="oferta" value="<?php echo $fetch_products['oferta']; ?>">
                                        <input type="hidden" name="qmimi" value="<?php echo $fetch_products['qmimi']; ?>">
                                        <input type="hidden" name="kanalet" value="<?php echo $fetch_products['kanalet']; ?>">
                                        <input type="hidden" name="reseiver" value="<?php echo $fetch_products['reseiver']; ?>">
                                        <input type="hidden" name="download" value="<?php echo $fetch_products['download']; ?>">
                                        <input type="hidden" name="upload" value="<?php echo $fetch_products['upload']; ?>">
                                        <input type="hidden" name="support" value="<?php echo $fetch_products['support']; ?>">
                                        <input type="submit" class="btn btn-danger" value="Edit" name="edit_product" class="text-light">
                                    </form>
                                </td>

                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (isset($_POST['edit_product'])) { ?>
        <div class="jobap">
            <div class="card panel m-1 text-center">
                <center class="my-1">
                    <h2>Edit Product </h2>
                </center>

                <div>
                    <table class="m-2 customers">
                        <thead>
                            <th>Product ID</th>
                            <th>Paketa</th>
                            <th>Qmimi</th>
                            <th>Oferta 1</th>
                            <th>Oferta 2</th>
                            <th>Oferta 3</th>
                            <th>Oferta 4</th>
                            <th>Oferta 5</th>
                            <th>action</th>

                        </thead>
                        <tbody>
                            <tr>
                                <form action="" method="post">
                                    <td><input type="hidden" name="productid" value="<?php echo $_POST['productid']; ?>"><?php echo $_POST['productid']; ?></td>
                                    <td><input type="text" name="oferta" value="<?php echo $_POST['oferta']; ?>"></td>
                                    <td><input type="text" name="qmimi" value="<?php echo $_POST['qmimi']; ?>"></td>

                                    <td><input type="text" name="kanalet" value="<?php echo $_POST['kanalet']; ?>"></td>
                                    </td>
                                    <td><input type="text" name="reseiver" value="<?php echo $_POST['reseiver']; ?>"></td>
                                    <td><input type="text" name="download" value="<?php echo $_POST['download']; ?>"></td>
                                    <td><input type="text" name="upload" value="<?php echo $_POST['upload']; ?>"></td>
                                    <td><input type="text" name="support" value="<?php echo $_POST['support']; ?>"></td>
                                    <td><input type="submit" class="btn-save" name="update_product" value="Save "></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>


    <div class="py-5"></div>

    <?php include('include/footer.php')  ?>

    <script src="js/script.js"></script>
</body>

</html>