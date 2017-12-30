<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\Patient;
use AppBundle\Form\Patient\AddPatientFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/patient")
 */
class PatientController extends Controller
{
    /**
     * @Route("/", name="patient_index")
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
     * @Route("/add", name="add_patient")
     * @Method(methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function addPatientAction(Request $request)
    {
        $form = $this->createForm(AddPatientFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $patient = $form->getData();
            $patient->setAddress($patient->getAddress());
            $em->persist($patient);
            $em->flush();
        }
        return $this->render('@App/patient/patient.add.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("/delete/{patient}", name="delete_patient")
     * @param Patient $patient
     * @param Request $request
     * @return Response
     * @ParamConverter(name="patient", class="AppBundle:Patient")
     */
    public function deletePatientAction(Patient $patient, Request $request)
    {
        dump($patient);exit;
        return $this->render('@App/patient/patient.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("/edit/{patient}", name="edit_patient")
     * @param Patient $patient
     * @param Request $request
     * @return Response
     * @ParamConverter(name="patient", class="AppBundle:Patient")
     */
    public function editPatientAction(Patient $patient, Request $request)
    {
        $form = $this->createForm(AddPatientFormType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $patient = $form->getData();
            $em->persist($patient);
            $em->flush();
        }
        return $this->render('@App/patient/patient.add.html.twig', ['form' => $form->createView()]);
    }
}
