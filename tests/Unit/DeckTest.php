<?php

declare(strict_types=1);

use PlayingCards\Deck;

test('a deck can be created', function (): void {
    $deck = new Deck();

    expect($deck)
        ->toHaveProperties(['cards']);

    $cards = invade($deck)->cards;

    expect(count($cards))
        ->toBe(52);
});

test('a deck can be shuffled', function (): void {
    $deck = new Deck();

    $cards = invade($deck)->cards;

    $deck->shuffle();

    $shuffledCards = invade($deck)->cards;

    expect($cards)
        ->not()
        ->toBe($shuffledCards);
});

test('a card can be dealt', function (): void {
    $deck = new Deck();

    $dealtCard = $deck->deal();

    $remainingCards = invade($deck)->cards;

    expect(count($remainingCards))
        ->toBe(51);

    expect($remainingCards)
        ->not()
        ->toContain($dealtCard);
});

test('the deck can be empty', function (): void {
    $deck = new Deck();

    for ($i = 0; $i < 52; $i++) {
        $deck->deal();
    }

    $remainingCards = invade($deck)->cards;

    expect(count($remainingCards))
        ->toBe(0);

    expect($deck->deal())
        ->toBeNull();
});

test('the remaining card count can be queried', function (): void {
    $deck = new Deck();

    $deck->deal();

    $remainingCards = $deck->remainingCards();

    expect($remainingCards)
        ->toBe(51);
});
