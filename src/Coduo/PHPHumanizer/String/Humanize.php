<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

final class Humanize
{
    private string $text;

    private bool $capitalize;

    private string $separator;

    /**
     * @var array<string>
     */
    private array $forbiddenWords;

    /**
     * @param array<string> $forbiddenWords
     */
    public function __construct(string $text, bool $capitalize = true, string $separator = '_', array $forbiddenWords = ['id'])
    {
        $this->text = $text;
        $this->capitalize = $capitalize;
        $this->separator = $separator;
        $this->forbiddenWords = $forbiddenWords;
    }

    public function __toString() : string
    {
        $humanized = \trim(\strtolower((string) \preg_replace(['/([A-Z])/', \sprintf('/[%s\s]+/', $this->separator)], ['_$1', ' '], $this->text)));
        $humanized = \trim(\str_replace($this->forbiddenWords, '', $humanized));

        return $this->capitalize ?  \ucfirst($humanized) : $humanized;
    }
}
