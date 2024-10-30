<?php

declare(strict_types=1);

namespace PlayingCards;

use Illuminate\Support\Collection;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Thunk\Verbs\SerializedByVerbs;

class CardCollection extends Collection implements SerializedByVerbs
{
    public static function deserializeForVerbs(mixed $data, DenormalizerInterface $denormalizer): static
    {
        return static::make($data)
            ->map(fn($serialized) => Card::deserializeForVerbs($serialized, $denormalizer));
    }

    public function serializeForVerbs(NormalizerInterface $normalizer): string|array
    {
        return $this->map(fn(Card $card) => $card->serializeForVerbs($normalizer))->toJson();
    }
}
