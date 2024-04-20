<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Enums;

enum MiscType: string
{
    case COMPANY = 'company';
    case COMPANY_SUFFIX = 'company_suffix';
    case DOMAIN = 'domain';
    case JOBTITLE = 'jobtitle';
    case LASTNAME = 'lastname';
}
