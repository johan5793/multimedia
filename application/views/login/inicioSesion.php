<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">
              	<?php echo form_open('Welcome/iniciar') ?>
  		              <h2 class="fw-bold mb-2 text-uppercase">Inicio de sesión</h2>
  		              <p class="text-white-50 mb-5">Ingresa tu correo y contraseña</p>

  		              <div data-mdb-input-init class="form-outline form-white mb-4">
  		                <input type="email" id="correo" name="correo" class="form-control form-control-lg" />
  		                <label class="form-label" for="typeEmailX">Correo</label>
  		                
  		              </div>

  		              <div data-mdb-input-init class="form-outline form-white mb-4">
  		                <input type="password" id="contra" name="contra" class="form-control form-control-lg" />
  		                <label class="form-label" for="typePasswordX">Contraseña</label>
  		              </div>

  		              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Ingresar</button>
              	<?php echo form_close() ?>
              </div>

              <div>
                <p class="mb-0">¿No tienes cuenta? <a href="<?php echo site_url(); ?>/welcome/registrarse" class="text-white-50 fw-bold">Regístrate</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
