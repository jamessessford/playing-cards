<?php

declare(strict_types=1);

namespace PlayingCards;

use PlayingCards\Enums\Suit;
use PlayingCards\Enums\Value;

final class Deck
{
    public CardCollection $cards;

    public function __construct(
        private bool $includeJokers = false,
    ) {
        $this->cards = CardCollection::make([]);

        $suits = [
            Suit::Clubs,
            Suit::Diamonds,
            Suit::Hearts,
            Suit::Spades,
        ];

        $cards = [
            Value::Two,
            Value::Three,
            Value::Four,
            Value::Five,
            Value::Six,
            Value::Seven,
            Value::Eight,
            Value::Nine,
            Value::Ten,
            Value::Jack,
            Value::Queen,
            Value::King,
            Value::Ace,
        ];

        collect($suits)
            ->each(function (Suit $suit) use ($cards): void {
                collect($cards)
                    ->each(function (Value $value) use ($suit): void {
                        $this->cards->push(new Card($suit, $value));
                    });
            });

        if ($this->includeJokers) {
            $this->cards->push(new Card(Suit::Red, Value::Joker));
            $this->cards->push(new Card(Suit::Black, Value::Joker));
        }

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
