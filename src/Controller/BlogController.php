<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BlogController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {

        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('blog.html.twig', [
            'articles' => $articles,
        ]);
    }
}
