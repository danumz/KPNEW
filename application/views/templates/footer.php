 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;  Website 2020 <!-- <a href="http://instagram.com/lieviaanjhelina">Lievia Anjhelina Maharani</a>  -->
            <!--   <?php echo date('Y'); ?> --> 
            </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body text-center">Klik "Keluar" jika anda ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo base_url('auth/logout');?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>


  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script> 

</body>
<script type="text/javascript">
 $(document).ready(function() {
    $('#example').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "bAutoWidth": false });
    });
    var baseurl = '<?php echo base_url();?>';

    if (window.location.href == baseurl+'admin/form_mahasiswa') {
      // console.log(window.location.href);
      $('.status').on('change',function(){
        if ($('input[name="file"]').val()) {
if (confirm('Apakah Anda setuju mengubah status ?')) {
            var datas = {
              status : $(this).val(),
              id: $(this).data('id')
            }
            console.log(datas)
            $.ajax({
                method: 'POST',
                url: baseurl+'admin/form_mahasiswa/mhs_selesai',
                data: datas,
                dataType: 'JSON',
                success: function(d){
                  console.log(d);
                  alert('data berhasil diubah');
                  location.reload();
                }
            });
              
          }else{
            if ($(this).val() == 0) {
              $(this).val('1');
            }
            if ($(this).val() == 1) {
              $(this).val('0');
            }
          }
        }else{
alert('file masih kosong')
        }


          
      });

      var interval_start = setInterval(function() {
// console.log('gg');
           $.ajax({
                method: 'POST',
                url: baseurl+'admin/form_mahasiswa/cektotal',
                // data: data,
                dataType: 'JSON',
                success: function(d){
                  var dataterakhir = $('#dataterakhir').val();
                  // console.log(dataterakhir);
                  if (d != dataterakhir)  {
                     location.reload();
                    // console.log('beda');
                    // $('#example').dataTables().refresh();
                  }
                  // console.log(d);
                  // alert('data berhasil diubah');
                  // location.reload();
                }
            });

      }, 1000);

   }

     if (window.location.href == baseurl+'admin/form_dosen') {
      // console.log(window.location.href);
      $('.status').on('change',function(){
          if (confirm('Apakah Anda setuju mengubah status ?')) {
            var datas = {
              status : $(this).val(),
              id: $(this).data('id')
            }
            $.ajax({
                method: 'POST',
                url: baseurl+'admin/form_dosen/dosen_selesai',
                data: datas,
                dataType: 'JSON',
                success: function(d){
                  console.log(d);
                  alert('data berhasil diubah');
                  location.reload();
                }
            });
              
          }else{
            if ($(this).val() == 0) {
              $(this).val('1');
            }
            if ($(this).val() == 1) {
              $(this).val('0');
            }
          }
      });

       var interval_start = setInterval(function() {
// console.log('gg');
           $.ajax({
                method: 'POST',
                url: baseurl+'admin/form_dosen/cektotal1',
                // data: data,
                dataType: 'JSON',
                success: function(d){
                  var dataterakhir1 = $('#dataterakhir1').val();
                  // console.log(dataterakhir);
                  if (d != dataterakhir1)  {
                     location.reload();
                    // console.log('beda');
                    // $('#example').dataTables().refresh();
                  }
                  // console.log(d);
                  // alert('data berhasil diubah');
                  // location.reload();
                }
            });

      }, 1000);
      
    }

</script>
 <script>
      $(document).ready(function() {
          $.ajax({
             method: 'POST',
             url: baseurl+'admin/dashboard/notiff',
             dataType: 'JSON',
                success: function(d){
                  // console.log(d);
                  
                  var notiff = '';
                  if (d.jumlah_notif > 0) {
                    for (var i = 0; i < d.notif.length; i++) {
                      notiff += '<a class="dropdown-item d-flex align-items-center" href="#">'+
                      '<div class="mr-3">'+
                        '<div class="icon-circle bg-primary">'+
                          '<i class="fas fa-file-alt text-white"></i>'+
                        '</div>'+
                      '</div>'+
                      '<div>'+
                        '<div class="small text-bold-500">'+d.notif[i].nama+'</div>'+
                        '<span class="font-weight-bold">'+d.notif[i].pesan+'</span>'+
                      '</div>'+
                    '</a>';
                    }
                    $('#notif').html(notiff);
                    $(".notif").html(d.jumlah_notif);
                  }else{
                    $('#notif').html('tidak ada notifikasi');
                  }
                  
                }
          });
          // a();
          // function a() {
          //   $.getJSON(`<?= base_url() ?>admin/dashboard/get_notif`, function(result) {
          //     $(".notif").html(result.jumlah)
          //     console.log(result.jumlah)
          //     1000
          //   })
          // }

      });
      

    </script>

</html>

