<?php

namespace App\Enums;

enum BannerType: string
{
    case FIRST = 'first';
    case SECOND = 'second';
    case THIRD = 'third';
    case FOURTH = 'fourth';
    case FIFTH = 'fifth';
    case USEFUL = 'useful';

    public static function getLabels(): array
    {
        return [
            self::FIRST->value => 'First',
            self::SECOND->value => 'Second',
            self::THIRD->value => 'Third',
            self::FOURTH->value => 'Fourth',
            self::FIFTH->value => 'Fifth',
            self::USEFUL->value => 'Useful Banner',
        ];
    }
}
