<?php
class BaseModel
{
  private $dbname = 'ProductDB';
  private $username = 'root';
  private $password = '123456';
  private $host = 'localhost';

  protected $conn = null;

  public function __construct()
  {
    try {
      // Kết nối cơ sở dữ liệu với PDO
      $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";

      // Tạo đối tượng kết nối và gán vào thuộc tính $conn
      $this->conn = new PDO($dsn, $this->username, $this->password);

      // Thiết lập chế độ lỗi để phát hiện lỗi
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Dữ liệu truy vấn mặc định trả về dạng mảng kết hợp
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      // In ra thông báo nếu kết nối thành công
      // echo "Kết nối thành công\n";
    } catch (PDOException $e) {
      // Xử lý lỗi khi không kết nối được
      die("Kết nối thất bại: " . $e->getMessage());
    }
  }

  // Phương thức đóng kết nối cơ sở dữ liệu
  public function closeConnection()
  {
    $this->conn = null;
  }
}
