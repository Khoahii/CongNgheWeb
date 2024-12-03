<?php
$urlRoot = '/BTVN/30-11';
require_once __DIR__ . "/controllers/product.controller.php";
//- lay ra uri
$requestUri = $_SERVER['REQUEST_URI'];

//-khoi tao product.comtroller
$controller = new ProductController();

if($requestUri === "$urlRoot/index.php"){
  $controller->getAllProducts();
} 
//-delete
elseif (preg_match('/^\/BTVN\/30-11\/products\/delete\?id=(\d+)$/', $requestUri, $matches)) {
  $id = (int)$matches[1]; // Lấy id từ route động
  $controller->deleteProduct($id);
} 

//-add
else if($requestUri === "$urlRoot/products/add"){
  $controller->addProduct();
}

//-edit
elseif (preg_match('/^\/BTVN\/30-11\/products\/update\?id=(\d+)$/', $requestUri, $matches)) {
  $id = (int)$matches[1]; // Lấy id từ route động
  $controller->updateProduct($id);
  // echo "hâh";
} 

else{
  echo "hâh";
}

?>