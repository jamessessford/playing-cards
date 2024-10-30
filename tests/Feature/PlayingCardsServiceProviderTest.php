<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;

test('assets can be published', function (): void {
    Storage::fake('public');

    $this->artisan('vendor:publish', [
        '--provider' => 'PlayingCards\\PlayingCardsServiceProvider',
        '--force' => true,
    ]);
});