<?php

declare(strict_types=1);

namespace PlayingCards\Enums;

enum Suit: string
{
    case Clubs = 'Clubs';
    case Diamonds = 'Diamonds';
    case Hearts = 'Hearts';
    case Spades = 'Spades';
}
