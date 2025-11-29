<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Bài Thi Trắc Nghiệm Android';

$questions = loadQuestions();

$score   = null;
$details = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
    list($score, $details) = gradeQuiz($questions, $_POST['answer']);
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="style.php"> <!-- CSS từ file style.php [web:11][web:12][web:18] -->
</head>

<body>
    <div class="container">
        <header>
            <h1><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
            <p>Đọc dữ liệu từ file Quiz.txt và chấm điểm tự động.</p>
        </header>

        <?php if (empty($questions)): ?>
            <p>Không đọc được câu hỏi. Vui lòng kiểm tra file Quiz.txt.</p>
        <?php else: ?>
            <form method="post" action="">
                <?php foreach ($questions as $index => $q): ?>
                    <fieldset>
                        <legend>Câu <?php echo $index + 1; ?></legend>
                        <p class="question-text">
                            <?php echo htmlspecialchars($q['question'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <?php foreach ($q['options'] as $option):
                            $optionLetter = substr($option, 0, 1);
                        ?>
                            <label class="option">
                                <input
                                    type="radio"
                                    name="answer[<?php echo $index; ?>]"
                                    value="<?php echo $optionLetter; ?>"
                                    required>
                                <?php echo htmlspecialchars($option, ENT_QUOTES, 'UTF-8'); ?>
                            </label>
                        <?php endforeach; ?>
                    </fieldset>
                <?php endforeach; ?>
                <button type="submit" class="btn-submit">Nộp bài</button>
            </form>

            <?php if ($score !== null): ?>
                <div class="result">
                    <h2>Kết quả</h2>
                    <p class="score">Điểm: <?php echo $score . ' / ' . count($questions); ?></p>
                    <ul>
                        <?php foreach ($details as $d): ?>
                            <li>
                                Câu <?php echo $d['index']; ?>:
                                <?php if ($d['isCorrect']): ?>
                                    <span class="correct">Đúng</span>
                                <?php else: ?>
                                    <span class="incorrect">Sai</span>
                                    <?php if ($d['correct'] !== ''): ?>
                                        (Đáp án đúng: <?php echo $d['correct']; ?>)
                                    <?php endif; ?>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <footer>
            &copy; <?php echo date('Y'); ?> Quiz Android - PHP.
        </footer>
    </div>
</body>

</html>