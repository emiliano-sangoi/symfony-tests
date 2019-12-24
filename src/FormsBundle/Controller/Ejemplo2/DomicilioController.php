<?php

namespace FormsBundle\Controller\Ejemplo2;

ini_set('display_errors',1);
use FormsBundle\Entity\Ejemplo2\Domicilio;
use FormsBundle\Entity\Ejemplo2\Localidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Domicilio controller.
 *
 */
class DomicilioController extends Controller
{
    /**
     * Lists all domicilio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $domicilios = $em->getRepository('FormsBundle:Ejemplo2\Domicilio')->findAll();

        return $this->render('FormsBundle:Ejemplo2:index.html.twig', array(
            'domicilios' => $domicilios,
        ));
    }

    /**
     * Creates a new domicilio entity.
     *
     */
    public function newAction(Request $request)
    {
        $domicilio = new Domicilio();
      //  $localidad = new Localidad();
        //$domicilio->setLocalidad($localidad);
        $form = $this->createForm('FormsBundle\Form\Ejemplo2\DomicilioType', $domicilio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($domicilio);exit;
            $em = $this->getDoctrine()->getManager();
            $em->persist($domicilio);
            $em->flush();

            return $this->redirectToRoute('forms_ejemplo2_show', array('id' => $domicilio->getId()));
        }

        return $this->render('FormsBundle:Ejemplo2:new.html.twig', array(
            'domicilio' => $domicilio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a domicilio entity.
     *
     */
    public function showAction(Domicilio $domicilio)
    {
        $deleteForm = $this->createDeleteForm($domicilio);

        return $this->render('FormsBundle:Ejemplo2:show.html.twig', array(
            'domicilio' => $domicilio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing domicilio entity.
     *
     */
    public function editAction(Request $request, Domicilio $domicilio)
    {
        $deleteForm = $this->createDeleteForm($domicilio);
        $editForm = $this->createForm('FormsBundle\Form\Ejemplo2\DomicilioType', $domicilio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forms_ejemplo2_edit', array('id' => $domicilio->getId()));
        }

        return $this->render('FormsBundle:Ejemplo2:edit.html.twig', array(
            'domicilio' => $domicilio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a domicilio entity.
     *
     */
    public function deleteAction(Request $request, Domicilio $domicilio)
    {
        $form = $this->createDeleteForm($domicilio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($domicilio);
            $em->flush();
        }

        return $this->redirectToRoute('forms_ejemplo2_index');
    }

    /**
     * Creates a form to delete a domicilio entity.
     *
     * @param Domicilio $domicilio The domicilio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Domicilio $domicilio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('forms_ejemplo2_delete', array('id' => $domicilio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
