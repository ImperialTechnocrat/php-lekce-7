<?php

namespace App\Controller;

use App\Repository\ProgrammingLanguageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test_index")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/test/list", name="test_list")
     */
    public function list(ProgrammingLanguageRepository $programmingLanguageRepository)
    {
        return $this->render('test/list.html.twig', [
            'controller_name' => 'TestController',
            'languages' => $programmingLanguageRepository->findAll()
        ]);
    }

    /**
     * @Route("/test/known", name="test_known")
     */
    public function known(ProgrammingLanguageRepository $programmingLanguageRepository)
    {
        return $this->render('test/known.html.twig', [
            'controller_name' => 'TestController',
            'languages' => $programmingLanguageRepository->findKnown()
        ]);
    }
}
