<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Author;
use App\Entity\Category;
use App\Entity\Contact;
use App\Entity\Job;
use App\Entity\Employee;
use App\Entity\Testimonial;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 *
 * @author Anais Sparesotto <a.sparesotto@icloud.com>
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @return Response
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        {
            $contact = $this->getDoctrine()->getRepository(Contact::class)->count([]);
            $author = $this->getDoctrine()->getRepository(Author::class)->count([]);
            $employee = $this->getDoctrine()->getRepository(Employee::class)->count([]);
            $articles = $this->getDoctrine()->getRepository(Article::class)->count([]);
            $category = $this->getDoctrine()->getRepository(Category::class)->count([]);
            $testimonial = $this->getDoctrine()->getRepository(Testimonial::class)->count([]);
            $job = $this->getDoctrine()->getRepository(Job::class)->count([]);

            return $this->render('Dashboard/index.html.twig', [
                'contact' => $contact,
                'author' => $author,
                'employee' => $employee,
                'articles' => $articles,
                'category' => $category,
                'testimonial' => $testimonial,
                'job' => $job,
            ]);
        }
    }

    /**
     * @return Dashboard
     */
    public function configureDashboard(): Dashboard
    {

        return Dashboard::new()
            ->setTitle('Kiribati Toovalu')
            ->setTranslationDomain('admin');
    }

    /**
     * @return iterable
     */
    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Email de contact'),
            MenuItem::linkToCrud('Email', 'fa fa-envelope-open-text', Contact::class),


            MenuItem::section('Blog'),
            MenuItem::linkToCrud('Auteurs', 'fa fa-user', Author::class),
            MenuItem::linkToCrud('Categories', 'fa fa-list-alt', Category::class),
            MenuItem::linkToCrud('Articles', 'fa fa-book', Article::class),

            MenuItem::section('Entreprise'),
            MenuItem::linkToCrud('Salariés', 'fa fa-users', Employee::class),
            MenuItem::linkToCrud('Métier', 'fa fa-briefcase', Job::class),

            MenuItem::section('Témoignages'),
            MenuItem::linkToCrud('Témoignage', 'fa fa-comments', Testimonial::class),

        ];
    }
}
