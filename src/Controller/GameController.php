<?php

namespace App\Controller;

use App\Entity\GameResult;
use App\Repository\GameResultRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game_index")
     */
    public function index(GameResultRepository $gameResultRepository)
    {
        $result = $gameResultRepository->find(1);
        if (null !== $result) {
            return new Response($result->getResult());
        } else {
            return new Response('0');
        }
    }

    /**
     * @Route("/game/modify/{number}", name="game_modify")
     */
    public function modify($number, GameResultRepository $gameResultRepository, EntityManagerInterface $entityManager)
    {
        try {
            $result = $gameResultRepository->find(1);
            if (null === $result) {
                $result = new GameResult();
                $result->setResult($number);
                $entityManager->persist($result);

            } else {
                $result->setResult($result->getResult() + $number);
            }

            $entityManager->flush();
            return new Response('OK');
        } catch (\Throwable $e) {
            return new Response('NOK');
        }

    }
}
