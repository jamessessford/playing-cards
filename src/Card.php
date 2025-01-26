<?php

declare(strict_types=1);

namespace PlayingCards;

use PlayingCards\Enums\Suit;
use PlayingCards\Enums\Value;
use Thunk\Verbs\SerializedByVerbs;
use Thunk\Verbs\Support\Normalization\NormalizeToPropertiesAndClassName;

final readonly class Card implements SerializedByVerbs
{
    use NormalizeToPropertiesAndClassName;

    public function __construct(
        public Suit $suit,
        public Value $value,
    ) {}

    public function toArray(): array
    {
        return [
            'suit' => $this->suit->name,
            'value' => $this->value->name,
        ];
    }
}
