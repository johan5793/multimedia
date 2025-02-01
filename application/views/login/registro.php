<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <?php echo form_open('Welcome/agregarUsuarios') ?>

                <h2 class="fw-bold mb-2 text-uppercase">Regístrate</h2>
                <p class="text-white-50 mb-5">Ingresa tu nombre de usuario,  contraseña y correo electrónico</p>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Nombre de usuario</label>
                  
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="email" id="correo" name="correo" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Correo electrónico</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" id="contra" name="contra" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Contraseña</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" id="confcontra" name="confcontra" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Confirmar contraseña</label>
                </div>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Ingresar</button>

              <?php echo form_close() ?>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
