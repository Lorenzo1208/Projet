<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Product;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request): Response 
    {
        
        $product = $this->entityManager->getRepository(Product::class)->findAll();

        $search =new Search();
        $form = $this->createForm(SearchType::class, $search);

        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
           
           

            $product = $this->entityManager->getRepository(Product::class)->findWithSearch($search);

        }

        return $this->render('product/index.html.twig', [

            'product' => $product,
            'form' => $form->createView(),
            
        ]);
    }


    /**
     * @Route("/product/{slug}", name= "product")
     */
    public function show($slug): Response
    {

        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['slug' => $slug]);

        if (!$product) {
            return $this->redirectToRoute('product');
        }

        return $this->render('product/show.html.twig', [

            'product' => $product
        ]);
    }
}
