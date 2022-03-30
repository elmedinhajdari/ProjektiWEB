<?php include('./include/server.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="./css/style1.css">
  <title>Download files</title>
</head>
<body>

<table>
<thead>
    <th>ID</th>
    <th>Filename</th>
    <th>size (in mb)</th>
    <th>Downloads</th>
    <th>Action</th>
</thead>
<tbody>
<?php $reg_files = mysqli_query($db, "SELECT * FROM `files`") or die('query failed');
                    if (mysqli_num_rows($reg_files) > 0) {
                        while ($fetch_files = mysqli_fetch_assoc($reg_files)) { ?>
    <tr>
      <td><?php echo $fetch_files['id']; ?></td>
      <td><?php echo $fetch_files['name']; ?></td>
      <td><?php echo floor($fetch_files['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $fetch_files['downloads']; ?></td>
      <td><a href="downloads.php?file_id=<?php echo $fetch_files['id'] ?>">Download</a></td>
    </tr>
  <?php }}?>

</tbody>
</table>

</body>
</html>