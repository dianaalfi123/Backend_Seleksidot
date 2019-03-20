<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kategori
      </h1>

     <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Insert Kategori Baju</h3>
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
            <form action="<?php echo base_url('index.php/home/tambah_kategori')?>" role="form" method="post">
              <div class="box-body">

                <!--div class="form-group">
                  <label >ID KATEGORI</label>
                  <input type="text" class="form-control" id="id_kategori"  name="id_kategori">
                </div -->

                 <div class="form-group">
                  <label >Nama Kategori</label>
                  <input type="text" class="form-control" id=""  name="nama_kategori">
                </div >

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>


          <section class="content">
        <div class="box box-primary">
      
           <div class="box-header with-border">
              <h3 class="box-title">List Data Kategori Baju</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                 
                  <td colspan="2" style="text-align: center; ">Aksi</td>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i =1;
                    foreach ($kategori as $k ) {
                      echo '
                       <tr  class="odd" role="row">
                  <td>'.$i.'</td>
                  <td>'.$k->nama_kategori.'</td>
                  
                  
                    <td><button data-target="#modal_edit" data-toggle="modal" onclick="prepare_update('.$k->id_kategori.')" type="button" class="btn btn-block btn-primary" nama="update">Update</button></td>
                    <td>
                    <a href="'.base_url('index.php/home/hapus_kategori/'.$k->id_kategori).'" class="btn btn-block btn-danger">Hapus</a></td>
                   
                </tr>';
                $i++;
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
          function prepare_update(id)
          {
            $('#id_kategori1').val();
            $('#nama_kategori1').val();
          

            $.getJSON("<?php echo base_url('index.php/home/get_kategori_id/');?>" + id, function(data){
              $('#id_kategori1').val(data.id_kategori);
              $('#nama_kategori1').val(data.nama_kategori);
              
            });
          }
  </script>

   <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <form action="<?php echo base_url('index.php/home/ubah_kategori') ?>" method="post">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="modal_edit1">Update Kategori</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_kategori" id="id_kategori1">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="nama_kategori"  id="nama_kategori1" required>
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