<?php

namespace App\Form;

use App\Entity\Producto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Obtengo componente boton submit

class ProductoType extends AbstractType //La clase ProductoType extiende AbstractType, que es la clase base para los formularios en Symfony.
{
    public function buildForm(FormBuilderInterface $builder, array $options): void //Método encargado de definir los campos del formulario.
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('tamanio')
            ->add('guardar', SubmitType::class, [
                'label' => 'Añadir nuevo producto'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void // Configura las opciones predeterminadas del formulario
    {
        $resolver->setDefaults([
            'data_class' => Producto::class, /*Este formulario está diseñado para trabajar con objetos de la clase Producto.
                                                Symfony vincula automáticamente los datos del formulario a un objeto de esta clase.*/
        ]);
    }
}

