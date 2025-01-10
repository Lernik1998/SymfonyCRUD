<?php
namespace App\Controller;

/*
Para cargar desde el controlador el contenido de la plantilla primero hay
extender de una clase base.
*/
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\ProductoRepository; // Importo el repositorio de producto
use App\Entity\Producto; // Importo el Modelo de Producto
use App\Form\ProductoType; // Importo el formulario
use Symfony\Component\HttpFoundation\Request;// Importo la clase de petición
use Doctrine\ORM\EntityManagerInterface; // Clase para acceder a BD

class ProductoController extends AbstractController
{
    // Obtenemos todos los productos (READ VIEW)
    #[Route('/producto', name: 'producto_index')]
    public function index(ProductoRepository $productoRepository): Response
    {
        $todosProductos = $productoRepository->findAll();

        return $this->render('producto/index.html.twig', [
            'productos' => $todosProductos
        ]);
    }

    // Obtenemos un producto (READ SINGLE VIEW)
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

    // Añadimos un producto (CREATE VIW)
    #[Route('/producto/nuevo', name: 'producto_nuevo')]
    public function nuevoProducto(Request $request, EntityManagerInterface $emanager): Response
    {
        // Este objeto actuará como modelo para los datos introducidos en el formulario (Indica los atributos de la clase)
        $producto = new Producto();

        /* Creamos un formulario pasandole el archivo de la estructura del formulario de Producto
        y el producto creado anteriormente, para asociar los datos de instancia de la clase (OBJETO) al formulario*/
        $formulario = $this->createForm(ProductoType::class, $producto);// Los datos introducidos se mapean automáticamente a las propiedades del objeto

        $formulario->handleRequest($request); // Recogemos la petición

        if ($formulario->isSubmitted() && $formulario->isValid()) { // Verificamos si el formulario ha sido enviado y es valido

            // Marca el objeto a guardar
            $emanager->persist($producto);
            $emanager->flush(); // Guarda los cambios en la BD

            // Mensaje flash
            $this->addFlash('mensaje', 'Producto creado correctamente!');

            return $this->redirectToRoute('producto_unProducto', ['id' => $producto->getId()]);
        }

        // Pasamos el formulario a la vista
        return $this->render('producto/nuevo.html.twig', [
            'formulario' => $formulario
        ]);
    }

    #[Route('/producto/{id<\d+>}/editar', name: 'producto_editar')]
    public function editarProducto(Request $request, EntityManagerInterface $emanager, Producto $producto): Response
    {
        $formulario = $this->createForm(ProductoType::class, $producto);// Los datos introducidos se mapean automáticamente a las propiedades del objeto

        $formulario->handleRequest($request); // Recogemos la petición

        if ($formulario->isSubmitted() && $formulario->isValid()) { // Verificamos si el formulario ha sido enviado y es valido

            $emanager->flush(); // Guarda los cambios en la BD

            // Mensaje flash
            $this->addFlash('mensaje', 'Producto editado correctamente!');

            return $this->redirectToRoute('producto_unProducto', ['id' => $producto->getId()]);
        }

        // Pasamos el formulario a la vista
        return $this->render('producto/editar.html.twig', [
            'formulario' => $formulario
        ]);
    }


    #[Route('/producto/{id<\d+>}/eliminar', name: 'producto_eliminar')]
    public function eliminarProducto(Request $request, EntityManagerInterface $emanager, Producto $producto): Response
    {

        if ($request->isMethod('POST')) {
            $emanager->remove($producto);
            $emanager->flush();

            // Mensaje flash
            $this->addFlash('mensaje', 'Producto eliminado correctamente!');

            return $this->redirectToRoute('producto_index');
        }

        return $this->render('producto/eliminar.html.twig', [
            'id' => $producto->getId()
        ]);
    }

}