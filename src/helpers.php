<?php

declare(strict_types=1);

use Illuminate\Support\HtmlString;
use PlayingCards\Card;

if ( ! function_exists('get_card')) {
    function get_card(Card|array $card): HtmlString
    {
        $suit = mb_strtolower($card->suit->name ?? $card['suit']);
        $value = mb_strtolower($card->value->name ?? $card['value']);

        return new HtmlString(<<<html
        <img src='/vendor/playing-cards/{$value}_of_{$suit}.svg' class='h-24' />
        html);
    }
}

if ( ! function_exists('card_back')) {
    function card_back(): HtmlString
    {
        return new HtmlString(<<<html
        <img src='/vendor/playing-cards/card_back.svg' class='h-24' />
        html);
    }
}
