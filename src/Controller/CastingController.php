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
        $intitule = null;
        if ($_GET)
        {
            $intitule = $_GET['recherche'];
        }
        $castings = $entityManager->getRepository(Casting::class)->findAll();
        $result = null;
        if ($intitule != null)
        {
            $result = $entityManager->getRepository(Casting::class)->findByIntitule($intitule);
        }

        if ($castings == null) {
            return $this->render('casting/offresCasting.html.twig', array('castings' => null, 'route' => 'Aucun casting', 'controller_name' => 'Castings'));
        }
        return $this->render('casting/offresCasting.html.twig', array('castings' => $castings, 'route' => 'Tous nos castings', 'controller_name' => 'Castings', 'result' => $result, 'value' => $intitule));
    }

    #[Route('/casting/{id}', name: 'casting')]
    public function OneCasting(EntityManagerInterface $entityManager, $id): Response
    {

        $casting = $entityManager->getRepository(Casting::class)->find(id: $id);
        if ($casting == null) {
            return $this->render('casting/offreCasting.html.twig', array('casting' => null, 'route' => 'Aucun casting', 'controller_name' => 'Casting'));
        }
        $idCast = $casting->getId();
        return $this->render('casting/offreCasting.html.twig', array('casting' => $casting, 'controller_name' => 'Casting n°' . $idCast));
    }

}
