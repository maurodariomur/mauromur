<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ProductoModel;

class Home extends BaseController
{
    private $session;
    private $usuario;
    private $usuarioModel;
    private $productoModel;
    private $sessionCart;
    private $totalCarrito;
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->usuario = $this->session->get();
        $this->sessionCart= session('cart');
        $this->totalCarrito= session('totalCarrito');
        $this->usuarioModel = new UsuarioModel();
        $this->productoModel = new ProductoModel();
    }

    public function index()
    {
        $css_file = 'assets/css/estilos/principal.css';
        $comics = [
            [
                "titulo" => "Batman Aftershock #1",
                "subtitulo" => "KNIFE TRICK",
                "img" => "assets/img/comicsCarrusel/comic4.jpg",
            ],

            [
                "titulo" => "Superman Vol.1 #1",
                "subtitulo" => "DC COMICS",
                "img" => "assets/img/comicsCarrusel/comic5.jpg",
            ],

            [
                "titulo" => "The Amazing Spider-Man Vol.1 #1",
                "subtitulo" => "MARVEL LEGACY",
                "img" => "assets/img/comicsCarrusel/comic6.jpg",
            ],
        ];
        return view('principal', [
            "css_file" => $css_file,
            "comics" => $comics,
            "titulo" => "Superman",
            "usuario" => $this->usuario,
            "carrito"=>$this->sessionCart,
            "totalCarrito"=>$this->totalCarrito
        ]);
    }

    public function quienesSomos()
    {
        $css_file = 'assets/css/estilos/nosotros.css';

        return view('quienes_somos', [
            "css_file" => $css_file,
            "titulo" => "Superman - Quiénes Somos",
            "usuario" => $this->usuario,
            "carrito"=>$this->sessionCart,
            "totalCarrito"=>$this->totalCarrito
        ]);
    }

    public function comercializacion()
    {
        $css_file = 'assets/css/estilos/comercializacion.css';
        return view('comercializacion', [
            "css_file" => $css_file,
            "titulo" => "Superman - Comercialización",
            "usuario" => $this->usuario,
            "carrito"=>$this->sessionCart,
            "totalCarrito"=>$this->totalCarrito
        ]);
    }

    public function contacto()
    {
        $css_file = 'assets/css/estilos/contacto.css';
        return view('contacto', [
            "css_file" => $css_file,
            "titulo" => "Superman - Contacto",
            "usuario" => $this->usuario,
            "carrito"=>$this->sessionCart,
            "totalCarrito"=>$this->totalCarrito
        ]);
    }

    public function terminosUsos()
    {
        $css_file = 'assets/css/estilos/terminos.css';
        return view('terminos_usos', [
            "css_file" => $css_file,
            "titulo" => "Superman - Términos de Uso",
            "usuario" => $this->usuario,
            "carrito"=>$this->sessionCart,
            "totalCarrito"=>$this->totalCarrito
        ]);
    }

    public function catalogo()
    {
        $css_file = 'assets/css/estilos/catalogo.css';
        $productos = $this->productoModel->obtenerProductos();
        return view('catalogo', [
            "css_file" => $css_file,
            "titulo" => "Superman - Catálogo",
            "usuario" => $this->usuario,
            "productos" => $productos,
            "carrito"=>$this->sessionCart,
            "totalCarrito"=>$this->totalCarrito
        ]);
    }

    public function login()
    {
        $css_file = 'assets/css/estilos/login.css';
        return view('login', [
            "css_file" => $css_file,
            "titulo" => "Superman - Inicio-Sesion",
        ]);
    }

    public function registrar()
    {
        $css_file = 'assets/css/estilos/registrar.css';
        return view('registrar', [
            "css_file" => $css_file,
            "titulo" => "Superman - Registrarse!",
        ]);
    }

    public function mostrarTUsuarios()
    {
        $usuarios = $this->usuarioModel->orderBy('id', 'ASC')->findAll(); //creamos una variable que llama y ordena a los usuarios de manera ascendente y por su id
        $css_file = 'assets/css/estilos/usuarios_table.css';
        return view('usuarios_table', [
            "css_file" => $css_file,
            "titulo" => "Superman - Tabla-Usuarios",
            "usuario" => $this->usuario,
            "usuarios" => $usuarios
        ]);
    }
}