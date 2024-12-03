<?php
$urlRoot = "/BTVN/30-11";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
    }

    header {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    .product-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin: 20px;
    }

    .product-card {
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin: 10px;
      padding: 15px;
      width: 300px;
      text-align: left;
    }

    .product-card h2 {
      font-size: 20px;
      color: #007bff;
      margin-bottom: 10px;
    }

    .product-card p {
      margin: 5px 0;
      font-size: 14px;
    }

    .product-card .product-price {
      font-weight: bold;
      color: #28a745;
    }

    .product-card .product-stock {
      color: #dc3545;
    }

    .product-card .product-category {
      font-style: italic;
      color: #6c757d;
    }

    .addproduct {
      display: flex;
      height: 50px;
      width: 120px;
      border: solid 1px black;
      text-decoration: none;
      margin: 10px 20px;
      justify-content: center;
      align-items: center;
      background: orange;
      border-radius: 20px;
    }
  </style>
</head>

<body>
  <header>
    <h1>Product List</h1>
  </header>
  <main>
    <a href="/BTVN/30-11/views/add_product.php" class="addproduct">Thêm sản phẩm</a>
    <div class="product-container">
      <!-- Mỗi sản phẩm sẽ là một thẻ div -->
      <?php foreach ($listProducts as $product): ?>
        <div class="product-card">
          <h2 class="product-name"><?php echo htmlspecialchars($product["name"]) ?></h2>
          <p class="product-description"><?php echo htmlspecialchars($product["description"]) ?></p>
          <p class="product-price"><?php echo htmlspecialchars($product["price"]) ?></p>
          <p class="product-stock"><?php echo htmlspecialchars($product["stock"]) ?></p>
          <p class="product-category"><?php echo htmlspecialchars($product["category"]) ?></p>
          <a href="/BTVN/30-11/views/update_product.php?id=<?php echo ($product["id"]); ?>" style="margin-right: 10px;">Chỉnh sửa</a>
          <a href="<?php echo $urlRoot; ?>/products/delete?id=<?php echo ($product["id"]); ?>">Xóa</a>
        </div>
      <?php endforeach; ?>


      <!-- Các sản phẩm khác sẽ được thêm tương tự -->
    </div>
  </main>
</body>

</html>