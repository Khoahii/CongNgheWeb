<?php
include "../TH1-bai1/components/header.php";
include 'data/flowers.php';
?>
<table>
  <thead>
    <tr>
      <th>Tên Hoa</th>
      <th>Mô Tả</th>
      <th>Hình Ảnh</th>
      <th>Hành Động</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($flowers as $index => $flower): ?>
      <tr>
        <td><?= $flower['name'] ?></td>
        <td><?= $flower['description'] ?></td>
        <td><img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" width="100"></td>
        <td>
          <a href="../TH1-bai1/components/form_update.php?index=<?= $index ?>">Sửa</a> |
          <a href="../TH1-bai1/actions/delete.php?index=<?= $index ?>">Xóa</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<form action="../TH1-bai1/actions/create.php" method="POST" enctype="multipart/form-data">
  <h2>Thêm loài hoa mới</h2>
  <input type="text" name="name" placeholder="Tên hoa" required>
  <textarea name="description" placeholder="Mô tả" required></textarea>
  <input type="file" name="image">
  <button type="submit">Thêm</button>
</form>
<?php include "../TH1-bai1/components/footer.php"; ?>