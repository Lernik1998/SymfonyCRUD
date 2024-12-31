<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Producto; // Obtengo el modelo

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $producto = new Producto();
        $producto->setNombre('Producto 1');
        $producto->setDescripcion('Descripcion del producto 1');
        $producto->setTamanio(100);

        $manager->persist($producto);

        $producto2 = new Producto();
        $producto2->setNombre('Producto 2');
        $producto2->setDescripcion('Descripcion del producto 2');
        $producto2->setTamanio(50);

        $manager->persist($producto2);

        $manager->flush(); // Guarda los cambios en la BD
    }
}
