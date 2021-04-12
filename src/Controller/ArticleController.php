<?php

namespace App\Controller;

use App\Entity\Article;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 * @Route("/actualites", name="actualites_")
 */
class ArticleController extends AbstractController
{

    /**
     * @Route("/{slug}", name="article")
     * @param         $slug
     * @param Request $request
     * @return Response
     */
    public function index($slug, Request $request): Response
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findOneBy(['slug' => $slug]);

        if (!$article) {
            throw $this->createNotFoundException('L\'article n\'existe pas');
        }

        return $this->render('article/article.html.twig', [
            'article' => $article,
        ]);
    }
}
