<?php
namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/filieres', name: 'app_front_filiere_')]
class FiliereController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // Simulation de données pour Twig
        $filieres = [
            ['id' => 1, 'nom' => 'Génie Logiciel', 'description' => 'Développement et architecture web', 'debouches' => 'Développeur Fullstack, Architecte Logiciel, Chef de projet'],
            ['id' => 2, 'nom' => 'Réseaux et Télécoms', 'description' => 'Infrastructures et sécurité', 'debouches' => 'Ingénieur Réseaux, Technicien Télécoms'],
            [
            'id' => 4,'nom' => 'Intelligence Artificielle','description' => 'Développement et application d\'algorithmes d\'intelligence artificielle, apprentissage automatique et traitement du langage naturel.',
            'debouches' => 'Développeur Fullstack, Architecte Logiciel, Chef de projet']
        ];

        return $this->render('front/filiere/index.html.twig', [
            'filieres' => $filieres
        ]);
    }

    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(int $id): Response
    {
        // Simulation d'une filière unique
        $filieres = [
            ['id' => 1, 'nom' => 'Génie Logiciel', 'description' => 'Développement et architecture web', 'debouches' => 'Développeur Fullstack, Architecte Logiciel, Chef de projet'],
            ['id' => 2, 'nom' => 'Réseaux et Télécoms', 'description' => 'Infrastructures et sécurité', 'debouches' => 'Ingénieur Réseaux, Technicien Télécoms'],
            ['id' => 4, 'nom' => 'Intelligence Artificielle', 'description' => 'Développement et application d\'algorithmes d\'intelligence artificielle, apprentissage automatique et traitement du langage naturel.', 'debouches' => 'Développeur Fullstack, Architecte Logiciel, Chef de projet']
        ];
        $filiere = $filieres[$id - 1] ?? $filieres[0];

        return $this->render('front/filiere/show.html.twig', [
            'filiere' => $filiere
        ]);
    }
}