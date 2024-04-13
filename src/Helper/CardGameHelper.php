<?php

// src/Helper/CardGameHelper.php

namespace App\Helper;

class CardGameHelper
{
    // Create a deck of cards with mixed suits and ranks
    public static function createDeck(array $suits, array $ranks): array
    {
        $deck = [];
        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                $deck[] = "$rank of $suit";
            }
        }
        shuffle($deck);
        return $deck;
    }

    // Draw a hand of cards from the deck
    public static function drawHand(array $deck, int $number = 10): array
    {
        return array_slice($deck, 0, $number);
    }

    // Sort a hand of cards based on the order of suits and ranks
    public static function sortHand(array $hand, array $suits, array $ranks): array
    {
        usort($hand, function ($cardA, $cardB) use ($suits, $ranks) {
            [$rankA, $suitA] = explode(' of ', $cardA);
            [$rankB, $suitB] = explode(' of ', $cardB);
            $suitPosA = array_search($suitA, $suits);
            $suitPosB = array_search($suitB, $suits);
            $rankPosA = array_search($rankA, $ranks);
            $rankPosB = array_search($rankB, $ranks);
            return $suitPosA <=> $suitPosB ?: $rankPosA <=> $rankPosB;
        });
        return $hand;
    }
}
