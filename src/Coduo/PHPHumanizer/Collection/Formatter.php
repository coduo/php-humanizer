<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Collection;

use Symfony\Component\Translation\TranslatorInterface;

final class Formatter
{
    /**
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    private $translator;

    /**
     * @var string
     */
    private $catalogue;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator, $catalogue = 'oxford')
    {
        $this->translator = $translator;
        $this->catalogue = $catalogue;
    }

    public function format($collection, $limit = null)
    {
        $count = \count($collection);

        if (0 === $count) {
            return '';
        }

        if (1 === $count) {
            return (string) $collection[0];
        }

        if (2 === $count) {
            return $this->formatOnlyTwo($collection);
        }

        if (null !== $limit) {
            return $this->formatCommaSeparatedWithLimit($collection, $limit, $count);
        }

        return $this->formatCommaSeparated($collection, $count);
    }

    /**
     * @param $collection
     * @param $limit
     * @param $count
     *
     * @return string
     */
    private function formatCommaSeparatedWithLimit($collection, $limit, $count)
    {
        $display = \array_map(function ($element) {
            return (string) $element;
        }, \array_slice($collection, 0, $limit));

        $moreCount = $count - \count($display);

        return $this->translator->transChoice('comma_separated_with_limit', $moreCount, [
            '%list%' => \implode(', ', $display),
            '%count%' => $moreCount,
        ], $this->catalogue);
    }

    /**
     * @param $collection
     * @param $count
     *
     * @return string
     */
    private function formatCommaSeparated($collection, $count)
    {
        $display = \array_map(function ($element) {
            return (string) $element;
        }, \array_slice($collection, 0, $count - 1));

        return $this->translator->trans('comma_separated', [
            '%list%' => \implode(', ', $display),
            '%last%' => (string) \end($collection),
        ], $this->catalogue);
    }

    /**
     * @param $collection
     *
     * @return string
     */
    private function formatOnlyTwo($collection)
    {
        return $this->translator->trans('only_two', [
            '%first%' => (string) $collection[0],
            '%second%' => (string) $collection[1],
        ], $this->catalogue);
    }
}
