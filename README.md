# MeowMaker 😺

MeowMaker is a simple PHP package that generates random cat data. It is useful for testing and seeding databases.

![MeowMaker Logo](assets/logo.webp)

## Installation

You can install the package via composer:

```bash
composer require gere-lajos/meowmaker
```

## Usage

### Basic usage
```php
use GereLajos\MeowMaker\Meow;

$meow = new Meow();
$name = $meow->name(); // "Whiskers"
$names = $meow->names(5); // ["Whiskers", "Mittens", "Fluffy", "Tiger", "Smokey"]
```

### Generate names
```php
$name = $meow->name(); // "Whiskers"
$names = $meow->names(5); // ["Whiskers", "Mittens", "Fluffy", "Tiger", "Smokey"]
```

### Generate words, sentences and paragraphs
```php
$word = $meow->word(); // "meow"
$words = $meow->words(5); // ["meow", "purr", "hiss", "yowl", "growl"]

$sentence = $meow->sentence(); // "The cat meowed."
$sentences = $meow->sentences(5); // ["The cat meowed.", "The cat purred.", "The cat hissed.", "The cat yowled.", "The cat growled."]

$paragraph = $meow->paragraph(); // "The cat meowed. The cat purred. The cat hissed."
$paragraphs = $meow->paragraphs(5); // ["The cat meowed. The cat purred. The cat hissed.", "The cat yowled. The cat growled. The cat meowed.", "The cat purred. The cat hissed. The cat yowled.", "The cat growled. The cat meowed. The cat purred.", "The cat hissed. The cat yowled. The cat growled."]
```

## Items modifiers
-- TODO --

## Credits

- [Gere Lajos](https://github.com/gere-lajos) - hello@gerelajos.hu

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.