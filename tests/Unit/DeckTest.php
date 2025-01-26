<?php

declare(strict_types=1);

use PlayingCards\Deck;
use PlayingCards\Enums\Value;

test('a deck can be created', function (): void {
    $deck = new Deck();

    expect($deck)
        ->toHaveProperties(['cards']);

    $cards = invade($deck)->cards;

    expect(count($cards))
        ->toBe(52);
});

test('a deck can include jokers', function (): void {
    $deck = new Deck(
        includeJokers: true,
    );

    expect($deck)
        ->toHaveProperties(['cards']);

    $cards = invade($deck)->cards;

    expect(count($cards))
        ->toBe(54);
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

test('the deck can be sorted', function(): void {

    $deck = new Deck();

    $deck->shuffle();

    $cards = invade($deck)->cards;

    $cards = $cards->sortByEnumCases('value', Value::class);

    expect(invade($deck)->cards->first()->toArray())
        ->not
        ->toEqual($cards->first()->toArray());
});

test('the deck can\'t be sorted be an enum that doesn\'t exist', function(): void {

    $deck = new Deck();

    $deck->shuffle();

    $cards = invade($deck)->cards;

    $cards = $cards->sortByEnumCases('value', 'x');

})->throws(ErrorException::class, 'Is x an Enum class?');
