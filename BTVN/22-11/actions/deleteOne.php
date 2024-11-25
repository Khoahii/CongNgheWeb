<?php

session_start();

// Đọc dữ liệu từ yêu cầu (body) bằng file_get_contents thì dữ liệu nhận là string thô
$data = file_get_contents("php://input");

// Giải mã JSON
$decodedData = json_decode($data, true); // true để nhận kết quả là mảng

// Thay đổi từ $decodedData->id thành $decodedData['id']
$id = $decodedData['id'];

if($id){
  foreach ($_SESSION['users'] as $key => $user) {
    if ($user['id'] == $id) {
      unset($_SESSION['users'][$key]);  // Xóa phần tử trong mảng
      break;
    }
  }
} else{
  //-
}
// Trả về kết quả dưới dạng JSON been phia php van can header khi gui ve
header('Content-Type: application/json');
echo json_encode(["status" => 200, "message" => "Delete successfully"]);

//- gửi data về có thể dùng echo json_encode cx được nhưng phải có header khi fetchApi

