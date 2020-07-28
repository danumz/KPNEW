        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Selesai Mahasiswa</h6>
            </div>


 <?php echo $this->session->flashdata('message'); ?>



 <div class="card-body">
    <form action="<?php echo base_url().'admin/selesaimhs/';  ?>" method="post">
              <div class="table-responsive">
      
 <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                <th >No</th>
                <th >Nama Mahasiswa</th>
                <th >NPM</th>
                <th >Semester</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>       
                      <?php 
                        $no = 1;
                        foreach ($datamhs as $dm) { ?>
                      <tr>
                      <td ><input type="hidden" name="id_mhs" value="<?php echo $dm->id_mhs; ?>" class="form-control"><?php echo $no++ ?></td>
                      <td><?php echo $dm->nama_mahasiswa ?></td>
                      <td ><?php echo $dm->NPM ?></td>
                      <td ><?php echo $dm->semester ?></td>


                      <td  onclick="javascript: return confirm('Anda yakin akan Menghapus? data yang sudah di hapus tidak bisa dikembalikan')"><?php echo anchor('Admin/selesaimhs/hapus/'.$dm->id_mhs, '<div class="btn btn-danger btn-sm">Hapus</div>');  ?></td>

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


    






