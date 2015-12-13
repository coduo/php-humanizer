<?php

namespace Coduo\PHPHumanizer\DateTime;

use Symfony\Component\Translation\TranslatorInterface;

final class Formatter
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
     * @param Difference $difference
     * @param string     $locale
     *
     * @return string
     */
    public function formatDifference(Difference $difference, $locale = 'en')
    {
        $translationKey = sprintf('%s.%s', $difference->getUnit()->getName(), $difference->isPast() ? 'past' : 'future');

        return $this->translator->transChoice(
            $translationKey,
            $difference->getQuantity(),
            array('%count%' => $difference->getQuantity()),
            'difference',
            $locale
        );
    }
}
