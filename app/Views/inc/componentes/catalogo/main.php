<div class="container-productos">
    <h1>Catálogo de Productos</h1>

    <div class="row">
        <?php foreach ($productos as $producto) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $producto['nombre']; ?></h5>
                        <p class="card-text"><?= $producto['descripcion']; ?></p>
                        <p class="card-text">Precio: $<?= $producto['precio']; ?></p>
                        <img src="<?= "https://cdn.marvel.com/u/prod/marvel/i/mg/c/10/" . $producto['imagen']; ?>" alt="">
                        <?php if (isset($usuario['perfil_id']) && $usuario['perfil_id'] == 2) : ?>
                            <!-- En el formulario de agregar al carrito, actualiza la acción para enviarlo al controlador -->
                            <form action="<?= base_url('/agregarItemCarrito'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $producto['id']; ?>">
                                <input type="hidden" name="nombre_producto" value="<?= $producto['nombre']; ?>">
                                <input type="hidden" name="precio" value="<?= $producto['precio']; ?>">
                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar a carrito</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
