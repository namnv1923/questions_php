<?php

include __DIR__ . '/vendor/autoload.php';
use App\QuestionCollection;

// Lấy ra mảng các câu hỏi

$object = QuestionCollection::fromMdFile('https://raw.githubusercontent.com/lydiahallie/javascript-questions/master/vi-VI/README-vi.md');
dump($object->display(0)->getContent());
//var_dump($object->fuzzySearch('10.'));
