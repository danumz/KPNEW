 <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-4s">
              <h6 class="m-0 font-weight-bold text-primary">Memo</h6>
            </div>
  <?php echo $this->session->flashdata('message'); ?>

    <div class="panel-body">
    <div class="container-fluid">
       <?= form_open('admin/Memo'); ?>
          <div class="form-row">
    <div class="form-group col-md-6">
        <label ><b>nama</b></label>
        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $user['nama'];?>" placeholder="Tulis Memo">
        <?php echo form_error('nama',' <small class="text-danger pl-3">','</small> '); ?>
      </div>
         <div class="form-group col-md-6">
        <label ><b>Pesan</b></label>
        <input type="text" name="pesan" class="form-control" id="pesan" placeholder="Tulis Memo">
        <?php echo form_error('pesan',' <small class="text-danger pl-3">','</small> '); ?>
      </div>
    </div>
  </div>
        <input type="hidden" name="status" class="form-control" id="status" value="0">
      </div>
 
      <button type="submit" id="kirim" class="btn btn-primary btn-xl">Kirim</button>
    <?= form_close(); ?>
          
    

<div class="card-body">
    <form action="<?php echo base_url().'admin/memo/';  ?>" method="post">
              <div class="table-responsive">
      
 <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                <th >No</th>
                <th >Nama</th>
                <th >Pesan</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>       
                      <?php 
                        $no = 1;
                        foreach ($memo as $m) { ?>
                      <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $m->nama ?></td>
                      <td><?php echo $m->pesan ?></td>
                      <td  onclick="javascript: return confirm('Anda yakin akan Menghapus? data yang sudah di hapus tidak bisa dikembalikan')"><?php echo anchor('Admin/memo/hapus/'.$m->id_memo, '<div class="btn btn-danger btn-sm">Hapus</div>');  ?></td>

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


    






