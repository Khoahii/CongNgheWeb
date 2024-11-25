<?php
include "../TH1-bai1/components/header.php";
include 'data/flowers.php';
?>
<div class="flower-list">
  <?php foreach ($flowers as $flower): ?>
    <div class="flower-item">
      <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>">
      <h2><?= $flower['name'] ?></h2>
      <p><?= $flower['description'] ?></p>
    </div>
  <?php endforeach; ?>
</div>
<?php include "../TH1-bai1/components/footer.php"; ?>