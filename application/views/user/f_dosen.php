 <!-- Begin Page Content -->
 <div class="container-fluid">
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
     <div class="card-header py-4s">
       <h6 class="m-0 font-weight-bold text-primary">Form Kebutuhan</h6>
     </div>

     <div class="panel-body">
       <div class="container-fluid">

         <?php echo form_open_multipart('user/dosen/tambah'); ?>
         <div class="form-group">
           <label><b>Nama</b></label>
           <input type="text" name="nama_dosen" readonly="" class="form-control" id="nama_dosen" placeholder="Masukkan Nama" value="<?php echo $user['nama']; ?>">
         </div>
         <div class="form-group">
           <label><b>NIK</b></label>
           <input type="text" name="NIK" readonly="" class="form-control" id="NIK" placeholder="Masukkan NIK" value="<?php echo $user['NIK']; ?>">
         </div>
         <div class="form-group">
           <label><b>Kebutuhan</b></label>
           <!-- <input type="text" name="kebutuhan" class="form-control" id="kebutuhan" placeholder="kebutuhan"  > -->
           <select name="surat" class="form-control">
             <option value="">Pilih</option>
             <? foreach ($surat as $s) : ?>
             <option value=""><?php echo $s->nama_surat; ?></option>
             <?endforeach; ?>
           </select>
         </div>
         <div class="form-group">
           <label><b>Keperluan/Deskripsi</b></label>
           <textarea type="text" name="keperluan" class="form-control" id="keperluan" placeholder="untuk keperluan"></textarea>
         </div>
         <div class="form-group">
           <label><b>Unggah File</b></label>
           <input type="file" name="file" class="form-control-file" id="file">
           <small class="text-danger">Format File : .pdf, .docx, .doc</small>
         </div>

         <div class="form-group">
           <input type="hidden" name="status" class="form-control" id="status" value="0">
         </div>



         <button type="submit" class="btn btn-primary btn-xl">Kirim</button>
         <br><br>

         <?php echo form_close(); ?>

       </div>
     </div>
   </div>
 </div>
 </div>