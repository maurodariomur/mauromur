<main class="container-main">
  <?php if (session()->getFlashdata('success')) : ?>
    <div id="success-message" class="success-message show"><?= session()->getFlashdata('success') ?></div>
    <!-- <div id="success-message show" class="alert alert-success welcome-message"><?= session()->getFlashdata('success') ?></div> -->
  <?php endif; ?>
  <!-- Carrousel -->
  <div class="container-home">
    <div id="carouselExampleIndicators" class="carousel slide carousel-container" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <?php $bandera = true; ?>
        <?php foreach ($comics as $comic) { ?>
          <?php if ($bandera) {
            $bandera = false;
          ?>
            <div class="carousel-item active">
            <?php } else { ?>
              <div class="carousel-item">
              <?php } ?>
              <div class="text-container">
                <h1><?= $comic["titulo"]; ?> </h1>
                <h3><?= $comic["subtitulo"]; ?></h3>
              </div>
              <img src="<?= $comic["img"]; ?>" class="d-block" alt="...">
              </div>
            <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
      </div>
    </div>

    <div class="container-introduction">
      <h3>Sobre Nuestra Empresa</h3>
      <div class="row">
        <div class="container-company col-md-6">
          <p>Somos una empresa de venta de Comics, a nivel mundial, donde buscamos la satisfacción del cliente,teniendo
            historietas tanto de Dc-Comics como de Marvel,tambien poseemos beneficios y descuentos con distintas empresas,
            Somos una compañia en crecimiento, donde escuchamos al consumudor...
          </p>
          <a href="<?php echo base_url("quienes-somos"); ?>">
            <button type="button" class="btn btn-primary">Más Info.</button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Section Title Beneficios -->
  <section class="title-section">
    <div class="title-benefits">
      <h4>Descuentos y Beneficios</h4>
    </div>
  </section>

  <!-- Section Beneficios -->
  <section>
    <div class="contenido mx-3">
      <div class="container-news">
        <div class="card">
          <div class=" asociado">
            <a href="https://www.disneyplus.com/es-ar" target="_blank">
              <div class="img-container">
                <img src="assets/img/noticiasPag/disney+.jpg" alt="">
              </div>
              <p>7 días gratis,...estamos asociados</p>
            </a>
          </div>
          </a>
        </div>
        <div class="card">
          <div class=" asociado">
            <a href="https://www.hbomax.com/ar/es" target="_blank">
              <div class="img-container">
                <img src="assets/img/noticiasPag/hbo.jpg" alt="">
              </div>
              <p>Suscripción hasta el 21/04</p>
            </a>
          </div>
        </div>
        <div class="card">
          <div class=" asociado">
            <a href="https://www.cardmarket.com/es/Pokemon" target="_blank">
              <div class="img-container">
                <img src="assets/img/noticiasPag/pokemon.jpg" alt="">
              </div>
              <p>!Compra tus cartas De Pokemon!</p>
            </a>
          </div>
        </div>
        <div class="card">
          <div class=" asociado">
            <a href="https://www.primevideo.com/offers/nonprimehomepage/ref=dv_web_force_root" target="_blank">
              <div class="img-container">
                <img src="assets/img/noticiasPag/video.jpg" alt="">
              </div>
              <p>Suscripcion hasta el 31/05</p>
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!--Section Title Comics-->
  <section class="comics-title">
    <div class="title-comics">
      <h4>Los más vendidos</h4>
    </div>
  </section>

  <!-- Section Comics Mas Vendidos -->
  <section class="section-comics">
    <div class="row comics-container">
      <div class="col-md-3 card-comics"> <!--Contenedor de cada carta tendra un comic-->
        <div class="container-comic">
          <img src="assets/img/comicsDestacados/comic1.jpg" alt="">
        </div>
        <p>Doctor Strang &nbsp; Precio:2.33US.</p>
      </div>
      <div class="col-md-3  card-comics"> <!--Contenedor de cada carta con la respectiva informacion de su cargo -->
        <div class="container-comic">
          <img src="assets/img/comicsDestacados/comic2.jpg" alt="">
        </div>
        <p>Spiderman &nbsp; Precio:3.99US.</p>
      </div>
      <div class="col-md-3  card-comics"> <!--Contenedor de cada carta con la respectiva informacion de su cargo -->
        <div class="container-comic">
          <img src="assets/img/comicsDestacados/comic3.jpg" alt="">
        </div>
        <p>Batman & Robin &nbsp; Precio:5.99US.</p>
      </div>
      <div class="col-md-3  card-comics"> <!--Contenedor de cada carta con la respectiva informacion de su cargo -->
        <div class="container-comic">
          <img src="assets/img/comicsDestacados/comic4.jpg" alt="">
        </div>
        <p>Iroman El Invencible &nbsp; Precio:2.99US.</p>
      </div>
      <div class="col-md-3  card-comics"> <!--Contenedor de cada carta con la respectiva informacion de su cargo -->
        <div class="container-comic">
          <img src="assets/img/comicsDestacados/comic5.jpg" alt="">
        </div>
        <p>Iron-man &nbsp; Precio:6.99US.</p>
      </div>
      <div class="col-md-3  card-comics"> <!--Contenedor de cada carta con la respectiva informacion de su cargo -->
        <div class="container-comic">
          <img src="assets/img/comicsDestacados/comic6.jpg" alt="">
        </div>
        <p>Superman &nbsp; Precio:4.99US.</p>
      </div>
    </div>
    <div class="container-button">
      <a href="<?php echo base_url("catalogo"); ?>">
        <button type="button" class="btn btn-primary">Ver Más</button></a>
    </div>
  </section>
</main>