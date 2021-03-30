<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentType;
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
        $comments = $this->getDoctrine()->getRepository(Comment::class)->findBy([
            'article' => $article,
        ],['createdAt' => 'desc']);

        if(!$article){
            throw $this->createNotFoundException('L\'article n\'existe pas');
        }

        $comments = new Comment();

        $form = $this->createForm(CommentType::class, $comments);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comments->setArticle($article);
            $comments->setCreatedAt(new DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($comments);
            $em->flush();
        }

        return $this->render('article/article.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
            'comments' => $comments,
        ]);

    }

}
