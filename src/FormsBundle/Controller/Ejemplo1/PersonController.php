<?php

namespace FormsBundle\Controller\Ejemplo1;

use FormsBundle\Entity\Ejemplo1\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

// Include JSON Response
use Symfony\Component\HttpFoundation\JsonResponse;
// https://ourcodeworld.com/articles/read/652/how-to-create-a-dependent-select-dependent-dropdown-in-symfony-3


/**
 * Person controller.
 *
 * @Route("person")
 */
class PersonController extends Controller
{

  public function depSelectBasicoAction()
  {
      return $this->render('FormsBundle:Default:dependant-select-basico.html.twig');
  }

  /**
   * Returns a JSON string with the neighborhoods of the City with the providen id.
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function getBarriosPorCiudadAction(Request $request)
  {
      // Get Entity manager and repository
      $em = $this->getDoctrine()->getManager();
      $neighborhoodsRepository = $em->getRepository("FormsBundle:Ejemplo1\Neighborhood");

      // Search the neighborhoods that belongs to the city with the given id as GET parameter "cityid"
      $neighborhoods = $neighborhoodsRepository->createQueryBuilder("q")
          ->where("q.city = :cityid")
          ->setParameter("cityid", $request->query->get("cityid"))
          ->getQuery()
          ->getResult();

      // Serialize into an array the data that we need, in this case only name and id
      // Note: you can use a serializer as well, for explanation purposes, we'll do it manually
      $responseArray = array();
      foreach($neighborhoods as $neighborhood){
          $responseArray[] = array(
              "id" => $neighborhood->getId(),
              "name" => $neighborhood->getName()
          );
      }

      // Return array with structure of the neighborhoods of the providen city id
      return new JsonResponse($responseArray);

      // e.g
      // [{"id":"3","name":"Treasure Island"},{"id":"4","name":"Presidio of San Francisco"}]
  }


    /**
     * Lists all person entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $people = $em->getRepository('FormsBundle:Ejemplo1\Person')->findAll();

        return $this->render('FormsBundle:Ejemplo1:index.html.twig', array(
            'people' => $people,
        ));
    }

    /**
     * Creates a new person entity.
     *
     */
    public function newAction(Request $request)
    {
        $person = new Person();
        $form = $this->createForm('FormsBundle\Form\Ejemplo1\PersonType', $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('forms_ej1_show_person', array('id' => $person->getId()));
        }

        return $this->render('FormsBundle:Ejemplo1:new.html.twig', array(
            'person' => $person,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a person entity.
     *
     */
    public function showAction(Person $person)
    {
        $deleteForm = $this->createDeleteForm($person);

        return $this->render('FormsBundle:Ejemplo1:show.html.twig', array(
            'person' => $person,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing person entity.
     *
     */
    public function editAction(Request $request, Person $person)
    {
        $deleteForm = $this->createDeleteForm($person);
        $editForm = $this->createForm('FormsBundle\Form\Ejemplo1\PersonType', $person);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('person_edit', array('id' => $person->getId()));
        }

        return $this->render('FormsBundle:Ejemplo1:edit.html.twig', array(
            'person' => $person,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a person entity.
     *
     * @Route("/{id}", name="person_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Person $person)
    {
        $form = $this->createDeleteForm($person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($person);
            $em->flush();
        }

        return $this->redirectToRoute('person_index');
    }

    /**
     * Creates a form to delete a person entity.
     *
     * @param Person $person The person entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Person $person)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('person_delete', array('id' => $person->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
