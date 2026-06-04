<?php
namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EtablissementController extends AbstractController
{
    #[Route('/etablissements', name: 'app_front_etablissement_index')]
    public function index(): Response
    {
        $etablissements = [
        [
            'id' => 1,
            'nom' => 'Université de Lomé (UL)',
            'ville' => 'Lomé',
            'type' => 'Public',
            'description' => 'Le plus grand établissement public d\'enseignement supérieur du Togo, offrant des formations diversifiées.'
        ],
        [
            'id' => 2,
            'nom' => 'École Polytechnique de Lomé (EPL)',
            'ville' => 'Lomé',
            'type' => 'Public / Spécialisé',
            'description' => 'Institution d\'excellence formant des ingénieurs et techniciens supérieurs dans les domaines technologiques.'
        ],
        [
            'id' => 3,
            'nom' => 'Institut Africain d\'Administration (IAEC)',
            'ville' => 'Lomé',
            'type' => 'Privé',
            'description' => 'Établissement privé réputé pour ses formations en sciences de gestion, informatique et commerce international.'
        ]
    ];

        return $this->render('front/etablissement/index.html.twig', [
            'etablissements' => $etablissements
        ]);
    }
}