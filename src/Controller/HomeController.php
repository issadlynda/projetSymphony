<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Vérifie si l'utilisateur est authentifié
        $user = $this->getUser();

        // Si l'utilisateur n'est pas authentifié, afficher un message différent
        if (!$user) {
            return $this->render('home/index.html.twig', [
                'welcome_message' => 'Bienvenue sur notre Freelance plateforme ! Veuillez vous connecter pour accéder à toutes les fonctionnalités.',
            ]);
        }

        // Si l'utilisateur est authentifié, afficher un message personnalisé
        return $this->render('home/index.html.twig', [
            'welcome_message' => 'Bienvenue sur notre Freelance plateforme, ' . $user->getEmail() . ' !',
        ]);
    }
}
