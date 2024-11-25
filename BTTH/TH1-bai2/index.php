<?php
// Đọc câu hỏi từ tệp Quiz.txt
$questions = [];
$lines = file('Quiz.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$currentQuestion = null;

foreach ($lines as $line) {
  if (strpos($line, 'ANSWER:') !== false) {
    $currentQuestion['answer'] = trim(str_replace('ANSWER:', '', $line));
    $questions[] = $currentQuestion;
    $currentQuestion = null;
  } elseif (preg_match('/^[A-D]\./', $line)) {
    $currentQuestion['options'][] = substr($line, 3);
  } else {
    $currentQuestion = ['question' => $line, 'options' => []];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Bài Trắc Nghiệm</title>
</head>

<body>
  <h1>Bài Thi Trắc Nghiệm</h1>
  <form action="result.php" method="post">
    <?php foreach ($questions as $index => $question): ?>
      <div>
        <p><strong>Câu <?= $index + 1 ?>:</strong> <?= $question['question'] ?></p>
        <?php foreach ($question['options'] as $key => $option): ?>
          <label>
            <input type="radio" name="question<?= $index ?>" value="<?= chr(65 + $key) ?>">
            <?= chr(65 + $key) ?>. <?= $option ?>
          </label><br>
        <?php endforeach; ?>
      </div>
      <br>
    <?php endforeach; ?>
    <button type="submit">Nộp bài</button>
  </form>
</body>

</html>