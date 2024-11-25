<!-- body.php -->
<table>
  <?php $indexRow = 0;
  if (!empty($data)): ?>
    <thead>
      <tr>
        <th class='hidden'>id</th>
        <th>STT</th>
        <th>Họ tên</th>
        <th>Địa chỉ</th>
        <th>Giới tính</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $item): ?>
        <?php $indexRow += 1; ?>
        <tr>
          <td class='hidden'><?php echo $item['id']; ?></td>
          <td><?php echo $indexRow ?></td>
          <td><?php echo $item["name"]; ?></td>
          <td><?php echo $item["address"]; ?></td>
          <td><?php echo $item["sex"]; ?></td>
          <td>
            <div class='block-icon'>
              <i class='fa-solid fa-pen-to-square icon' type='update'></i>
              <i class='fa-solid fa-trash icon' type='delete'></i>
            </div>
          </td>
        </tr>
      <?php endforeach;
      $indexRow = 0; ?>
    </tbody>
  <?php else: ?>
    <tbody>
      <tr>
        <td colspan="5">Chưa có dữ liệu</td>
      </tr>
    </tbody>
  <?php endif; ?>
</table>


<!-- alternative syntax for control structures -->

<!-- 2. Cú pháp thay thế (alternative syntax):
Khi bạn làm việc với HTML, thay vì phải đóng và mở thẻ PHP
 mỗi lần, bạn có thể sử dụng cú pháp thay thế để làm 
 mã dễ nhìn và ngắn gọn hơn. Cú pháp này sử dụng dấu 
 : thay vì dấu { và endif thay vì } để đóng câu lệnh 
 điều kiện. 
 -->