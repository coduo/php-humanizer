<?php

namespace Coduo\PHPHumanizer\Number;

use Symfony\Component\Translation\TranslatorInterface;

// Credit to Karl Rixon: http://www.karlrixon.co.uk/writing/convert-numbers-to-words-with-php/
class NumberSpeller
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
     * @param $number
     * @param $locale
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function spell($number, $locale = 'en')
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException("Spell number converter only accepts numeric values.");
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            throw new \InvalidArgumentException("Spell number converter only accepts numeric values between -" . PHP_INT_MAX . " and " . PHP_INT_MAX . ".");
        }

        if ($number < 0) {
            return $this->translate('negative', $locale) . ' ' . $this->spell(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $this->translate('number.' . $number, $locale);
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $this->translate('number.' . $tens, $locale);
                if ($units) {
                    $string .= $this->translate('hyphen', $locale) . $this->translate('number.' . $units, $locale);
                }
                break;
            case $number < 1000:
                $hundreds  = floor($number / 100);
                $remainder = $number % 100;
                $string = $this->translate('number.' . $hundreds, $locale) . ' ' . $this->translate('number.' . 100, $locale);
                if ($remainder) {
                    $string .= ' ' . $this->translate('conjunction', $locale) . ' ' . $this->spell($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->spell($numBaseUnits) . ' ' . $this->translate('number.' . $baseUnit, $locale);
                if ($remainder) {
                    $string .= $remainder < 100 ? ' ' . $this->translate('conjunction', $locale) . ' ' : $this->translate('separator', $locale) . ' ';
                    $string .= $this->spell($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= ' ' . $this->translate('decimal', $locale) . ' ';
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $this->translate('number.' . $number, $locale);
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    /**
     * @param $key
     *
     * @return string
     */
    private function translate($key, $locale)
    {
        return $this->translator->transChoice($key, 0, array(), 'number', $locale);
    }
}
