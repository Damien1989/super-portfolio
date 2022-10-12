<?php

namespace App\Controller;

use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $services = $managerRegistry->getRepository(Project::class)->findAll();

        return $this->render('services/index.html.twig', [
            'service' => 'services',
        ]);
    }
}
