<?php
require_once __DIR__ . "/../models/product.model.php";

class ProductController
{
  private $product;

  //- constructor: khi dc goi thi no se connect db
  public function __construct()
  {
    $this->product = new ProductModel();
  }

  //-lay tat ca bai bao
  public function getAllProducts()
  {
    try {
      //-lay data bang cach goi phuong thuc ben model
      $listProducts = $this->product->getAllProducts();

      //-neu rong
      if (empty($listProducts)) {
        $listProducts = [];
      }

      //-dong connect db
      $this->product->closeConnection();
    } catch (Exception $e) {
      die("Kết nối thất bại: " . $e->getMessage());
    }

    //-truyen du lieu qua view
    require __DIR__ . "/../views/index.php";
  }

  //-get product by id
  public function getProductById($id){
    if(!is_numeric($id) || $id<=0){
      echo "ID khong hop le";
      return;
    }

    try {
      //-goi ben model
      $product = $this->product->getProductById($id);

      if(empty($product)){
        $product = [];
      }

      //-dong ket noi
      $this->product->closeConnection();

    } catch (Exception $e) {
      die("Lấy dữ liệu thất bại: " . $e->getMessage());
    }

    return $product;
  }

  //-them
  public function addProduct(){
    if($_SERVER['REQUEST_METHOD'] === "POST"){
      //-lay du lieu tu form
      $name = $_POST["name"];
      $description = $_POST["description"];
      $price = $_POST["price"];
      $stock = $_POST["stock"];
      $category  = $_POST["category"];

      //- tao doi tuong luu du lieu
      $data = new stdClass();
      $data->name = $name;
      $data->description = $description;
      $data->price = $price;
      $data->stock = $stock;
      $data->category = $category;

      //-truyen data sang model
      if($this->product->addProduct($data)){
        header("Location: /BTVN/30-11/index.php");
        exit;
      } else {
        // Nếu không xóa được, thông báo lỗi
        echo "Thêm sản phẩm thất bại.";
      }
    }
  }

  //-sua
  public function updateProduct($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      //-lay du lieu tu form
      $name = $_POST["name"];
      $description = $_POST["description"];
      $price = $_POST["price"];
      $stock = $_POST["stock"];
      $category  = $_POST["category"];

      //- tao doi tuong luu du lieu
      $data = new stdClass();
      $data->id = $id;
      $data->name = $name;
      $data->description = $description;
      $data->price = $price;
      $data->stock = $stock;
      $data->category = $category;

      //-truyen data sang model
      if ($this->product->updateProduct($data)) {
        header("Location: /BTVN/30-11/index.php");
        exit;
      } else {
        // Nếu không xóa được, thông báo lỗi
        echo "Sửa sản phẩm thất bại.";
      }
    }
  }

  //-xoa
  public function deleteProduct($id)
  {

    //-check id
    if (!is_numeric($id) || $id <= 0) {
      echo "ID không hợp lệ.";
      return;
    }
    try {
      //-goi tuy van ben model
      if ($this->product->deleteProduct($id)) {
        //-redirect ve trang chinh
        header("Location: /BTVN/30-11/index.php");
        exit;
      } else {
        // Nếu không xóa được, thông báo lỗi
        echo "Xóa bài báo thất bại.";
      }

      //-dong truy van
      $this->product->closeConnection();
    } catch (Exception $e) {
      echo "Có lỗi xảy ra: " . $e->getMessage();
    }
  }
}
