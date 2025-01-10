<?php
//Define que esta clase pertenece al App\Entity
namespace App\Entity;
// use = import
use App\Repository\ProductoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Restriccion;

#[ORM\Entity(repositoryClass: ProductoRepository::class)] //Declara esta clase como Doctrine lo que significa que mapeara una tabla en la base de datos
class Producto
{
    #[ORM\Id] //Define que es clave primaria
    #[ORM\GeneratedValue] //Define que se genera automaticamente
    #[ORM\Column] //Mapea esta propiedad a una colunma de la tabla de la bd
    private ?int $id = null;//Define el tipo de dato como un entero opcional (?int), con un valor inicial null.

    #[ORM\Column(length: 120)] // Mapea esta propiedad a una columna de tipo string con un máximo de 120 caracteres
    #[Restriccion\NotBlank] //Indica que esta variable no puede estar vacia 
    private ?string $nombre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column] //Mapea esta propiedad a una columna de la base de datos.
    #[Restriccion\NotBlank] //Valida que el valor no esté vacío.
    #[Restriccion\Type('integer')] //Valida que el valor sea de tipo entero.
    #[Restriccion\Positive]
    private ?int $tamanio = null;

    //Métodos de Acceso (Getters y Setters)
    public function getId(): ?int //Puede ser int o null
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {

        if (empty($nombre)) {
            throw new \InvalidArgumentException('El nombre no puede estar vacío.');
        }

        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getTamanio(): ?int
    {
        return $this->tamanio;
    }

    public function setTamanio(int $tamanio): static
    {
        $this->tamanio = $tamanio;

        return $this;
    }
}
/*Atributos de Doctrine (#[ORM...]) para mapear propiedades a columnas de una tabla.
Restringen los valores de las propiedades mediante restricciones de Symfony Validator (#[Restriccion...]) */