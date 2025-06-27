<?php

namespace App;

enum ScoreGrade: string
{
    case A = 'A';
    case B = 'B';
    case C = 'C';
    case D = 'D';
    case E = 'E';

    public static function fromScore(float $score): self
    {
        return match (true) {
            $score >= 8.5 => self::A,
            $score >= 7.0 => self::B,
            $score >= 5.5 => self::C,
            $score >= 4.0 => self::D,
            default       => self::E,
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::A => '#087311',
            self::B => '#20B31B',
            self::C => '#FFE600',
            self::D => '#F77205',
            self::E => '#E80707',
        };
    }

    public function emoji(): string
    {
        return match ($this) {
            self::A => '🟢',
            self::B => '🟢',
            self::C => '🟡',
            self::D => '🟠',
            self::E => '🔴',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::A => 'Excellent',
            self::B => 'Très bon',
            self::C => 'Acceptable',
            self::D => 'Limité',
            self::E => 'À éviter',
        };
    }
}
