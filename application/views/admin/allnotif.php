  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Notif</h6>
            </div>
<div class="card-body">
    <form action="<?php echo base_url().'admin/dashboard/';  ?>" method="post">
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
                        foreach ($notif as $n) { ?>
                      <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $n->nama ?></td>
                      <td><?php echo $n->pesan ?></td>
                      <td  onclick="javascript: return confirm('Anda yakin akan Menghapus? data yang sudah di hapus tidak bisa dikembalikan')"><?php echo anchor('admin/Dashboard/hapus/'.$n->id_notif, '<div class="btn btn-danger btn-sm">Hapus</div>');  ?></td>

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


    
