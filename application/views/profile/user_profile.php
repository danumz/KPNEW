  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil saya</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

<br>
<div class="card mb-3" style="max-width: 400px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo base_url();?>assets/img/foto.jpg" class="card-img" >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $user['nama'];?></h5>
        <p class="card-text"><?= $user['email'];?></p>
        <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['dibuat']); ?></small></p>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>
