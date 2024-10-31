<?php

declare(strict_types=1);

namespace PlayingCards;

use Illuminate\Support\ServiceProvider;

class PlayingCardsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/images' => public_path('vendor/playing-cards'),
        ], 'public');
    }
}
