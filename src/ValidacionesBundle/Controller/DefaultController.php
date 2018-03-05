<?php

namespace ValidacionesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use ValidacionesBundle\Entity\Persona;
use ValidacionesBundle\Entity\PersonaConMetadata;
use ValidacionesBundle\Form\PersonaType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ValidacionesBundle:Default:index.html.twig');
    }
    
    /**
     * Crear una entidad hija que contenga la validacion.
     * 
     * Lo importante es definir en la clase PersonaConMetadata el metodo que carga las validaciones (loadValidatorMetadata).
     * 
     * Ref:
     *  - https://symfony.com/doc/2.8/components/validator/metadata.html
     *  - https://symfony.com/doc/2.8/reference/constraints/Callback.html
     *  - 
     * 
     * @param Request $request
     * @return type
     */
    public function caso1Sol1Action(Request $request){
        
        $persona = new PersonaConMetadata();
        $form = $this->createForm(PersonaType::class, $persona, array(
            'data_class' => PersonaConMetadata::class
        ));
        $form->add('Guardar', SubmitType::class);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            
            dump($form->getErrors(true));
            exit;
            
            
        }
        
        
        
        return $this->render('ValidacionesBundle:Default:caso1.html.twig', 
                array('form' => $form->createView()));
        
    }
    
    public function caso1Action(Request $request){
        
        $persona = new Persona();
        $form = $this->createForm(PersonaType::class, $persona);
        $form->add('Guardar', SubmitType::class);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            
            //$validator = $this->get('validator');
            //dump($validator);exit;
            
            $personaValidator = $this->get('persona.validator.service');
            //$personaConstraints = $personaValidator->getPersonaContraints();
            //dump($personaConstraints);exit;
            
            
            dump($form->getErrors());exit;
            
            
        }
        
        
        
        return $this->render('ValidacionesBundle:Default:caso1.html.twig', 
                array('form' => $form->createView()));
        
    }
    
    
    
}
