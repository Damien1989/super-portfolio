<?php

namespace App\Controller;

use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $game = $managerRegistry->getRepository(Project::class)->findAll();

        return $this->render('game/index.html.twig', [
            'game' => 'games',
        ]);
    }
}
