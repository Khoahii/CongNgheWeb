<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hiển Thị Tệp CSV</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Danh sách tài khoản</h1>
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>City</th>
        <th>Email</th>
        <th>Course</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Đường dẫn tới file CSV
      $file = 'upload/KTPM2.csv';

      // Kiểm tra file có tồn tại
      if (file_exists($file)) {
        // Mở file
        $handle = fopen($file, 'r');

        // Bỏ qua dòng tiêu đề đầu tiên
        $header = fgetcsv($handle);

        // Đọc từng dòng và hiển thị
        while (($row = fgetcsv($handle)) !== false) {
          echo '<tr>';
          foreach ($row as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
          }
          echo '</tr>';
        }

        // Đóng file
        fclose($handle);
      } else {
        echo '<tr><td colspan="7">Không tìm thấy file CSV.</td></tr>';
      }
      ?>
    </tbody>
  </table>
</body>

</html>