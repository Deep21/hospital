<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Patient;
use AppBundle\Form\Patient\AddPatientFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Acl\Exception\Exception;

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
            try {
                $em = $this->getDoctrine()->getManager();
                $patient = $form->getData();
                $patient->setAddress($patient->getAddress());
                $em->persist($patient);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success', 'form.message.register.success');
            } catch (Exception $e) {

            }

        }
        return $this->render('@App/patient/patient.add.html.twig', ['form' => $form->createView()]);
    }


    /**
     * This action will remove a patient
     * If the patient is not exist, an error page will shown
     *
     * @Route("/delete/{patient}", name="delete_patient")
     * @param Patient $patient
     * @param Request $request
     * @return Response
     * @ParamConverter(name="patient", class="AppBundle:Patient")
     */
    public function deletePatientAction(Patient $patient = null, Request $request)
    {
        if (!is_null($patient)) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($patient);
            $em->flush();
        }
        return $this->redirectToRoute('patient_index');
    }


    /**
     * @Route("/edit/{patientDB}", name="edit_patient")
     * @param Patient $patientDB
     * @param Request $request
     * @return Response
     * @ParamConverter(name="patientDB", class="AppBundle:Patient")
     */
    public function editPatientAction(Patient $patientDB, Request $request)
    {
        $form = $this->createForm(AddPatientFormType::class, $patientDB);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $patient = $form->getData();
            $patientDB->setFirstName($patient->getEmail());
            $em->flush();
        }
        return $this->render('@App/patient/patient.add.html.twig', ['form' => $form->createView()]);
    }
}
