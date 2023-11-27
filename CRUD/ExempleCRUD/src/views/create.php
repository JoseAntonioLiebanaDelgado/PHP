<?php

session_start();
require_once '../controllers/create.php';

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
  <h2>Create User</h2>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div>
      <label for="name">Name:</label>
      <input type="text" name="name" value="<?php echo $name; ?>">
      <span>* <?php echo $nameError; ?></span>
    </div>
    <div>
      <button type="submit">Create</button>
    </div>
  </form>
</body>
</html>