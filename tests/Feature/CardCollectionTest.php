<?php

declare(strict_types=1);

use PlayingCards\Card;
use PlayingCards\CardCollection;
use PlayingCards\Enums\Suit;
use PlayingCards\Enums\Value;
use Tests\Setup\States\DummyState;
use Thunk\Verbs\Facades\Verbs;
use Thunk\Verbs\Models\VerbSnapshot;

test('a card collection can be created', function (): void {
    $card = new Card(suit: Suit::Hearts, value: Value::Ace);

    $cardCollection = CardCollection::make([$card]);

    expect($cardCollection->count())
        ->toBe(1);
});

test('a card collection can be used in a verbs state', function (): void {
    Verbs::fake();

    $card = new Card(suit: Suit::Hearts, value: Value::Ace);

    $dummyState = DummyState::factory()
        ->id(124)
        ->create(data: ['cards' => CardCollection::make([$card])]);

    expect(get_class($dummyState->cards))
        ->toBe(CardCollection::class);

    Verbs::commit();

    /** @var DummyState $snapshot_state */
    $snapshot_state = VerbSnapshot::query()
        ->firstWhere('type', DummyState::class)
        ->state();

    expect(serialize($snapshot_state->cards))->toBe(serialize($dummyState->cards));
});
