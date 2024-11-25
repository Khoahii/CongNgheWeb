<?php
  $config = include('../config/config.php');
  $home = $config['home'];
  session_start();
  //-  xóa tất cả dữ liệu trong session
  session_destroy();
  header('Location: ' . $home);
  exit();
?>