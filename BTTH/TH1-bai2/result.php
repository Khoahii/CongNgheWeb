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

// Tính điểm
$score = 0;
foreach ($questions as $index => $question) {
  $userAnswer = $_POST["question$index"] ?? null;
  if ($userAnswer === $question['answer']) {
    $score++;
  }
}

// Tổng số câu hỏi
$totalQuestions = count($questions);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kết Quả</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #6200ea;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }

    main {
      max-width: 600px;
      margin: 50px auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      color: #333;
    }

    p {
      font-size: 18px;
      color: #555;
    }

    .score {
      font-size: 36px;
      color: #6200ea;
      margin: 20px 0;
    }

    .feedback {
      font-size: 18px;
      margin-bottom: 20px;
      color: #555;
    }

    a {
      text-decoration: none;
      display: inline-block;
      background-color: #6200ea;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    a:hover {
      background-color: #3700b3;
    }

    footer {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      color: #888;
    }
  </style>
</head>

<body>
  <header>Kết Quả Bài Thi</header>
  <main>
    <h1>Kết Quả</h1>
    <p>Bạn đã trả lời đúng:</p>
    <div class="score"><?= $score ?> / <?= $totalQuestions ?></div>
    <div class="feedback">
      <?php if ($score === $totalQuestions): ?>
        Xuất sắc! Bạn đã trả lời đúng tất cả câu hỏi. 🎉
      <?php elseif ($score >= $totalQuestions / 2): ?>
        Tốt lắm! Bạn có thể làm tốt hơn nữa. 💪
      <?php else: ?>
        Hãy cố gắng hơn trong lần tới nhé! 😅
      <?php endif; ?>
    </div>
    <a href="index.php">Làm lại bài thi</a>
  </main>
  <footer>© 2024 Trắc Nghiệm</footer>
</body>

</html>