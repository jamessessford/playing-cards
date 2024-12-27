<?php

declare(strict_types=1);

namespace PlayingCards\Enums;

enum Value: string
{
    case Two = 'Two';
    case Three = 'Three';
    case Four = 'Four';
    case Five = 'Five';
    case Six = 'Six';
    case Seven = 'Seven';
    case Eight = 'Eight';
    case Nine = 'Nine';
    case Ten = 'Ten';
    case Jack = 'Jack';
    case Queen = 'Queen';
    case King = 'King';
    case Ace = 'Ace';
    case Joker = 'Joker';
}
