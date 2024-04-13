<?php

// tests/Helper/CardGameHelperTest.php

namespace App\Tests\Helper;

use App\Helper\CardGameHelper;
use PHPUnit\Framework\TestCase;

class CardGameHelperTest extends TestCase
{
    public function testCreateDeck()
    {
        $suits = ['Diamonds', 'Hearts', 'Spades', 'Clubs'];
        $ranks = ['Ace', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King'];

        $deck = CardGameHelper::createDeck($suits, $ranks);

        // Check if the deck contains the correct number of cards
        $this->assertCount(52, $deck);

        // Check for uniqueness of cards
        $this->assertSameSize($deck, array_unique($deck));

        // Optionally check for specific cards to be present
        $this->assertContains('Ace of Diamonds', $deck);
        $this->assertContains('King of Clubs', $deck);
    }

    public function testDrawHand()
    {
        $deck = range(1, 52); // Mock deck of numbers 1-52 for simplicity
        $handSize = 10;
        $hand = CardGameHelper::drawHand($deck, $handSize);

        // Check if the hand contains the correct number of cards
        $this->assertCount($handSize, $hand);

        // Check if the drawn cards are actually from the deck
        foreach ($hand as $card) {
            $this->assertContains($card, $deck);
        }
    }

    public function testSortHand()
    {
        $suits = ['Diamonds', 'Hearts', 'Spades', 'Clubs'];
        $ranks = ['Ace', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King'];

        $unsortedHand = [
            'King of Clubs', '3 of Diamonds', 'Ace of Spades', 'Jack of Hearts'
        ];
        $expectedOrder = [
            '3 of Diamonds', 'Jack of Hearts', 'Ace of Spades', 'King of Clubs'
        ];

        $sortedHand = CardGameHelper::sortHand($unsortedHand, $suits, $ranks);

        // Check if the hand is sorted correctly
        $this->assertEquals($expectedOrder, $sortedHand);
    }
}

