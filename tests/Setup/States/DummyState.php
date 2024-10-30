<?php

declare(strict_types=1);

namespace Tests\Setup\States;

use PlayingCards\CardCollection;
use Thunk\Verbs\State;

class DummyState extends State
{
    public CardCollection $cards;
}
