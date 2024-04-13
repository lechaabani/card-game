<?php

namespace App\Controller;

use App\Helper\CardGameHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GameController extends AbstractController
{
    #[Route('/', name: 'app_game')]
    public function index(): Response
    {
        $suits = $this->getParameter('card_colors');
        $ranks = $this->getParameter('card_values');

        $deck = CardGameHelper::createDeck($suits, $ranks);
        $unsortedHand = CardGameHelper::drawHand($deck);
        $sortedHand = CardGameHelper::sortHand($unsortedHand, $suits, $ranks);

        return $this->render('game/index.html.twig', [
            'unsorted_hand' => $unsortedHand,
            'sorted_hand' => $sortedHand
        ]);
    }
}
