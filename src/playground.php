<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use GereLajos\MeowMaker\Meow;

$meow = new Meow();
$separator = '####################';

// Generate a name
echo 'A name: ' . $meow->name() . PHP_EOL;
echo 'More names: ' . implode(', ', $meow->names(10)) . PHP_EOL;
echo $separator . PHP_EOL;

// Generate a word
echo 'A word: ' . $meow->word() . PHP_EOL;
echo 'More words: ' . implode(', ', $meow->word(10)) . PHP_EOL;
echo $separator . PHP_EOL;

// Generate a sentence
echo 'A sentence: ' . $meow->sentence() . PHP_EOL;
echo 'More sentences: ' . implode(', ', $meow->sentence(10)) . PHP_EOL;
echo $separator . PHP_EOL;

// Generate a paragraph
echo 'A paragraph: ' . $meow->paragraph() . PHP_EOL;
echo 'More paragraphs: ' . implode(PHP_EOL, $meow->paragraph(10)) . PHP_EOL;
