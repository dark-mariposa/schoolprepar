<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminFiliereController extends AbstractController
{
    #[Route('/admin/filiere', name: 'app_admin_filiere')]
    public function index(): Response
    {
        return $this->render('admin/filiere/index.html.twig', [
            'controller_name' => 'AdminFiliereController',
        ]);
    }
}
