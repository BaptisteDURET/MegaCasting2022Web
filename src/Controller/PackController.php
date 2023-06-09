<?php

namespace App\Controller;

use App\Entity\PackDeCastings;
use App\Entity\Professionnel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PackController extends AbstractController
{
    #[Route('/pack/acheter', name: 'afficher_packs')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        if(!in_array('ROLE_PROFESSIONNEL', $this->getUser()->getRoles()))
        {
            return $this->redirectToRoute('home');
        }

        $packs = $entityManager->getRepository(PackDeCastings::class)->findAll();

        return $this->render('pack/achat-pack.html.twig', [
            'controller_name' => 'Achat de pack',
            'packs' => $packs
        ]);
    }

    #[Route('/pack/{id}/buy', name: 'achat_pack')]
    public function achatPack(EntityManagerInterface $entityManager, $id): Response
    {
        if($this->getUser() != null) {
            if ($this->getUser() == null || !in_array('ROLE_PROFESSIONNEL', $this->getUser()->getRoles())) {
                return $this->redirectToRoute('home');
            }
        }
        else
        {
            return $this->redirectToRoute('home');
        }

        $pack = $entityManager->getRepository(PackDeCastings::class)->find(id: $id);

        $entityManager->getRepository(Professionnel::class)->buyPack($this->getUser()->getId(), $pack->getId(), connection: $entityManager->getConnection());

        if(isset($pack) && !empty($this->getUser()))
        {
            return $this->redirectToRoute('afficher_packs', array('message' => 'Achat effectué avec succès'));
        }

        return $this->redirectToRoute('afficher_packs', ['message' => 'Ce pack n\'existe pas']);
    }
}
