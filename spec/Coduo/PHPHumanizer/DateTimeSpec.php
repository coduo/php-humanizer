<?php

namespace spec\Coduo\PHPHumanizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateTimeSpec extends ObjectBehavior
{
    function it_humanize_difference_between_dates()
    {
        $examples = array(
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
        );

        foreach ($examples as $example) {
            $this->difference(new \DateTime($example[0]), new \DateTime($example[1]))->shouldReturn($example[2]);
        }
    }

    function it_humanize_difference_between_dates_for_pl_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'w tym momencie'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'za 5 sekund'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", 'minutę temu'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minut temu'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'za 15 minut'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'za godzinę'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'za 2 godziny'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", 'godzinę temu'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'za 2 godziny'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", 'godzinę temu'),
            array("2014-04-26", "2014-04-25", 'wczoraj'),
            array("2014-04-26", "2014-04-24", '2 dni temu'),
            array("2014-04-26", "2014-04-28", 'za 2 dni'),
            array("2014-04-01", "2014-04-15", 'za 2 tygodnie'),
            array("2014-04-15", "2014-04-07", 'tydzień temu'),
            array("2014-01-01", "2014-04-01", 'za 3 miesiące'),
            array("2014-05-01", "2014-04-01", 'miesiąc temu'),
            array("2015-05-01", "2014-04-01", 'rok temu'),
            array("2014-05-01", "2016-04-01", 'za 2 lata'),
            array("2014-05-01", "2009-04-01", '5 lat temu'),
        );

        foreach ($examples as $example) {
            $this->difference(new \DateTime($example[0]), new \DateTime($example[1]), 'pl')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minute, 45 seconds ago'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 hour, 40 minutes ago'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 day, 15 minutes from now'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 days, 2 hours from now'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 year, 2 days, 4 hours from now'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 days, 10 hours from now'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 day, 1 hour, 40 minutes ago'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 years, 1 day from now'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]))->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates_for_pl_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuta, 45 sekund temu'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 godzina, 40 minut temu'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dzień, 15 minut od teraz'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dni, 2 godziny od teraz'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 rok, 2 dni, 4 godziny od teraz'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dni, 10 godzin od teraz'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dzień, 1 godzina, 40 minut temu'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 lata, 1 dzień od teraz'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'pl')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates_for_de_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 Minute, 45 Sekunden vor'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 Stunde, 40 Minuten vor'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 Tag, 15 Minuten ab jetzt'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 Tage, 2 Stunden ab jetzt'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 Jahr, 2 Tage, 4 Stunden ab jetzt'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 Tage, 10 Stunden ab jetzt'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 Tag, 1 Stunde, 40 Minuten vor'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 Jahre, 1 Tag ab jetzt'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'de')->shouldReturn($example[2]);
        }
    }


    function it_humanizes_precise_difference_between_dates_for_tr_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 dakika, 45 saniye önce'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 saat, 40 dakika önce'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 gün, 15 dakika sonra'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 gün, 2 saat sonra'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 yıl, 2 gün, 4 saat sonra'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 gün, 10 saat sonra'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 gün, 1 saat, 40 dakika önce'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 yıl, 1 gün sonra'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'tr')->shouldReturn($example[2]);
        }
    }
}
