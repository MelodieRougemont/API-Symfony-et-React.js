<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]
    public function index(): Response
    {
        return $this->render('produits/index.html.twig', [
            'page_title' => 'Liste des produits',
            'products' => [
                ['name' => 'Produit 1', 'price' => 10],
                ['name' => 'Produit 2', 'price' => 20],
            ],
        ]);
        
    }
}
