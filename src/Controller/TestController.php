<?php

namespace App\Controller;

use App\Repository\ProgrammingLanguageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/test/list", name="test")
     */
    public function list(ProgrammingLanguageRepository $programmingLanguageRepository)
    {
        return $this->render('test/list.html.twig', [
            'controller_name' => 'TestController',
            'languages' => $programmingLanguageRepository->findAll()
        ]);
    }
}
