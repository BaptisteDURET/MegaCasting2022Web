<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\PartenaireDiffusion;
use App\Entity\Professionnel;
use App\Entity\Sexe;
use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registertype', name: 'register_type')]
    public function registerType(EntityManagerInterface $entityManager)
    {
        return $this->render('registration/registerType.html.twig', ['controller_name' => 'Créer un compte']);
    }
    #[Route('/register', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        if (!isset($_POST['type']) && !isset($_POST['registration_form'])) {
            return $this->redirectToRoute('register_type');
        }

        $user = null;

        if ((isset($_POST['type']) && $_POST['type'] == 'Professionnel') || (isset($_POST['registration_form']) && $_POST['registration_form']['discr'] == 'Professionnel')) {
            $user = new Professionnel();
        } else if ((isset($_POST['type']) && $_POST['type'] == 'Artiste') || (isset($_POST['registration_form']) && $_POST['registration_form']['discr'] == 'Artiste')) {
            $user = new Artiste();
        } else if ((isset($_POST['type']) && $_POST['type'] == 'Partenaire') || (isset($_POST['registration_form']) && $_POST['registration_form']['discr'] == 'PartenaireDiffusion')) {
            $user = new PartenaireDiffusion();
        } else if (!isset($_POST['registration_form']['discr'])) {
            return $this->redirectToRoute('register_type');
        }

        if (isset($_POST['type']))
        {
            $user->setDiscr($_POST['type']);
        }
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $_POST['registration_form']['plainPassword']
                )
            );

            if($user->getDiscr() == 'Professionnel' || $user->getDiscr() == 'PartenaireDiffusion') {
                $user->setVerifie(0);
            }

            $user->setNom($_POST['registration_form']['nom']);
            if($user->getDiscr() == 'Artiste') {
                $user->setSexe($entityManager->getRepository(Sexe::class)->find(id: 1));
                $user->setRoles(['ROLE_USER', 'ROLE_ARTISTE']);
            }
            if($user->getDiscr() == 'Professionnel') {
                $user->setRoles(['ROLE_USER', 'ROLE_PROFESSIONNEL']);
            }
            if($user->getDiscr() == 'PartenaireDiffusion') {
                $user->setRoles(['ROLE_USER', 'ROLE_PARTENAIRE']);
            }


            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('login', ['controller_name' => 'Connexion']);
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'controller_name' => 'Créer un compte',
            'type' => $_POST['type'] ?? null
        ]);
    }
}
