<?php

namespace App\Controller;

use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="event")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $events = $managerRegistry->getRepository(Project::class)->findAll();

        return $this->render('event/index.html.twig', [
            'events' => 'events',
        ]);
    }
}
