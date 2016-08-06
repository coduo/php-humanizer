<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\DateTimeHumanizer;

class DateTimeHumanizerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider humanizeDataProvider
     *
     * @param        $firstDate
     * @param        $secondDate
     * @param        $expected
     * @param string $locale
     */
    public function test_humanize_difference_between_dates($firstDate, $secondDate, $expected, $locale)
    {
        $this->assertEquals($expected, DateTimeHumanizer::difference(new \DateTime($firstDate), new \DateTime($secondDate), $locale));
    }

    /**
     * @dataProvider preciseDifferenceDataProvider
     *
     * @param        $firstDate
     * @param        $secondDate
     * @param        $expected
     * @param string $locale
     */
    public function test_humanize_precise_difference_between_dates($firstDate, $secondDate, $expected, $locale)
    {
        $this->assertEquals($expected, DateTimeHumanizer::preciseDifference(new \DateTime($firstDate), new \DateTime($secondDate), $locale));
    }

    /**
     * @return array
     */
    public function humanizeDataProvider()
    {
        return array(
            // English
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'just now', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 seconds from now', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 minute ago', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minutes ago', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 minutes from now', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 hour from now', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 hours from now', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 hour ago', 'en'),
            array("2014-04-26", "2014-04-25", '1 day ago', 'en'),
            array("2014-04-26", "2014-04-24", '2 days ago', 'en'),
            array("2014-04-26", "2014-04-28", '2 days from now', 'en'),
            array("2014-04-01", "2014-04-15", '2 weeks from now', 'en'),
            array("2014-04-15", "2014-04-07", '1 week ago', 'en'),
            array("2014-01-01", "2014-04-01", '3 months from now', 'en'),
            array("2014-05-01", "2014-04-01", '1 month ago', 'en'),
            array("2015-05-01", "2014-04-01", '1 year ago', 'en'),
            array("2014-05-01", "2016-04-01", '2 years from now', 'en'),

            // Chinese Simplified
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", '刚刚', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 秒后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 分钟前', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 分钟前', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 分钟后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 小时后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 小时后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 小时前', 'zh_CN'),
            array("2014-04-26", "2014-04-25", '1 天前', 'zh_CN'),
            array("2014-04-26", "2014-04-24", '2 天前', 'zh_CN'),
            array("2014-04-26", "2014-04-28", '2 天后', 'zh_CN'),
            array("2014-04-01", "2014-04-15", '2 周后', 'zh_CN'),
            array("2014-04-15", "2014-04-07", '1 周前', 'zh_CN'),
            array("2014-01-01", "2014-04-01", '3 个月后', 'zh_CN'),
            array("2014-05-01", "2014-04-01", '1 个月前', 'zh_CN'),
            array("2015-05-01", "2014-04-01", '1 年前', 'zh_CN'),
            array("2014-05-01", "2016-04-01", '2 年后', 'zh_CN'),

            // Polish
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'w tym momencie', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'za 5 sekund', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", 'minutę temu', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minut temu', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'za 15 minut', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'za godzinę', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'za 2 godziny', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", 'godzinę temu', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'za 2 godziny', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", 'godzinę temu', 'pl'),
            array("2014-04-26", "2014-04-25", 'wczoraj', 'pl'),
            array("2014-04-26", "2014-04-24", '2 dni temu', 'pl'),
            array("2014-04-26", "2014-04-28", 'za 2 dni', 'pl'),
            array("2014-04-01", "2014-04-15", 'za 2 tygodnie', 'pl'),
            array("2014-04-15", "2014-04-07", 'tydzień temu', 'pl'),
            array("2014-01-01", "2014-04-01", 'za 3 miesiące', 'pl'),
            array("2014-05-01", "2014-04-01", 'miesiąc temu', 'pl'),
            array("2015-05-01", "2014-04-01", 'rok temu', 'pl'),
            array("2014-05-01", "2016-04-01", 'za 2 lata', 'pl'),
            array("2014-05-01", "2009-04-01", '5 lat temu', 'pl'),

            // Bulgarian
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'в момента', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'след 5 секунди', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", 'преди 1 минута', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", 'преди 15 минути', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'след 15 минути', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'след 1 час', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'след 2 часа', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", 'преди 1 час', 'bg'),
            array("2014-04-26", "2014-04-25", 'преди 1 ден', 'bg'),
            array("2014-04-26", "2014-04-24", 'преди 2 дни', 'bg'),
            array("2014-04-26", "2014-04-28", 'след 2 дни', 'bg'),
            array("2014-04-01", "2014-04-15", 'след 2 седмици', 'bg'),
            array("2014-04-15", "2014-04-07", 'преди 1 седмица', 'bg'),
            array("2014-01-01", "2014-04-01", 'след 3 месеца', 'bg'),
            array("2014-05-01", "2014-04-01", 'преди 1 месец', 'bg'),
            array("2015-05-01", "2014-04-01", 'преди 1 година', 'bg'),
            array("2014-05-01", "2016-04-01", 'след 2 години', 'bg'),

            // Russian
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'сейчас', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'через 5 секунд', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 минуту назад', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 минут назад', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'через 15 минут', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'через 1 час', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'через 2 часа', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 час назад', 'ru'),
            array("2014-04-26 14:00:00", "2014-04-26 12:00:00", '2 часа назад', 'ru'),
            array("2014-04-26", "2014-04-25", '1 день назад', 'ru'),
            array("2014-04-26", "2014-04-24", '2 дня назад', 'ru'),
            array("2014-04-26", "2014-04-28", 'через 2 дня', 'ru'),
            array("2014-04-01", "2014-04-15", 'через 2 недели', 'ru'),
            array("2014-04-15", "2014-04-07", '1 неделю назад', 'ru'),
            array("2014-01-01", "2014-04-01", 'через 3 месяца', 'ru'),
            array("2014-05-01", "2014-04-01", '1 месяц назад', 'ru'),
            array("2015-05-01", "2014-04-01", '1 год назад', 'ru'),
            array("2014-05-01", "2016-04-01", 'через 2 года', 'ru'),

            // Indonesian
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'baru saja', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 detik dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 menit yang lalu', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 menit yang lalu', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 menit dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 jam dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 jam dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 jam yang lalu', 'id'),
            array("2014-04-26", "2014-04-25", '1 hari yang lalu', 'id'),
            array("2014-04-26", "2014-04-24", '2 hari yang lalu', 'id'),
            array("2014-04-26", "2014-04-28", '2 hari dari sekarang', 'id'),
            array("2014-04-01", "2014-04-15", '2 minggu dari sekarang', 'id'),
            array("2014-04-15", "2014-04-07", '1 minggu yang lalu', 'id'),
            array("2014-01-01", "2014-04-01", '3 bulan dari sekarang', 'id'),
            array("2014-05-01", "2014-04-01", '1 bulan yang lalu', 'id'),
            array("2015-05-01", "2014-04-01", '1 tahun yang lalu', 'id'),
            array("2014-05-01", "2016-04-01", '2 tahun dari sekarang', 'id'),
            
            // Spanish
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'ahora mismo', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'dentro de 5 segundos', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", 'hace 1 minuto', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", 'hace 15 minutos', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'dentro de 15 minutos', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'dentro de 1 hora', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'dentro de 2 horas', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", 'hace 1 hora', 'es'),
            array("2014-04-26", "2014-04-25", 'hace 1 día', 'es'),
            array("2014-04-26", "2014-04-24", 'hace 2 días', 'es'),
            array("2014-04-26", "2014-04-28", 'dentro de 2 días', 'es'),
            array("2014-04-01", "2014-04-15", 'dentro de 2 semanas', 'es'),
            array("2014-04-15", "2014-04-07", 'hace 1 semana', 'es'),
            array("2014-01-01", "2014-04-01", 'dentro de 3 meses', 'es'),
            array("2014-05-01", "2014-04-01", 'hace 1 mes', 'es'),
            array("2015-05-01", "2014-04-01", 'hace 1 año', 'es'),
            array("2014-05-01", "2016-04-01", 'dentro de 2 años', 'es'),

            // Ukrainian
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'зараз', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'через 5 секунд', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 хвилину тому', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 хвилин тому', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'через 15 хвилин', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'через 1 годину', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'через 2 години', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 годину тому', 'uk'),
            array("2014-04-26", "2014-04-25", '1 день тому', 'uk'),
            array("2014-04-26", "2014-04-24", '2 дні тому', 'uk'),
            array("2014-04-26", "2014-04-28", 'через 2 дні', 'uk'),
            array("2014-04-01", "2014-04-15", 'через 2 тижні', 'uk'),
            array("2014-04-15", "2014-04-07", '1 тиждень тому', 'uk'),
            array("2014-01-01", "2014-04-01", 'через 3 місяці', 'uk'),
            array("2014-05-01", "2014-04-01", '1 місяць тому', 'uk'),
            array("2015-05-01", "2014-04-01", '1 рік тому', 'uk'),
            array("2014-05-01", "2016-04-01", 'через 2 роки', 'uk'),

            // Danish
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", "lige nu", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", "5 sekunder fra nu", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", "1 minut siden", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", "15 minutter siden", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", "15 minutter fra nu", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", "1 time fra nu", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", "2 timer fra nu", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", "1 time siden", "da"),
            array("2014-04-26", "2014-04-25", "1 dag siden", "da"),
            array("2014-04-26", "2014-04-24", "2 dage siden", "da"),
            array("2014-04-26", "2014-04-28", "2 dage fra nu", "da"),
            array("2014-04-01", "2014-04-15", "2 uger fra nu", "da"),
            array("2014-04-15", "2014-04-07", "1 uge siden", "da"),
            array("2014-01-01", "2014-04-01", "3 måneder fra nu", "da"),
            array("2014-05-01", "2014-04-01", "1 måned siden", "da"),
            array("2015-05-01", "2014-04-01", "1 år siden", "da"),
            array("2014-05-01", "2016-04-01", "2 år fra nu", "da"),

            // Thai
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'เมื่อสักครู่', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'อีก 5 วินาที', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 นาทีที่แล้ว', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 นาทีที่แล้ว', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'อีก 15 นาที', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'อีก 1 ชั่วโมง', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'อีก 2 ชั่วโมง', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 ชั่วโมงที่แล้ว', 'th'),
            array("2014-04-26", "2014-04-25", '1 วันที่แล้ว', 'th'),
            array("2014-04-26", "2014-04-24", '2 วันที่แล้ว', 'th'),
            array("2014-04-26", "2014-04-28", 'อีก 2 วัน', 'th'),
            array("2014-04-01", "2014-04-15", 'อีก 2 สัปดาห์', 'th'),
            array("2014-04-15", "2014-04-07", '1 สัปดาห์ที่แล้ว', 'th'),
            array("2014-01-01", "2014-04-01", 'อีก 3 เดือน', 'th'),
            array("2014-05-01", "2014-04-01", '1 เดือนที่แล้ว', 'th'),
            array("2015-05-01", "2014-04-01", '1 ปีที่แล้ว', 'th'),
            array("2014-05-01", "2016-04-01", 'อีก 2 ปี', 'th'),

            // Japanese
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'たった今', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 秒後', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 分前', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 分前', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 分後', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 時間後', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 時間後', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 時間前', 'ja'),
            array("2014-04-26", "2014-04-25", '1 日前', 'ja'),
            array("2014-04-26", "2014-04-24", '2 日前', 'ja'),
            array("2014-04-26", "2014-04-28", '2 日後', 'ja'),
            array("2014-04-01", "2014-04-15", '2 週間後', 'ja'),
            array("2014-04-15", "2014-04-07", '1 週間前', 'ja'),
            array("2014-01-01", "2014-04-01", '3 ヶ月後', 'ja'),
            array("2014-05-01", "2014-04-01", '1 ヶ月前', 'ja'),
            array("2015-05-01", "2014-04-01", '1 年前', 'ja'),
            array("2014-05-01", "2016-04-01", '2 年後', 'ja'),
        );
    }

    /**
     * @return array
     */
    public function preciseDifferenceDataProvider()
    {
        return array(
            // English
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minute, 45 seconds ago', 'en'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 hour, 40 minutes ago', 'en'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 day, 15 minutes from now', 'en'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 days, 2 hours from now', 'en'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 year, 2 days, 4 hours from now', 'en'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 days, 10 hours from now', 'en'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 day, 1 hour, 40 minutes ago', 'en'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 years, 1 day from now', 'en'),

            // Chinese Simplified
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 分钟, 45 秒前', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 小时, 40 分钟前', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 天, 15 分钟后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 天, 2 小时后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 年, 2 天, 4 小时后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 天, 10 小时后', 'zh_CN'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 天, 1 小时, 40 分钟前', 'zh_CN'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 年, 1 天后', 'zh_CN'),

            // Polish
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuta, 45 sekund temu', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 godzina, 40 minut temu', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dzień, 15 minut od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dni, 2 godziny od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 rok, 2 dni, 4 godziny od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dni, 10 godzin od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dzień, 1 godzina, 40 minut temu', 'pl'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 lata, 1 dzień od teraz', 'pl'),

            // German
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", 'vor 1 Minute, 45 Sekunden', 'de'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", 'vor 1 Stunde, 40 Minuten', 'de'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", 'in 1 Tag, 15 Minuten', 'de'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", 'in 7 Tagen, 2 Stunden', 'de'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", 'in 1 Jahr, 2 Tagen, 4 Stunden', 'de'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", 'in 2 Tagen, 10 Stunden', 'de'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", 'vor 1 Tag, 1 Stunde, 40 Minuten', 'de'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", 'in 2 Jahren, 1 Tag', 'de'),

            // Turkish
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 dakika, 45 saniye önce', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 saat, 40 dakika önce', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 gün, 15 dakika sonra', 'tr'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 gün, 2 saat sonra', 'tr'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 yıl, 2 gün, 4 saat sonra', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 gün, 10 saat sonra', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 gün, 1 saat, 40 dakika önce', 'tr'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 yıl, 1 gün sonra', 'tr'),

            // French
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minute, 45 secondes il y a', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 heure, 40 minutes il y a', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 jour, 15 minutes maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 jours, 2 heures maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 année, 2 jours, 4 heures maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 jours, 10 heures maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 jour, 1 heure, 40 minutes il y a', 'fr'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 années, 1 jour maintenant', 'fr'),

            // Português - Brasil
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuto, 45 segundos atrás', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 hora, 40 minutos atrás', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dia, 15 minutos a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dias, 2 horas a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 ano, 2 dias, 4 horas a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dias, 10 horas a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dia, 1 hora, 40 minutos atrás', 'pt_BR'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 anos, 1 dia a partir de agora', 'pt_BR'),

            // Italian
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuto, 45 secondi fa', 'it'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 ora, 40 minuti fa', 'it'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 giorno, 15 minuti da adesso', 'it'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 giorni, 2 ore da adesso', 'it'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 anno, 2 giorni, 4 ore da adesso', 'it'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 giorni, 10 ore da adesso', 'it'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 giorno, 1 ora, 40 minuti fa', 'it'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 anni, 1 giorno da adesso', 'it'),

            // Norwegian
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minutt, 45 sekunder siden', 'no'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 time, 40 minutter siden', 'no'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dag, 15 minutter fra nå', 'no'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dager, 2 timer fra nå', 'no'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 år, 2 dager, 4 timer fra nå', 'no'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dager, 10 timer fra nå', 'no'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dag, 1 time, 40 minutter siden', 'no'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 år, 1 dag fra nå', 'no'),

            // Bulgarian
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 минута, 45 секунди преди това', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 час, 40 минути преди това', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 ден, 15 минути след това', 'bg'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 дни, 2 часа след това', 'bg'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 година, 2 дни, 4 часа след това', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 дни, 10 часа след това', 'bg'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 ден, 1 час, 40 минути преди това', 'bg'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 години, 1 ден след това', 'bg'),

            // Afrikaans
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuut, 45 sekondes gelede', 'af'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 uur, 40 minute gelede', 'af'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dag, 15 minute van nou af', 'af'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dae, 2 ure van nou af', 'af'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 jaar, 2 dae, 4 ure van nou af', 'af'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dae, 10 ure van nou af', 'af'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dag, 1 uur, 40 minute gelede', 'af'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 jaar, 1 dag van nou af', 'af'),

            // Russian
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 минута, 45 секунд назад', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 час, 40 минут назад', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", 'через 1 день, 15 минут', 'ru'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", 'через 7 дней, 2 часа', 'ru'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", 'через 1 год, 2 дня, 4 часа', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", 'через 2 дня, 10 часов', 'ru'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 день, 1 час, 40 минут назад', 'ru'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", 'через 2 года, 1 день', 'ru'),

            // Indonesian
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 menit, 45 detik yang lalu', 'id'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 jam, 40 menit yang lalu', 'id'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 hari, 15 menit dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 hari, 2 jam dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 tahun, 2 hari, 4 jam dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 hari, 10 jam dari sekarang', 'id'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 hari, 1 jam, 40 menit yang lalu', 'id'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 tahun, 1 hari dari sekarang', 'id'),

            // Spanish
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", 'hace 1 minuto, 45 segundos', 'es'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", 'hace 1 hora, 40 minutos', 'es'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", 'dentro de 1 día, 15 minutos', 'es'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", 'dentro de 7 días, 2 horas', 'es'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", 'dentro de 1 año, 2 días, 4 horas', 'es'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", 'dentro de 2 días, 10 horas', 'es'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", 'hace 1 día, 1 hora, 40 minutos', 'es'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", 'dentro de 2 años, 1 día', 'es'),

            // Ukrainian
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 хвилина, 45 секунд тому', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 година, 40 хвилин тому', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", 'через 1 день, 15 хвилин', 'uk'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", 'через 7 днів, 2 години', 'uk'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", 'через 1 рік, 2 дні, 4 години', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", 'через 2 дні, 10 годин', 'uk'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 день, 1 година, 40 хвилин тому', 'uk'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", 'через 2 роки, 1 день', 'uk'),

            // Danish
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", "1 minut, 45 sekunder siden", "da"),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", "1 time, 40 minutter siden", "da"),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", "1 dag, 15 minutter fra nu", "da"),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", "7 dage, 2 timer fra nu", "da"),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", "1 år, 2 dage, 4 timer fra nu", "da"),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", "2 dage, 10 timer fra nu", "da"),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", "1 dag, 1 time, 40 minutter siden", "da"),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", "2 år, 1 dag fra nu", "da"),

            // Thai
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 นาที, 45 วินาทีที่แล้ว', 'th'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 ชั่วโมง, 40 นาทีที่แล้ว', 'th'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", 'อีก 1 วัน, 15 นาที', 'th'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", 'อีก 7 วัน, 2 ชั่วโมง', 'th'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", 'อีก 1 ปี, 2 วัน, 4 ชั่วโมง', 'th'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", 'อีก 2 วัน, 10 ชั่วโมง', 'th'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 วัน, 1 ชั่วโมง, 40 นาทีที่แล้ว', 'th'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", 'อีก 2 ปี, 1 วัน', 'th'),

            // Japanese
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 分, 45 秒前', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 時間, 40 分前', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 日, 15 分後', 'ja'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 日, 2 時間後', 'ja'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 年, 2 日, 4 時間後', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 日, 10 時間後', 'ja'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 日, 1 時間, 40 分前', 'ja'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 年, 1 日後', 'ja'),
        );
    }
}
