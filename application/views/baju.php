<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Baju
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
      
    </section>

      <style>
  .gambar-cover{
    max-width: 75%;
    position: relative;
    left: 12.5%;
    right: 12.5%;
    box-shadow: 5px 5px 5px #222222;

         }
       </style>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->


        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Insert Baju</h3>
            </div>

            <?php
              $pesan = $this->session->flashdata('notif');
              if ($pesan != NULL) {
                echo'
                    <div style="text-align:right" class="box-header with-border">
              <h3 class="box-title"><button class="btn btn-success">'.$pesan.'</button></h3>
            </div>
                ';  
                # code...
              }
            ?>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('index.php/home/tambah_baju')?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <!--div class="form-group">
                  <label >ID KATEGORI</label>
                  <input type="text" class="form-control" id="id_kategori"  name="id_kategori" required>
                </div -->

                <div class="form-group">
                  <label>ID KATEGORI</label>
                  <select class="form-control" name="id_kategori" id="id_kategori">
                    <option>--Pilih Kategori Baju--</option>
                    <?php 
                      foreach ($kategori as $a) {
                       echo '
                       <option value="'.$a->id_kategori.'">'.$a->nama_kategori.'</option>';
                      }
                     ?>
                    
                  </select>
                </div >

                <div class="form-group">
                  <label for="text">Nama Baju</label>
                  <input type="text" class="form-control" id="baju"  name="baju" required>
                </div>
                  
                <div class="form-group">
                  <label for="text">Stock</label>
                  <input type="text" class="form-control" id="stok" name="stok" required>
                </div>
           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>

        
        <!-- /.box-footer-->

          <section class="content">
        <div class="box box-primary">
      
           <div class="box-header with-border">
              <h3 class="box-title">List Data baju</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID KATEGORI</th>
                  <th>Nama Baju</th>
                  <th>Stock</th>
                  <th colspan="3" style="text-align: center; ">Aksi</th>
                  
                </tr>
                </thead>
                <tbody>

                  <?php
                  $a =1;
                    foreach ($baju as $b) {
                      echo '
                <tr  class="odd" role="row">

                  <td>'.$a.'</td>
                  <td>'.$b->id_kategori.'</td>
                  <td>'.$b->baju.'</td>
                  <td>'.$b->stok.'</td>
                  
                    
                    
                     <td>
                   
                    <a href="#" data-target="#modal_edit" data-toggle="modal" class="btn btn-block btn-block btn-primary" onclick="prepare_update_baju('.$b->id_baju.')">Update</a></td>

                 
                    <td>
                    <a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_hapus" onclick="prepare_hapus_baju('.$b->id_baju.')">Hapus</a></td>
                  
                </tr>
                      ';
                      $a++;
                    }
                  ?>
               
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
 
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
          function prepare_update_baju(id)
          {
            $('#id_baju1').val();
            $('#id_kategori1').val();
            $('#baju1').val();
            $('#stok1').val();
           


            $.getJSON("<?php echo base_url('index.php/home/get_baju_id/');?>" + id, function(data){
              
            $('#id_baju1').val(data.id_baju);
            $('#id_kategori1').val(data.id_kategori);
            $('#baju1').val(data.baju);
            $('#stok1').val(data.stok);
                    });
          }

          function prepare_hapus_baju(id){
            $("#hapus_id_baju").empty();
            $("#hapus_baju").empty();

            $.getJSON("<?php echo base_url('index.php/home/get_baju_id/');?>" + id, function(data){
              $("#hapus_id_baju").val(data.id_baju);
              $("#hapus_baju").text(data.baju);
            })
          }
  </script>

  <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <form action="<?php echo base_url('index.php/home/ubah_baju') ?>" method="post" enctype="multipart/form-data">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="modal_edit1">Update Baju</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_baju" id="id_baju1">

                                            <div class="form-group">
                                                <label>ID KATEGORI</label>
                                                <select class="form-control" name="id_kategori"  id="id_kategori1" required>
                                                  <?php 
                                                      foreach ($kategori as $a) {
                                                          echo '

                                                          <option value="'.$a->id_kategori.'">'.$a->nama_kategori.'</option>';
                                                        }
                                                  ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Nama Baju</label>
                                                <input type="text" class="form-control" name="baju"  id="baju1" required>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input type="text" class="form-control" name="stok"  id="stok1" required>
                                            </div>
                                          
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="SAVE">
                                        </div>
                                        </form>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


<div id="modal_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Konfirmasi Hapus Baju</h4>
        </div>
        <form action="<?php echo base_url('index.php/home/hapus_baju'); ?>" method="post">
            <div class="modal-body">
              <input type="hidden" name="hapus_id_baju" id="hapus_id_baju">
              <p>Apakah anda yakin menghapus buku<b> <span id="hapus_baju"></span></p>
              
            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" class="btn btn-danger" value="YA">
              <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
            </div>
          
        </form>
      </div>
  </div>
</div>