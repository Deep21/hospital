<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/employee")
 */
class EmployeeController extends Controller
{
    /**
     * @Route("/", name="employee_index")
     * @Method(methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $patientsList = $this->getDoctrine()->getRepository('AppBundle:Patient')->findAll();

        return $this->render('@App/patient/patient.html.twig', ['patients' => $patientsList]);
    }


    /**
     * @Route("/login", name="login")
     * @Method(methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {

    }

}
