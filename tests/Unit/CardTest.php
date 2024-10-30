<?php

declare(strict_types=1);

use PlayingCards\Card;
use PlayingCards\Enums\Suit;
use PlayingCards\Enums\Value;

test('a card can be created', function (): void {
    $card = new Card(suit: Suit::Hearts, value: Value::Ace);

    expect($card)
        ->toHaveProperties(['suit', 'value']);
});

test('a card has to have a valid suit', function (): void {
    $card = new Card('Elves', Value::Ace);
})->throws(TypeError::class);

test('a card has to have a valid value', function (): void {
    $card = new Card(Suit::Hearts, 42);
})->throws(TypeError::class);
