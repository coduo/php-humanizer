# PHP Humanizer

[![Build Status](https://travis-ci.org/coduo/php-humanizer.svg?branch=master)](https://travis-ci.org/coduo/php-humanizer)
[![Latest Stable Version](https://poser.pugx.org/coduo/php-humanizer/v/stable)](https://packagist.org/packages/coduo/php-humanizer)
[![Total Downloads](https://poser.pugx.org/coduo/php-humanizer/downloads)](https://packagist.org/packages/coduo/php-humanizer)
[![Latest Unstable Version](https://poser.pugx.org/coduo/php-humanizer/v/unstable)](https://packagist.org/packages/coduo/php-humanizer)
[![License](https://poser.pugx.org/coduo/php-humanizer/license)](https://packagist.org/packages/coduo/php-humanizer)

Humanize values to make them readable for regular people ;)

# Installation

Run the following command:

```shell
composer require coduo/php-humanizer
```

# Usage

## Text

**Humanize**

```php
use Coduo\PHPHumanizer\StringHumanizer;

StringHumanizer::humanize('field_name'); // "Field Name"
StringHumanizer::humanize('user_id'); // "User"
StringHumanizer::humanize('field_name', false); // "field name"
```

**Truncate**

Truncate string to word closest to a certain length

```php
use Coduo\PHPHumanizer\StringHumanizer;

$text = 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.';

StringHumanizer::truncate($text, 8); // "Lorem ipsum"
StringHumanizer::truncate($text, 8, '...'); // "Lorem ipsum..."
StringHumanizer::truncate($text, 2); // "Lorem"
StringHumanizer::truncate($text, strlen($text)); // "Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc."

```

**Truncate HTML**

Truncate and HTML string to word closest to a certain length

```php
use Coduo\PHPHumanizer\StringHumanizer;

$text = '<p><b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create <a href="/wiki/Web_page" title="Web page">web pages</a>.<sup id="cite_ref-1" class="reference"><a href="#cite_note-1"><span>[</span>1<span>]</span></a></sup> <a href="/wiki/Web_browser" title="Web browser">Web browsers</a> can read HTML files and render them into visible or audible web pages. HTML describes the structure of a <a href="/wiki/Website" title="Website">website</a> <a href="/wiki/Semantic" title="Semantic" class="mw-redirect">semantically</a> along with cues for presentation, making it a markup language, rather than a <a href="/wiki/Programming_language" title="Programming language">programming language</a>.</p>';

StringHumanizer::truncateHtml($text, 3); // "<b>HyperText</b>"
StringHumanizer::truncateHtml($text, 12, ''); // "HyperText Markup"
StringHumanizer::truncateHtml($text, 50, '', '...'); // "HyperText Markup Language, commonly referred to as..."
StringHumanizer::truncateHtml($text, 75, '<b><i><u><em><strong><a><span>', '...'); // '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup...</a>'

```

## Number

**Ordinalize**

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::ordinalize(0); // "0th"
NumberHumanizer::ordinalize(1); // "1st"
NumberHumanizer::ordinalize(2); // "2nd"
NumberHumanizer::ordinalize(23); // "23rd"
NumberHumanizer::ordinalize(1002, 'nl'); // "1002e"
NumberHumanizer::ordinalize(-111); // "-111th"

```

**Ordinal**

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::ordinal(0); // "th"
NumberHumanizer::ordinal(1); // "st"
NumberHumanizer::ordinal(2); // "nd"
NumberHumanizer::ordinal(23); // "rd"
NumberHumanizer::ordinal(1002); // "nd"
NumberHumanizer::ordinal(-111, 'nl'); // "e"
```

**Roman numbers**
```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::toRoman(1); // "I"
NumberHumanizer::toRoman(5); // "V"
NumberHumanizer::toRoman(1300); // "MCCC"

NumberHumanizer::fromRoman("MMMCMXCIX"); // 3999
NumberHumanizer::fromRoman("V"); // 5
NumberHumanizer::fromRoman("CXXV"); // 125
```

**Binary Suffix**

Convert a number of bytes in to the highest applicable data unit

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::binarySuffix(0); // "0 bytes"
NumberHumanizer::binarySuffix(1); // "1 bytes"
NumberHumanizer::binarySuffix(1024); // "1 kB"
NumberHumanizer::binarySuffix(1025); // "1 kB"
NumberHumanizer::binarySuffix(1536); // "1.5 kB"
NumberHumanizer::binarySuffix(1048576 * 5); // "5 MB"
NumberHumanizer::binarySuffix(1073741824 * 2); // "2 GB"
NumberHumanizer::binarySuffix(1099511627776 * 3); // "3 TB"
NumberHumanizer::binarySuffix(1325899906842624); // "1.18 PB"
```

Number can be also formatted for specific locale

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::binarySuffix(1536, 'pl'); // "1,5 kB"
```

Number can also be humanized with a specific number of decimal places with `preciseBinarySuffix($number, $precision, $locale = 'en')`
The precision parameter must be between 0 and 3.

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::preciseBinarySuffix(1024, 2); // "1.00 kB"
NumberHumanizer::preciseBinarySuffix(1325899906842624, 3); // "1.178 PB"
```

This function also supports locale

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::preciseBinarySuffix(1325899906842624, 3, 'pl'); // "1,178 PB"
```

**Metric Suffix**

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::metricSuffix(-1); // "-1"
NumberHumanizer::metricSuffix(0); // "0"
NumberHumanizer::metricSuffix(1); // "1"
NumberHumanizer::metricSuffix(101); // "101"
NumberHumanizer::metricSuffix(1000); // "1k"
NumberHumanizer::metricSuffix(1240); // "1.2k"
NumberHumanizer::metricSuffix(1240000); // "1.24M"
NumberHumanizer::metricSuffix(3500000); // "3.5M"
```

Number can be also formatted for specific locale

```php
use Coduo\PHPHumanizer\NumberHumanizer;

NumberHumanizer::metricSuffix(1240000, 'pl'); // "1,24M"
```

## Collections

**Oxford**

```php
use Coduo\PHPHumanizer\CollectionHumanizer;

CollectionHumanizer::oxford(['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2); // "Michal, Norbert, and 2 others"
CollectionHumanizer::oxford(['Michal', 'Norbert', 'Lukasz'], 2); // "Michal, Norbert, and 1 other"
CollectionHumanizer::oxford(['Michal', 'Norbert']); // "Michal and Norbert"
```

Oxford is using translator component, so you can use whatever string format you like.

## Date time

**Difference**

```php
use Coduo\PHPHumanizer\DateTimeHumanizer;

DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:00:00")); // just now
DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:00:05")); // 5 seconds from now
DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:59:00")); // 1 minute ago
DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:45:00")); // 15 minutes ago
DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:15:00")); // 15 minutes from now
DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 14:00:00")); // 1 hour from now
DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 15:00:00")); // 2 hours from now
DateTimeHumanizer::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:00:00")); // 1 hour ago
DateTimeHumanizer::difference(new \DateTime("2014-04-26"), new \DateTime("2014-04-25")); // 1 day ago
DateTimeHumanizer::difference(new \DateTime("2014-04-26"), new \DateTime("2014-04-24")); // 2 days ago
DateTimeHumanizer::difference(new \DateTime("2014-04-26"), new \DateTime("2014-04-28")); // 2 days from now
DateTimeHumanizer::difference(new \DateTime("2014-04-01"), new \DateTime("2014-04-15")); // 2 weeks from now
DateTimeHumanizer::difference(new \DateTime("2014-04-15"), new \DateTime("2014-04-07")); // 1 week ago
DateTimeHumanizer::difference(new \DateTime("2014-01-01"), new \DateTime("2014-04-01")); // 3 months from now
DateTimeHumanizer::difference(new \DateTime("2014-05-01"), new \DateTime("2014-04-01")); // 1 month ago
DateTimeHumanizer::difference(new \DateTime("2015-05-01"), new \DateTime("2014-04-01")); // 1 year ago
DateTimeHumanizer::difference(new \DateTime("2014-05-01"), new \DateTime("2016-04-01")); // 2 years from now
```

**Precise difference**

```php
use Coduo\PHPHumanizer\DateTimeHumanizer;

DateTimeHumanizer::preciseDifference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-25 11:20:00")); // 1 day, 1 hour, 40 minutes ago
DateTimeHumanizer::preciseDifference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2015-04-28 17:00:00")); // 1 year, 2 days, 4 hours from now
DateTimeHumanizer::preciseDifference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2016-04-27 13:00:00")); // 2 years, 1 day from now
```

Currently we support following languages:
* [English](src/Coduo/PHPHumanizer/Resources/translations/difference.en.yml)
* [Polish](src/Coduo/PHPHumanizer/Resources/translations/difference.pl.yml)
* [German](src/Coduo/PHPHumanizer/Resources/translations/difference.de.yml)
* [Turkish](src/Coduo/PHPHumanizer/Resources/translations/difference.tr.yml)
* [French](src/Coduo/PHPHumanizer/Resources/translations/difference.fr.yml)
* [Português - Brasil](src/Coduo/PHPHumanizer/Resources/translations/difference.pt_BR.yml)
* [Italian](src/Coduo/PHPHumanizer/Resources/translations/difference.it.yml)
* [Dutch](src/Coduo/PHPHumanizer/Resources/translations/difference.nl.yml)
* [Русский](src/Coduo/PHPHumanizer/Resources/translations/difference.ru.yml)
* [Norwegian](src/Coduo/PHPHumanizer/Resources/translations/difference.no.yml)
* [Afrikaans](src/Coduo/PHPHumanizer/Resources/translations/difference.af.yml)
* [Bulgarian](src/Coduo/PHPHumanizer/Resources/translations/difference.bg.yml)
* [Indonesian](src/Coduo/PHPHumanizer/Resources/translations/difference.id.yml)
* [Chinese Simplified](src/Coduo/PHPHumanizer/Resources/translations/difference.zh_CN.yml)
* [Spanish](src/Coduo/PHPHumanizer/Resources/translations/difference.es.yml)
* [Ukrainian](src/Coduo/PHPHumanizer/Resources/translations/difference.uk.yml)
* [Danish](src/Coduo/PHPHumanizer/Resources/translations/difference.da.yml)
* [Thai](src/Coduo/PHPHumanizer/Resources/translations/difference.th.yml)
* [Japanese](src/Coduo/PHPHumanizer/Resources/translations/difference.ja.yml)

# Credits

This lib was inspired by [Java Humanize Lib](https://github.com/mfornos/humanize) && [Rails Active Support](https://github.com/rails/rails/tree/master/activesupport/lib/active_support)
