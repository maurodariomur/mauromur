<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

$autoload['libraries'] = array('load');

class UsuariosController extends BaseController
{
    private $session;
    private $usuarioModel;

    public function __construct()
    {

        $this->session = \Config\Services::session();
        $this->usuarioModel = new UsuarioModel();
    }

    public function crearUsuario()
    {

        try {

            // Recoger los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if ($nombre == null || $apellido == null || $usuario == null || $email == null || $password == null) {

                $this->session->setFlashdata('errorEmpty', 'Todos los campos son obligatorios.');
                return redirect()->to(base_url('/registrar'));
            }

            $password = (string) $password;

            $datos = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'usuario' => $usuario,
                'email' => $email,
                'pass' => crypt($password, PASSWORD_DEFAULT),
                'perfil_id' => 2,
                'baja' => 'NO'
            ];

            $existeUsuario = $this->usuarioModel->existeUsuario($usuario);

            if ($existeUsuario > 0) {
                $this->session->setFlashdata('errorUsuario', 'El Usuario ya esta Registrado.');
                return redirect()->to(base_url('/registrar'));
            }

            $userId = $this->usuarioModel->insertarUsuario($datos);

            if ($userId) {
                $sessionData = [
                    'id' => $userId,
                    'nombre' => $datos['nombre'],
                    'apellido' => $datos['apellido'],
                    'usuario' => $datos['usuario'],
                    'email' => $datos['email'],
                    'perfil_id' => $datos['perfil_id'],
                    'sesion' => true
                ];
                $this->session->set($sessionData);
                $this->session->setFlashdata('success', '!Gracias ' . $nombre . ' por unirte a Superman...');

                return redirect()->to(base_url('/'));
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible agregar el usuario.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }

    public function login()
    {
        try {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];


            if ($usuario == null || $password == null) {

                $this->session->setFlashdata('errorEmpty', 'Todos los campos son obligatorios.');
                return redirect()->to(base_url('/login'));
            }

            $password = (string) $password;

            $persona =   $this->usuarioModel->obtenerPorUsuario($usuario);

            if ($persona && password_verify($password, $persona["pass"])) {

                $sessionData = [
                    'id' => $persona["id"],
                    'nombre' => $persona['nombre'],
                    'apellido' => $persona['apellido'],
                    'usuario' => $persona['usuario'],
                    'email' => $persona['email'],
                    'perfil_id' => $persona['perfil_id'],
                    'sesion' => true
                ];
                $this->session->set($sessionData);
                $this->session->setFlashdata('success', '!Bienvenido...! ' .  $persona['nombre']);

                return redirect()->to(base_url('/'));
            } else {
                $this->session->setFlashdata('errorLogin', 'Usuario/Contraseña Incorrectas ');
                return redirect()->to(base_url('/login'));
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible agregar el usuario.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function darDeBaja($usuario_id)
    {
        try {
            $usuario = $this->usuarioModel->obtenerPorId($usuario_id);

            if (!$usuario) {
                $this->session->setFlashdata('errorNoExiste', 'El usuario no Existe!.');
                return redirect()->to(base_url('/administrador'));
            }

            if ($usuario['baja'] == 'NO') {
                $usuario['baja'] = 'SI';
                $this->usuarioModel->darDeBaja_Alta($usuario);
                $this->session->setFlashdata('success', 'El usuario Fue dado de Baja!.');
                return redirect()->to(base_url('/administrador'));
            } else {
                $this->session->setFlashdata('errorBaja', 'El usuario esta dado de baja.');
                return redirect()->to(base_url('/administrador'));
            }
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Ocurrió un error al dar de baja al usuario.');
            return redirect()->to(base_url('/administrador'));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            $this->session->setFlashdata('error', 'Ocurrió un error al dar de baja al usuario.');
            return redirect()->to(base_url('/administrador'));
        }
    }

    public function darDeAlta($usuario_id)
    {
        try {
            $usuario = $this->usuarioModel->obtenerPorId($usuario_id);

            if (!$usuario) {
                $this->session->setFlashdata('errorNoExiste', 'El usuario no Existe!.');
                return redirect()->to(base_url('/administrador'));
            }

            if ($usuario['baja'] == 'SI') {
                $usuario['baja'] = 'NO';
                $this->usuarioModel->darDeBaja_Alta($usuario);
                $this->session->setFlashdata('success', 'El usuario Fue dado de Alta!.');
                return redirect()->to(base_url('/administrador'));
            } else {
                $this->session->setFlashdata('errorBaja', 'El usuario ya esta Dado de Alta.');
                return redirect()->to(base_url('/administrador'));
            }
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Ocurrió un error al dar de Alta al usuario.');
            return redirect()->to(base_url('/administrador'));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            $this->session->setFlashdata('error', 'Ocurrió un error al dar de Alta al usuario.');
            return redirect()->to(base_url('/administrador'));
        }
    }

}
