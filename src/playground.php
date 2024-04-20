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

// Generate address
echo 'An address: ' . $meow->address() . PHP_EOL;
echo 'A country: ' . $meow->country() . PHP_EOL;
echo 'A city: ' . $meow->city() . PHP_EOL;
echo 'A street: ' . $meow->street() . PHP_EOL;
echo 'A postcode: ' . $meow->postcode() . PHP_EOL;
echo 'A building number: ' . $meow->buildingNumber() . PHP_EOL;

// Generate misc items
echo 'An email: ' . $meow->email() . PHP_EOL;
echo 'More emails: ' . implode(', ', $meow->emails(3)->toArray()) . PHP_EOL;
echo 'A phone number: ' . $meow->phone() . PHP_EOL;
echo 'A company: ' . $meow->company() . PHP_EOL;
echo 'A job title: ' . $meow->jobTitle() . PHP_EOL;

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
