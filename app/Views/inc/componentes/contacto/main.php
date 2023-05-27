<div class="container-contacto"> <!--Contendra toda la division de la planilla de contacto-->
    <div class="row">
        <div class="card-form col-md-12">
            <div class="container-title"><!--Contendra el titulo y subtitulo del card-->
                <h2>Contactanos</h2>
            </div>
            <div class="row ">
                <div class="container-form col-md-6">
                    <h4>Para cualquier Consulta/Reclamo</h4>
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                        <div class="row container-input"> <!--Contenido de input de name y mail-->
                        <div class="columna-input col-md-6">
                        <div class="md-form mb-0 ">
                                    <label for="name" class="name">Nombre Del Usuario</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row container-input"> <!--Contenido de input de name y mail-->
                            <div class="columna-input col-md-6">
                                <div class="md-form mb-0">
                                    <label for="email" class="mail">Mail del Usuario</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row container-input">
                            <div class="columna-input col-md-6">
                                <div class="md-form mb-0">
                                    <label for="reason" class="reason">Motivo de Contacto</label>
                                    <input type="text" id="reason" name="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row container-input">
                            <div class="columna-input col-md-6">
                                <div class="md-form">
                                    <label for="message">Mensaje</label>
                                    <textarea type="text" id="message" name="text" rows="6" class="form-control md-textarea menssage-text"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="container-env">
                        <button type="button" class="btn btn-primary">Enviar</button>
                        <!-- <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Enviar</a> -->
                    </div>
                </div>

                <div class="contact-info col-md-6">
                    <h4>Para Mayor Información</h4>
                    <p>¿Tiene usted alguna pregunta? Por favor, no dude en contactarnos directamente.
                        Nuestro equipo le responderá dentro de Cuestión de horas para ayudarte.</p>
                    <p class="text-center">Superman Company S.A</p>
                    <ul class="list-unstyled">
                        <li>
                            <i class="bi bi-people-fill"></i><b class="">Titulares:Lione Messi y Lionel Scaloni</b>
                        </li>
                        <li>
                            <i class="bi bi-whatsapp"></i><b class="">Contacto:(+543794296318)</b>
                        </li>

                        <li>
                            <i class="bi bi-envelope-open-fill"></i><b class="">supermancompany@gmail.com</b>
                        </li>

                        <li>
                            <i class="bi bi-geo-alt"></i><b class="">Estado de Israel 3326, W3402 Corrientes</b>
                        </li>
                    </ul>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.8419663187615!2d-58.81233122448929!3d-27
                        .474178916897227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b6c519937ff%3A0x52aa358b8664cdad!2s
                        Estado%20de%20Israel%203326%2C%20W3402%20Corrientes!5e0!3m2!1ses-419!2sar!4v1681926744143!5m2!1ses-419!2sar" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>
    </div>
</div>