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

    function it_humanize_difference_between_dates_for_af_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'nou nou'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 sekondes van nou af'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 minuut gelede'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minute gelede'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 minute van nou af'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 uur van nou af'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 ure van nou af'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 uur gelede'),
            array("2014-04-26 13:00:00", "2014-04-26 11:00:00", '2 ure gelede'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 uur gelede'),
            array("2014-04-26", "2014-04-25", '1 dag gelede'),
            array("2014-04-26", "2014-04-24", '2 dae gelede'),
            array("2014-04-26", "2014-04-28", '2 dae van nou af'),
            array("2014-04-01", "2014-04-15", '2 weke van nou af'),
            array("2014-04-15", "2014-04-07", '1 week gelede'),
            array("2014-01-01", "2014-04-01", '3 maande van nou af'),
            array("2014-05-01", "2014-04-01", '1 maand gelede'),
            array("2015-05-01", "2014-04-01", '1 jaar gelede'),
            array("2014-05-01", "2016-04-01", '2 jaar van nou af'),
            array("2014-05-01", "2009-04-01", '5 jaar gelede'),
        );

        foreach ($examples as $example) {
            $this->difference(new \DateTime($example[0]), new \DateTime($example[1]), 'af')->shouldReturn($example[2]);
        }
    }

    function it_humanize_difference_between_dates_for_pt_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'agora'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 segundos a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 minuto atrás'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minutos atrás'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 minutos a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 hora a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 horas a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 hora atrás'),
            array("2014-04-26", "2014-04-25", '1 dia atrás'),
            array("2014-04-26", "2014-04-24", '2 dias atrás'),
            array("2014-04-26", "2014-04-28", '2 dias a partir de agora'),
            array("2014-04-01", "2014-04-15", '2 semanas a partir de agora'),
            array("2014-04-15", "2014-04-07", '1 semana atrás'),
            array("2014-01-01", "2014-04-01", '3 meses a partir de agora'),
            array("2014-05-01", "2014-04-01", '1 mês atrás'),
            array("2015-05-01", "2014-04-01", '1 ano atrás'),
            array("2014-05-01", "2016-04-01", '2 anos a partir de agora'),
        );

        foreach ($examples as $example) {
            $this->difference(new \DateTime($example[0]), new \DateTime($example[1]), 'pt')->shouldReturn($example[2]);
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

    function it_humanizes_precise_difference_between_dates_for_af_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuut, 45 sekondes gelede'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 uur, 40 minute gelede'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dag, 15 minute van nou af'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dae, 2 ure van nou af'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 jaar, 2 dae, 4 ure van nou af'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dae, 10 ure van nou af'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dag, 1 uur, 40 minute gelede'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 jaar, 1 dag van nou af'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'af')->shouldReturn($example[2]);
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

    function it_humanizes_precise_difference_between_dates_for_fr_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minute, 45 secondes il y a'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 heure, 40 minutes il y a'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 jour, 15 minutes maintenant'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 jours, 2 heures maintenant'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 année, 2 jours, 4 heures maintenant'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 jours, 10 heures maintenant'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 jour, 1 heure, 40 minutes il y a'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 années, 1 jour maintenant'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'fr')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates_for_pt_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuto, 45 segundos atrás'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 hora, 40 minutos atrás'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dia, 15 minutos a partir de agora'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dias, 2 horas a partir de agora'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 ano, 2 dias, 4 horas a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dias, 10 horas a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dia, 1 hora, 40 minutos atrás'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 anos, 1 dia a partir de agora'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'pt_BR')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates_for_pt_BR_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuto, 45 segundos atrás'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 hora, 40 minutos atrás'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dia, 15 minutos a partir de agora'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dias, 2 horas a partir de agora'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 ano, 2 dias, 4 horas a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dias, 10 horas a partir de agora'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dia, 1 hora, 40 minutos atrás'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 anos, 1 dia a partir de agora'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'pt_BR')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates_for_it_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minuto, 45 secondi fa'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 ora, 40 minuti fa'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 giorno, 15 minuti da adesso'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 giorni, 2 ore da adesso'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 anno, 2 giorni, 4 ore da adesso'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 giorni, 10 ore da adesso'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 giorno, 1 ora, 40 minuti fa'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 anni, 1 giorno da adesso'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'it')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates_for_no_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 minutt, 45 sekunder siden'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 time, 40 minutter siden'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 dag, 15 minutter fra nå'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 dager, 2 timer fra nå'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 år, 2 dager, 4 timer fra nå'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 dager, 10 timer fra nå'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 dag, 1 time, 40 minutter siden'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 år, 1 dag fra nå'),
        );
        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'no')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_precise_difference_between_dates_for_ru_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 12:58:15", '1 минута, 45 секунд назад'),
            array("2014-04-26 13:00:00", "2014-04-26 11:20:00", '1 час, 40 минут назад'),
            array("2014-04-26 13:00:00", "2014-04-27 13:15:00", '1 день, 15 минут вперед'),
            array("2014-04-26 13:00:00", "2014-05-03 15:00:00", '7 дней, 2 часа вперед'),
            array("2014-04-26 13:00:00", "2015-04-28 17:00:00", '1 год, 2 дня, 4 часа вперед'),
            array("2014-04-26 13:00:00", "2014-04-28 23:00:00", '2 дня, 10 часов вперед'),
            array("2014-04-26 13:00:00", "2014-04-25 11:20:00", '1 день, 1 час, 40 минут назад'),
            array("2014-04-26 13:00:00", "2016-04-27 13:00:00", '2 года, 1 день вперед'),
        );

        foreach ($examples as $example) {
            $this->preciseDifference(new \DateTime($example[0]), new \DateTime($example[1]), 'ru')->shouldReturn($example[2]);
        }
    }
}
