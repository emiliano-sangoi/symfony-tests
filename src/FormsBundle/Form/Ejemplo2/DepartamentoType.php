<?php

namespace FormsBundle\Form\Ejemplo2;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use FormsBundle\Entity\Ejemplo2\Provincia;

class DepartamentoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    // public function buildForm(FormBuilderInterface $builder, array $options)
    // {
    //     $builder
    //       ->add('provincia', EntityType::class, array(
    //         'class' => Provincia::class
    //       ));
    // }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            //'data_class' => 'FormsBundle\Entity\Ejemplo2\Departamento'
            'class' => 'FormsBundle\Entity\Ejemplo2\Departamento',
            'compound' => true,
            'empty_data' => null
        ));
    }


    public function getParent(){
      return LocalidadType::class;
    }


}
