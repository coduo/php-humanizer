#PHP Humanizer

[![Build Status](https://travis-ci.org/coduo/php-humanizer.svg?branch=master)](https://travis-ci.org/coduo/php-humanizer)

Humanize values to make them readable for regular people ;)

#Installation

Add to your composer.json

```
require: {
   "coduo/php-humanizer": "dev-master"
}
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

## Number

**Ordinalize**

```php
use Coduo\PHPHumanizer\Number;

echo Number::ordinalize(0); // "0th"
echo Number::ordinalize(1); // "1st"
echo Number::ordinalize(2); // "2nd"
echo Number::ordinalize(23); // "23rd"
echo Number::ordinalize(1002); // "1002nd"
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
echo Number::ordinal(-111); // "th"
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

# Credits

This lib was inspired by [Java Humanize Lib](https://github.com/mfornos/humanize) && [Rails Active Support](https://github.com/rails/rails/tree/master/activesupport/lib/active_support)
