<?php

namespace App\Controller;

use App\Entity\Partners;
use App\Entity\Testimonial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AboutController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="about")
     */
    public function index(): Response
    {

        $testimonoial = $this->getDoctrine()->getRepository(Testimonial::class)->findAll();
        $partner = $this->getDoctrine()->getRepository(Partners::class)->findAll();

        return $this->render('about.html.twig', [
            'testimonials' => $testimonoial,
            'partners' => $partner,
        ]);
    }
}
