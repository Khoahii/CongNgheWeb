<?php
  $config = include("../../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Todo List Form</title>
</head>

<body>
  <h1>Thêm người dùng</h1>
  <form method="POST" action="<?= $config['actions_add']; ?>">
    <label for="name">Họ và tên:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="address">Địa chỉ:</label>
    <input type="text" name="address" id="address" required><br><br>

    <label for="sex">Giới tính:</label>
    <select name="sex" id="sex" required>
      <option value="Nam">Nam</option>
      <option value="Nữ">Nữ</option>
    </select><br><br>

    <button type="submit">Thêm vào danh sách</button>
  </form>

</body>

</html>