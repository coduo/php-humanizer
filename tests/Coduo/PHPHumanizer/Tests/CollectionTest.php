<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\Collection;

final class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider oxfordCollectionProvider
     */
    function test_oxford_collections_humanizing($collection, $limit, $locale, $expectedResult)
    {
        $this->assertEquals($expectedResult, Collection::oxford($collection, $limit, $locale));
    }
    
    public function oxfordCollectionProvider()
    {
        return array(
            // English
            array(array("Michal"), null, 'en', 'Michal'),
            array(array("Michal", "Norbert"), null, 'en', 'Michal and Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'en', 'Michal, Norbert, and 1 other'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'en', 'Michal, Norbert, and 2 others'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'en', 'Michal, Norbert, Lukasz, and Pawel'),

            // Polish
            array(array("Michal"), null, 'pl', 'Michal'),
            array(array("Michal", "Norbert"), null, 'pl', 'Michal i Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'pl', 'Michal, Norbert i 1 inny'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'pl', 'Michal, Norbert i 2 innych'),

            // Dutch
            array(array("Michal"), null, 'nl', 'Michal'),
            array(array("Michal", "Norbert"), null, 'nl', 'Michal en Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'nl', 'Michal, Norbert, en 1 andere'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'nl', 'Michal, Norbert, en 2 andere'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'nl', 'Michal, Norbert, Lukasz, en Pawel'),
        );
    }
}