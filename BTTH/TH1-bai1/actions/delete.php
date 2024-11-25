<?php
// Bao gồm file flowers.php để lấy dữ liệu hoa
include "../data/flowers.php";

// Kiểm tra xem chỉ số (index) của loài hoa có được truyền vào URL không
if (isset($_GET['index']) && is_numeric($_GET['index'])) {
  $index = $_GET['index'];

  // Kiểm tra nếu chỉ số hợp lệ (nằm trong phạm vi mảng)
  if (isset($flowers[$index])) {
    // Lấy thông tin của hoa cần xóa
    $deletedFlower = $flowers[$index];

    // Xóa hoa khỏi mảng
    unset($flowers[$index]);

    // Re-index lại mảng sau khi xóa
    $flowers = array_values($flowers);

    // Cập nhật lại dữ liệu vào file flowers.php
    file_put_contents('../data/flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n");

    // Chuyển hướng người dùng về trang admin sau khi xóa thành công
    header('Location: ../../TH1-bai1/admin.php');
    exit();
  } else {
    // Nếu chỉ số không hợp lệ, thông báo lỗi
    echo "Loài hoa không tồn tại.";
  }
} else {
  // Nếu không có index trong URL, thông báo lỗi
  echo "Chỉ số hoa không hợp lệ.";
}
