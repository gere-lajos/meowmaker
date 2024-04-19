<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use GereLajos\MeowMaker\Meow;

$meow = new Meow();

echo 'A name: ' . $meow->name() . PHP_EOL;
echo 'More names: ' . implode(', ', $meow->names(10)) . PHP_EOL;
echo '####################' . PHP_EOL;
echo 'A word: ' . $meow->word() . PHP_EOL;
echo 'More words: ' . implode(', ', $meow->words(10)) . PHP_EOL;
echo '####################' . PHP_EOL;
echo 'A sentence: ' . $meow->sentence() . PHP_EOL;
echo 'More sentences: ' . implode(', ', $meow->sentences(10)) . PHP_EOL;
echo '####################' . PHP_EOL;
echo 'A paragraph: ' . $meow->paragraph() . PHP_EOL;
echo 'More paragraphs: ' . implode(PHP_EOL, $meow->paragraphs(10)) . PHP_EOL;
