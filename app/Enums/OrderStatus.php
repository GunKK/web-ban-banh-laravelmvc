<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
final class OrderStatus extends Enum
{
    const INCOMPLETE = 1;
    const DELIVERING = 3;
    const COMPLETE = 2;
    const ERROR = 4;
}
