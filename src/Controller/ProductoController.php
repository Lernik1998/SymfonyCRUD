<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductoRepository; // Importo el repositorio de producto
use App\Entity\Producto;

class ProductoController extends AbstractController
{
    // Obtenemos todos los productos
    #[Route('/producto', name: 'producto_index')]
    public function index(ProductoRepository $productoRepository): Response
    {

        $todosProductos = $productoRepository->findAll();

        return $this->render('producto/index.html.twig', [
            'productos' => $todosProductos
        ]);
    }


    // Obtenemos un producto
    #[Route('producto/{id<\d+>}', name: 'producto_unProducto')]
    public function unProducto(Producto $producto): Response
    {
        // Si el producto no existe, redirigimos a la página de error 404
        if ($producto === null) {
            throw $this->createNotFoundException("El producto no existe");
        }

        return $this->render('producto/unProducto.html.twig', [
            'producto' => $producto
        ]);
    }

    // Añadimos un producto
    #[Route('/producto/nuevo', name: 'producto_nuevo')]
    public function nuevoProducto(): Response
    {
        return $this->render('producto/nuevo.html.twig');
    }
}
