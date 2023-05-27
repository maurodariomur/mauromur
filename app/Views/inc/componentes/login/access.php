<div class="container-login">
<?php if (session()->getFlashdata('errorLogin')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorLogin') ?></div>
  <?php endif; ?>
<div class="row">
    <div class="col-md-12">
	<div class="form-wrapper">
    <div class="form-box">
      <h2>Inicio Sesión</h2>
      <form action="<?= base_url('usuario/login') ?>" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="usuario" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Iniciar Sesión">
      </form>
      <p>¿No tiene una Cuenta? <a href="<?php echo base_url("registrar"); ?>">Registrate</a></p>
      <p><a href="<?= base_url('/') ?>">Regresar al Menú Principal</a></p>
    </div>
  </div>
</div>
</div>
</div>