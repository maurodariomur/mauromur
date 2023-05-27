<div class="container-table">
    <div class="container">
        <?php if (session()->getFlashdata('success')) : ?>
            <div id="success-message show" class="alert alert-success welcome-message"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errorNoExiste')) : ?>
            <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorNoExiste') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errorBaja')) : ?>
            <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorBaja') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-er"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <h2 class="title-table">Tabla de Usuarios</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Usuario</th>
                                <th>Perfil ID</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td><?php echo $usuario['id']; ?></td>
                                    <td><?php echo $usuario['nombre']; ?></td>
                                    <td><?php echo $usuario['apellido']; ?></td>
                                    <td><?php echo $usuario['email']; ?></td>
                                    <td><?php echo $usuario['usuario']; ?></td>
                                    <td><?php echo $usuario['perfil_id']; ?></td>
                                    <td>
                                        <?php if ($usuario['perfil_id'] == 1) : ?>
                                            <p>Administrador</p>
                                        <?php else : ?>
                                            <?php if ($usuario['baja'] == 'SI') : ?>
                                                <a href="<?= base_url('/usuarios/dardealta/' . $usuario['id']); ?>" class="btn alta" type="button">Alta</a>
                                            <?php else : ?>
                                                <a href="<?= base_url('/usuarios/dardebaja/' . $usuario['id']); ?>" class="btn btn-danger baja" type="button">Baja</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Continuar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>