<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class ArticleController extends AbstractController
{

    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {

        $articles = $this->getDoctrine()->getRepository(Article::class)->findBy([], [], 3);

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
