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

    <tr>
      <td><?php echo $fetch_files['id']; ?></td>
      <td><?php echo $fetch_files['name']; ?></td>
      <td><?php echo $fetch_files['downloads']; ?></td>
      <td><a href="apcvlist.php?file_id=<?php echo $fetch_files['id'] ?>">Download</a></td>
    </tr>


</tbody>
</table>

</body>
</html>