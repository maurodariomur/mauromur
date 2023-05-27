<?php

namespace App\Models;

use CodeIgniter\Model; //permite ahorrar codigo,de manera que model ya tiene la conexion con la base de datos

class UsuarioModel extends Model
{
  protected $table = 'usuarios';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'perfil_id', 'baja'];

  public function insertarUsuario($datos)
  {
    return $this->insert($datos);
  }

  public function obtenerUsuarios()
  {

    return $this->findAll();
  }

  public function existeUsuario($usuario)
  {

    $existeU = $this->where('usuario', $usuario);
    return $existeU->countAllResults(); //cantidad de usuarios que esten registrados

  }

  public function obtenerPorUsuario($usuario)
  {
    $existeU = $this->where('usuario', $usuario);
    return $existeU->get()->getRowArray();
  }

  public function obtenerPorId($id)
  {
    $existeU = $this->where('id', $id);
    return $existeU->get()->getRowArray();
  }

  public function darDeBaja_Alta($usuario_data)
  {
      return $this->update($usuario_data['id'], $usuario_data); 
  }
}
