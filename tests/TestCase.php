<?php

declare(strict_types=1);

namespace Tests;

use Glhd\Bits\Support\BitsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use PlayingCards\PlayingCardsServiceProvider;
use Thunk\Verbs\VerbsServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            BitsServiceProvider::class,
            VerbsServiceProvider::class,
            PlayingCardsServiceProvider::class,
        ];
    }
}
