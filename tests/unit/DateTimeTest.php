<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\DateTime;
use PHPUnit_Framework_TestCase;

/**
 * Class DateTimeTest
 *
 * @package Coduo\PHPHumanizer\Tests
 */
class DateTimeTest extends PHPUnit_Framework_TestCase
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
    public function test_humanize_difference_between_dates($firstDate, $secondDate, $expected, $locale = 'en')
    {
        $datetime = new DateTime();

        $this->assertEquals($expected, $datetime->difference(new \DateTime($firstDate), new \DateTime($secondDate), $locale));
        $this->assertEquals($expected, DateTime::difference(new \DateTime($firstDate), new \DateTime($secondDate), $locale));
    }

    /**
     * @dataProvider preciseDifferenceDataProvider
     *
     * @param        $firstDate
     * @param        $secondDate
     * @param        $expected
     * @param string $locale
     */
    public function test_humanize_precise_difference_between_dates($firstDate, $secondDate, $expected, $locale = 'en')
    {
        $datetime = new DateTime();

        $this->assertEquals($expected, $datetime->preciseDifference(new \DateTime($firstDate), new \DateTime($secondDate), $locale));
        $this->assertEquals($expected, DateTime::preciseDifference(new \DateTime($firstDate), new \DateTime($secondDate), $locale));
    }

    /**
     * @return array
     */
    public function humanizeDataProvider()
    {
        return array(
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'just now'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 seconds from now'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 minute ago'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minutes ago'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 minutes from now'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 hour from now'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 hours from now'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 hour ago'),
            array("2014-04-26", "2014-04-25", '1 day ago'),
            array("2014-04-26", "2014-04-24", '2 days ago'),
            array("2014-04-26", "2014-04-28", '2 days from now'),
            array("2014-04-01", "2014-04-15", '2 weeks from now'),
            array("2014-04-15", "2014-04-07", '1 week ago'),
            array("2014-01-01", "2014-04-01", '3 months from now'),
            array("2014-05-01", "2014-04-01", '1 month ago'),
            array("2015-05-01", "2014-04-01", '1 year ago'),
            array("2014-05-01", "2016-04-01", '2 years from now'),

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
        );
    }

    /**
     * @return array
     */
    public function preciseDifferenceDataProvider()
    {
        return array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minute, 45 seconds ago'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 hour, 40 minutes ago'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 day, 15 minutes from now'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 days, 2 hours from now'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 year, 2 days, 4 hours from now'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 days, 10 hours from now'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 day, 1 hour, 40 minutes ago'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 years, 1 day from now'),

            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuta, 45 sekund temu', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 godzina, 40 minut temu', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dzień, 15 minut od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dni, 2 godziny od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 rok, 2 dni, 4 godziny od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dni, 10 godzin od teraz', 'pl'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dzień, 1 godzina, 40 minut temu', 'pl'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 lata, 1 dzień od teraz', 'pl'),

            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 Minute, 45 Sekunden vor', 'de'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 Stunde, 40 Minuten vor', 'de'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 Tag, 15 Minuten ab jetzt', 'de'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 Tage, 2 Stunden ab jetzt', 'de'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 Jahr, 2 Tage, 4 Stunden ab jetzt', 'de'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 Tage, 10 Stunden ab jetzt', 'de'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 Tag, 1 Stunde, 40 Minuten vor', 'de'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 Jahre, 1 Tag ab jetzt', 'de'),

            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 dakika, 45 saniye önce', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 saat, 40 dakika önce', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 gün, 15 dakika sonra', 'tr'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 gün, 2 saat sonra', 'tr'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 yıl, 2 gün, 4 saat sonra', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 gün, 10 saat sonra', 'tr'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 gün, 1 saat, 40 dakika önce', 'tr'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 yıl, 1 gün sonra', 'tr'),

            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minute, 45 secondes il y a', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 heure, 40 minutes il y a', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 jour, 15 minutes maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 jours, 2 heures maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 année, 2 jours, 4 heures maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 jours, 10 heures maintenant', 'fr'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 jour, 1 heure, 40 minutes il y a', 'fr'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 années, 1 jour maintenant', 'fr'),

            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuto, 45 segundos atrás', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 hora, 40 minutos atrás', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dia, 15 minutos a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dias, 2 horas a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 ano, 2 dias, 4 horas a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dias, 10 horas a partir de agora', 'pt_BR'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dia, 1 hora, 40 minutos atrás', 'pt_BR'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 anos, 1 dia a partir de agora', 'pt_BR'),

            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuto, 45 secondi fa', 'it'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 ora, 40 minuti fa', 'it'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 giorno, 15 minuti da adesso', 'it'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 giorni, 2 ore da adesso', 'it'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 anno, 2 giorni, 4 ore da adesso', 'it'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 giorni, 10 ore da adesso', 'it'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 giorno, 1 ora, 40 minuti fa', 'it'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 anni, 1 giorno da adesso', 'it'),
        );
    }
}