<?php
require_once __DIR__ . "/BaseModel.php";

class ProductModel extends BaseModel
{
  //-constructor
  public function __construct()
  {
    parent::__construct();
  }

  //-get all products
  public function getAllProducts()
  {
    $sql = "select * from product";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  //-get data by id
  public function getProductById($id)
  {
    $sql = "select * from product where id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetch();
  }

  //-add product
  public function addProduct($data)
  {
    //- tao cau lenh
    $sql = "INSERT INTO product (name, description, price, stock, category) VALUES 
            (:name, :description, :price, :stock, :category)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":name", $data->name);
    $stmt->bindParam(":description", $data->description);
    $stmt->bindParam(":price", $data->price);
    $stmt->bindParam(":stock", $data->stock);
    $stmt->bindParam(":category", $data->category);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
      return true; // Thêm thành công
    } else {
      return false; // Thêm thất bại
    }
  }

  //-update product
  public function updateProduct($data)
  {
    //- tao cau lenh
    $sql = "update product set
            name = :name, 
            description = :description, 
            price = :price, 
            stock = :stock, 
            category = :category
            where id = :id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":name", $data->name);
    $stmt->bindParam(":description", $data->description);
    $stmt->bindParam(":price", $data->price);
    $stmt->bindParam(":stock", $data->stock);
    $stmt->bindParam(":category", $data->category);
    $stmt->bindParam(':id', $data->id, PDO::PARAM_INT); // Cập nhật bằng id từ đối tượng $data

    // Thực thi câu lệnh
    if ($stmt->execute()) {
      return true; // Thêm thành công
    } else {
      return false; // Thêm thất bại
    }
  }

  //-xoa
  public function deleteProduct($id)
  {
    try {
      $sql = "DELETE FROM product WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      if ($stmt->execute()) {
        return true; // Xóa thành công
      } else {
        return false; // Xóa thất bại
      }
    } catch (PDOException $e) {
      // Log lỗi hoặc hiển thị thông báo
      echo "Lỗi: " . $e->getMessage();
      return false;
    }
  }
}
