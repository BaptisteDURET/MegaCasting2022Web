<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function HomePage(): Response
    {
        return $this->render('home/test.html.twig', [
            'controller_name' => 'Page d\'accueil',
        ]);
    }
}
