<?php
$config = include("../../config/config.php");

session_start();

// Xử lý khi dữ liệu được gửi từ Fetch API
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = file_get_contents("php://input");
  $user = json_decode($data, true);

  // Kiểm tra dữ liệu hợp lệ
  if ($user && isset($user['name'], $user['address'], $user['sex'])) {
    $_SESSION['user'] = $user; // Lưu dữ liệu vào session tránh th load lại trang sẽ mất data gửi lên
    echo json_encode(['status' => 200, 'message' => 'Dữ liệu đã được lưu vào session.']);
    exit;
  }

  echo json_encode(['status' => 400, 'message' => 'Dữ liệu không hợp lệ.']);
  exit;
}

// Lấy dữ liệu từ session để hiển thị trên form
$user = $_SESSION['user'] ?? null;

// Kiểm tra xem có dữ liệu người dùng hay không
if (!$user) {
  echo "Không tìm thấy thông tin người dùng.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Chỉnh sửa người dùng</title>
</head>

<body>
  <h1>Chỉnh sửa người dùng</h1>
  <form method="POST" action="<?= $config['actions_update']; ?>">
    <input class="hidden" type="text" name='id' value="<?= htmlspecialchars($user['id']); ?>" />

    <label for="name">Họ và tên:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']); ?>" required><br><br>

    <label for="address">Địa chỉ:</label>
    <input type="text" name="address" id="address" value="<?= htmlspecialchars($user['address']); ?>" required><br><br>

    <label for="sex">Giới tính:</label>
    <select name="sex" id="sex" required>
      <option value="Nam" <?= $user['sex'] === 'Nam' ? 'selected' : ''; ?>>Nam</option>
      <option value="Nữ" <?= $user['sex'] === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
    </select><br><br>

    <button type="submit">Chỉnh sửa</button>
    <a href="/22-11/index.php">Hủy</a>
  </form>
</body>

</html>