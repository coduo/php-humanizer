#PHP Humanizer

[![Build Status](https://travis-ci.org/norzechowicz/php-humanizer.svg?branch=master)](https://travis-ci.org/norzechowicz/php-humanizer)

Humanize values to make them readable for regular people ;)

#Installation

Add to your composer.json

```
require: {
   "norzechowicz/php-humanizer": "dev-master"
}
```

#Usage

## Text

**Humanize**

```php
use PHPHumanizer\String;

echo String::humanize('field_name'); // "Field Name"
echo String::humanize('user_id'); // "User"
echo String::humanize('field_name', false); // "field name"
```

## Number

**Ordinalize**

```php
use PHPHumanizer\Number;

echo Number::ordinalize(0); // "0th"
echo Number::ordinalize(1); // "1st"
echo Number::ordinalize(2); // "2nd"
echo Number::ordinalize(23); // "23rd"
echo Number::ordinalize(1002); // "1002nd"
echo Number::ordinalize(-111); // "-111th"

```

**Ordinal**

```php
use PHPHumanizer\Number;

echo Number::ordinal(0); // "th"
echo Number::ordinal(1); // "st"
echo Number::ordinal(2); // "nd"
echo Number::ordinal(23); // "rd"
echo Number::ordinal(1002); // "nd"
echo Number::ordinal(-111); // "th"
```

**Binary Suffix**

```php
use PHPHumanizer\Number;

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
use PHPHumanizer\Number;

echo Number::binarySuffix(1536, 'pl'); "1,5 kB"
```

# Credits

This lib was inspired by [Java Humanize Lib](https://github.com/mfornos/humanize) && [Rails Active Support](https://github.com/rails/rails/tree/master/activesupport/lib/active_support)
