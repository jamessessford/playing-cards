<?php

declare(strict_types=1);

namespace PlayingCards;

use PlayingCards\Enums\Suit;
use PlayingCards\Enums\Value;

final class Deck
{
    public CardCollection $cards;

    public function __construct()
    {
        $this->cards = CardCollection::make([]);

        collect(Suit::cases())
            ->each(function (Suit $suit): void {
                collect(Value::cases())
                    ->each(function (Value $value) use ($suit): void {
                        $this->cards->push(new Card($suit, $value));
                    });
            });

        $this->shuffle();
    }

    public function shuffle(): void
    {
        $this->cards = $this->cards
            ->shuffle()
            ->reverse();
    }

    public function deal(): ?Card
    {
        if (0 === $this->cards->count()) {
            return null;
        }

        return $this->cards->pop();
    }

    public function remainingCards(): int
    {
        return $this->cards->count();
    }
}
