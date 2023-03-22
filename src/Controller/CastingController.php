<?php

namespace App\Controller;

use App\Entity\Casting;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CastingController extends AbstractController
{
    #[Route('/casting/all', name: 'castings')]
    public function AllCastings(EntityManagerInterface $entityManager): Response
    {

        $castings = $entityManager->getRepository(Casting::class)->findAll();
        if ($castings == null) {
            return new Response("Aucun casting trouvé");
        }
        return $this->render('casting/offresCasting.html.twig', array('castings' => $castings, 'route' => 'Tous nos castings'));
    }

    #[Route('/casting/{id}', name: 'casting')]
    public function OneCasting(EntityManagerInterface $entityManager, $id): Response
    {

        $casting = $entityManager->getRepository(Casting::class)->find(id: $id);
        if ($casting == null) {
            return new Response("Casting introuvable");
        }
        $idCast = $casting->getId();
        return $this->render('casting/offreCasting.html.twig', array('casting' => $casting, 'route' => 'Casting n°' . $idCast));
    }

}
