<?php

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'productos')]
class Producto
{
    #[ODM\Id]
    private ?string $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $nombre = null;

    #[ODM\Field(type: 'int')]
    private ?int $precio = null;

    #[ODM\Field(type: 'int')]
    private ?int $stock = null;

    #[ODM\ReferenceOne(targetDocument: Categoria::class, inversedBy: 'productos')]
    private ?Categoria $categoria = null;

    #[ODM\ReferenceMany(targetDocument: Pedido::class, mappedBy: 'productos')]
    private Collection $pedidos;

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
    }

    public function getId(): ?string { return $this->id; }

    public function getNombre(): ?string { return $this->nombre; }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPrecio(): ?int { return $this->precio; }

    public function setPrecio(int $precio): static
    {
        $this->precio = $precio;
        return $this;
    }

    public function getStock(): ?int { return $this->stock; }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;
        return $this;
    }

    public function getCategoria(): ?Categoria { return $this->categoria; }

    public function setCategoria(?Categoria $categoria): static
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function getPedidos(): Collection { return $this->pedidos; }
}