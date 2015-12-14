#PHP Humanizer

[![Build Status](https://travis-ci.org/coduo/php-humanizer.svg?branch=master)](https://travis-ci.org/coduo/php-humanizer)
[![Latest Stable Version](https://poser.pugx.org/coduo/php-humanizer/v/stable)](https://packagist.org/packages/coduo/php-humanizer)
[![Total Downloads](https://poser.pugx.org/coduo/php-humanizer/downloads)](https://packagist.org/packages/coduo/php-humanizer)
[![Latest Unstable Version](https://poser.pugx.org/coduo/php-humanizer/v/unstable)](https://packagist.org/packages/coduo/php-humanizer)
[![License](https://poser.pugx.org/coduo/php-humanizer/license)](https://packagist.org/packages/coduo/php-humanizer)

Humanize values to make them readable for regular people ;)

#Installation

Run the following command:

```shell
composer require coduo/php-humanizer
```

#Usage

## Text

**Humanize**

```php
use Coduo\PHPHumanizer\String;

echo String::humanize('field_name'); // "Field Name"
echo String::humanize('user_id'); // "User"
echo String::humanize('field_name', false); // "field name"
```

**Truncate**

Truncate string to word closest to a certain length

```php
use Coduo\PHPHumanizer\String;

$text = 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.';

echo String::truncate($text, 8); // "Lorem ipsum"
echo String::truncate($text, 8, '...'); // "Lorem ipsum..."
echo String::truncate($text, 2); // "Lorem"
echo String::truncate($text, strlen($text)); // "Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc."

```

**Truncate HTML**

Truncate and HTML string to word closest to a certain length

```php
use Coduo\PHPHumanizer\String;

$text = '<p><b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create <a href="/wiki/Web_page" title="Web page">web pages</a>.<sup id="cite_ref-1" class="reference"><a href="#cite_note-1"><span>[</span>1<span>]</span></a></sup> <a href="/wiki/Web_browser" title="Web browser">Web browsers</a> can read HTML files and render them into visible or audible web pages. HTML describes the structure of a <a href="/wiki/Website" title="Website">website</a> <a href="/wiki/Semantic" title="Semantic" class="mw-redirect">semantically</a> along with cues for presentation, making it a markup language, rather than a <a href="/wiki/Programming_language" title="Programming language">programming language</a>.</p>';

echo String::truncateHtml($text, 3); // "<b>HyperText</b>"
echo String::truncateHtml($text, 12, ''); // "HyperText Markup"
echo String::truncateHtml($text, 50, '', '...'); // "HyperText Markup Language, commonly referred to as..."
echo String::truncateHtml($text, 75, '<b><i><u><em><strong><a><span>', '...'); // '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup...</a>'

```

## Number

**Ordinalize**

```php
use Coduo\PHPHumanizer\Number;

echo Number::ordinalize(0); // "0th"
echo Number::ordinalize(1); // "1st"
echo Number::ordinalize(2); // "2nd"
echo Number::ordinalize(23); // "23rd"
echo Number::ordinalize(1002, 'nl'); // "1002e"
echo Number::ordinalize(-111); // "-111th"

```

**Ordinal**

```php
use Coduo\PHPHumanizer\Number;

echo Number::ordinal(0); // "th"
echo Number::ordinal(1); // "st"
echo Number::ordinal(2); // "nd"
echo Number::ordinal(23); // "rd"
echo Number::ordinal(1002); // "nd"
echo Number::ordinal(-111, 'nl'); // "e"
```

**Roman numbers**
```php
use Coduo\PHPHumanizer\Number;

echo Number::toRoman(1); // "I"
echo Number::toRoman(5); // "V"
echo Number::toRoman(1300); // "MCCC"

echo Number::fromRoman("MMMCMXCIX"); // 3999
echo Number::fromRoman("V"); // 5
echo Number::fromRoman("CXXV"); // 125
```

**Binary Suffix**

Convert a number of bytes in to the highest applicable data unit

```php
use Coduo\PHPHumanizer\Number;

echo Number::binarySuffix(0); // "0 bytes"
echo Number::binarySuffix(1); // "1 bytes"
echo Number::binarySuffix(1024); // "1 kB"
echo Number::binarySuffix(1025); // "1 kB"
echo Number::binarySuffix(1536); // "1.5 kB"
echo Number::binarySuffix(1048576 * 5); // "5 MB"
echo Number::binarySuffix(1073741824 * 2); // "2 GB"
echo Number::binarySuffix(1099511627776 * 3); // "3 TB"
echo Number::binarySuffix(1325899906842624); // "1.18 PB"
```

Number can be also formatted for specific locale

```php
use Coduo\PHPHumanizer\Number;

echo Number::binarySuffix(1536, 'pl'); // "1,5 kB"
```

Number can also be humanized with a specific number of decimal places with `preciseBinarySuffix($number, $precision, $locale = 'en')`
The precision parameter must be between 0 and 3.

```php
use Coduo\PHPHumanizer\Number;

echo Number::preciseBinarySuffix(1024, 2); // "1.00 kB"
echo Number::preciseBinarySuffix(1325899906842624, 3); // "1.178 PB"
```

This function also supports locale

```php
use Coduo\PHPHumanizer\Number;

echo Number::preciseBinarySuffix(1325899906842624, 3, 'pl'); // "1,178 PB"
```

**Metric Suffix**

```php
use Coduo\PHPHumanizer\Number;

echo Number::metricSuffix(-1); // "-1"
echo Number::metricSuffix(0); // "0"
echo Number::metricSuffix(1); // "1"
echo Number::metricSuffix(101); // "101"
echo Number::metricSuffix(1000); // "1k"
echo Number::metricSuffix(1240); // "1.2k"
echo Number::metricSuffix(1240000); // "1.24M"
echo Number::metricSuffix(3500000); // "3.5M"
```

Number can be also formatted for specific locale

```php
use Coduo\PHPHumanizer\Number;

echo Number::metricSuffix(1240000, 'pl'); // "1,24M"
```

## Collections

**Oxford**

```php
use Coduo\PHPHumanizer\Collection;

echo Collection::oxford(['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2); // "Michal, Norbert, and 2 others"
echo Collection::oxford(['Michal', 'Norbert', 'Lukasz'], 2); // "Michal, Norbert, and 1 other"
echo Collection::oxford(['Michal', 'Norbert']); // "Michal and Norbert"
```

Oxford is using translator component, so you can use whatever string format you like.

## Date time

**Difference**

```php
use Coduo\PHPHumanizer\DateTime;

echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:00:00")); // just now
echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:00:05")); // 5 seconds from now
echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:59:00")); // 1 minute ago
echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:45:00")); // 15 minutes ago
echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:15:00")); // 15 minutes from now
echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 14:00:00")); // 1 hour from now
echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 15:00:00")); // 2 hours from now
echo DateTime::difference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:00:00")); // 1 hour ago
echo DateTime::difference(new \DateTime("2014-04-26"), new \DateTime("2014-04-25")); // 1 day ago
echo DateTime::difference(new \DateTime("2014-04-26"), new \DateTime("2014-04-24")); // 2 days ago
echo DateTime::difference(new \DateTime("2014-04-26"), new \DateTime("2014-04-28")); // 2 days from now
echo DateTime::difference(new \DateTime("2014-04-01"), new \DateTime("2014-04-15")); // 2 weeks from now
echo DateTime::difference(new \DateTime("2014-04-15"), new \DateTime("2014-04-07")); // 1 week ago
echo DateTime::difference(new \DateTime("2014-01-01"), new \DateTime("2014-04-01")); // 3 months from now
echo DateTime::difference(new \DateTime("2014-05-01"), new \DateTime("2014-04-01")); // 1 month ago
echo DateTime::difference(new \DateTime("2015-05-01"), new \DateTime("2014-04-01")); // 1 year ago
echo DateTime::difference(new \DateTime("2014-05-01"), new \DateTime("2016-04-01")); // 2 years from now
```

**Precise difference**

```php
use Coduo\PHPHumanizer\DateTime;

echo DateTime::preciseDifference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-25 11:20:00")); // 1 day, 1 hour, 40 minutes ago
echo DateTime::preciseDifference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2015-04-28 17:00:00")); // 1 year, 2 days, 4 hours from now
echo DateTime::preciseDifference(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2016-04-27 13:00:00")); // 2 years, 1 day from now
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
* [Afrikaans] (src/Coduo/PHPHumanizer/Resources/translations/difference.af.yml)
* [Bulgarian] (src/Coduo/PHPHumanizer/Resources/translations/difference.bg.yml)
* [Indonesian] (src/Coduo/PHPHumanizer/Resources/translations/difference.id.yml)
* [Chinese Simplified] (src/Coduo/PHPHumanizer/Resources/translations/difference.zh_CN.yml)
* [Spanish] (src/Coduo/PHPHumanizer/Resources/translations/difference.es.yml)
* [Ukrainian] (src/Coduo/PHPHumanizer/Resources/translations/difference.uk.yml)
* [Danish] (src/Coduo/PHPHumanizer/Resources/translations/difference.da.yml)
* [Thai] (src/Coduo/PHPHumanizer/Resources/translations/difference.th.yml)

# Credits

This lib was inspired by [Java Humanize Lib](https://github.com/mfornos/humanize) && [Rails Active Support](https://github.com/rails/rails/tree/master/activesupport/lib/active_support)
