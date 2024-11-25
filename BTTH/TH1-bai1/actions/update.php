<?php
$imageDir = '../images';
include "../data/flowers.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $index = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];

  // Kiểm tra nếu có ảnh mới được tải lên
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Tạo đường dẫn để lưu ảnh
    $imagePath = $imageDir . '/' . basename($_FILES['image']['name']);
    // Di chuyển ảnh từ thư mục tạm tới thư mục đích
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    // Cập nhật thông tin ảnh mới vào mảng
    $image = 'images/' . basename($_FILES['image']['name']);
  } else {
    // Nếu không có ảnh mới, giữ nguyên ảnh cũ
    $image = $flowers[$index]['image'];
  }

  // Cập nhật thông tin hoa
  $flowers[$index] = [
    "name" => $name,
    "description" => $description,
    "image" => $image,  // Dùng ảnh mới hoặc ảnh cũ
  ];

  // Ghi lại mảng flowers vào file PHP
  file_put_contents('../data/flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n");

  // Điều hướng lại về trang admin
  header('Location: ../../TH1-bai1/admin.php');
  exit();
}
