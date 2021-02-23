<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime;

use Coduo\PHPHumanizer\CollectionHumanizer;
use Symfony\Contracts\Translation\TranslatorInterface;

final class PreciseFormatter
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function formatDifference(PreciseDifference $difference, string $locale = 'en') : string
    {
        $diff = [];

        foreach ($difference->components() as $result) {
            $diff[] = $this->translator->trans(
                'compound.' . $result->getUnit()->getName(),
                ['%count%' => $result->getQuantity()],
                'difference',
                $locale
            );
        }

        return $this->translator->trans(
            'compound.' . ($difference->isPast() ? 'past' : 'future'),
            ['%value%' => \implode(', ', $diff)],
            'difference',
            $locale
        );
    }

    public function formatInterval(\DateInterval $dateInterval, string $locale = 'en') : string
    {
        $parts = [];

        foreach ((new DateIntervalCompound($dateInterval))->components() as $component) {
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
