<?php
header('Content-Type: text/html; charset=utf-8');

define('QUIZ_FILE', __DIR__ . '/Quiz.txt');

function loadQuestions($filename = QUIZ_FILE)
{
    if (!file_exists($filename)) {
        return [];
    }

    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $questions = [];
    $current = [
        'question' => '',
        'options'  => [],
        'answer'   => ''
    ];

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') {
            continue;
        }

        if (stripos($line, 'ANSWER:') === 0) {
            $current['answer'] = strtoupper(trim(substr($line, strlen('ANSWER:'))));
            $questions[] = $current;
            $current = [
                'question' => '',
                'options'  => [],
                'answer'   => ''
            ];
        } elseif (preg_match('/^[ABCD]\./u', $line)) {
            // dòng phương án A./B./C./D.
            $current['options'][] = $line;
        } else {
            // dòng câu hỏi (có thể nhiều dòng)
            if ($current['question'] === '') {
                $current['question'] = $line;
            } else {
                $current['question'] .= ' ' . $line;
            }
        }
    }
    if (!empty($current['question']) && !empty($current['options']) && $current['answer'] !== '') {
        $questions[] = $current;
    }

    return $questions;
}

function gradeQuiz(array $questions, array $userAnswers)
{
    $score   = 0;
    $details = [];

    foreach ($questions as $i => $q) {
        $correct = strtoupper(trim($q['answer']));
        $user    = isset($userAnswers[$i]) ? strtoupper(trim($userAnswers[$i])) : '';
        $isCorrect = ($correct !== '' && $user === $correct);

        if ($isCorrect) {
            $score++;
        }

        $details[] = [
            'index'     => $i + 1,
            'isCorrect' => $isCorrect,
            'correct'   => $correct,
            'user'      => $user,
        ];
    }

    return [$score, $details];
}
