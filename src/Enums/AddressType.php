<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Enums;

enum AddressType: string
{
    case COUNTRY = 'country';
    case CITY = 'city';
    case STREET = 'street';
    case STREET_SUFFIX = 'street_suffix';
}
