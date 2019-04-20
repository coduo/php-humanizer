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
    /**
     * @var string
     */
    private $text;

    /**
     * @var bool
     */
    private $capitalize;

    /**
     * @var string
     */
    private $separator;

    /**
     * @param $text
     * @param bool   $capitalize
     * @param string $separator
     * @param array  $forbiddenWords
     */
    public function __construct($text, $capitalize = true, $separator = '_', array $forbiddenWords = ['id'])
    {
        $this->text = $text;
        $this->capitalize = $capitalize;
        $this->separator = $separator;
        $this->forbiddenWords = $forbiddenWords;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $humanized = \trim(\strtolower(\preg_replace(['/([A-Z])/', "/[{$this->separator}\\s]+/"], ['_$1', ' '], $this->text)));
        $humanized = \trim(\str_replace($this->forbiddenWords, '', $humanized));

        return $this->capitalize ?  \ucfirst($humanized) : $humanized;
    }
}
