<?php

namespace App\Controller;

use App\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employee", name="employee")
     */
    public function index(): Response
    {

        $employees = $this->getDoctrine()->getRepository(Employee::class)->findAll();

        return $this->render('employee.html.twig', [
            'employees' => $employees,
        ]);
    }
}
