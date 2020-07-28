        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Selesai Dosen</h6>
            </div>


 <?php echo $this->session->flashdata('message'); ?>

              <div class="card-body">
       <form action="<?php echo base_url().'admin/selesaidosen/';  ?>" method="post">
              <div class="table-responsive">
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
            <th>No</th>
            <th >Nama Dosen</th>
            <th >NIK</th>
            <th >Action</th>
          </tr>
          </thead>
        <tbody>
             <?php 
                  $no = 1;
                  foreach ($datadosen as $dd) { ?>
                <tr>
                <td ><input type="hidden" name="id_dosen" value="<?php echo $dd->id_dosen; ?>" class="form-control"><?php echo $no++ ?></td>
                <td><?php echo $dd->nama_dosen ?></td>
                <td ><?php echo $dd->NIK ?></td>
                
               
                   <td>
                    <?php echo anchor('admin/selesaidosen/hapus/'.$dd->id_dosen, '<div class="btn btn-danger btn-sm">Hapus</div>');  ?>
                   <br>
                  <?php echo anchor('admin/form_dosen/download/'.$dd->file,'<div class="btn btn-primary btn-sm"></div'); ?>Download
                </td>

        </tr>
      <?php } ?> 
</tbody>
</table>
</form>
</div>
</div>
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    