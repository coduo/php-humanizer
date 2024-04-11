## [Unreleased] - 2024-04-11

### Added
- [#133](https://github.com/coduo/php-humanizer/pull/133) - **Slovak translation added for Oxford and Datetime** - [@jerony-mo](https://github.com/jerony-mo)
- [#133](https://github.com/coduo/php-humanizer/pull/133) - **Czech translation added for Oxford and Datetime** - [@jerony-mo](https://github.com/jerony-mo)

### Changed
- [#131](https://github.com/coduo/php-humanizer/pull/131) - **Using the assertSame to make assert equals restricted.** - [@peter279k](https://github.com/peter279k)

### Fixed
- [90efee](https://github.com/coduo/php-humanizer/commit/90efee54b12d083d7d4ec62d52cdb7f2a5c9641d) - **development tools dependencies configuration** - [@norberttech](https://github.com/norberttech)
- [fe058c](https://github.com/coduo/php-humanizer/commit/fe058ca2ecb9aa90f8c688a25a9327b7c2050156) - **static analyze github workflow php version** - [@norberttech](https://github.com/norberttech)
- [#132](https://github.com/coduo/php-humanizer/pull/132) - **Fix the CI status badge URL.** - [@peter279k](https://github.com/peter279k)

### Updated
- [b18a11](https://github.com/coduo/php-humanizer/commit/b18a11af5c694d8041fe585d687a6d5c4b8f78db) - **README.md** - [@norberttech](https://github.com/norberttech)
- [c5023f](https://github.com/coduo/php-humanizer/commit/c5023fa601eca56a39f23e9a8274d80f4a4a6c6a) - **project to latest versio of php and dependencies** - [@norberttech](https://github.com/norberttech)

## [4.0.3] - 2022-06-07

### Added
- [#129](https://github.com/coduo/php-humanizer/pull/129) - **support for PHP 8.1 and symfony 6 dependencies** - [@norberttech](https://github.com/norberttech)

### Changed
- [57c6ed](https://github.com/coduo/php-humanizer/commit/57c6ed978f48dc810e5e4540cbec022c57fecb3c) - **Delete FUNDING.yml** - [@norberttech](https://github.com/norberttech)

### Updated
- [3107e2](https://github.com/coduo/php-humanizer/commit/3107e2b6a568726f4cd40a23847ce1e305c99c95) - **static-analyze.yml** - [@norberttech](https://github.com/norberttech)
- [6a369d](https://github.com/coduo/php-humanizer/commit/6a369d9f17855736c5f38261f6765d084e177da2) - **tests.yml** - [@norberttech](https://github.com/norberttech)

## [4.0.2] - 2021-06-20

### Changed
- [fb264c](https://github.com/coduo/php-humanizer/commit/fb264c8fbfb94f7a10272ac9fca576d8aa053b4a) - **Aeon Calendar dependency** - [@norberttech](https://github.com/norberttech)
- [#126](https://github.com/coduo/php-humanizer/pull/126) - **Using the `assertTrue` to assert expected is `true`.** - [@peter279k](https://github.com/peter279k)
- [#126](https://github.com/coduo/php-humanizer/pull/126) - **Using the `assertFalse` to assert expected is `false`.** - [@peter279k](https://github.com/peter279k)

## [4.0.1] - 2021-02-27

### Fixed
- [#125](https://github.com/coduo/php-humanizer/pull/125) - **humanization of time unit less than 1 second** - [@norberttech](https://github.com/norberttech)

## [4.0.0] - 2021-02-25

### Added
- [0533da](https://github.com/coduo/php-humanizer/commit/0533da67e2a0ff97a8f504ebc8de469eaca150f1) - **more strict php cs fixer rules** - [@norberttech](https://github.com/norberttech)
- [#123](https://github.com/coduo/php-humanizer/pull/123) - **Relative/Time Unit humanizer** - [@norberttech](https://github.com/norberttech)
- [#123](https://github.com/coduo/php-humanizer/pull/123) - **TimePeriod humanizer** - [@norberttech](https://github.com/norberttech)
- [#123](https://github.com/coduo/php-humanizer/pull/123) - **Support for \DateTimeInterface instead of legacy \DateTime in all DateTimeHumanizers** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **phpstan with highest possible requirements** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **psalm with highest possible requirements** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **arguments and return type hinting** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **PHP 8.0 support** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **More precise CS fixer rules** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **Full change log** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **integration with aeon-php/automation** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **Github actions integration** - [@norberttech](https://github.com/norberttech)
- [#120](https://github.com/coduo/php-humanizer/pull/120) - **test for azerbaijani language** - [@4t87ux8](https://github.com/4t87ux8)
- [#119](https://github.com/coduo/php-humanizer/pull/119) - **support azerbaijani language** - [@4t87ux8](https://github.com/4t87ux8)

### Changed
- [#124](https://github.com/coduo/php-humanizer/pull/124) - **load Translator only once for given locale** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **minimum required PHP version ^7.4** - [@norberttech](https://github.com/norberttech)
- [#118](https://github.com/coduo/php-humanizer/pull/118) - **create azerbaijani translation** - [@4t87ux8](https://github.com/4t87ux8)
- [fa52e6](https://github.com/coduo/php-humanizer/commit/fa52e6223eef2f19fbd0a290432b5a878317dca2) - **Fixxed issue with symfony translator dependency, upgraded php, phpunit and phpspec dependencies** - [@norberttech](https://github.com/norberttech)
- [f989a9](https://github.com/coduo/php-humanizer/commit/f989a91d2d90f5d4bf4922ab9fec1674e7fe024e) - **Create FUNDING.yml** - [@norberttech](https://github.com/norberttech)
- [142689](https://github.com/coduo/php-humanizer/commit/142689763a6aafdd9f1dfbb48db9807bbe027acc) - **Update README.md** - [@norberttech](https://github.com/norberttech)
- [6255e0](https://github.com/coduo/php-humanizer/commit/6255e022c0ff8767cae6cdb4552d13f5f0df0d65) - **Moved php-cs-fixer to dev dependency where it belongs to** - [@norberttech](https://github.com/norberttech)
- [4d62db](https://github.com/coduo/php-humanizer/commit/4d62dba187d89bc8276ff6e5364d2dd9a3f2ad5f) - **Migrated from travis-ci.org to travis-ci.com** - [@norberttech](https://github.com/norberttech)
- [dc528e](https://github.com/coduo/php-humanizer/commit/dc528ebcef31b793e1dd24dbe90f14039361fad1) - **Update README.md** - [@norberttech](https://github.com/norberttech)
- [1b2787](https://github.com/coduo/php-humanizer/commit/1b2787d28282247b3fe68cd5b9f6bf80f304fa63) - **dev-master branch aliast** - [@norberttech](https://github.com/norberttech)

### Fixed
- [16074f](https://github.com/coduo/php-humanizer/commit/16074feea40f8d96e2a31d8d18e24425149a6086) - **missing .php_cs configuration file** - [@norberttech](https://github.com/norberttech)
- [4de08d](https://github.com/coduo/php-humanizer/commit/4de08de0b2463cfc498612a89189385b5de4f66d) - **updating changelog workflow** - [@norberttech](https://github.com/norberttech)
- [fc3a04](https://github.com/coduo/php-humanizer/commit/fc3a043f6e03bc29e86d0cd58ae3a6b7daf40d69) - **travis configuration** - [@norberttech](https://github.com/norberttech)
- [#115](https://github.com/coduo/php-humanizer/pull/115) - **composer autoloading deprecation notice; Support symfony 5** - [@brianwozeniak](https://github.com/brianwozeniak)

### Removed
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **phpspec** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **symfony/config dependency** - [@norberttech](https://github.com/norberttech)
- [#122](https://github.com/coduo/php-humanizer/pull/122) - **travis CI integration** - [@norberttech](https://github.com/norberttech)
- [83a180](https://github.com/coduo/php-humanizer/commit/83a1805da9a28a98a0bb932a5236becd44ea79b6) - **php 8.0 from matrix** - [@norberttech](https://github.com/norberttech)

## [3.0.2] - 2019-04-29

### Changed
- [9d83e5](https://github.com/coduo/php-humanizer/commit/9d83e509dacfd26250ee4c6b0f195affb08cb1e2) - **Moved php-cs-fixer to dev dependency where it belongs to** - [@norberttech](https://github.com/norberttech)

## [3.0.1] - 2019-04-20

### Changed
- [380428](https://github.com/coduo/php-humanizer/commit/38042820e9ee7ccc76d66f9c480fe8b7f0e8aaf0) - **Update README.md** - [@norberttech](https://github.com/norberttech)

## [3.0.0] - 2019-04-20

### Added
- [17a5ab](https://github.com/coduo/php-humanizer/commit/17a5ab5243ae1eec2e3d39388bf611088b8fd5e7) - **missing translations** - [@norberttech](https://github.com/norberttech)
- [#86](https://github.com/coduo/php-humanizer/pull/86) - **test case with 0 at the end of the number** - [@norberttech](https://github.com/norberttech)
- [#84](https://github.com/coduo/php-humanizer/pull/84) - **PFIGS ordinals** - [@martinbutt](https://github.com/martinbutt)

### Changed
- [1b2787](https://github.com/coduo/php-humanizer/commit/1b2787d28282247b3fe68cd5b9f6bf80f304fa63) - **dev-master branch aliast** - [@norberttech](https://github.com/norberttech)
- [14ab74](https://github.com/coduo/php-humanizer/commit/14ab746762acd1856ddd386023128f23935ef119) - **CS Fixes** - [@norberttech](https://github.com/norberttech)
- [9edceb](https://github.com/coduo/php-humanizer/commit/9edceb2d21fa879e91072308b8bbe3503a346bd2) - **CS Fixes** - [@norberttech](https://github.com/norberttech)
- [#112](https://github.com/coduo/php-humanizer/pull/112) - **Upgraded thunderer/shortcode dependency to ^0.7** - [@thunderer](https://github.com/thunderer)
- [#111](https://github.com/coduo/php-humanizer/pull/111) - **Allow later versions of symfony packages** - [@brianwozeniak](https://github.com/brianwozeniak)
- [#91](https://github.com/coduo/php-humanizer/pull/91) - **Sanity check for NumberFormatter when intl is not installed** - [@thunderer](https://github.com/thunderer)
- [#40](https://github.com/coduo/php-humanizer/pull/40) - **Romanian translations** - [@a-ungurianu](https://github.com/a-ungurianu)
- [#106](https://github.com/coduo/php-humanizer/pull/106) - **[master] Add translation: zh_TW** - [@jfcherng](https://github.com/jfcherng)
- [#104](https://github.com/coduo/php-humanizer/pull/104) - **Feature/update** - [@norberttech](https://github.com/norberttech)
- [#89](https://github.com/coduo/php-humanizer/pull/89) - **remove unnecessary echo** - [@vinicius73](https://github.com/vinicius73)
- [#87](https://github.com/coduo/php-humanizer/pull/87) - **Force $binaryPrefixes array ordering on 32-bit systems, fixes #83** - [@Forst](https://github.com/Forst)
- [5cd850](https://github.com/coduo/php-humanizer/commit/5cd850b49b1ca30811f24c5c1a9b0d6e4cac9fba) - **Update composer.json** - [@norberttech](https://github.com/norberttech)
- [#85](https://github.com/coduo/php-humanizer/pull/85) - **Support Japanese language** - [@serima](https://github.com/serima)

### Fixed
- [9b52c5](https://github.com/coduo/php-humanizer/commit/9b52c5dc42f10ff60f4827ff9a736b3a1a18f0e4) - **README.md** - [@norberttech](https://github.com/norberttech)
- [#80](https://github.com/coduo/php-humanizer/pull/80) - **russian translation** - [@dizzy7](https://github.com/dizzy7)

## [2.0.1] - 2019-02-25

### Changed
- [#107](https://github.com/coduo/php-humanizer/pull/107) - **[2.0] Add translation: zh_TW** - [@jfcherng](https://github.com/jfcherng)

### Fixed
- [#108](https://github.com/coduo/php-humanizer/pull/108) - **travis configuration for 2.0 branch** - [@norberttech](https://github.com/norberttech)

## [2.0.0-beta] - 2016-02-21

### Added
- [#78](https://github.com/coduo/php-humanizer/pull/78) - **ext-inl to composer suggest** - [@norberttech](https://github.com/norberttech)
- [#68](https://github.com/coduo/php-humanizer/pull/68) - **composer cache folder and move to new infrastructure** - [@norberttech](https://github.com/norberttech)

### Changed
- [e85d69](https://github.com/coduo/php-humanizer/commit/e85d6905a097f9ba6b2165d9998749eb113d0289) - **Merge pull request #78 from norzechowicz/suggest-intl** - [@norzechowicz](https://github.com/norzechowicz)
- [#75](https://github.com/coduo/php-humanizer/pull/75) - **Cleanup before stable release** - [@norberttech](https://github.com/norberttech)
- [f5831e](https://github.com/coduo/php-humanizer/commit/f5831e3be54ca85c9fc14ee5da00b2d6ba1143bb) - **Merge pull request #75 from norzechowicz/cleanup** - [@norzechowicz](https://github.com/norzechowicz)
- [#73](https://github.com/coduo/php-humanizer/pull/73) - **improve strategy to handle prefix-ordinal** - [@isnani](https://github.com/isnani)
- [6ec963](https://github.com/coduo/php-humanizer/commit/6ec963fb1c8ecee66feb0228ca5626f1c1ca09f8) - **Merge pull request #73 from isnani/improve-ordinal-strategy** - [@norzechowicz](https://github.com/norzechowicz)
- [#70](https://github.com/coduo/php-humanizer/pull/70) - **Cleanup** - [@norberttech](https://github.com/norberttech)
- [dac4b4](https://github.com/coduo/php-humanizer/commit/dac4b43390f320b82728f1e5e0ad45f7c68d591e) - **Merge pull request #70 from norzechowicz/cleanup** - [@norzechowicz](https://github.com/norzechowicz)
- [#69](https://github.com/coduo/php-humanizer/pull/69) - **Renamed all facades in order to support php7** - [@norberttech](https://github.com/norberttech)
- [b7214c](https://github.com/coduo/php-humanizer/commit/b7214ce3e0511d5172568aff4a4572a0d80762a1) - **Merge pull request #69 from norzechowicz/php7-support** - [@norzechowicz](https://github.com/norzechowicz)
- [3f252e](https://github.com/coduo/php-humanizer/commit/3f252ef1a717a841dac1316f835494ef82104cde) - **master branch alias** - [@norberttech](https://github.com/norberttech)
- [ae6020](https://github.com/coduo/php-humanizer/commit/ae602062f4500488dcbd119b3560a1bdd4fe2699) - **Merge pull request #68 from norzechowicz/travis-ci** - [@norzechowicz](https://github.com/norzechowicz)
- [7c7e79](https://github.com/coduo/php-humanizer/commit/7c7e79dabc0989dbaf485d46c00d9d836c929f8a) - **Merge pull request #67 from nwatth/thai-translation** - [@norzechowicz](https://github.com/norzechowicz)
- [#67](https://github.com/coduo/php-humanizer/pull/67) - **Thai translation** - [@nwatth](https://github.com/nwatth)

## [1.0.9] - 2015-12-02

### Added
- [#54](https://github.com/coduo/php-humanizer/pull/54) - **Ukrainian to the list of languages** - [@Borales](https://github.com/Borales)
- [d2904a](https://github.com/coduo/php-humanizer/commit/d2904ae1e1ebd79c7b8224aa31bd5aec8d9575a4) - **composer.phar into .gitignore** - [@norberttech](https://github.com/norberttech)
- [#26](https://github.com/coduo/php-humanizer/pull/26) - **Spanish translation.** - [@orestes](https://github.com/orestes)
- [#53](https://github.com/coduo/php-humanizer/pull/53) - **Chinese Simplified (zh_CN)** - [@arrowrowe](https://github.com/arrowrowe)

### Changed
- [#65](https://github.com/coduo/php-humanizer/pull/65) - **Oxford french translation** - [@percymamedy](https://github.com/percymamedy)
- [b36457](https://github.com/coduo/php-humanizer/commit/b364572a7a73bed0be62a7d2df382fb1ab35cd2a) - **Merge pull request #65 from percymamedy/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#66](https://github.com/coduo/php-humanizer/pull/66) - **Danish translation** - [@hyperpanic](https://github.com/hyperpanic)
- [7599dd](https://github.com/coduo/php-humanizer/commit/7599dd847f6b72c6c41f9458cfd92092200644e9) - **Merge pull request #66 from radiosignal/danish-translation** - [@norzechowicz](https://github.com/norzechowicz)
- [#61](https://github.com/coduo/php-humanizer/pull/61) - **Shortcode removal utilities** - [@thunderer](https://github.com/thunderer)
- [6bed68](https://github.com/coduo/php-humanizer/commit/6bed6804a97b0489af80ea229616d26a7224b33a) - **Merge pull request #61 from thunderer/string-shortcode-removal** - [@norzechowicz](https://github.com/norzechowicz)
- [a78a55](https://github.com/coduo/php-humanizer/commit/a78a552671dc51f4393b2806097250d0163eee2f) - **Merge pull request #64 from ddmler/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#64](https://github.com/coduo/php-humanizer/pull/64) - **German translation** - [@ddmler](https://github.com/ddmler)
- [3eb227](https://github.com/coduo/php-humanizer/commit/3eb227e710726d04b1905dfc2422370d716611d5) - **Merge pull request #46 from doenietzomoeilijk/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#46](https://github.com/coduo/php-humanizer/pull/46) - **Refactor Number into separate languages** - [@doenietzomoeilijk](https://github.com/doenietzomoeilijk)
- [a68dc7](https://github.com/coduo/php-humanizer/commit/a68dc7326b1991161e423812d454bf51f4c15d5e) - **Update README.md** - [@norzechowicz](https://github.com/norzechowicz)
- [3bcb4b](https://github.com/coduo/php-humanizer/commit/3bcb4b6c204a1d042517bb93e39f45cef1fe8615) - **Merge pull request #54 from Borales/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#58](https://github.com/coduo/php-humanizer/pull/58) - **Remove composer.phar file** - [@vinkla](https://github.com/vinkla)
- [216c9b](https://github.com/coduo/php-humanizer/commit/216c9bbd1f173213a5137306faf5a8a04cab315e) - **Merge pull request #55 from hjason/master** - [@norzechowicz](https://github.com/norzechowicz)
- [5c9bb3](https://github.com/coduo/php-humanizer/commit/5c9bb3393a682126bb8d2d51fcdc77476eef2b83) - **Merge pull request #26 from orestes/es-translation** - [@norzechowicz](https://github.com/norzechowicz)
- [34ef53](https://github.com/coduo/php-humanizer/commit/34ef53fbd42ee7d33999ca4896ea17c2a1cc8a30) - **Update README.md** - [@norzechowicz](https://github.com/norzechowicz)
- [51ea67](https://github.com/coduo/php-humanizer/commit/51ea6720069d822a9b9ef8797d708b7205123517) - **Merge pull request #53 from dyweb/master** - [@norzechowicz](https://github.com/norzechowicz)

### Fixed
- [73e99d](https://github.com/coduo/php-humanizer/commit/73e99d096f9f1bc4f66fbb13fc0a3a6f620f4eea) - **StringTest** - [@hjason2042@gmail.com](#)

## [1.0.8] - 2015-11-06

### Added
- [#52](https://github.com/coduo/php-humanizer/pull/52) - **Indonesian language** - [@naprirfan](https://github.com/naprirfan)
- [#41](https://github.com/coduo/php-humanizer/pull/41) - **russian. Add prefix at format difference.** - [@sam002](https://github.com/sam002)
- [#51](https://github.com/coduo/php-humanizer/pull/51) - **possibility to pass forbidden words into humanizer** - [@norberttech](https://github.com/norberttech)
- [#49](https://github.com/coduo/php-humanizer/pull/49) - **support for multiple character separators at string humanizer** - [@drgomesp](https://github.com/drgomesp)
- [#27](https://github.com/coduo/php-humanizer/pull/27) - **Bulgarian translation** - [@lpopov](https://github.com/lpopov)
- [f65309](https://github.com/coduo/php-humanizer/commit/f6530941c4fb5c109aa593229a3ea3da449b6781) - **the breakpoint in the constructor** - [@smeeckaert](https://github.com/smeeckaert)
- [798d77](https://github.com/coduo/php-humanizer/commit/798d77d6b864b2d46b4c2487f616ea044f08f92c) - **breakpoint tests** - [@smeeckaert](https://github.com/smeeckaert)
- [#38](https://github.com/coduo/php-humanizer/pull/38) - **Dutch Oxford translations.** - [@doenietzomoeilijk](https://github.com/doenietzomoeilijk)
- [#29](https://github.com/coduo/php-humanizer/pull/29) - **Norwegian translation** - [@dagaa](https://github.com/dagaa)
- [#16](https://github.com/coduo/php-humanizer/pull/16) - **Dutch translation.** - [@Ozmodiar](https://github.com/Ozmodiar)

### Changed
- [d6e784](https://github.com/coduo/php-humanizer/commit/d6e784a86b6f2318394fd6b8af853e5180d3ab15) - **Merge pull request #52 from naprirfan/master** - [@norzechowicz](https://github.com/norzechowicz)
- [9d1732](https://github.com/coduo/php-humanizer/commit/9d17321e4259ff8376d5a779c0ad682b4394ae00) - **Merge pull request #47 from mostertb/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#47](https://github.com/coduo/php-humanizer/pull/47) - **Support for optional explicit BinarySuffix precision** - [@mostertb](https://github.com/mostertb)
- [a4d68a](https://github.com/coduo/php-humanizer/commit/a4d68a956478bfe84661ca1f8a6c8984aaba741c) - **Merge pull request #41 from sam002/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#30](https://github.com/coduo/php-humanizer/pull/30) - **TruncateHtml** - [@smeeckaert](https://github.com/smeeckaert)
- [0465bd](https://github.com/coduo/php-humanizer/commit/0465bd058e9b8c26bf9dc00f38fe14a8473f67b7) - **Merge branch 'master' of git://github.com/smeeckaert/php-humanizer into smeeckaert-master** - [@norberttech](https://github.com/norberttech)
- [4a6ed1](https://github.com/coduo/php-humanizer/commit/4a6ed1f15345562df1eede367112d06a9fc41ab3) - **Merge pull request #51 from norzechowicz/humanizer-forbidden-words** - [@norzechowicz](https://github.com/norzechowicz)
- [c0606e](https://github.com/coduo/php-humanizer/commit/c0606e6844a22bc5480a2527d2f043d6a52eb52a) - **Merge pull request #50 from norzechowicz/phpunit** - [@norzechowicz](https://github.com/norzechowicz)
- [#50](https://github.com/coduo/php-humanizer/pull/50) - **Moved integration tests from phpspec into phpunit** - [@norberttech](https://github.com/norberttech)
- [0a04e0](https://github.com/coduo/php-humanizer/commit/0a04e02fbf7ba37a2df8b4c3a5f0b93d0ce9f002) - **Merge pull request #49 from drgomesp/support-multiple-character-separator** - [@norzechowicz](https://github.com/norzechowicz)
- [fe8f03](https://github.com/coduo/php-humanizer/commit/fe8f03731d1349fb24df7eb3d16eeda0b5d6f633) - **Merge pull request #27 from lpopov/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#44](https://github.com/coduo/php-humanizer/pull/44) - **[ADD] Support PSR-4 Composer** - [@Th3Mouk](https://github.com/Th3Mouk)
- [75825a](https://github.com/coduo/php-humanizer/commit/75825a8ca318a3d7c523d3d489dd0547ab6a6b23) - **Merge pull request #44 from Th3Mouk/patch-1** - [@norzechowicz](https://github.com/norzechowicz)
- [#42](https://github.com/coduo/php-humanizer/pull/42) - **Fixes a typo in French** - [@Gnomino](https://github.com/Gnomino)
- [5bbff0](https://github.com/coduo/php-humanizer/commit/5bbff03cebefdf95eaa4cf9c53905c703a471ae4) - **style** - [@smeeckaert](https://github.com/smeeckaert)
- [cc7a56](https://github.com/coduo/php-humanizer/commit/cc7a56a09f31a50bf32a329dea7b65c446e53631) - **refacto truncate** - [@smeeckaert](https://github.com/smeeckaert)
- [a7cb87](https://github.com/coduo/php-humanizer/commit/a7cb8781189fb13d078530a03111bef47af8d04e) - **rename breakpoint len** - [@smeeckaert](https://github.com/smeeckaert)
- [91d107](https://github.com/coduo/php-humanizer/commit/91d1079d1f6eb88ec784d66e71c88da459ae6e37) - **code style** - [@smeeckaert](https://github.com/smeeckaert)
- [dac446](https://github.com/coduo/php-humanizer/commit/dac446bb4bb0a959fb39466b3729bc97060f4449) - **refacto visibility and breakpoint** - [@smeeckaert](https://github.com/smeeckaert)
- [#34](https://github.com/coduo/php-humanizer/pull/34) - **string functions into multibyte string functions** - [@norberttech](https://github.com/norberttech)
- [#35](https://github.com/coduo/php-humanizer/pull/35) - **Oxford italian translations** - [@omissis](https://github.com/omissis)
- [#22](https://github.com/coduo/php-humanizer/pull/22) - **Oxford collection + phpcs fixer cleanup.** - [@defrag](https://github.com/defrag)
- [#33](https://github.com/coduo/php-humanizer/pull/33) - **Truncate check length of append** - [@smeeckaert](https://github.com/smeeckaert)
- [#31](https://github.com/coduo/php-humanizer/pull/31) - **Addition of Portuguese (pt) language translation (with spec tests)** - [@lightglitch](https://github.com/lightglitch)
- [8cdeae](https://github.com/coduo/php-humanizer/commit/8cdeaef54f759d7e9a93c85cbf9e6e7b63dd6e76) - **truncate html** - [@smeeckaert](https://github.com/smeeckaert)
- [#28](https://github.com/coduo/php-humanizer/pull/28) - **Addition of Afrikaans (af) language translation (with spec tests)** - [@sarelvdwalt](https://github.com/sarelvdwalt)
- [#21](https://github.com/coduo/php-humanizer/pull/21) - **More correct wording for Dutch version of "... from now".** - [@Ozmodiar](https://github.com/Ozmodiar)
- [1f9243](https://github.com/coduo/php-humanizer/commit/1f924384c5f7b8bfbced89debac2b67b78511f7a) - **Merge pull request #21 from Ozmodiar/nl-translation** - [@norzechowicz](https://github.com/norzechowicz)
- [f5dafa](https://github.com/coduo/php-humanizer/commit/f5dafa6e721f93306496d3207e646a60c5bb4283) - **Merge pull request #18 from mattallty/patch-1** - [@norzechowicz](https://github.com/norzechowicz)
- [120f11](https://github.com/coduo/php-humanizer/commit/120f118c7051bdde9e9ea1d442cce6a70dfea8d9) - **Merge pull request #19 from NoUseFreak/composer_install** - [@norzechowicz](https://github.com/norzechowicz)
- [#19](https://github.com/coduo/php-humanizer/pull/19) - **Update composer installation instructions.** - [@NoUseFreak](https://github.com/NoUseFreak)
- [158714](https://github.com/coduo/php-humanizer/commit/1587145004b2f97b0562d359ef7c6d46e96295de) - **Merge pull request #16 from Ozmodiar/nl-translation** - [@norzechowicz](https://github.com/norzechowicz)
- [e49510](https://github.com/coduo/php-humanizer/commit/e49510dfd6e381489cfc5976b5683dba5d5e73da) - **Merge pull request #17 from Ozmodiar/readme-parenthesis** - [@norzechowicz](https://github.com/norzechowicz)

### Fixed
- [3c3b83](https://github.com/coduo/php-humanizer/commit/3c3b830fad0f6e436a08b3f1adf20334a6a77604) - **doc** - [@smeeckaert](https://github.com/smeeckaert)
- [#18](https://github.com/coduo/php-humanizer/pull/18) - **typo in french translation** - [@mattallty](https://github.com/mattallty)
- [#17](https://github.com/coduo/php-humanizer/pull/17) - **parenthesis.** - [@Ozmodiar](https://github.com/Ozmodiar)

## [1.0.7] - 2015-10-26

### Added
- [#15](https://github.com/coduo/php-humanizer/pull/15) - **spec for Italian translations** - [@norberttech](https://github.com/norberttech)
- [#14](https://github.com/coduo/php-humanizer/pull/14) - **italian translations.** - [@omissis](https://github.com/omissis)

### Changed
- [a23b8e](https://github.com/coduo/php-humanizer/commit/a23b8e5b32a1b41e8e0d653a2de77ca090f47f8d) - **Merge pull request #15 from norzechowicz/italian-translations-spec** - [@norzechowicz](https://github.com/norzechowicz)
- [0db6f5](https://github.com/coduo/php-humanizer/commit/0db6f5d73b46bf8864b3dfc4823b29aeb97dd326) - **Merge pull request #14 from omissis/italian-translations** - [@norzechowicz](https://github.com/norzechowicz)
- [d05a54](https://github.com/coduo/php-humanizer/commit/d05a5494266fe5bc13e64aaa3c85cb58919fc63f) - **Update README.md** - [@norzechowicz](https://github.com/norzechowicz)

## [1.0.6] - 2015-10-26

### Changed
- [8d7fff](https://github.com/coduo/php-humanizer/commit/8d7fff6382f60b278ddb069d9088d9d35ce26540) - **Rename difference.pt_br.yml to difference.pt_BR.yml** - [@norzechowicz](https://github.com/norzechowicz)

## [1.0.4] - 2015-10-26

### Added
- [#10](https://github.com/coduo/php-humanizer/pull/10) - **translation for Portuguese - Brazil** - [@IgorDePaula](https://github.com/IgorDePaula)
- [c6a594](https://github.com/coduo/php-humanizer/commit/c6a594a57ea3687cb199183b56a232761a81f736) - **specs for FR translations** - [@norberttech](https://github.com/norberttech)

### Changed
- [6051e8](https://github.com/coduo/php-humanizer/commit/6051e89f3bacd816dced8b3d1cb3a07c1b9b0336) - **Merge pull request #12 from marcamon2013/master** - [@norzechowicz](https://github.com/norzechowicz)
- [#12](https://github.com/coduo/php-humanizer/pull/12) - **Translation file added** - [@jebog](https://github.com/jebog)
- [#13](https://github.com/coduo/php-humanizer/pull/13) - **create turkish translation** - [@cnkt](https://github.com/cnkt)
- [e007db](https://github.com/coduo/php-humanizer/commit/e007dbcccdf56ae2021f13b300f78e2fca628d5b) - **Merge pull request #13 from cnkt/master** - [@norzechowicz](https://github.com/norzechowicz)

### Fixed
- [8754ad](https://github.com/coduo/php-humanizer/commit/8754ad1f0e680d547c4197cc48d13d7f0b6ab766) - **Translator Builder regexp, added spec and updated readme for pt_BR translation** - [@norberttech](https://github.com/norberttech)
- [38bc22](https://github.com/coduo/php-humanizer/commit/38bc22377a66d24d3ebda915afa09e83cf3d8581) - **typo in TR translations and added spec** - [@norberttech](https://github.com/norberttech)

## [1.0.3] - 2015-10-24

### Added
- [9c6a59](https://github.com/coduo/php-humanizer/commit/9c6a59981ca6902644c7c35c8deea1cbc994d7c7) - **German locale specs** - [@norberttech](https://github.com/norberttech)

### Changed
- [a91217](https://github.com/coduo/php-humanizer/commit/a91217819c7c1d3a0f6a41182784b98681cb6f83) - **Update README.md** - [@norzechowicz](https://github.com/norzechowicz)
- [c227c3](https://github.com/coduo/php-humanizer/commit/c227c3bfe343ce8322daee67bfb8116add20af1e) - **Rename difference-de.yml to difference.de.yml** - [@norzechowicz](https://github.com/norzechowicz)

## [1.0.2] - 2015-10-24

### Added
- [#11](https://github.com/coduo/php-humanizer/pull/11) - **german translation** - [@tbreuss](https://github.com/tbreuss)

### Changed
- [9cb14a](https://github.com/coduo/php-humanizer/commit/9cb14aa8c77d6dc6aaff87770680251c993c0b79) - **Merge pull request #11 from tbreuss/master** - [@norzechowicz](https://github.com/norzechowicz)

## [1.0.1] - 2015-07-14

### Changed
- [#9](https://github.com/coduo/php-humanizer/pull/9) - **Test lowest version of dependencies** - [@norberttech](https://github.com/norberttech)
- [97fee0](https://github.com/coduo/php-humanizer/commit/97fee0dbe7999c4305a3de686f9fdc6b3502796e) - **Merge pull request #9 from norzechowicz/test-lowest-dependencies** - [@norzechowicz](https://github.com/norzechowicz)
- [d97917](https://github.com/coduo/php-humanizer/commit/d979178d45d631d9acd98394b90be3ff345c8c02) - **Update README.md** - [@defrag](https://github.com/defrag)
- [80500c](https://github.com/coduo/php-humanizer/commit/80500c5c50e45f0346af394e3031307923d59b5f) - **Update README.md** - [@defrag](https://github.com/defrag)
- [59a604](https://github.com/coduo/php-humanizer/commit/59a6045a716ec63bfb335ea326ce4ee82cf5a4f7) - **Update README.md** - [@defrag](https://github.com/defrag)

## [1.0.0] - 2014-06-12

### Added
- [#8](https://github.com/coduo/php-humanizer/pull/8) - **missing require for symfony/yaml in composer.json** - [@dedik](https://github.com/dedik)
- [#4](https://github.com/coduo/php-humanizer/pull/4) - **truncate operation** - [@norberttech](https://github.com/norberttech)
- [#3](https://github.com/coduo/php-humanizer/pull/3) - **roman converters** - [@defrag](https://github.com/defrag)
- [#1](https://github.com/coduo/php-humanizer/pull/1) - **number and oridinalize** - [@defrag](https://github.com/defrag)
- [192a29](https://github.com/coduo/php-humanizer/commit/192a29e78fb2fe8595da1a43580a0a2f7914399c) - **travis configuration** - [@norberttech](https://github.com/norberttech)

### Changed
- [b5a504](https://github.com/coduo/php-humanizer/commit/b5a504fec092d6d41391a1de6db09eb756e51895) - **Merge pull request #8 from dedik/master** - [@norberttech](https://github.com/norberttech)
- [673cc6](https://github.com/coduo/php-humanizer/commit/673cc617a158c83056ae7d1647467ef771a4fdbf) - **Update README.md** - [@defrag](https://github.com/defrag)
- [e5906b](https://github.com/coduo/php-humanizer/commit/e5906b5ea334a52960fab67f465246079fe971e3) - **Update README.md** - [@defrag](https://github.com/defrag)
- [43ba95](https://github.com/coduo/php-humanizer/commit/43ba95d307ae00d480393cce368491f62deee4f7) - **Merge pull request #7 from defrag/precise-date-fix** - [@norberttech](https://github.com/norberttech)
- [#6](https://github.com/coduo/php-humanizer/pull/6) - **Precise diffs** - [@defrag](https://github.com/defrag)
- [08b9d1](https://github.com/coduo/php-humanizer/commit/08b9d1b4f35d3f5846fb187248548d2148a261e5) - **Merge pull request #6 from defrag/precise-diff** - [@norberttech](https://github.com/norberttech)
- [7438be](https://github.com/coduo/php-humanizer/commit/7438be84cdc9831215bf99f83601ce3c4abfeb1e) - **Merge pull request #5 from norzechowicz/time** - [@defrag](https://github.com/defrag)
- [#5](https://github.com/coduo/php-humanizer/pull/5) - **[WIP] Introduce time difference humanizer** - [@norberttech](https://github.com/norberttech)
- [618179](https://github.com/coduo/php-humanizer/commit/618179735f5583ca8d425a8ccf375ce0afd22e55) - **Merge pull request #4 from norzechowicz/truncate** - [@defrag](https://github.com/defrag)
- [711775](https://github.com/coduo/php-humanizer/commit/71177557d8d4bc7b95e10170c34cd176a8287e38) - **Moved library to Coduo organization** - [@norberttech](https://github.com/norberttech)
- [6815c6](https://github.com/coduo/php-humanizer/commit/6815c651a7570802ccc5beaf3e6408e6abab1caa) - **Merge pull request #3 from defrag/roman** - [@norberttech](https://github.com/norberttech)
- [cee3c3](https://github.com/coduo/php-humanizer/commit/cee3c34860042bb93ce73d39ea32fd6b9acef3d1) - **Update readme** - [@norberttech](https://github.com/norberttech)
- [fda9db](https://github.com/coduo/php-humanizer/commit/fda9db3ef94591e80d627517390c42d688021d7a) - **Merge remote-tracking branch 'origin/master'** - [@norberttech](https://github.com/norberttech)
- [fd51e9](https://github.com/coduo/php-humanizer/commit/fd51e914d98d28943a34a3fea9237f4a8c6c7e90) - **Metric suffix** - [@norberttech](https://github.com/norberttech)
- [7b7d4e](https://github.com/coduo/php-humanizer/commit/7b7d4e4453211e1975f3004a74670e6ebdbecb1c) - **Merge pull request #2 from pborreli/typos** - [@norberttech](https://github.com/norberttech)
- [720bec](https://github.com/coduo/php-humanizer/commit/720becd16f48140d94a983e5eaa6c4e1b9879442) - **Update README.md** - [@norberttech](https://github.com/norberttech)
- [e62090](https://github.com/coduo/php-humanizer/commit/e62090a6ba103a63718fd17a5d6a0001f007ecac) - **Update README.md** - [@norberttech](https://github.com/norberttech)
- [d7fd45](https://github.com/coduo/php-humanizer/commit/d7fd45f39377298e35922843cfe004497898cf18) - **Binary suffix converter** - [@norberttech](https://github.com/norberttech)
- [65564e](https://github.com/coduo/php-humanizer/commit/65564e1202be4e67822e40c366dd36836bdec70a) - **Refactoring** - [@norberttech](https://github.com/norberttech)
- [58f3d5](https://github.com/coduo/php-humanizer/commit/58f3d560caba8ec66ca57ef66cc3e598ee5eb230) - **Merge pull request #1 from defrag/number** - [@norberttech](https://github.com/norberttech)
- [35d7e6](https://github.com/coduo/php-humanizer/commit/35d7e69c62e653f2f180b96597002bf143f79ec0) - **String humanize introduction** - [@norberttech](https://github.com/norberttech)
- [e2bfc6](https://github.com/coduo/php-humanizer/commit/e2bfc680b3f339f6bf2f6e39ce9a17f02eeaebbe) - **Initial commit** - [@norberttech](https://github.com/norberttech)

### Fixed
- [#7](https://github.com/coduo/php-humanizer/pull/7) - **precise date calculations** - [@defrag](https://github.com/defrag)
- [#2](https://github.com/coduo/php-humanizer/pull/2) - **typos** - [@pborreli](https://github.com/pborreli)

## Contributors

- @4t87ux8
- @a-ungurianu
- @arrowrowe
- @Borales
- @brianwozeniak
- @cnkt
- @dagaa
- @ddmler
- @dedik
- @defrag
- @dizzy7
- @doenietzomoeilijk
- @drgomesp
- @Forst
- @Gnomino
- @hjason2042@gmail.com
- @hyperpanic
- @IgorDePaula
- @isnani
- @jebog
- @jerony-mo
- @jfcherng
- @lightglitch
- @lpopov
- @martinbutt
- @mattallty
- @mostertb
- @naprirfan
- @norberttech
- @norzechowicz
- @NoUseFreak
- @nwatth
- @omissis
- @orestes
- @Ozmodiar
- @pborreli
- @percymamedy
- @peter279k
- @sam002
- @sarelvdwalt
- @serima
- @smeeckaert
- @tbreuss
- @Th3Mouk
- @thunderer
- @vinicius73
- @vinkla

Generated by [Automation](https://github.com/aeon-php/automation)