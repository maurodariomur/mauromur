<div class="container-register">
  <?php if (session()->getFlashdata('errorUsuario')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorUsuario') ?></div>
  <?php endif; ?>
  <h2>Registrarse</h2>
  <form action="<?= base_url('usuario/crearUsuario') ?>" method="POST">
    <div class="row">
      <div class="col-sm-6">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div class="col-sm-6">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="col-sm-6">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
      </div>
    <div class="row">
      <div class="registrar col-sm-12">
        <button type="submit" value="Registrar" name="registro">Registrarse</button>
      </div>
    </div>
    <div class="regresar col-sm-6">
        <a href="<?= base_url('/') ?>"><p>Regresar al Menú Principal</p></a>
      </div>
  </form>
</div>