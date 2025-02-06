<?php declare(strict_types=1);

return  [
    'just_now' => [
        'past' => '[0,Inf] nyss',
        'future' => '[0,Inf] nyss',
    ],
    'second' => [
        'past' => '{0} för 0 sekunder sedan|{1} för 1 sekund sedan|[2,Inf] för %count% sekunder sedan',
        'future' => '{0} om 0 sekunder|{1} om 1 sekund|[2,Inf] om %count% sekunder',
    ],
    'minute' => [
        'past' => '{0} för 0 minuter sedan|{1} för 1 minut sedan|[2,Inf] för %count% minuter sedan',
        'future' => '{0} om 0 minuter|{1} om 1 minut|[2,Inf] om %count% minuter',
    ],
    'hour' => [
        'past' => '{0} för 0 timmar sedan|{1} för 1 timme sedan|[2,Inf] för %count% timmar sedan',
        'future' => '{0} om 0 timmar|{1} om 1 timme|[2,Inf] om %count% timmar',
    ],
    'day' => [
        'past' => '{0} för 0 dagar sedan|{1} för 1 dag sedan|[2,Inf] för %count% dagar sedan',
        'future' => '{0} om 0 dagar|{1} om 1 dag|[2,Inf] om %count% dagar',
    ],
    'week' => [
        'past' => '{0} för 0 veckor sedan|{1} för 1 vecka sedan|[2,Inf] för %count% veckor sedan',
        'future' => '{0} om 0 veckor|{1} om 1 vecka|[2,Inf] om %count% veckor',
    ],
    'month' => [
        'past' => '{0} för 0 månader sedan|{1} för 1 månad sedan|[2,Inf] för %count% månader sedan',
        'future' => '{0} om 0 månader|{1} om 1 månad|[2,Inf] om %count% månader',
    ],
    'year' => [
        'past' => '[0,Inf] för %count% år sedan',
        'future' => '[0,Inf] om %count% år',
    ],
    'compound' => [
        'second' => '{0} 0 sekunder|{1} 1 sekund|[2,Inf] %count% sekunder',
        'minute' => '{0} 0 minuter|{1} 1 minut|[2,Inf] %count% minuter',
        'hour' => '{0} 0 timmar|{1} 1 timme|[2,Inf] %count% timmar',
        'day' => '{0} 0 dagar|{1} 1 dag|[2,Inf] %count% dagar',
        'week' => '{0} 0 veckor|{1} 1 vecka|[2,Inf] %count% veckor',
        'month' => '{0} 0 månader|{1} 1 månad|[2,Inf] %count% månader',
        'year' => '[0,Inf] %count% år',
        'past' => 'för %value% sedan',
        'future' => 'om %value%',
    ],
];
