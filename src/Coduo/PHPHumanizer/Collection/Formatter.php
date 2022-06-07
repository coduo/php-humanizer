<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Collection;

use Symfony\Contracts\Translation\TranslatorInterface;

final class Formatter
{
    private TranslatorInterface $translator;

    private string $catalogue;

    public function __construct(TranslatorInterface $translator, string $catalogue = 'oxford')
    {
        $this->translator = $translator;
        $this->catalogue = $catalogue;
    }

    /**
     * @psalm-suppress RedundantCastGivenDocblockType
     *
     * @param array<string> $collection
     */
    public function format(array $collection, int $limit = null) : string
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
     * @psalm-suppress RedundantCastGivenDocblockType
     *
     * @param array<string> $collection
     */
    private function formatCommaSeparatedWithLimit(array $collection, ?int $limit, int $count) : string
    {
        $display = \array_map(fn ($element) => (string) $element, \array_slice($collection, 0, $limit));

        $moreCount = $count - \count($display);

        return $this->translator->trans('comma_separated_with_limit', [
            '%list%' => \implode(', ', $display),
            '%count%' => $moreCount,
        ], $this->catalogue);
    }

    /**
     * @psalm-suppress RedundantCastGivenDocblockType
     *
     * @param array<string> $collection
     */
    private function formatCommaSeparated(array $collection, int $count) : string
    {
        $display = \array_map(fn ($element) => (string) $element, \array_slice($collection, 0, $count - 1));

        return $this->translator->trans('comma_separated', [
            '%list%' => \implode(', ', $display),
            '%last%' => (string) \end($collection),
        ], $this->catalogue);
    }

    /**
     * @psalm-suppress RedundantCastGivenDocblockType
     *
     * @param array<string> $collection
     */
    private function formatOnlyTwo(array $collection) : string
    {
        return $this->translator->trans('only_two', [
            '%first%' => (string) $collection[0],
            '%second%' => (string) $collection[1],
        ], $this->catalogue);
    }
}
