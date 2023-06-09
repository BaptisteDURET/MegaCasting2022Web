<?php

namespace App\Controller;

use App\Entity\Casting;
use App\Entity\DomaineMetier;
use App\Entity\Metier;
use App\Entity\TypeContrat;
use App\Form\CreateCastingType;
use Doctrine\Common\Collections\ArrayCollection;
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
        $domaine = null;
        $metier = null;
        $typeContrat = null;
        $search = false;


        if ($_GET)
        {
            $intitule = $_GET['recherche'];
            $metier = $_GET['metier'];
            $typeContrat = $_GET['TypesContrat'];

        }

        $castings = $entityManager->getRepository(Casting::class)->findAll();
        $result = null;

        if (isset($intitule) || isset($domaine) || isset($metier) || isset($typeContrat))
        {
            $result = $entityManager->getRepository(Casting::class)->findBySearch($intitule, $metier, $typeContrat);
            $search = true;
        }

        $metiers = $entityManager->getRepository(Metier::class)->findAll();
        $domainesMetiers = $entityManager->getRepository(DomaineMetier::class)->findAll();
        $typesContrats = $entityManager->getRepository(TypeContrat::class)->findAll();

        if ($castings == null) {
            return $this->render('casting/offresCasting.html.twig', array('castings' => null, 'route' => 'Aucun casting', 'controller_name' => 'Castings'));
        }

        return $this->render('casting/offresCasting.html.twig',
            array(
                'castings' => $castings,
                'route' => 'Tous nos castings',
                'controller_name' => 'Castings',
                'result' => $result,
                'search' => $search,
                'value' => $recherche->intitule ?? null,
                'filters' => array(
                    'metiers' => $metiers,
                    'domainesMetiers' => $domainesMetiers,
                    'typesContrats' => $typesContrats
                )
            )
        );
    }

    #[Route('/casting/{id}', name: 'casting')]
    public function OneCasting(EntityManagerInterface $entityManager, $id): Response
    {
        $casting = $entityManager->getRepository(Casting::class)->find(id: $id);
        if ($casting == null) {
            return $this->render('casting/offreCasting.html.twig', array('casting' => null, 'route' => 'Aucun casting', 'controller_name' => 'Casting'));
        }


        $foreignKeys = [
            'sexe' => $casting->getSexe()?->getLibelle(),
            'typeContrat' => $casting->getTypeContrat()->getLibelleCourt(),
            'metier' => $casting->getMetier()->getLibelle()
        ];
        return $this->render('casting/offreCasting.html.twig', array('casting' => $casting, 'controller_name' => 'Casting n°' . $casting->getId(), 'foreignKeys' => $foreignKeys));
    }

    #[Route('/create/casting', name: 'create_casting')]
    public function CreateCasting(EntityManagerInterface $entityManager): Response
    {

        if (!in_array('ROLE_PROFESSIONNEL', $this->getUser()->getRoles()))
        {
            return $this->redirectToRoute('home');
        }

        $form = $this->createForm(CreateCastingType::class, new Casting());

        if ($form->isSubmitted()) {
            dd('ok');
            $casting = $form->getData();
            $casting->setProfessionnel($this->getUser());
            $entityManager->persist($casting);
            $entityManager->flush();
            return $this->redirectToRoute('castings');
        }

        return $this->render('casting/createCasting.html.twig', array('form' => $form->createView(), 'controller_name' => 'Créer un casting'));
    }

}
