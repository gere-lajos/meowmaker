<?php
use GereLajos\MeowMaker\Enums\NameType;

require_once dirname(__DIR__) . '/vendor/autoload.php';

use GereLajos\MeowMaker\Meow;

$meow = new Meow();
$separator = '####################';

// Generate a name
echo 'A name: ' . $meow->name() . PHP_EOL;
echo 'A male name: ' . $meow->name(NameType::MALE) . PHP_EOL;
echo 'A female name: '. $meow->name(NameType::FEMALE) . PHP_EOL;
echo 'A full name: ' . $meow->fullName(NameType::FULL) . PHP_EOL;
echo 'More names: ' . implode(', ', $meow->names(5)->toArray()) . PHP_EOL;
echo $separator . PHP_EOL;

// Generate an email
echo 'An email: ' . $meow->email() . PHP_EOL;
echo 'More emails: ' . implode(', ', $meow->emails(3)->toArray()) . PHP_EOL;

// Generate a word
echo 'A word: ' . $meow->word() . PHP_EOL;
echo 'More words: ' . implode(', ', $meow->words(5)->toArray()) . PHP_EOL;
echo $separator . PHP_EOL;

// Generate a sentence
echo 'A sentence: ' . $meow->sentence() . PHP_EOL;
echo 'More sentences: ' . implode(', ', $meow->sentences(3)->toArray()) . PHP_EOL;
echo $separator . PHP_EOL;

// Generate a paragraph
echo 'A paragraph: ' . $meow->paragraph() . PHP_EOL;
echo 'More paragraphs: ' . implode(PHP_EOL, $meow->paragraphs(2)->toArray()) . PHP_EOL;
