<?php

namespace ValidacionesBundle\Entity;

/**
 * Description of Persona
 *
 * @author emi88
 */
class PersonaConMetadata extends Persona{

    public static function loadValidatorMetadata(\Symfony\Component\Validator\Mapping\ClassMetadata $metadata){
        
        $metadata->addPropertyConstraint('nombre', new \Symfony\Component\Validator\Constraints\NotBlank());

        // todas las constraints que hagan falta ...
        
        
        
    }

}
