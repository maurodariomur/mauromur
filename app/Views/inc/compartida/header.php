<!-- ================-->
<!-- Encabezado-->
<!-- ================-->
<header class="header-1 container-fluid d-flex justify-content-center">
  <p class="text-light mb-2 p-1 fs-5">Superman</p>
</header>

<!-- ================-->
<!-- Navbar-->
<!-- ================-->
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid container-header">
    <a class="marca" href="<?php echo base_url("/"); ?>">
      <img src="assets/img/favicono/icono.png" width="150" height="50"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if ($usuario && isset($usuario['sesion']) && $usuario['sesion']) : ?>
          <?php if ($usuario['perfil_id'] == 1) : ?>
            <!-- Elementos exclusivos para administradores -->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("administrador"); ?>">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("admin"); ?>">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("admin"); ?>">Consultas</a>
            </li>
            <li class="nav-item dropdown logged-container">
              <a class="nav-link dropdown-toggle profile_content nav-usuario" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-coffee-bean perfil"></i>
                <h5><?= $usuario['usuario'] ?></h5>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url("perfil"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Perfil
                  </a></li>
                <li><a class="dropdown-item" href="<?= base_url("usuario/logout"); ?>">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Salir
                  </a></li>
              </ul>
            </li>
            </a>
          <?php elseif ($usuario['perfil_id'] == 2) : ?>
            <!-- Elementos para clientes -->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url("quienes-somos"); ?>">¿Quienes Somos?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("comercializacion"); ?>">Comercialización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("contacto"); ?>">Información de Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("terminos-usos"); ?>">Términos y usos</a>
            </li>
            <li>
              <a class="nav-link" href="<?php echo base_url("catalogo"); ?>">Catálogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModalLong" style="color:red;">
                <i class="fas fa-shopping-cart"></i> Carrito(<span id="cart_count"><?= count($sessionCart ?? []); ?></span>)
              </a>
            </li>

            <li class="nav-item dropdown logged-container">
              <a class="nav-link dropdown-toggle profile_content nav-usuario" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-coffee-bean perfil"></i>
                <h5><?= $usuario['usuario'] ?></h5>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url("perfil"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Perfil
                  </a></li>
                <li><a class="dropdown-item" href="<?= base_url("usuario/logout"); ?>">
                    <i class="fa-solid fa-sign-out"></i>
                    Salir
                  </a></li>
              </ul>
            </li>
          <?php endif; ?>
        <?php else : ?>
          <!-- Elementos para usuarios no autenticados -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url("quienes-somos"); ?>">¿Quienes Somos?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("comercializacion"); ?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("contacto"); ?>">Información de Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("terminos-usos"); ?>">Términos y usos</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo base_url("catalogo"); ?>">Catálogo</a>
          </li>
          <li class="nav-item button-login">
            <a href="<?php echo base_url("login"); ?>" class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-person-circle"></i> Ingresar
            </a>
          </li>
        <?php endif; ?>
      </ul>


    </div>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Carrito de Compras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-light">
          <thead class="thead-light">
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Acción</th>
              <th>SubTotal</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($carrito)) : ?>
              <tr>
                <td colspan="6">No hay productos en el carrito</td>
              </tr>
            <?php else : ?>
              <?php foreach ($carrito as $producto) : ?>
                <tr>
                  <td><?= $producto['id']; ?></td>
                  <td><?= $producto['name']; ?></td>
                  <td>$<?= $producto['price']; ?></td>
                  <td><?= $producto['cant']; ?></td>
                  <th>
                    <form action="<?php echo site_url('eliminarItem/' . $producto['id']); ?>" method="POST">

                      <button type="submit" class="btn btn-danger">Eliminar</button>

                    </form>
                  </th>
                  </td>
                  <td>$<?= $producto['sub_total']; ?></td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="5" class="text-end">Total:</td>
                <td>$<?= $totalCarrito; ?></td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="<?= base_url('/vaciar-carrito'); ?>" class="btn btn-danger">Vaciar Carrito</a>
      </div>
    </div>
  </div>
</div>