<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/etablissements')]
class AdminEtablissementController extends AbstractController
{
    #[Route('/', name: 'admin_etablissement_index')]
    public function index(): Response
    {
        return $this->render('admin/etablissement/index.html.twig', [
            'controller_name' => 'AdminEtablissementController',
        ]);
    }
}
