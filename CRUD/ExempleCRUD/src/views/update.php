<?php

session_start();
if (!empty($_GET['id']) or !empty($_SESSION['id'])) {
    if (empty($_SESSION['id'])) {
        $_SESSION['id'] = $_GET['id'];
    }
    require_once '../controllers/update.php';
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
  <h2>Update User</h2>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div>
      <label for="name">Name:</label>
      <input type="text" name="name" value="<?php echo $name; ?>">
      <span>* <?php echo $nameError; ?></span>
    </div>
    <div>
      <button type="submit">Update</button>
    </div>
  </form>
</body>
</html>