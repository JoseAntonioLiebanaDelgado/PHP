<?php

session_start();
if ((!empty($_GET['id']) and !empty($_GET['name'])) or !empty($_SESSION['id'])) {
    if (empty($_SESSION['id'])) {
        $_SESSION['id'] = $_GET['id'];
    }
    require_once '../controllers/delete.php';
} else {
    header('Location: ../index.php');
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
  <h2>Delete User</h2>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <p>Are you sure you want to delete the user <?php echo $_GET['name']; ?></p>
    <div>
      <button type="submit">Delete</button>
    </div>
  </form>
</body>
</html>