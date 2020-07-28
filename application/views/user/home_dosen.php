 <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-4s">
              <h6 class="m-0 font-weight-bold text-primary">Status Surat</h6>
            </div>

  <?php echo $this->session->flashdata('message'); ?>
            
            <div class="card-body">
                 <form action="<?php echo base_url().'admin/H_dosen/';  ?>" method="post">
              <div class="table-responsive">  
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th >No</th>
            <th >Nama</th>
            <th >NIK</th>
             <th >Keperluan</th>
             <th >Download File</th>
            <th >Status</th>
          </tr>
          </thead>
        <tbody>
                <?php 
                 $no= 1;
                  $NIK = $this->session->userdata('NIK');
                $verifikasi = $this->db->get_where('form_dosen', array('NIK'=>$NIK))->result();
                if ($verifikasi > 0) {
                  foreach ($verifikasi as $vf) { 
                    echo "
                <tr>
                <td>$no</td>
                <td>$vf->nama_dosen</td>
                <td>$vf->NIK</td>
                <td>$vf->kebutuhan</td>
                 <td>".anchor('user/dosen/download/'.$vf->file_admin,'Download',array('class'=>'btn btn-primary btn-sm'))."</td>";
                                 if ($vf->status < 1) {
                                    echo "<td><label class='badge badge-danger'>Menunggu </label></td>
                        </tr>";
                                } else {
                                    echo "<td><label class='badge badge-info'>Selesai</label></td>
                        </tr>";
                                   }
                                   
                            }
                        } else {
                            echo "<tr>
                                    <td>" . $this->session->userdata('nama_dosen') . "</td>
                                    <td>" . $this->session->userdata('NIK') . "</td>
                                   <td>ANDA BELUM MENGAJUKAN SURAT</td>";
                            echo "<td>TIDAK ADA</td>
                                 <td>TIDAK ADA</td>
                               </tr>";
                          
                        }
                        ?>
</tbody>
</table>
</form>
</div>
</div>
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
