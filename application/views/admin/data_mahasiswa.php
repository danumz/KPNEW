<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Mahasiswa</h6>
    </div>


    <?php echo $this->session->flashdata('message'); ?>

    <div class="card-body">
      <form action="<?php echo base_url() . 'admin/form_mahasiswa/mhs_selesai/';  ?>" method="post">
        <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NPM</th>
                <!--      <th>Semester</th> -->
                <th>Kebutuhan</th>
                <th>Keperluan</th>
                <!--  <th>Tgl Input</th>
                <th>Tgl Selesai</th> -->
                <th>Upload File</th>
                <th>Status</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($form_mahasiswa as $fm) { ?>
                <tr>

                  <td><?php echo $no++ ?></td>
                  <td><?php echo $fm->nama_mahasiswa ?></td>
                  <td><?php echo $fm->NPM ?></td>
                  <!--        <td><?php echo $fm->semester ?></td> -->
                  <td><?php echo $fm->kebutuhan ?></td>
                  <td><?php echo $fm->keperluan ?></td>
                  <!--  <td><?php echo $fm->tgl_input ?></td>
                      <td><?php echo $fm->tgl_selesai ?></td> -->
                  <td><input type="file" name="file" class="form-control-file" id="file"> </td>

                  <td>
                    <select name="status" class="status" data-id="<?php echo $fm->id_mhs; ?>">
                      <option value="0">Belum</option>
                      <option value="1">selesai</option>
                    </select>
                  </td>

                  <!-- <td><input type="submit" value="Simpan" class="btn btn-success btn-sm"></td> -->



                </tr>
              <?php } ?>

            </tbody>
          </table>
      </form>
      <input id="dataterakhir" value="<?php echo $dd ?>" hidden>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->