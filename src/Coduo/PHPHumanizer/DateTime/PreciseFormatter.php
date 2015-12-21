<?php

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
        $diff = array();

        foreach ($difference->getCompoundResults() as $result) {
            $diff[] = $this->translator->transChoice(
                'compound.'.$result->getUnit()->getName(),
                $result->getQuantity(),
                array('%count%' => $result->getQuantity()),
                'difference',
                $locale
            );
        }

        return $this->translator->trans(
            'compound.'.($difference->isPast() ? 'past' : 'future'),
            array('%value%' => implode(', ', $diff)),
            'difference',
            $locale
        );
    }
}
