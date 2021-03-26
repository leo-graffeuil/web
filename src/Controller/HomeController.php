<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Employee;
use App\Entity\Testimonial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findBy([], [], 3);
        $employees = $this->getDoctrine()->getRepository(Employee::class)->findAll();
        $testimonials = $this->getDoctrine()->getRepository(Testimonial::class)->findAll();

        return $this->render('base.html.twig', [
            'articles' => $articles,
            'employees' => $employees,
            'testimonials' => $testimonials,
        ]);
    }
}
