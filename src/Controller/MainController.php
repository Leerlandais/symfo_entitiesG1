<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'title' => 'Homepage',
            'homepage_text' => "Nous sommes le".date("d/m/Y \à H:i e-GMT")
        ]);
    }
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('main/about.html.twig', [
            'title' => 'About',
            'homepage_text' => 'Code, Eat, Sleep, Repeat'
        ]);
    }
}
