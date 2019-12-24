<?php

namespace FormsBundle\Form\Ejemplo2;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DomicilioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('calle')
          ->add('numero')
          ->add('localidad', EntityType::class, array(
              'class' => \FormsBundle\Entity\Ejemplo2\Localidad::class,
              'placeholder' => 'Seleccione una localidad',
              'attr' => array(
                  'class' => 'select-localidad'
              )
          ))
          ->add('departamento', EntityType::class, array(   
              'class' => \FormsBundle\Entity\Ejemplo2\Departamento::class,
              'mapped' => false,
              'placeholder' => 'Seleccione un departamento',
              'attr' => array(
                  'class' => 'select-departamento'
              )
          ))
          ->add('provincia', EntityType::class, array(   
              'class' => \FormsBundle\Entity\Ejemplo2\Provincia::class,
              'mapped' => false,
              'placeholder' => 'Seleccione una provincia',
              'attr' => array(
                  'class' => 'select-provincia'
              )
          ));
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FormsBundle\Entity\Ejemplo2\Domicilio',
            //'compound' => true,
            //'by_reference' => true
        ));
    }


}
