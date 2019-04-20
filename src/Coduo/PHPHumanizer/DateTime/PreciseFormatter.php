<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime;

use Symfony\Component\Translation\TranslatorInterface;

final class PreciseFormatter
{
    /**
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    private $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param PreciseDifference $difference
     * @param string            $locale
     *
     * @return string
     */
    public function formatDifference(PreciseDifference $difference, $locale = 'en')
    {
        $diff = [];

        foreach ($difference->getCompoundResults() as $result) {
            $diff[] = $this->translator->transChoice(
                'compound.'.$result->getUnit()->getName(),
                $result->getQuantity(),
                ['%count%' => $result->getQuantity()],
                'difference',
                $locale
            );
        }

        return $this->translator->trans(
            'compound.'.($difference->isPast() ? 'past' : 'future'),
            ['%value%' => \implode(', ', $diff)],
            'difference',
            $locale
        );
    }
}
