<?php

include __DIR__ . '/vendor/autoload.php';
use App\Question;
use App\QuestionCollection;

// Lấy ra mảng các câu hỏi
$collection = new QuestionCollection();
$collection->fromMdFile('https://raw.githubusercontent.com/lydiahallie/javascript-questions/master/vi-VI/README-vi.md');
$array = $collection->get();

//print_r($array);
//print_r($array[0]);


// Lấy ra câu hỏi và đáp án thứ 1
$answer = explode('####', $array[0]);
array_shift($answer);
$answer = implode("", $answer);

$question = explode('####', $array[0]);
array_pop($question);
$question = implode("", $question);


$item = new Question($question, $answer);
//echo $item->getAnswer();
echo $item->getContent();

