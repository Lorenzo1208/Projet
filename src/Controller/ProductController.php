<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     *@Route("/boutique", name= "products")
     */
    public function index(): Response
    {

        $product = $this->entityManager->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig', [

            'products' => $product
        ]);
    }


    /**
     * @Route("/produit/{slug}", name= "product")
     */
    public function show($slug): Response
    {

        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['slug' => $slug]);

        if (!$product) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/show.html.twig', [

            'product' => $product
        ]);
    }
}
