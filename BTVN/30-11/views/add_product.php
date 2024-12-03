<?php
$urlRoot = "/BTVN/30-11";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm</title>
  <style>
    /* Tổng quan */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      color: #333;
    }

    /* Header */
    h1 {
      text-align: center;
      color: #007bff;
      margin-top: 20px;
    }

    /* Form container */
    form {
      max-width: 600px;
      margin: 30px auto;
      background: #fff;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Labels */
    label {
      font-size: 16px;
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    /* Inputs */
    input,
    textarea,
    button {
      font-size: 14px;
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    input:focus,
    textarea:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    textarea {
      resize: none;
      height: 100px;
    }

    /* Button */
    button {
      background-color: #28a745;
      color: white;
      border: none;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #218838;
    }

    /* Responsive */
    @media (max-width: 600px) {
      form {
        padding: 15px 20px;
      }

      input,
      textarea,
      button {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>
  <h1>Thêm sản phẩm mới</h1>
  <form method="POST" action="<?php echo $urlRoot?>/products/add">
    <label for="name">Tên sản phẩm:</label>
    <input type="text" id="name" name="name" required>

    <label for="description">Mô tả:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="price">Giá:</label>
    <input type="number" id="price" name="price" required>

    <label for="stock">Số lượng:</label>
    <input type="number" id="stock" name="stock" required>

    <label for="category">Danh mục:</label>
    <input type="text" id="category" name="category" required>

    <button type="submit">Thêm sản phẩm</button>
  </form>
</body>

</html>