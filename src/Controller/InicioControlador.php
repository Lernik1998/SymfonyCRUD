<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InicioControlador extends AbstractController
{

    #[Route('/', name: 'inicio_index')]
    public function index(): Response
    {
        return $this->render('Inicio/index.html.twig');
    }
}



