<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Aeon\Calendar;

use Aeon\Calendar\Unit;
use Coduo\PHPHumanizer\CollectionHumanizer;
use Symfony\Contracts\Translation\TranslatorInterface;

final class Formatter
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function timeUnit(Unit $unit, string $locale = 'en') : string
    {
        $parts = [];

        foreach ((new UnitCompound($unit))->components() as $component) {
            $parts[] = $this->translator->trans(
                'compound.' . $component->getUnit()->getName(),
                ['%count%' => $component->getQuantity()],
                'difference',
                $locale
            );
        }

        return CollectionHumanizer::oxford($parts, null, $locale);
    }
}
