<?php
include "../../TH1-bai1/data/flowers.php";
// Nhận ID gửi lên
$id = $_GET['index'];
// Lấy ra thông tin của hoa có ID đó
$info = $flowers[$id];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../TH1-bai1/css/style.css">
  <title>Document</title>
</head>

<body>
  <form action="../../TH1-bai1/actions/update.php" method="POST" enctype="multipart/form-data">
    <h2>Sửa Hoa</h2>
    <input name="id" value="<?php echo ($id); ?>" class="hidden" />
    <input type="text" name="name" placeholder="Tên hoa" value="<?php echo ($info['name']); ?>" required>
    <textarea name="description" placeholder="Mô tả" required><?php echo ($info['description']); ?></textarea>

    <!-- Hiển thị ảnh hiện tại -->
    <?php if (!empty($info['image'])): ?>
      <p>Ảnh hiện tại:</p>
      <img src="../../TH1-bai1/<?php echo htmlspecialchars($info['image']); ?>" alt="Ảnh của hoa" style="max-width: 200px;">
    <?php endif; ?>

    <!-- Trường tải lên file -->
    <input type="file" name="image">
    <button type="submit">Sửa hoa</button>
  </form>
</body>

</html>