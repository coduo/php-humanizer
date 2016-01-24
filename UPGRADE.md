# Upgrade 1.0 to 2.0

* All classes are now marked as final in order to close extra extension points 
* Renamed ``Coduo\PHPHumanizer\Collection`` into ``Coduo\PHPHumanizer\CollectionHumanizer``
* Renamed ``Coduo\PHPHumanizer\DateTime`` into ``Coduo\PHPHumanizer\DateTimeHumanizer``
* Renamed ``Coduo\PHPHumanizer\Number`` into ``Coduo\PHPHumanizer\NumberHumanizer``
* Renamed ``Coduo\PHPHumanizer\String`` into ``Coduo\PHPHumanizer\StringHumanizer``
* Replaced ``ordinalSuffix($number)`` method in ``Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface`` with ``isPrefix()`` and ``ordinalIndicator($number)``
* Dependency ``thunderer/shortcode`` was removed, now shortcode lib needs to be added to project