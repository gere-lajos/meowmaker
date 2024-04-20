<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Enums;

enum DictionaryType: string
{
    case ADDRESS = 'address';
    case MISC = 'misc';
    case NAMES = 'names';
    case WORDS = 'words';
}
