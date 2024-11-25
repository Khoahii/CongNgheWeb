<?php
$imageDir = '../images';
include "../data/flowers.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $description = $_POST['description'];
  // //-tạo đường dẫn để lưu ảnh
  $imagePath = $imageDir . '/' . basename($_FILES['image']['name']);
  //-tmp_name: Là đường dẫn tạm thời của tệp tin trên server sau khi người dùng tải lên
  move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

  $flowers[] = [
    "name" => $name,
    "description" => $description,
    "image" => 'images/' . basename($_FILES['image']['name']),
  ];

  //-Hàm file_put_contents() dùng để ghi dữ liệu vào một file: 
  //- cú pháp: file_put_contents(string $filename, string $data);
  file_put_contents('../data/flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n");
  //-var_export() được sử dụng để xuất một giá trị của mảng flowers
  header('Location: ../../TH1-bai1/admin.php');
  exit();
}
