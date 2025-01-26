<?php

declare(strict_types=1);

namespace PlayingCards;

use BadMethodCallException;
use Error;
use ErrorException;
use Illuminate\Support\Collection;
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

    public function boot(): void
    {
        /**
         * @var string $key
         * @var class-string<Enum> $enum
         * */
        Collection::macro('sortByEnumCases', function (string $key, string $enum) {
            try {
                $enumCases = $enum::cases();
            } catch (Error|BadMethodCallException $e) {
                throw new ErrorException("Is {$enum} an Enum class?");
            }

            /** @var Collection $this */
            return $this->sortBy(fn(object $entry) => array_search($entry->{$key}, $enumCases));
        });
    }
}
