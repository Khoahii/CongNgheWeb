<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini Todo</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

  <?php
    $config = include("../22-11/config/config.php");
  ?>

  <?php
  // Include phần đầu của trang
  include 'components/Header/index.php';

  // Dữ liệu cho bảng

  session_start(); // Khởi tạo session
  if (isset($_SESSION['users'])) {
    $data = $_SESSION['users']; // Lấy giá trị từ session
  } else {
    $data = [];
  }

  // Include phần thân của trang
  include 'components/Body/index.php';

  // Include phần footer của trang
  include 'components/Footer/index.php';
  ?>
  <script src="js/script.js"></script>
</body>

</html>