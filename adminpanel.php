<?php

include('server.php');
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

<body>
    <?php include('include/header.php')  ?>

    <div class="show-users">

        <div class="adminpanel_header">
            <h2>All Users</h2>
        </div>
        <div>
            <table>
                <thead>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>user type</th>
                    <th>action</th>
                </thead>
                <tbody>
                    <?php $reg_users = mysqli_query($db, "SELECT * FROM `users`") or die('query failed');
                    if (mysqli_num_rows($reg_users) > 0) {
                        while ($fetch_users = mysqli_fetch_assoc($reg_users)) { ?>
                            <tr>
                                <td><?php echo $fetch_users['id']; ?></td>
                                <td><?php echo $fetch_users['username']; ?></td>
                                <td><?php echo $fetch_users['email']; ?></td>
                                <td><?php echo $fetch_users['user_role']; ?></td>
                                <td>
                                    <form method="post" action="adminpanel.php">
                                        <input type="hidden" name="user_id" value="<?php echo $fetch_users['id']; ?>">
                                        <input type="hidden" name="user_name" value="<?php echo $fetch_users['username']; ?>">
                                        <input type="hidden" name="user_role" value="<?php echo $fetch_users['user_role']; ?>">
                                        <input type="submit" class="btn btn-danger" value="Edit" name="edit_user" class="text-light">
                                    </form>
                                </td>
                                <td><a href="adminpanel.php?removeuser=<?php echo $fetch_users['id']; ?>" class="delete-btn" onclick="return confirm('remove user from database?');">remove</a></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (isset($_POST['edit_user'])) { ?>
        <div class="show-users">
            <div class="adminpanel_header">
                <h2>Edit User</h2>
            </div>
            <div>
                <table>
                    <thead>
                        <th>id</th>
                        <th>username</th>
                        <th>user type</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <form action="" method="post">
                                <td><input type="hidden" name="user_id" value="<?php echo $_POST['user_id']; ?>"><?php echo $_POST['user_id']; ?></td>
                                <td><input type="text" name="user_name" value="<?php echo $_POST['user_name']; ?>"></td>
                                <td><input type="text" name="user_role" value="<?php echo $_POST['user_role']; ?>"></td>
                                <td><input type="submit" class="updateuser" name="update_user" value="save "></td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>

    <?php include('include/footer.php')  ?>

    <script src="js/script.js"></script>
</body>

</html>