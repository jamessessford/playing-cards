<?php

declare(strict_types=1);

use PlayingCards\Card;
use PlayingCards\Enums\Suit;
use PlayingCards\Enums\Value;

test('an image of a card can be requested', function (): void {
    $card = new Card(suit: Suit::Hearts, value: Value::Ace);

    $image = card_front($card);

    expect($image->toHtml())
        ->toContain("<img src='/vendor/playing-cards/ace_of_hearts.svg' class='h-24' />");
});

test('an image of a card back can be requested', function (): void {
    $image = card_back();

    expect($image->toHtml())
        ->toContain("<img src='/vendor/playing-cards/card_back.svg' class='h-24' />");
});
