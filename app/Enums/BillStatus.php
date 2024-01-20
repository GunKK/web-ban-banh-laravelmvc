<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BillStatus extends Enum
{
    const Processing = 'Processing';
    const Delivering = 'Delivering';
    const Success = 'Success';
    const Failure = 'Failure';
}
