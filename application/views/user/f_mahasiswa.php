 <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-4s">
              <h6 class="m-0 font-weight-bold text-primary">Form Kebutuhan</h6>
            </div>

    <div class="panel-body">
    <div class="container-fluid">
       <?= form_open('user/Mahasiswa'); ?>
        <div class="form-group">
        <label ><b>Nama</b></label>
        <input type="text" name="nama_mahasiswa" readonly="" class="form-control" id="nama_mahasiswa" placeholder="Masukkan Nama" value="<?php echo $user['nama'];?>"  ><?php echo form_error('nama_mahasiswa',' <small class="text-danger pl-3">','</small> '); ?>
      </div>
      <div class="form-group">
        <label><b>Tempat Lahir</b></label>
        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Contoh : Bogor">
        <?php echo form_error('tempat_lahir',' <small class="text-danger pl-3">','</small> '); ?>
      </div>

      <div class="form-group">
        <label><b>Tanggal Lahir</b> </label>
        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder=" Masukkan Tanggal Lahir" >
        <small>Contoh Format : (12/30/2017) - (Bulan/Tanggal/Tahun)</small>
        <?php echo form_error('tanggal_lahir',' <small class="text-danger pl-3">','</small> '); ?>

      </div>

        <div class="form-group">
        <label ><b>NPM</b></label>
        <input type="text" readonly="" name="NPM" class="form-control" id="NPM" placeholder="Masukkan NPM" 
       value="<?php echo $user['NPM'];?>">
        <?php echo form_error('NPM',' <small class="text-danger pl-3">','</small> '); ?>
      </div>

      <div class="form-group">
        <label><b>Semester</b></label>
      <select class="form-control" id="semester" name="semester"  placeholder="Semester">
      <option>Pilih Semester</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
<?php echo form_error('semester',' <small class="text-danger pl-3">','</small> '); ?>
    </select>
        
      </div>

      <div class="form-group">
        <label ><b>kebutuhan</b></label>
        <input type="text" name="kebutuhan" class="form-control" id="kebutuhan" placeholder="Contoh : Surat Keterangan Aktif"  > 
        <?php echo form_error('kebutuhan',' <small class="text-danger pl-3">','</small> '); ?>
      </div>

         <div class="form-group">
        <label ><b>keperluan/Deskripsi</b></label>
        <textarea type="text" name="keperluan" class="form-control" id="keperluan" placeholder="Contoh : Syarat Kolokium"></textarea> 
        <?php echo form_error('keperluan',' <small class="text-danger pl-3">','</small> '); ?>
      </div>

        <div class="form-group">
        <input type="hidden" name="status" class="form-control" id="status" value="0">
      </div>

      
      <button type="submit" id="kirim" class="btn btn-primary btn-xl">Kirim</button>
     <br><br>
      
  
        
    <?= form_close(); ?>
          
        </div>
      </div>
    </div>
</div>
</div>
