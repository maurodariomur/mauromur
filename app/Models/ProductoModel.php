<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'imagen', 'baja', 'stock'];

    public function obtenerProductos()
    {
        return $this->findAll();
    }
    
    public function obtenerProductoPorId($id)
    {
        return $this->find($id);
    }
}
