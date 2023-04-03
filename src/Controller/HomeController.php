<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
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

    #[Route('/profil', name: 'profil')]
    public function Profil(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher) : Response
    {
         $messagePassword = null;
        if (!$this->getUser()) {
            return $this->redirectToRoute('login');
        }

        if($_POST) {
            $user = $this->getUser();

            if(isset($_POST['email']))
            {
                $user->setEmail($_POST['email']);
            }

            if(isset($_POST['phone']))
            {
                $user->setNumeroTelephone($_POST['phone']);
            }

            if(isset($_FILES['profilPicture']))
            {
                $path = dirname(__DIR__, 2).'/assets/images/profilePictures/';
                $file_name = $this->getUser()->getId() . '.jpg';

                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                if( $_FILES['profilPicture']['tmp_name'] != "" && is_dir($path)) {
                    if(move_uploaded_file($_FILES['profilPicture']['tmp_name'], $path . $file_name))
                    {
                        $user->setPhotoProfil($file_name);
                    }
                }

            }

            if(isset($_POST['password']) || isset($_POST['password_confirm']))
            {
                if($_POST['password'] == $_POST['password_confirm'])
                {
                    if(strlen($_POST['password']) >= 6)
                    {
                        if(strlen($_POST['password']) < 4096) {
                            $user = $this->getUser();
                            if ($user) {
                                $hashedPassword = $passwordHasher->hashPassword(
                                    $user,
                                    $_POST['password']
                                );
                                $user->setPassword($hashedPassword);
                            }
                            else {
                                $messagePassword = 'Une erreur est survenue';
                            }
                        }
                        else {
                            $messagePassword = 'Le mot de passe doit contenir moins de 4096 caractères';
                        }
                    }
                    else {
                        $messagePassword = 'Le mot de passe doit contenir au moins 6 caractères';
                    }
                }
                else {
                    $messagePassword = 'Les mots de passe doivent être identiques';
                }
            }

            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('home/profil.html.twig', [
            'controller_name' => 'Profil',
            'messagePassword' => $messagePassword
        ]);
    }
}
