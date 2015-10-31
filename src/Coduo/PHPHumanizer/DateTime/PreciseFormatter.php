<?php

namespace Coduo\PHPHumanizer\DateTime;

use Symfony\Component\Translation\TranslatorInterface;

class PreciseFormatter
{
    /**
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    private $translator;
    private $locale = 'en';

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

        $this->locale = $locale;

        foreach ($difference->getCompoundResults() as $result) {
            $diff[] = $this->translator->transChoice(
                'compound.'.$result->getUnit()->getName(),
                $result->getQuantity(),
                array('%count%' => $result->getQuantity()),
                'difference',
                $locale
            );
        }
        $suffix = $this->calculateCompoud($difference);
        $suffixString = empty($suffix) ? '':' '.$suffix;

        $prefix = $this->calculateCompoud($difference, '_prefix');
        $prefixString = empty($prefix) ? '':$prefix.' ';

        return $prefixString . implode(', ', $diff) . $suffixString;
    }

    private function calculateCompoud(PreciseDifference $difference, $suffixName = '')
    {
        $compound = $difference->isPast() ? 'compound.ago'.$suffixName : 'compound.from_now'.$suffixName;
        $compoundString = $this->translator->trans($compound, array(), 'difference', $this->locale);

        if (strlen($compoundString) > 0) {
            $compoundRes = substr_compare($compoundString, 'compound', 0, 8) ? $compoundString:'';
        } else {
            $compoundRes = '';
        }
        return $compoundRes;
    }
}
