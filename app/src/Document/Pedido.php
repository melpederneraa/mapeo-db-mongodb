<?php

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'pedidos')]
class Pedido
{
    #[ODM\Id]
    private ?string $id = null;

    #[ODM\Field(type: 'date')]
    private ?\DateTime $fecha = null;

    #[ODM\Field(type: 'int')]
    private ?int $precio = null;

    #[ODM\Field(type: 'string')]
    private ?string $estado = null;

    #[ODM\Field(type: 'bool')]
    private ?bool $entregado = null;

    #[ODM\ReferenceOne(targetDocument: Cliente::class, inversedBy: 'pedidos')]
    private ?Cliente $cliente = null;

    #[ODM\ReferenceMany(targetDocument: Producto::class, inversedBy: 'pedidos')]
    private Collection $productos;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }

    public function getId(): ?string { return $this->id; }

    public function getFecha(): ?\DateTime { return $this->fecha; }

    public function setFecha(\DateTime $fecha): static
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function getPrecio(): ?int { return $this->precio; }

    public function setPrecio(int $precio): static
    {
        $this->precio = $precio;
        return $this;
    }

    public function getEstado(): ?string { return $this->estado; }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;
        return $this;
    }

    public function getEntregado(): ?bool { return $this->entregado; }

    public function setEntregado(bool $entregado): static
    {
        $this->entregado = $entregado;
        return $this;
    }

    public function getCliente(): ?Cliente { return $this->cliente; }

    public function setCliente(?Cliente $cliente): static
    {
        $this->cliente = $cliente;
        return $this;
    }

    public function getProductos(): Collection { return $this->productos; }

    public function addProducto(Producto $producto): static
    {
        if (!$this->productos->contains($producto)) {
            $this->productos->add($producto);
        }

        return $this;
    }

    public function removeProducto(Producto $producto): static
    {
        $this->productos->removeElement($producto);
        return $this;
    }
}