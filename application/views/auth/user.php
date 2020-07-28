<br><br><br>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Pilih Jenis User</h1>
              </div>

              <form class="user" method="post" action="<?php echo base_url('auth/user'); ?>">
                  
               <a href="<?php echo base_url('auth/register'); ?>" class="btn btn-danger btn-block"> 
                    <i class="fa fa-fw fa-user"></i>
                  Mahasiswa</a>

                 <a href="<?php echo base_url('auth/Register_dosen'); ?>" class="btn btn-primary btn-block"> 
                    <i class="fa fa-fw fa-user"></i>
                  Dosen</a>

              </form>
              <hr>
               <div class="text-center">
                    <a class="small" href="<?php echo base_url('auth'); ?>">Kembali</a>
                  </div>
          
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

