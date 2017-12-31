<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/room")
 */
class RoomController extends Controller
{
    /**
     * @Route("/", name="room_index")
     * @Method(methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $patientsList = $this->getDoctrine()->getRepository('AppBundle:Patient')->findAll();

        return $this->render('@App/patient/patient.html.twig', ['patients' => $patientsList]);
    }

}
