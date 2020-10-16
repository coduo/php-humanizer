<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\DateTimeHumanizer;
use PHPUnit\Framework\TestCase;

class DateTimeHumanizerTest extends TestCase
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
        return [
            // English
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'just now', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', '5 seconds from now', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 minute ago', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 minutes ago', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', '15 minutes from now', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', '1 hour from now', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', '2 hours from now', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 hour ago', 'en'],
            ['2014-04-26', '2014-04-25', '1 day ago', 'en'],
            ['2014-04-26', '2014-04-24', '2 days ago', 'en'],
            ['2014-04-26', '2014-04-28', '2 days from now', 'en'],
            ['2014-04-01', '2014-04-15', '2 weeks from now', 'en'],
            ['2014-04-15', '2014-04-07', '1 week ago', 'en'],
            ['2014-01-01', '2014-04-01', '3 months from now', 'en'],
            ['2014-05-01', '2014-04-01', '1 month ago', 'en'],
            ['2015-05-01', '2014-04-01', '1 year ago', 'en'],
            ['2014-05-01', '2016-04-01', '2 years from now', 'en'],

            // Chinese Simplified
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', '刚刚', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', '5 秒后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 分钟前', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 分钟前', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', '15 分钟后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', '1 小时后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', '2 小时后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 小时前', 'zh_CN'],
            ['2014-04-26', '2014-04-25', '1 天前', 'zh_CN'],
            ['2014-04-26', '2014-04-24', '2 天前', 'zh_CN'],
            ['2014-04-26', '2014-04-28', '2 天后', 'zh_CN'],
            ['2014-04-01', '2014-04-15', '2 周后', 'zh_CN'],
            ['2014-04-15', '2014-04-07', '1 周前', 'zh_CN'],
            ['2014-01-01', '2014-04-01', '3 个月后', 'zh_CN'],
            ['2014-05-01', '2014-04-01', '1 个月前', 'zh_CN'],
            ['2015-05-01', '2014-04-01', '1 年前', 'zh_CN'],
            ['2014-05-01', '2016-04-01', '2 年后', 'zh_CN'],

            // Polish
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'w tym momencie', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', 'za 5 sekund', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', 'minutę temu', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 minut temu', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', 'za 15 minut', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', 'za godzinę', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', 'za 2 godziny', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', 'godzinę temu', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', 'za 2 godziny', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', 'godzinę temu', 'pl'],
            ['2014-04-26', '2014-04-25', 'wczoraj', 'pl'],
            ['2014-04-26', '2014-04-24', '2 dni temu', 'pl'],
            ['2014-04-26', '2014-04-28', 'za 2 dni', 'pl'],
            ['2014-04-01', '2014-04-15', 'za 2 tygodnie', 'pl'],
            ['2014-04-15', '2014-04-07', 'tydzień temu', 'pl'],
            ['2014-01-01', '2014-04-01', 'za 3 miesiące', 'pl'],
            ['2014-05-01', '2014-04-01', 'miesiąc temu', 'pl'],
            ['2015-05-01', '2014-04-01', 'rok temu', 'pl'],
            ['2014-05-01', '2016-04-01', 'za 2 lata', 'pl'],
            ['2014-05-01', '2009-04-01', '5 lat temu', 'pl'],

            // Bulgarian
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'в момента', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', 'след 5 секунди', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', 'преди 1 минута', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', 'преди 15 минути', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', 'след 15 минути', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', 'след 1 час', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', 'след 2 часа', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', 'преди 1 час', 'bg'],
            ['2014-04-26', '2014-04-25', 'преди 1 ден', 'bg'],
            ['2014-04-26', '2014-04-24', 'преди 2 дни', 'bg'],
            ['2014-04-26', '2014-04-28', 'след 2 дни', 'bg'],
            ['2014-04-01', '2014-04-15', 'след 2 седмици', 'bg'],
            ['2014-04-15', '2014-04-07', 'преди 1 седмица', 'bg'],
            ['2014-01-01', '2014-04-01', 'след 3 месеца', 'bg'],
            ['2014-05-01', '2014-04-01', 'преди 1 месец', 'bg'],
            ['2015-05-01', '2014-04-01', 'преди 1 година', 'bg'],
            ['2014-05-01', '2016-04-01', 'след 2 години', 'bg'],

            // Russian
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'сейчас', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', 'через 5 секунд', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 минуту назад', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 минут назад', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', 'через 15 минут', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', 'через 1 час', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', 'через 2 часа', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 час назад', 'ru'],
            ['2014-04-26 14:00:00', '2014-04-26 12:00:00', '2 часа назад', 'ru'],
            ['2014-04-26', '2014-04-25', '1 день назад', 'ru'],
            ['2014-04-26', '2014-04-24', '2 дня назад', 'ru'],
            ['2014-04-26', '2014-04-28', 'через 2 дня', 'ru'],
            ['2014-04-01', '2014-04-15', 'через 2 недели', 'ru'],
            ['2014-04-15', '2014-04-07', '1 неделю назад', 'ru'],
            ['2014-01-01', '2014-04-01', 'через 3 месяца', 'ru'],
            ['2014-05-01', '2014-04-01', '1 месяц назад', 'ru'],
            ['2015-05-01', '2014-04-01', '1 год назад', 'ru'],
            ['2014-05-01', '2016-04-01', 'через 2 года', 'ru'],

            // Indonesian
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'baru saja', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', '5 detik dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 menit yang lalu', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 menit yang lalu', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', '15 menit dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', '1 jam dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', '2 jam dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 jam yang lalu', 'id'],
            ['2014-04-26', '2014-04-25', '1 hari yang lalu', 'id'],
            ['2014-04-26', '2014-04-24', '2 hari yang lalu', 'id'],
            ['2014-04-26', '2014-04-28', '2 hari dari sekarang', 'id'],
            ['2014-04-01', '2014-04-15', '2 minggu dari sekarang', 'id'],
            ['2014-04-15', '2014-04-07', '1 minggu yang lalu', 'id'],
            ['2014-01-01', '2014-04-01', '3 bulan dari sekarang', 'id'],
            ['2014-05-01', '2014-04-01', '1 bulan yang lalu', 'id'],
            ['2015-05-01', '2014-04-01', '1 tahun yang lalu', 'id'],
            ['2014-05-01', '2016-04-01', '2 tahun dari sekarang', 'id'],

            // Spanish
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'ahora mismo', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', 'dentro de 5 segundos', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', 'hace 1 minuto', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', 'hace 15 minutos', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', 'dentro de 15 minutos', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', 'dentro de 1 hora', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', 'dentro de 2 horas', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', 'hace 1 hora', 'es'],
            ['2014-04-26', '2014-04-25', 'hace 1 día', 'es'],
            ['2014-04-26', '2014-04-24', 'hace 2 días', 'es'],
            ['2014-04-26', '2014-04-28', 'dentro de 2 días', 'es'],
            ['2014-04-01', '2014-04-15', 'dentro de 2 semanas', 'es'],
            ['2014-04-15', '2014-04-07', 'hace 1 semana', 'es'],
            ['2014-01-01', '2014-04-01', 'dentro de 3 meses', 'es'],
            ['2014-05-01', '2014-04-01', 'hace 1 mes', 'es'],
            ['2015-05-01', '2014-04-01', 'hace 1 año', 'es'],
            ['2014-05-01', '2016-04-01', 'dentro de 2 años', 'es'],

            // Ukrainian
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'зараз', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', 'через 5 секунд', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 хвилину тому', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 хвилин тому', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', 'через 15 хвилин', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', 'через 1 годину', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', 'через 2 години', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 годину тому', 'uk'],
            ['2014-04-26', '2014-04-25', '1 день тому', 'uk'],
            ['2014-04-26', '2014-04-24', '2 дні тому', 'uk'],
            ['2014-04-26', '2014-04-28', 'через 2 дні', 'uk'],
            ['2014-04-01', '2014-04-15', 'через 2 тижні', 'uk'],
            ['2014-04-15', '2014-04-07', '1 тиждень тому', 'uk'],
            ['2014-01-01', '2014-04-01', 'через 3 місяці', 'uk'],
            ['2014-05-01', '2014-04-01', '1 місяць тому', 'uk'],
            ['2015-05-01', '2014-04-01', '1 рік тому', 'uk'],
            ['2014-05-01', '2016-04-01', 'через 2 роки', 'uk'],

            // Danish
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'lige nu', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', '5 sekunder fra nu', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 minut siden', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 minutter siden', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', '15 minutter fra nu', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', '1 time fra nu', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', '2 timer fra nu', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 time siden', 'da'],
            ['2014-04-26', '2014-04-25', '1 dag siden', 'da'],
            ['2014-04-26', '2014-04-24', '2 dage siden', 'da'],
            ['2014-04-26', '2014-04-28', '2 dage fra nu', 'da'],
            ['2014-04-01', '2014-04-15', '2 uger fra nu', 'da'],
            ['2014-04-15', '2014-04-07', '1 uge siden', 'da'],
            ['2014-01-01', '2014-04-01', '3 måneder fra nu', 'da'],
            ['2014-05-01', '2014-04-01', '1 måned siden', 'da'],
            ['2015-05-01', '2014-04-01', '1 år siden', 'da'],
            ['2014-05-01', '2016-04-01', '2 år fra nu', 'da'],

            // Thai
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'เมื่อสักครู่', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', 'อีก 5 วินาที', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 นาทีที่แล้ว', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 นาทีที่แล้ว', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', 'อีก 15 นาที', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', 'อีก 1 ชั่วโมง', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', 'อีก 2 ชั่วโมง', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 ชั่วโมงที่แล้ว', 'th'],
            ['2014-04-26', '2014-04-25', '1 วันที่แล้ว', 'th'],
            ['2014-04-26', '2014-04-24', '2 วันที่แล้ว', 'th'],
            ['2014-04-26', '2014-04-28', 'อีก 2 วัน', 'th'],
            ['2014-04-01', '2014-04-15', 'อีก 2 สัปดาห์', 'th'],
            ['2014-04-15', '2014-04-07', '1 สัปดาห์ที่แล้ว', 'th'],
            ['2014-01-01', '2014-04-01', 'อีก 3 เดือน', 'th'],
            ['2014-05-01', '2014-04-01', '1 เดือนที่แล้ว', 'th'],
            ['2015-05-01', '2014-04-01', '1 ปีที่แล้ว', 'th'],
            ['2014-05-01', '2016-04-01', 'อีก 2 ปี', 'th'],

            // Japanese
            ['2014-04-26 13:00:00', '2014-04-26 13:00:00', 'たった今', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 13:00:05', '5 秒後', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 12:59:00', '1 分前', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 12:45:00', '15 分前', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 13:15:00', '15 分後', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 14:00:00', '1 時間後', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 15:00:00', '2 時間後', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 12:00:00', '1 時間前', 'ja'],
            ['2014-04-26', '2014-04-25', '1 日前', 'ja'],
            ['2014-04-26', '2014-04-24', '2 日前', 'ja'],
            ['2014-04-26', '2014-04-28', '2 日後', 'ja'],
            ['2014-04-01', '2014-04-15', '2 週間後', 'ja'],
            ['2014-04-15', '2014-04-07', '1 週間前', 'ja'],
            ['2014-01-01', '2014-04-01', '3 ヶ月後', 'ja'],
            ['2014-05-01', '2014-04-01', '1 ヶ月前', 'ja'],
            ['2015-05-01', '2014-04-01', '1 年前', 'ja'],
            ['2014-05-01', '2016-04-01', '2 年後', 'ja'],
        ];
    }

    /**
     * @return array
     */
    public function preciseDifferenceDataProvider()
    {
        return [
             // Azerbaijani
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 dəqiqə, 45 saniyə əvvəl', 'az'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 saat, 40 dəqiqə əvvəl', 'az'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 gün, 15 dəqiqə sonra', 'az'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 gün, 2 saat sonra', 'az'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 il, 2 gün, 4 saat sonra', 'az'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 gün, 10 saat sonra', 'az'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 gün, 1 saat, 40 dəqiqə əvvəl', 'az'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 il, 1 gün sonra', 'az'],

            // English
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minute, 45 seconds ago', 'en'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 hour, 40 minutes ago', 'en'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 day, 15 minutes from now', 'en'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 days, 2 hours from now', 'en'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 year, 2 days, 4 hours from now', 'en'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 days, 10 hours from now', 'en'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 day, 1 hour, 40 minutes ago', 'en'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 years, 1 day from now', 'en'],

            // Chinese Simplified
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 分钟, 45 秒前', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 小时, 40 分钟前', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 天, 15 分钟后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 天, 2 小时后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 年, 2 天, 4 小时后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 天, 10 小时后', 'zh_CN'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 天, 1 小时, 40 分钟前', 'zh_CN'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 年, 1 天后', 'zh_CN'],

            // Polish
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minuta, 45 sekund temu', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 godzina, 40 minut temu', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 dzień, 15 minut od teraz', 'pl'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 dni, 2 godziny od teraz', 'pl'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 rok, 2 dni, 4 godziny od teraz', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 dni, 10 godzin od teraz', 'pl'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 dzień, 1 godzina, 40 minut temu', 'pl'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 lata, 1 dzień od teraz', 'pl'],

            // German
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', 'vor 1 Minute, 45 Sekunden', 'de'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', 'vor 1 Stunde, 40 Minuten', 'de'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', 'in 1 Tag, 15 Minuten', 'de'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', 'in 7 Tagen, 2 Stunden', 'de'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', 'in 1 Jahr, 2 Tagen, 4 Stunden', 'de'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', 'in 2 Tagen, 10 Stunden', 'de'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', 'vor 1 Tag, 1 Stunde, 40 Minuten', 'de'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', 'in 2 Jahren, 1 Tag', 'de'],

            // Turkish
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 dakika, 45 saniye önce', 'tr'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 saat, 40 dakika önce', 'tr'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 gün, 15 dakika sonra', 'tr'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 gün, 2 saat sonra', 'tr'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 yıl, 2 gün, 4 saat sonra', 'tr'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 gün, 10 saat sonra', 'tr'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 gün, 1 saat, 40 dakika önce', 'tr'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 yıl, 1 gün sonra', 'tr'],

            // French
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minute, 45 secondes il y a', 'fr'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 heure, 40 minutes il y a', 'fr'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 jour, 15 minutes maintenant', 'fr'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 jours, 2 heures maintenant', 'fr'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 année, 2 jours, 4 heures maintenant', 'fr'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 jours, 10 heures maintenant', 'fr'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 jour, 1 heure, 40 minutes il y a', 'fr'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 années, 1 jour maintenant', 'fr'],

            // Português - Brasil
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minuto, 45 segundos atrás', 'pt_BR'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 hora, 40 minutos atrás', 'pt_BR'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 dia, 15 minutos a partir de agora', 'pt_BR'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 dias, 2 horas a partir de agora', 'pt_BR'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 ano, 2 dias, 4 horas a partir de agora', 'pt_BR'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 dias, 10 horas a partir de agora', 'pt_BR'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 dia, 1 hora, 40 minutos atrás', 'pt_BR'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 anos, 1 dia a partir de agora', 'pt_BR'],

            // Italian
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minuto, 45 secondi fa', 'it'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 ora, 40 minuti fa', 'it'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 giorno, 15 minuti da adesso', 'it'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 giorni, 2 ore da adesso', 'it'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 anno, 2 giorni, 4 ore da adesso', 'it'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 giorni, 10 ore da adesso', 'it'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 giorno, 1 ora, 40 minuti fa', 'it'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 anni, 1 giorno da adesso', 'it'],

            // Norwegian
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minutt, 45 sekunder siden', 'no'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 time, 40 minutter siden', 'no'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 dag, 15 minutter fra nå', 'no'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 dager, 2 timer fra nå', 'no'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 år, 2 dager, 4 timer fra nå', 'no'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 dager, 10 timer fra nå', 'no'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 dag, 1 time, 40 minutter siden', 'no'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 år, 1 dag fra nå', 'no'],

            // Bulgarian
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 минута, 45 секунди преди това', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 час, 40 минути преди това', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 ден, 15 минути след това', 'bg'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 дни, 2 часа след това', 'bg'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 година, 2 дни, 4 часа след това', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 дни, 10 часа след това', 'bg'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 ден, 1 час, 40 минути преди това', 'bg'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 години, 1 ден след това', 'bg'],

            // Afrikaans
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minuut, 45 sekondes gelede', 'af'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 uur, 40 minute gelede', 'af'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 dag, 15 minute van nou af', 'af'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 dae, 2 ure van nou af', 'af'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 jaar, 2 dae, 4 ure van nou af', 'af'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 dae, 10 ure van nou af', 'af'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 dag, 1 uur, 40 minute gelede', 'af'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 jaar, 1 dag van nou af', 'af'],

            // Russian
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 минута, 45 секунд назад', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 час, 40 минут назад', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', 'через 1 день, 15 минут', 'ru'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', 'через 7 дней, 2 часа', 'ru'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', 'через 1 год, 2 дня, 4 часа', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', 'через 2 дня, 10 часов', 'ru'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 день, 1 час, 40 минут назад', 'ru'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', 'через 2 года, 1 день', 'ru'],

            // Indonesian
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 menit, 45 detik yang lalu', 'id'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 jam, 40 menit yang lalu', 'id'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 hari, 15 menit dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 hari, 2 jam dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 tahun, 2 hari, 4 jam dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 hari, 10 jam dari sekarang', 'id'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 hari, 1 jam, 40 menit yang lalu', 'id'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 tahun, 1 hari dari sekarang', 'id'],

            // Spanish
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', 'hace 1 minuto, 45 segundos', 'es'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', 'hace 1 hora, 40 minutos', 'es'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', 'dentro de 1 día, 15 minutos', 'es'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', 'dentro de 7 días, 2 horas', 'es'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', 'dentro de 1 año, 2 días, 4 horas', 'es'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', 'dentro de 2 días, 10 horas', 'es'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', 'hace 1 día, 1 hora, 40 minutos', 'es'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', 'dentro de 2 años, 1 día', 'es'],

            // Ukrainian
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 хвилина, 45 секунд тому', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 година, 40 хвилин тому', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', 'через 1 день, 15 хвилин', 'uk'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', 'через 7 днів, 2 години', 'uk'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', 'через 1 рік, 2 дні, 4 години', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', 'через 2 дні, 10 годин', 'uk'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 день, 1 година, 40 хвилин тому', 'uk'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', 'через 2 роки, 1 день', 'uk'],

            // Danish
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 minut, 45 sekunder siden', 'da'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 time, 40 minutter siden', 'da'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 dag, 15 minutter fra nu', 'da'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 dage, 2 timer fra nu', 'da'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 år, 2 dage, 4 timer fra nu', 'da'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 dage, 10 timer fra nu', 'da'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 dag, 1 time, 40 minutter siden', 'da'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 år, 1 dag fra nu', 'da'],

            // Thai
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 นาที, 45 วินาทีที่แล้ว', 'th'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 ชั่วโมง, 40 นาทีที่แล้ว', 'th'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', 'อีก 1 วัน, 15 นาที', 'th'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', 'อีก 7 วัน, 2 ชั่วโมง', 'th'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', 'อีก 1 ปี, 2 วัน, 4 ชั่วโมง', 'th'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', 'อีก 2 วัน, 10 ชั่วโมง', 'th'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 วัน, 1 ชั่วโมง, 40 นาทีที่แล้ว', 'th'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', 'อีก 2 ปี, 1 วัน', 'th'],

            // Japanese
            ['2014-04-26 13:00:00', '2014-04-26 12:58:15', '1 分, 45 秒前', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-26 11:20:00', '1 時間, 40 分前', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-27 13:15:00', '1 日, 15 分後', 'ja'],
            ['2014-04-26 13:00:00', '2014-05-03 15:00:00', '7 日, 2 時間後', 'ja'],
            ['2014-04-26 13:00:00', '2015-04-28 17:00:00', '1 年, 2 日, 4 時間後', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-28 23:00:00', '2 日, 10 時間後', 'ja'],
            ['2014-04-26 13:00:00', '2014-04-25 11:20:00', '1 日, 1 時間, 40 分前', 'ja'],
            ['2014-04-26 13:00:00', '2016-04-27 13:00:00', '2 年, 1 日後', 'ja'],
        ];
    }
}
