<?php

namespace ValidacionesBundle\Service;

/**
 * Description of PersonaValidatorService
 *
 * @author emi88
 */
class PersonaValidatorService {
    
    
    public function getPersonaContraints(){
        
        $constraints = array();
        
        $constraints[] = new \Symfony\Component\Validator\Constraints\NotBlank();
        
        
        return $constraints;
    }
    
}
