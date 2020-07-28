
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
              </div>

              <form class="user" method="post" action="<?php echo base_url('auth/Register_dosen'); ?>">
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>">
                  <?php echo form_error('nama',' <small class="text-danger pl-3">','</small> '); ?>
              

                </div>

                <!-- email -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?php echo set_value('email'); ?>">
                  <?php echo form_error('email',' <small class="text-danger pl-3">','</small> '); ?>
                </div>

                  <!-- NIK-->
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="NIK" name="NIK" placeholder="NIK" value="<?php echo set_value('NIK'); ?>">
                  <?php echo form_error('NIK',' <small class="text-danger pl-3">','</small> '); ?>
                </div>

                <!-- password -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                     <?php echo form_error('password1',' <small class="text-danger pl-3">','</small> '); ?>
                  </div>

                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Kata Sandi">
                  </div>
                </div>

                <button type="submit"  class="btn btn-primary btn-user btn-block">
                Buat Akun </button> 
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth'); ?>">Sudah Punya Akun? Masuk!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

