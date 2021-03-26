<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SolutionController extends AbstractController
{
    /**
     * @Route("/solution", name="solution")
     */
    public function index(): Response
    {
        return $this->render('solution/index.html.twig', [
            'controller_name' => 'SolutionController',
        ]);
    }
}
