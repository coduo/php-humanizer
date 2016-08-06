<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\CollectionHumanizer;

final class CollectionHumanizerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider oxfordCollectionProvider
     */
    function test_oxford_collections_humanizing($collection, $limit, $locale, $expectedResult)
    {
        $this->assertEquals($expectedResult, CollectionHumanizer::oxford($collection, $limit, $locale));
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

            // Chinese Simplified
            array(array("Michal"), null, 'zh_CN', 'Michal'),
            array(array("Michal", "Norbert"), null, 'zh_CN', 'Michal 和 Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'zh_CN', 'Michal, Norbert 和另一个'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'zh_CN', 'Michal, Norbert 和另 2 个'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'zh_CN', 'Michal, Norbert, Lukasz, 和 Pawel'),

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

            // Russian
            array(array("Michal"), null, 'ru', 'Michal'),
            array(array("Michal", "Norbert"), null, 'ru', 'Michal и Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'ru', 'Michal, Norbert и ещё 1'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'ru', 'Michal, Norbert и ещё 2'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'ru', 'Michal, Norbert, Lukasz и Pawel'),

            // Indonesian
            array(array("Michal"), null, 'id', 'Michal'),
            array(array("Michal", "Norbert"), null, 'id', 'Michal dan Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'id', 'Michal, Norbert, dan 1 lainnya'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'id', 'Michal, Norbert, dan 2 lainnya'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'id', 'Michal, Norbert, Lukasz, dan Pawel'),

            // Ukrainian
            array(array("Michal"), null, 'uk', 'Michal'),
            array(array("Michal", "Norbert"), null, 'uk', 'Michal та Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'uk', 'Michal, Norbert і ще 1'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'uk', 'Michal, Norbert і ще 2'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'uk', 'Michal, Norbert, Lukasz та Pawel'),

            // Thai
            array(array("Michal"), null, 'th', 'Michal'),
            array(array("Michal", "Norbert"), null, 'th', 'Michal และ Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'th', 'Michal, Norbert และอีก 1'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'th', 'Michal, Norbert และอีก 2'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'th', 'Michal, Norbert, Lukasz และ Pawel'),

            // Japanese
            array(array("Michal"), null, 'ja', 'Michal'),
            array(array("Michal", "Norbert"), null, 'ja', 'Michal と Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'ja', 'Michal, Norbert ともうひとり'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'ja', 'Michal, Norbert ともう 2 人'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'ja', 'Michal, Norbert, Lukasz と Pawel'),
        );
    }
}
