<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Config
{
    public const string NAMES_FILE = __DIR__ . '/Dictionary/names.csv';
    public const string WORDS_FILE = __DIR__ . '/Dictionary/words.csv';

    public const int MIN_WORDS = 3;
    public const int MAX_WORDS = 15;
    public const int MIN_SENTENCES = 3;
    public const int MAX_SENTENCES = 7;
}
