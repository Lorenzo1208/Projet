<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExpositionController extends AbstractController
{
    #[Route('/exposition', name: 'exposition')]
    public function index(): Response
    {
        return $this->render('exposition/index.html.twig');
    }
}
