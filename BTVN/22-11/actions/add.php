<?php
  $config = include('../config/config.php');
  $home = $config['home'];
  session_start();

  // Kiểm tra nếu chưa có session 'users' thì khởi tạo nó như mảng rỗng
  if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
  }

  // Lấy dữ liệu từ form
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tạo id tự động tăng, lấy id lớn nhất hiện tại trong session + 1
    $id = count($_SESSION['users']) > 0 ? max(array_column($_SESSION['users'], 'id')) + 1 : 1;

    // Lấy thông tin từ form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];

    // Tạo một mảng người dùng
    $user = [
      'id' => $id,
      'name' => $name,
      'address' => $address,
      'sex' => $sex
    ];

    // Thêm người dùng vào session thêm vào cuối mảng
    $_SESSION['users'][] = $user;

    // print_r($_SESSION['users']);

  // Điều hướng đến trang xem danh sách
    header('Location: ' . $home); 
    exit();

  //-  xóa tất cả dữ liệu trong session
  // session_destroy();
  }
?>

