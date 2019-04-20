<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\CollectionHumanizer;

final class CollectionHumanizerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider oxfordCollectionProvider
     */
    public function test_oxford_collections_humanizing($collection, $limit, $locale, $expectedResult)
    {
        $this->assertEquals($expectedResult, CollectionHumanizer::oxford($collection, $limit, $locale));
    }

    public function oxfordCollectionProvider()
    {
        return [
            // English
            [['Michal'], null, 'en', 'Michal'],
            [['Michal', 'Norbert'], null, 'en', 'Michal and Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'en', 'Michal, Norbert, and 1 other'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'en', 'Michal, Norbert, and 2 others'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'en', 'Michal, Norbert, Lukasz, and Pawel'],

            // Chinese Simplified
            [['Michal'], null, 'zh_CN', 'Michal'],
            [['Michal', 'Norbert'], null, 'zh_CN', 'Michal 和 Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'zh_CN', 'Michal, Norbert 和另一个'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'zh_CN', 'Michal, Norbert 和另 2 个'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'zh_CN', 'Michal, Norbert, Lukasz, 和 Pawel'],

            // Polish
            [['Michal'], null, 'pl', 'Michal'],
            [['Michal', 'Norbert'], null, 'pl', 'Michal i Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'pl', 'Michal, Norbert i 1 inny'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'pl', 'Michal, Norbert i 2 innych'],

            // Dutch
            [['Michal'], null, 'nl', 'Michal'],
            [['Michal', 'Norbert'], null, 'nl', 'Michal en Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'nl', 'Michal, Norbert, en 1 andere'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'nl', 'Michal, Norbert, en 2 andere'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'nl', 'Michal, Norbert, Lukasz, en Pawel'],

            // Russian
            [['Michal'], null, 'ru', 'Michal'],
            [['Michal', 'Norbert'], null, 'ru', 'Michal и Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'ru', 'Michal, Norbert и ещё 1'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'ru', 'Michal, Norbert и ещё 2'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'ru', 'Michal, Norbert, Lukasz и Pawel'],

            // Indonesian
            [['Michal'], null, 'id', 'Michal'],
            [['Michal', 'Norbert'], null, 'id', 'Michal dan Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'id', 'Michal, Norbert, dan 1 lainnya'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'id', 'Michal, Norbert, dan 2 lainnya'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'id', 'Michal, Norbert, Lukasz, dan Pawel'],

            // Ukrainian
            [['Michal'], null, 'uk', 'Michal'],
            [['Michal', 'Norbert'], null, 'uk', 'Michal та Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'uk', 'Michal, Norbert і ще 1'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'uk', 'Michal, Norbert і ще 2'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'uk', 'Michal, Norbert, Lukasz та Pawel'],

            // Thai
            [['Michal'], null, 'th', 'Michal'],
            [['Michal', 'Norbert'], null, 'th', 'Michal และ Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'th', 'Michal, Norbert และอีก 1'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'th', 'Michal, Norbert และอีก 2'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'th', 'Michal, Norbert, Lukasz และ Pawel'],

            // Japanese
            [['Michal'], null, 'ja', 'Michal'],
            [['Michal', 'Norbert'], null, 'ja', 'Michal と Norbert'],
            [['Michal', 'Norbert', 'Lukasz'], 2, 'ja', 'Michal, Norbert ともうひとり'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], 2, 'ja', 'Michal, Norbert ともう 2 人'],
            [['Michal', 'Norbert', 'Lukasz', 'Pawel'], null, 'ja', 'Michal, Norbert, Lukasz と Pawel'],
        ];
    }
}
