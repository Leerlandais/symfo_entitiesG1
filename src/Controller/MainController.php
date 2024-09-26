<?php

namespace App\Controller;

use App\Repository\SectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(SectionRepository $sections): Response
    {
        return $this->render('main/index.html.twig', [
            'title' => 'Homepage',
            'homepage_text' => "Nous sommes le".date("d/m/Y \à H:i e-GMT"),
            'sections' => $sections->findAll()
        ]);
    }
    #[Route('/about', name: 'about')]
    public function about(SectionRepository $sections): Response
    {
        return $this->render('main/about.html.twig', [
            'title' => 'About',
            'homepage_text' => 'Code, Eat, Sleep, Repeat',
            'sections' => $sections->findAll()
        ]);
    }

    #[Route(
        path: '/section/{id}',
        name: 'section',
        requirements: ['id' => '\d+'],
        defaults: ['id' => 1])]
    public function section(SectionRepository $sections, int $id): Response
    {
        $section = $sections->find($id);
        return $this->render('main/section.html.twig',
            ['title' => 'Section '.$section->getSectionTitle(),
                'homepage_text' => "Code, Eat, Sleep, Repeat",
                'section' => $section,
                'sections' => $sections->findAll()]);
    }


} // end of Class
