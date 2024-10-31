# Deck of cards

A package to provide an implementation of a deck of cards for fun with [Verbs](verbs.thunk.dev)

To use this package, run ```composer require jamessessford/playing-cards```.

Once installed, you can run ```php artisan vendor:publish --provider=PlayingCards\\PlayingCardsProvider``` to publish the card images to your public directory.

# Usage

```php
use PlayingCards\Deck;
use PlayingCards\CardCollection;

$deck = new Deck();

$cardCollection = CardCollection::make($deck->deal());

$cardImage = card_front($cardCollection->pop());
$cardBackImage = card_back();
```

# Deck contents

4 suits of 13 cards.

The suits in the deck are
    
    Hearts
    Clubs
    Diamonds
    Spades

The cards that make up each suit are

    Ace
    Two
    Three
    Four
    Five
    Six
    Seven
    Eight
    Nine
    Ten
    Jack
    Queen
    King

A deck consists of 52 cards, covering each value for each suit

A deck can be shuffled

A deck can be dealt from

A deck can be queried for remaining cards

# Cards

A card has a suit and a value
