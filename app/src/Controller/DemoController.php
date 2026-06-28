<?php

namespace App\Controller;

use App\Document\Categoria;
use App\Document\Cliente;
use App\Document\Pedido;
use App\Document\Producto;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoController extends AbstractController
{
    #[Route('/crear', name: 'app_crear')]
    public function crear(DocumentManager $dm): Response
    {
        $categoria = new Categoria();
        $categoria->setNombre('Tecnología');
        $categoria->setDescripcion('Productos tecnológicos');

        $producto = new Producto();
        $producto->setNombre('Mouse');
        $producto->setPrecio(5000);
        $producto->setStock(10);
        $producto->setCategoria($categoria);

        $cliente = new Cliente();
        $cliente->setNombre('Juan');
        $cliente->setApellido('Pérez');

        $pedido = new Pedido();
        $pedido->setFecha(new \DateTime());
        $pedido->setPrecio(5000);
        $pedido->setEstado('nuevo');
        $pedido->setEntregado(false);
        $pedido->setCliente($cliente);
        $pedido->addProducto($producto);

        $dm->persist($categoria);
        $dm->persist($producto);
        $dm->persist($cliente);
        $dm->persist($pedido);
        $dm->flush();

        return new Response('CREATE: datos guardados correctamente');
    }

    #[Route('/listar', name: 'app_listar')]
    public function listar(DocumentManager $dm): Response
    {
        $productos = $dm->getRepository(Producto::class)->findAll();

        $html = '<h1>Productos</h1>';

        foreach ($productos as $producto) {
            $html .= '<p>';
            $html .= 'ID: ' . $producto->getId() . '<br>';
            $html .= 'Nombre: ' . $producto->getNombre() . '<br>';
            $html .= 'Precio: ' . $producto->getPrecio() . '<br>';
            $html .= 'Stock: ' . $producto->getStock() . '<br>';
            $html .= 'Categoría: ' . $producto->getCategoria()?->getNombre();
            $html .= '</p><hr>';
        }

        return new Response($html);
    }

    #[Route('/actualizar', name: 'app_actualizar')]
    public function actualizar(DocumentManager $dm): Response
    {
        $producto = $dm->getRepository(Producto::class)
            ->findOneBy(['nombre' => 'Mouse']);

        if (!$producto) {
            return new Response('No se encontró el producto Mouse');
        }

        $producto->setPrecio(6500);
        $producto->setStock(20);

        $dm->flush();

        return new Response('UPDATE: producto actualizado');
    }

    #[Route('/eliminar', name: 'app_eliminar')]
    public function eliminar(DocumentManager $dm): Response
    {
        $producto = $dm->getRepository(Producto::class)
            ->findOneBy(['nombre' => 'Mouse']);

        if (!$producto) {
            return new Response('No se encontró el producto Mouse');
        }

        $dm->remove($producto);
        $dm->flush();

        return new Response('DELETE: producto eliminado');
    }
}