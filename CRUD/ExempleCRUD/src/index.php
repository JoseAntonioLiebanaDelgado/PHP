<?php

session_start();
require_once 'classes/User.php';
use Src\Classes\User;
$success = User::createTable();
$users = [];
if (!$success) {
    $_SESSION['message'] = "Error creating table";
} else {
    $users = User::getAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Example</title>
</head>
<body>
  <h1>Example</h1>
  <h2>Show Users</h2>

  <p>
    <?php
    if (!empty($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
  </p>

  <a href="./views/create.php">Create</a>

  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?php echo $user->getId() ?></td>
          <td><?php echo $user->getName() ?></td>
          <td><a href="views/update.php?id=<?php echo $user->getId(); ?>">Update</a></td>
          <td><a href="views/delete.php?id=<?php echo $user->getId(); ?>&name=<?php echo $user->getName(); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>