<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

enum Config: mixed
{
    case NAMES_FILE = __DIR__ . '/dictionary/names.csv';
    case WORDS_FILE = __DIR__ . '/dictionary/words.csv';

    case MIN_WORDS = 3;
    case MAX_WORDS = 15;
    case MIN_SENTENCES = 3;
    case MAX_SENTENCES = 7;
}
